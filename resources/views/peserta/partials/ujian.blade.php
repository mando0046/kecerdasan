<x-app-layout>
    <div class="w-full max-w-[100vw] p-2 sm:p-4 md:p-6 lg:p-8">
        <!-- Judul dan Timer -->
        <div class="text-center mb-4">
            <h2 class="text-xl sm:text-2xl lg:text-3xl font-bold mb-2">🧠 {{ $exam->name }}</h2>
            <p class="text-gray-600 mb-3 text-sm sm:text-base">{{ $exam->description }}</p>
            <div class="flex justify-center items-center gap-2 mb-2">
                <span class="text-gray-700 font-medium">⏱️ Waktu Tersisa:</span>
                <span id="timer"
                    class="text-red-600 text-lg sm:text-xl font-semibold bg-red-50 px-4 py-1 rounded-lg shadow-inner">
                    {{ $exam->duration }}:00
                </span>
            </div>
            <div class="bg-gray-200 rounded-full h-3 w-full max-w-md mx-auto">
                <div id="progress-bar" class="bg-green-500 h-3 rounded-full w-0"></div>
            </div>
            <div class="text-sm mt-1">
                Terjawab:
                <span id="answered-count">0</span> /
                {{ $exam->total_questions }}
            </div>
        </div>

        @if (!empty($questions) && is_countable($questions) && count($questions) > 0)
            <div class="flex flex-col lg:flex-row gap-4 bg-white p-4 sm:p-6 lg:p-8 rounded-xl shadow">
                <!-- BAGIAN SOAL -->
                <div class="flex-1">
                    <div id="soal-container"
                        class="min-h-[250px] sm:min-h-[350px] flex justify-center items-center text-gray-600 text-sm sm:text-base lg:text-lg text-center leading-relaxed">
                        Memuat soal...
                    </div>

                    <div class="text-center mt-6 flex flex-col sm:flex-row justify-center gap-4">
                        <button id="btn-summary"
                            class="bg-yellow-500 text-white px-6 py-3 rounded-lg shadow hover:bg-yellow-600 text-base transition-all">
                            📋 Ringkasan Jawaban
                        </button>
                        <button id="btn-submit"
                            class="bg-blue-600 text-white px-6 py-3 rounded-lg shadow hover:bg-blue-700 text-base transition-all">
                            ✅ Selesai Ujian
                        </button>
                    </div>
                </div>

                <!-- BAGIAN NAVIGASI -->
                <div class="w-full lg:w-52 xl:w-60 bg-gray-50 rounded-xl p-3 sm:p-4 shadow-inner">
                    <h3 class="text-center font-semibold mb-2 text-base lg:text-lg">Navigasi Soal</h3>

                    <div id="nav-soal"
                        class="grid grid-cols-[repeat(auto-fill,minmax(35px,1fr))] sm:grid-cols-5 md:grid-cols-6 lg:grid-cols-5 xl:grid-cols-5 gap-2 justify-items-center">
                        @foreach ($questions as $i => $q)
                            @if ($q->exam_id == $exam->id)
                                <button
                                    class="btn-soal w-9 h-9 flex items-center justify-center rounded-full 
                                    font-semibold text-gray-800 bg-gray-200 hover:bg-blue-400 transition-all shadow-sm 
                                    text-sm leading-none"
                                    data-index="{{ $i }}">
                                    {{ $i + 1 }}
                                </button>
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
        @else
            <div class="bg-white p-6 text-center rounded-xl shadow text-gray-700 mt-6">
                ❌ Belum ada soal tersedia untuk ujian ini.<br>
                Silakan hubungi administrator untuk mengaktifkan soal.
                <div class="mt-6">
                    <a href="{{ route('peserta.dashboard') }}"
                        class="inline-flex items-center gap-2 bg-blue-600 text-white px-6 py-3 rounded-lg shadow hover:bg-blue-700 transition-all">
                        ⬅️ Kembali ke Dashboard
                    </a>
                </div>
            </div>
        @endif
    </div>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const totalSoal = {{ $exam->total_questions }};
            if (totalSoal === 0) return;

            let currentIndex = 0;
            const soalContainer = document.getElementById('soal-container');
            const btnSubmit = document.getElementById('btn-submit');
            const timerEl = document.getElementById('timer');
            const answeredEl = document.getElementById('answered-count');
            let timerInterval;

            // ==============================
            // Timer berdasarkan duration dari DB
            // ==============================
            let duration = {{ $exam->duration }} * 60;

            function startTimer() {
                timerInterval = setInterval(() => {
                    let minutes = Math.floor(duration / 60);
                    let seconds = duration % 60;
                    timerEl.textContent =
                        `${minutes.toString().padStart(2, '0')}:${seconds.toString().padStart(2, '0')}`;
                    duration--;
                    if (duration < 0) {
                        clearInterval(timerInterval);
                        timerEl.textContent = '00:00';
                        autoSubmitExam();
                    }
                }, 1000);
            }
            startTimer();

            function updateProgress() {
                const answered = document.querySelectorAll('.btn-soal.bg-green-400').length;
                answeredEl.textContent = answered;
                const percent = totalSoal > 0 ? Math.round((answered / totalSoal) * 100) : 0;
                document.getElementById('progress-bar').style.width = percent + '%';
            }

            function loadSoal(index) {
                fetch(`{{ route('peserta.ujian.soal.ajax') }}?index=${index}&exam_id={{ $exam->id }}`)
                    .then(res => res.text())
                    .then(html => {
                        soalContainer.innerHTML = html;
                        currentIndex = index;
                        highlightActive(index);
                        attachOptionEvents();
                    })
                    .catch(() => soalContainer.innerHTML = '<div class="text-red-500">❌ Gagal memuat soal</div>');
            }

            function saveAnswer(questionId, answer, autoNext = true) {
                fetch(`{{ route('peserta.ujian.save') }}`, {
                        method: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}',
                            'Content-Type': 'application/json',
                            'Accept': 'application/json'
                        },
                        body: JSON.stringify({
                            question_id: questionId,
                            answer,
                            exam_id: {{ $exam->id }}
                        })
                    })
                    .then(res => res.json())
                    .then(data => {
                        if (data.status === 'ok') {
                            markAnswered(currentIndex);
                            updateProgress();
                            if (autoNext && currentIndex < totalSoal - 1) loadSoal(currentIndex + 1);
                        } else {
                            Swal.fire('❌ Gagal', data.message || 'Jawaban gagal disimpan', 'error');
                        }
                    })
                    .catch(() => Swal.fire('❌ Gagal', 'Terjadi kesalahan saat menyimpan jawaban', 'error'));
            }

            function attachOptionEvents() {
                soalContainer.querySelectorAll('.pilihan-jawaban').forEach(btn => {
                    btn.addEventListener('click', function() {
                        const qid = this.dataset.questionId;
                        const ans = this.dataset.option;
                        soalContainer.querySelectorAll('.pilihan-jawaban').forEach(b => {
                            b.classList.remove('bg-blue-500', 'text-white', 'ring',
                                'border-blue-600');
                            b.classList.add('bg-gray-100', 'text-gray-800',
                                'border-gray-300');
                        });
                        this.classList.remove('bg-gray-100', 'text-gray-800');
                        this.classList.add('bg-blue-500', 'text-white', 'ring', 'border-blue-600');
                        saveAnswer(qid, ans, true);
                    });
                });
            }

            document.querySelectorAll('.btn-soal').forEach(btn => {
                btn.addEventListener('click', () => {
                    const index = parseInt(btn.dataset.index);
                    loadSoal(index);
                });
            });

            function highlightActive(index) {
                document.querySelectorAll('.btn-soal').forEach(btn => {
                    btn.classList.remove('bg-blue-500', 'text-white', 'ring');
                    btn.classList.add('bg-gray-200');
                });
                const activeBtn = document.querySelector(`.btn-soal[data-index="${index}"]`);
                if (activeBtn) activeBtn.classList.add('bg-blue-500', 'text-white', 'ring');
            }

            function markAnswered(index) {
                const btn = document.querySelector(`.btn-soal[data-index="${index}"]`);
                if (btn) {
                    btn.classList.remove('bg-gray-200', 'bg-blue-500');
                    btn.classList.add('bg-green-400', 'text-white');
                }
            }

            function confirmSubmitExam() {
                Swal.fire({
                    title: 'Selesai Ujian?',
                    text: 'Pastikan semua jawaban sudah diisi.',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Ya, Selesai!',
                    cancelButtonText: 'Batal'
                }).then(result => {
                    if (result.isConfirmed) submitExam();
                });
            }

            function submitExam() {
                if (timerInterval) clearInterval(timerInterval);
                btnSubmit.disabled = true;
                btnSubmit.textContent = 'Mengirim...';

                fetch(`{{ route('peserta.ujian.submit') }}`, {
                        method: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}',
                            'Accept': 'application/json'
                        },
                        body: JSON.stringify({
                            exam_id: {{ $exam->id }}
                        })
                    })
                    .then(res => res.json())
                    .then(() => {
                        Swal.fire({
                            icon: 'success',
                            title: '✅ Ujian Selesai!',
                            text: 'Anda akan diarahkan ke dashboard...',
                            timer: 1500,
                            showConfirmButton: false,
                            didClose: () => window.location.href = "{{ route('peserta.hasil.index') }}"
                        });
                    })
                    .catch(() => {
                        btnSubmit.disabled = false;
                        btnSubmit.textContent = '✅ Selesai Ujian';
                        Swal.fire('❌ Gagal', 'Terjadi kesalahan saat submit ujian.', 'error');
                    });
            }

            function autoSubmitExam() {
                if (timerInterval) clearInterval(timerInterval);
                Swal.fire({
                    icon: 'warning',
                    title: '⏰ Waktu Habis!',
                    text: 'Ujian dikirim otomatis...',
                    timer: 2000,
                    showConfirmButton: false,
                    didClose: () => window.location.href = "{{ route('peserta.hasil.index') }}"
                });
            }

            btnSubmit.addEventListener('click', confirmSubmitExam);

            // Load soal pertama
            loadSoal(0);
            updateProgress();
        });
    </script>
</x-app-layout>

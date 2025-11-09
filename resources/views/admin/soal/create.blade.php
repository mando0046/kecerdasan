<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold">
            {{ isset($soal) ? '✏️ Edit Soal' : '➕ Tambah Soal Baru' }}
        </h2>
    </x-slot>

    <div class="max-w-5xl mx-auto bg-white p-6 rounded-lg shadow-md space-y-6">
        <form action="{{ isset($soal) ? route('admin.soal.update', $soal->id) : route('admin.soal.store') }}"
            method="POST" enctype="multipart/form-data" class="space-y-6">

            @csrf
            @if (isset($soal))
                @method('PUT')
            @endif

            <!-- 📘 Pilih Ujian -->
            <div>
                <label for="exam_id" class="block font-semibold mb-1">Pilih Jenis Ujian</label>
                <select name="exam_id" id="exam_id" class="w-full border p-2 rounded focus:ring focus:ring-blue-300"
                    required>
                    <option value="">-- Pilih Ujian --</option>
                    @foreach ($exams as $exam)
                        <option value="{{ $exam->id }}"
                            {{ old('exam_id', $soal->exam_id ?? '') == $exam->id ? 'selected' : '' }}>
                            {{ $exam->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- 📝 Pertanyaan -->
            <div>
                <label for="question" class="block font-semibold mb-1">Pertanyaan</label>
                <textarea name="question" id="question" rows="4" class="w-full border p-2 rounded focus:ring focus:ring-blue-300"
                    required>{{ old('question', $soal->question ?? '') }}</textarea>
            </div>

            <!-- 🖼️ Gambar Pertanyaan -->
            <div>
                <label for="image" class="block font-semibold mb-1">Gambar Pertanyaan (JPEG/JPG)</label>
                <input type="file" name="image" id="image" accept=".jpeg,.jpg"
                    class="w-full border p-2 rounded" onchange="previewImage(event, 'preview-image')">

                <img id="preview-image" class="hidden h-32 mt-2 rounded border shadow-sm" alt="Preview Gambar Baru">

                @if (!empty($soal?->question_image))
                    <div class="mt-3">
                        <p class="text-sm text-gray-600">🖼️ Gambar pertanyaan saat ini:</p>
                        <img src="{{ asset('storage/soal_images/' . basename($soal->question_image)) }}"
                            alt="Gambar Soal Lama" class="h-32 rounded border shadow-md mt-1">

                        <div class="mt-2">
                            <label class="inline-flex items-center">
                                <input type="checkbox" name="delete_old_image" value="1" class="mr-2">
                                <span class="text-sm text-gray-700">Hapus gambar lama ini</span>
                            </label>
                        </div>
                    </div>
                @endif
            </div>

            <!-- 🧩 Pilihan Jawaban -->
            <div>
                <label class="block font-semibold mb-2">Pilihan Jawaban</label>

                @foreach (['a', 'b', 'c', 'd', 'e'] as $opt)
                    @php $imgField = "option_image_$opt"; @endphp
                    <div class="mb-5 border rounded-lg p-4 bg-gray-50">
                        <div class="grid md:grid-cols-2 gap-4">
                            <div>
                                <label class="block font-semibold mb-1">Jawaban {{ strtoupper($opt) }}</label>
                                <input type="text" name="option_{{ $opt }}"
                                    value="{{ old('option_' . $opt, $soal->{'option_' . $opt} ?? '') }}"
                                    class="w-full border p-2 rounded focus:ring focus:ring-blue-300" required>
                            </div>

                            <div>
                                <label class="block font-semibold mb-1">Gambar {{ strtoupper($opt) }}
                                    (JPEG/JPG)</label>
                                <input type="file" name="option_image_{{ $opt }}" accept=".jpeg,.jpg"
                                    class="w-full border p-2 rounded"
                                    onchange="previewImage(event, 'preview-{{ $opt }}')">

                                <img id="preview-{{ $opt }}"
                                    class="hidden h-24 mt-2 rounded border shadow-sm">

                                @if (!empty($soal?->$imgField))
                                    <div class="mt-2">
                                        <p class="text-sm text-gray-600">
                                            📷 Gambar jawaban {{ strtoupper($opt) }} saat ini:
                                        </p>
                                        <img src="{{ asset('storage/soal_images/' . basename($soal->$imgField)) }}"
                                            alt="Opsi {{ strtoupper($opt) }}"
                                            class="h-24 rounded border shadow-md mt-1">

                                        <div class="mt-2">
                                            <label class="inline-flex items-center">
                                                <input type="checkbox"
                                                    name="delete_old_option_image_{{ $opt }}" value="1"
                                                    class="mr-2">
                                                <span class="text-sm text-gray-700">Hapus gambar lama ini</span>
                                            </label>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- 🔑 Kunci Jawaban -->
            <div>
                <label for="answer" class="block font-semibold mb-1">Kunci Jawaban</label>
                <select name="answer" id="answer" class="w-full border p-2 rounded focus:ring focus:ring-blue-300"
                    required>
                    <option value="">-- Pilih Kunci Jawaban --</option>
                    @foreach (['a', 'b', 'c', 'd', 'e'] as $opt)
                        <option value="{{ $opt }}"
                            {{ old('answer', $soal->answer ?? '') == $opt ? 'selected' : '' }}>
                            {{ strtoupper($opt) }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- 🔘 Tombol -->
            <div class="flex justify-end items-center gap-3 pt-4 border-t">
                <a href="{{ route('admin.soal.index') }}"
                    class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded">
                    ← Kembali
                </a>
                <button type="submit"
                    class="{{ isset($soal) ? 'bg-green-600 hover:bg-green-700' : 'bg-blue-600 hover:bg-blue-700' }} text-white px-4 py-2 rounded">
                    {{ isset($soal) ? '💾 Simpan Perubahan' : '➕ Simpan Soal' }}
                </button>
            </div>
        </form>
    </div>

    <!-- 🧠 Preview Gambar Baru -->
    <script>
        function previewImage(event, previewId) {
            const input = event.target;
            const preview = document.getElementById(previewId);

            if (input.files && input.files[0]) {
                const reader = new FileReader();
                reader.onload = e => {
                    preview.src = e.target.result;
                    preview.classList.remove('hidden');
                };
                reader.readAsDataURL(input.files[0]);
            } else {
                preview.classList.add('hidden');
                preview.src = '';
            }
        }
    </script>
</x-app-layout>

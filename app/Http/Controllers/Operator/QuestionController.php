<?php

namespace App\Http\Controllers\Operator;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Question;
use App\Models\Exam;
use Illuminate\Support\Facades\Storage;

class QuestionController extends Controller
{
    // 🟢 Tampilkan semua soal
    public function index()
    {
        $questions = Question::with('exam')->orderBy('id', 'asc')->get();
        return view('operator.soal.index', compact('questions'));
    }

    // 🟢 Form tambah soal
    public function create()
    {
        $exams = Exam::all();
        $soal = null;
        return view('operator.soal.edit', compact('soal', 'exams'));
    }

    // 🟢 Simpan soal baru
    public function store(Request $request)
    {
        $request->validate([
            'exam_id' => 'required|exists:exams,id',
            'question' => 'required|string',
            'option_a' => 'required|string',
            'option_b' => 'required|string',
            'option_c' => 'required|string',
            'option_d' => 'required|string',
            'option_e' => 'required|string',
            'answer' => 'required|in:a,b,c,d,e',
            'image' => 'nullable|image|mimes:jpeg,jpg,png|max:2048',
            'option_image_a' => 'nullable|image|mimes:jpeg,jpg,png|max:2048',
            'option_image_b' => 'nullable|image|mimes:jpeg,jpg,png|max:2048',
            'option_image_c' => 'nullable|image|mimes:jpeg,jpg,png|max:2048',
            'option_image_d' => 'nullable|image|mimes:jpeg,jpg,png|max:2048',
            'option_image_e' => 'nullable|image|mimes:jpeg,jpg,png|max:2048',
        ]);

        $data = $request->only([
            'exam_id', 'question', 'option_a', 'option_b',
            'option_c', 'option_d', 'option_e', 'answer'
        ]);

        // 🔠 Pastikan answer disimpan huruf besar
        $data['answer'] = strtoupper($data['answer']);

        // Upload gambar pertanyaan
        if ($request->hasFile('image')) {
            $data['question_image'] = $request->file('image')->store('soal_images', 'public');
        }

        // Upload gambar opsi (a-e)
        foreach (['a', 'b', 'c', 'd', 'e'] as $opt) {
            $key = "option_image_$opt";
            if ($request->hasFile($key)) {
                $data[$key] = $request->file($key)->store('soal_images', 'public');
            }
        }

        Question::create($data);

        return redirect()->route('operator.soal.index')
            ->with('success', '✅ Soal berhasil disimpan.');
    }

    // 🟡 Form edit soal
    public function edit(Question $soal)
    {
        $exams = Exam::all();
        return view('operator.soal.edit', compact('soal', 'exams'));
    }

    // 🟡 Update soal lama
    public function update(Request $request, $id)
    {
        $question = Question::findOrFail($id);

        $validated = $request->validate([
            'exam_id' => 'required|exists:exams,id',
            'question' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,jpg,png|max:2048',
            'option_a' => 'required|string',
            'option_image_a' => 'nullable|image|mimes:jpeg,jpg,png|max:2048',
            'option_b' => 'required|string',
            'option_image_b' => 'nullable|image|mimes:jpeg,jpg,png|max:2048',
            'option_c' => 'required|string',
            'option_image_c' => 'nullable|image|mimes:jpeg,jpg,png|max:2048',
            'option_d' => 'required|string',
            'option_image_d' => 'nullable|image|mimes:jpeg,jpg,png|max:2048',
            'option_e' => 'required|string',
            'option_image_e' => 'nullable|image|mimes:jpeg,jpg,png|max:2048',
            'answer' => 'required|in:a,b,c,d,e',
        ]);

        $path = 'soal_images';

        // Upload ulang jika ada gambar baru
        if ($request->hasFile('image')) {
            if ($question->question_image) {
                Storage::disk('public')->delete($question->question_image);
            }
            $question->question_image = $request->file('image')->store($path, 'public');
        }

        foreach (['a', 'b', 'c', 'd', 'e'] as $opt) {
            $field = "option_image_{$opt}";
            if ($request->hasFile($field)) {
                if ($question->$field) {
                    Storage::disk('public')->delete($question->$field);
                }
                $question->$field = $request->file($field)->store($path, 'public');
            }
        }

        // 🔠 Pastikan answer disimpan huruf besar
        $validated['answer'] = strtoupper($validated['answer']);

        // Update semua kolom
        $question->update([
            'exam_id' => $validated['exam_id'],
            'question' => $validated['question'],
            'option_a' => $validated['option_a'],
            'option_b' => $validated['option_b'],
            'option_c' => $validated['option_c'],
            'option_d' => $validated['option_d'],
            'option_e' => $validated['option_e'],
            'answer' => $validated['answer'],
            'question_image' => $question->question_image,
            'option_image_a' => $question->option_image_a,
            'option_image_b' => $question->option_image_b,
            'option_image_c' => $question->option_image_c,
            'option_image_d' => $question->option_image_d,
            'option_image_e' => $question->option_image_e,
        ]);

        return redirect()->route('operator.soal.index')
            ->with('success', '✅ Soal berhasil diperbarui.');
    }
}

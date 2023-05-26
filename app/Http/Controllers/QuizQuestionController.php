<?php

namespace App\Http\Controllers;

use App\Models\Quiz;
use App\Models\QuizQuestion;
use Illuminate\Http\Request;

class QuizQuestionController extends Controller
{

    public function index()
    {
        $view_data = [];
        $quiz_questions = QuizQuestion::all();
        $view_data['quiz_questions'] = $quiz_questions;
        return view('quiz_questions/index', $view_data);
    }

    public function create($quiz)
    {
        $quizzes = Quiz::all();
        $quiz = Quiz::find($quiz);
        return view('quiz_questions.create', compact('quizzes', 'quiz'));
    }


    public function store(Request $request)
    {
        QuizQuestion::create($request->all());
        return redirect()->route('quiz_questions.index')->with('success', 'Question created successfully.');
    }


    // public function show(QuizQuestion $quizQuestion)
    // {
    //     return view('quiz_questions.show', compact('quizQuestion'));
    // }

    public function show($quiz)
    {

        $view_data = [];
        $quiz = Quiz::find($quiz);
        $quiz_questions = Quiz::with('quiz_questions')->get();
        $view_data['quiz'] = $quiz;
        $view_data['quiz_questions'] = $quiz_questions;
        return view('quiz_questions/show', $view_data);
        // return view('quiz_questions.show', compact('quizQuestion'));
    }


    public function edit(QuizQuestion $quizQuestion)
    {
        $quizzes = Quiz::all();

        return view('quiz_questions.edit', compact('quizQuestion', 'quizzes'));
    }


    public function update(Request $request, QuizQuestion $quizQuestion)
    {
        $quizQuestion->update($request->all());
        return redirect()->route('quiz_questions.index')->with('success', 'Question updated successfully.');
    }


    public function destroy(QuizQuestion $quiz_question)
    {
        $quiz_question->delete();
        return redirect()->route('quiz_questions.index')->with('success', 'Question deleted successfully');
    }
}

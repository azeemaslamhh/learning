<?php

namespace App\Http\Controllers;

use App\Models\InputFieldType;
use App\Models\Quiz;
use App\Models\QuizOption;
use App\Models\QuizQuestion;
use App\Models\QuizResult;
use App\Models\User;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\DB;

class QuizController extends Controller
{

    public function index()
    {
        $view_data = [];
        $quizzes = Quiz::all();
        $view_data['quizzes'] = $quizzes;
        return view('quizzes/index', $view_data);
        // $quizzes = Quiz::select(['id', 'title', 'total_numbers', 'is_active', 'created_at', 'updated_at']);
        // return view('quizzes.index', [DataTables::of($quizzes)->make(true)]);
        // return view('quizzes.index');
    }
    public function getQuises()
    {
        $quizzes = Quiz::select(['id', 'title', 'total_numbers', 'is_active', 'created_at', 'updated_at']);

        return DataTables::of($quizzes)->make(true);
    }

    public function create()
    {
        $input_field_types = InputFieldType::all();
        return view('quizzes.create', compact('input_field_types'));
    }


    public function store(Request $request)
    {

        // echo '<pre>';
        // print_r($request->all());
        // exit;

        $getQuiz = Quiz::create([
            'title' => $request->title,
            'meta_text_field' => json_encode($request->all())
        ]);

        $quizzes = $request->quiz;
        $this->save_quiz($quizzes,$getQuiz->id);

        return redirect()->route('quizzes.index')->with('success', 'Quiz created successfully.');
    }

    public function save_quiz($quizzes,$quiz_id)
    {

        foreach ($quizzes as $quiz) {

            if ($quiz['option_type'] == "text") {
                $quizQuestion = new QuizQuestion;
                $quizQuestion->quiz_id = $quiz_id;
                $quizQuestion->question = $quiz['question'];
                $quizQuestion->total_score = 10;
                $quizQuestion->option_type = $quiz['option_type'];
                $quizQuestion->save();
                $quizOption = new QuizOption;
                $quizOption->quiz_id = $quiz_id;
                $quizOption->option_name = $quiz['field_name'];
                $quizOption->quiz_question_id = $quizQuestion->id;
                $quizOption->text_field_correct_answer = $quiz['field_value'];
                $quizOption->correct_option = false;
                $quizOption->save();
            } else {
                $quizQuestion = new QuizQuestion;
                $quizQuestion->quiz_id = $quiz_id;
                $quizQuestion->question = $quiz['question'];
                $quizQuestion->total_score = 10;
                $quizQuestion->option_type = $quiz['option_type'];
                $quizQuestion->save();
                foreach ($quiz['answer'] as  $answerkey => $answer) {
                    $quizOption = new QuizOption;
                    $quizOption->quiz_id = $quiz_id;
                    $quizOption->quiz_question_id = $quizQuestion->id;
                    $quizOption->option_name = $answer;
                    $quizOption->correct_option = $quiz['correct_option'][$answerkey];
                    $quizOption->save();
                }
            }
        }
    }

    public function show(Quiz $quiz)
    {
        $quiz = Quiz::find($quiz->id);
        $quiz_questions = $quiz->quiz_questions;
        $quiz_questions->load('quiz_options');
        return view('quizzes.show', compact('quiz', 'quiz_questions'));
    }

    public function edit($id)
    {

        try {
            $quiz_result = Quiz::where('id', $id);

            if ($quiz_result->count() > 0) {
                $quiz = $quiz_result->first();
                $quiz_questions = $quiz->quiz_questions;
                $quiz_questions->load('quiz_options');
                $input_field_types = InputFieldType::all();
                $meta_text_fields  = json_decode($quiz?->meta_text_field, true);
                // echo '<pre>';
                // print_r($meta_text_fields);
                $quez_rs = QuizQuestion::where('quiz_id', $id);
                $data = array();
                if ($quez_rs->count() > 0) {
                    $quez_data = $quez_rs->get()->toArray();

                    foreach ($quez_data as $row) {
                        $rs = QuizOption::where('quiz_question_id', $row['id']);
                        if ($rs->count() > 0) {
                            $row['options'] = $rs->get()->toArray();
                        }
                        $data[] = $row;
                    }
                }
                // echo '<pre>';
                // print_r($data);
                // exit;
                return view('quizzes.edit', compact('quiz', 'data', 'quiz_questions', 'input_field_types', 'meta_text_fields'));
            } else {
                echo 'Quiz id not found';
                exit;
            }
        } catch (Exception $e) {
            echo 'Message: ' . $e->getMessage();
            exit;
        }
        // echo '<pre>';
        // print_r($meta_text_fields);
        // exit;

    }



    public function update(Request $request, Quiz $quiz)
    {

        $quiz = Quiz::find($quiz->id);
        $existing_quiz_questions = $quiz->quiz_questions;
        $existing_quiz_questions->load('quiz_options');
        // echo '<pre>';
        // print_r($request->all());
        // print_r($existing_quiz_questions);
        // exit;
        $quiz->update(['title' => $request->input('title'), 'meta_text_field' => json_encode($request->all())]);
        ///quiz_options   quiz_id
        //quiz_questions   quiz_id
        DB::table("quiz_options")->where("quiz_id",$quiz->id)->delete();
        DB::table("quiz_questions")->where("quiz_id",$quiz->id)->delete();
        $quizzes = $request->quiz;
        $this->save_quiz($quizzes,$quiz->id);
        // $quizQuestions = QuizQuestion::where('quiz_id', $quiz->id)->get();

        // foreach ($quizQuestions as $question) {
        //     $question->quizOptions()->delete();
        // }

        // $quizzes = $request->input('quiz');
        // foreach ($existing_quiz_questions as $key => $quizQuestion) {
        //     if ($quizzes[$key]['option_type'] == "text") {
        //         $quizQuestion = QuizQuestion::findorfail($quizQuestion->id);
        //         $quizQuestion->quiz_id = $quiz->id;
        //         $quizQuestion->question = $quizzes[$key]['question'];
        //         $quizQuestion->option_type = $quizzes[$key]['option_type'];
        //         $quizQuestion->save();
        //         $quizOption = QuizOption::findorfail($quizQuestion['quiz_options'][$key]->id);
        //         $quizOption->quiz_id = $quiz->id;
        //         $quizOption->option_name = $quizzes[$key]['field_name'];
        //         $quizOption->quiz_question_id = $quizQuestion->id;
        //         $quizOption->text_field_correct_answer = $quizzes[$key]['field_value'];
        //         $quizOption->correct_option = false;
        //         $quizOption->save();
        //     } else {
        //         $quizQuestion = QuizQuestion::findorfail($quizQuestion->id);
        //         $quizQuestion->quiz_id = $quiz->id;
        //         $quizQuestion->question = $quizzes[$key]['question'];
        //         $quizQuestion->option_type = $quizzes[$key]['option_type'];
        //         $quizQuestion->save();
        //         foreach ($quizQuestion['quiz_options'] as  $answerkey =>  $answer) {
        //             $quizOption = QuizOption::findorfail($answer->id);
        //             $quizOption->quiz_id = $quiz->id;
        //             $quizOption->quiz_question_id = $quizQuestion->id;
        //             $quizOption->option_name = $quizzes[$key]['answer'][$answerkey];
        //             $quizOption->correct_option = $quizzes[$key]['correct_option'][$answerkey];
        //             $quizOption->save();
        //         }
        //     }
        // }
        return redirect()->route('quizzes.index')->with('success', 'Quiz updated successfully.');
    }






    // public function update(Request $request, Quiz $quiz)
    // {
    // echo '<pre>';
    // print_r($request->all());
    // exit;
    // dd($request->input('title'));
    // $quiz = Quiz::find($quiz->id);
    // $existing_quiz_questions = $quiz->quiz_questions;
    // $existing_quiz_questions->load('quiz_options');
    // $quiz->update(['title' => $request->input('title')]);
    // $quizzes = $request->input('quiz');
    // foreach ($existing_quiz_questions as $key => $quizQuestion) {
    //     if ($quizzes[$key]['option_type'] == "text") {
    //         $quizQuestion = QuizQuestion::findorfail($quizQuestion->id);
    //         $quizQuestion->quiz_id = $quiz->id;
    //         $quizQuestion->question = $quizzes[$key]['question'];
    //         // $quizQuestion->total_score = $quizzes[$key]['total_score'];
    //         $quizQuestion->option_type = $quizzes[$key]['option_type'];
    //         $quizQuestion->save();
    //         $quizOption = QuizOption::findorfail($quizQuestion['quiz_options'][$key]->id);
    //         $quizOption->quiz_id = $quiz->id;
    //         $quizOption->option_name = $quizzes[$key]['field_name'];
    //         $quizOption->quiz_question_id = $quizQuestion->id;
    //         $quizOption->text_field_correct_answer = $quizzes[$key]['field_value'];
    //         $quizOption->correct_option = false;
    //         $quizOption->save();
    //     } else {
    //         $quizQuestion = QuizQuestion::findorfail($quizQuestion->id);
    //         $quizQuestion->quiz_id = $quiz->id;
    //         $quizQuestion->question = $quizzes[$key]['question'];
    //         // $quizQuestion->total_score = $quizzes[$key]['total_score'];
    //         $quizQuestion->option_type = $quizzes[$key]['option_type'];
    //         $quizQuestion->save();
    //         foreach ($quizQuestion['quiz_options'] as  $answerkey =>  $answer) {
    //             $quizOption = QuizOption::findorfail($answer->id);
    //             $quizOption->quiz_id = $quiz->id;
    //             $quizOption->quiz_question_id = $quizQuestion->id;
    //             $quizOption->option_name = $quizzes[$key]['answer'][$answerkey];
    //             $quizOption->correct_option = $quizzes[$key]['correct_option'][$answerkey];
    //             $quizOption->save();
    //         }
    //     }
    // }


    // return redirect()->route('quizzes.index')->with('success', 'Quiz updated successfully.');
    // }






    public function destroy(Quiz $quiz)
    {
        $quiz->delete();
        return redirect()->route('quizzes.index')->with('success', 'Quiz deleted successfully');
    }

    public function destroyAll()
    {
        if (!request('items')) {
            return redirect()->route('quizzes.index')->with('error', 'Quiz deleted Unsuccessfully');
        }
        Quiz::destroy(request('items'));
        return redirect()->route('quizzes.index')->with('success', 'Quiz deleted successfully');
    }
}

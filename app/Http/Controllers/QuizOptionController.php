<?php

namespace App\Http\Controllers;

use App\Models\QuizOption;
use Illuminate\Http\Request;

class QuizOptionController extends Controller
{
   
    public function indexindex(QuizOption $answer)
    {
        return $answer->render('quiz_options.index');
    
    }

   
    public function create()
    {
        return view('quiz_options.create');

    }

   
    public function store(Request $request)
    {
        QuizOption::create($request->all());
        return redirect()->route('quiz_options.index')->with('success', 'Answer created successfully.');
 
    }

   
    public function show(QuizOption $QuizOption)
    {
        //
    }

    public function edit(QuizOption $QuizOption)
    {
        return view('quiz_options.edit', compact('QuizOption'));

    }

   
    public function update(Request $request, QuizOption $QuizOption)
    {
   
        $QuizOption->update($request->all());
        return redirect()->route('quiz_options.index')->with('success', 'Answer updated successfully.');
   
       
    }

    public function destroy(QuizOption $QuizOption)
    {
        $QuizOption->delete();
        return redirect()->route('quiz_options.index')->with('success', 'Answer deleted successfully');
    }

    public function destroyAll()
    {
        if (!request('items')) {
            return redirect()->route('quiz_options.index')->with('error', 'Answer deleted Unsuccessfully');
        }
        QuizOption::destroy(request('items'));
        return redirect()->route('quiz_options.index')->with('success', 'Answer deleted successfully');
    }
    
}
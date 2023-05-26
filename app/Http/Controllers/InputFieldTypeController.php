<?php

namespace App\Http\Controllers;

use App\Models\InputFieldType;
use Illuminate\Http\Request;

class InputFieldTypeController extends Controller
{
   
    public function index()
    {
        $view_data = [];
        $input_field_types = InputFieldType::all();
        $view_data['input_field_types'] = $input_field_types;
        return view('input_field_types/index', $view_data);
    }

  
    public function create()
    {
        return view('input_field_types/create');
    }

   
    public function store(Request $request)
    {
        InputFieldType::create($request->all());
        return redirect()->route('input_field_types.index')->with('success', 'Input Field Type created successfully.');
 
    }

    
    public function show(InputFieldType $inputFieldType)
    {
        return view('input_field_types.show', compact('inputFieldType'));

    }

    
    public function edit(InputFieldType $inputFieldType)
    {
        return view('input_field_types.edit', compact('inputFieldType'));

    }

    
    public function update(Request $request, InputFieldType $inputFieldType)
    {
       $inputFieldType->update($request->all());
        return redirect()->route('input_field_types.index')->with('success', 'Input Field Type updated successfully.');
 
    }

   
    public function destroy(InputFieldType $inputFieldType)
    {
        $inputFieldType->delete();
        return redirect()->route('input_field_types.index')->with('success','Input Field Type deleted successfully');
   
    }
}

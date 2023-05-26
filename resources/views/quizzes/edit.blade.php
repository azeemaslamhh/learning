@extends('layouts.app')

@section('content')

<div class="wrapper">
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Update Quiz</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item"><a href="#">Quizzes Table</a></li>
                            <li class="breadcrumb-item active">Update Quiz</li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>

        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Edit Quiz Information</h3>
                            </div>

                            <form action="{{ route('quizzes.update',$quiz?->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <input type="hidden" class="form-input" name="quiz_id" value="{{ $quiz?->id }}">
                                <div class="card-body">
                                    <div class="form-group ">
                                        <label for="title">Name</label>
                                        <input type="text" class="form-control" id="title" name="title" value="{{$meta_text_fields['title'] }}" placeholder="Enter quiz title" required>
                                    </div>

                                    @foreach ($data as $key => $quiz_question)
                                    @if ($quiz_question['option_type'] == "text")
                                    <div id="div-{{$key}}">
                                        <div class="form-group">
                                            <input type="hidden" class="form-input" name="quiz[{{$key}}][id]" value="{{ $quiz_question['id']  }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="question">Question {{$key+1}}</label>
                                            <input type="text" name="quiz[{{$key}}][question]" id="question" class="form-control" value="{{ $quiz_question['question'] }}">
                                        </div>

                                        <div class="form-group">
                                            <label for="option_type">Option Type</label>
                                            <select class="form-control" id="option_type-div-{{$key}}" name=" quiz[{{$key}}][option_type]" required>
                                                <option value="" disabled selected>--Select Option Type--</option>
                                                @foreach ($input_field_types as $field_type)
                                                <option value="{{$field_type?->input_type}}" {{$quiz_question['option_type'] == $field_type?->input_type  ? 'selected' : ''}}>{{$field_type?->input_type }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <div class="form-group">
                                                <input type="hidden" class="form-input" name="quiz[{{$key}}][option_id]" value="{{ $quiz_question['options'][0]['id'] }}">
                                            </div>
                                            <label for="options">Answer Field</label>
                                            <div class="form">
                                                <div class="form" id="answer_div-{{$key}}">
                                                    <input type="hidden" class="form-input" name="quiz[{{$key}}][field_name]" value="{{  $quiz_question['options'][0]['option_name']  }}">
                                                    <textarea class="form-control" id="quiz[{{$key}}][field_value]" type="text" name="quiz[{{$key}}][field_value]" cols="30" rows="5">{{$quiz_question['options'][0]['text_field_correct_answer'] }}</textarea>
                                                </div>
                                            </div>
                                            <div class="mb-3">
                                            </div>
                                        </div>
                                        <div class="card card-primary card-outline">
                                        </div>
                                    </div>
                                    @elseif ($quiz_question['option_type'] == "radio")
                                    <div id="div-{{$key}}">
                                        <div class="form-group">
                                            <input type="hidden" class="form-input" name="quiz[{{$key}}][id]" value="{{ $quiz_question['id']  }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="question ">Question {{$key+1}}</label>
                                            <input type="text" name="quiz[{{$key}}][question]" id="question" class="form-control" value="{{ $quiz_question['question'] }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="option_type">Option Type</label>
                                            <select class="form-control" id="option_type-div-{{$key}}" name="quiz[{{$key}}][option_type]" required>
                                                <option value="" disabled selected>--Select Option Type--</option>
                                                @foreach ($input_field_types as $field_type)
                                                <option value="{{$field_type?->input_type}}" {{$quiz_question['option_type'] == $field_type?->input_type  ? 'selected' : ''}}>{{$field_type?->input_type }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="options">Options</label>
                                            <div id="answer_div-{{$key}}">
                                                @foreach ($quiz_question['options'] as $akey=> $option)
                                                <div class="form-check">
                                                    <div class="row">
                                                            <input type="hidden" class="form-input" name="quiz[{{$key}}][option_id][]" value="{{ $option['id'] }}">
                                                        <div class="col">
                                                            <input type="text" name="quiz[{{$key}}][answer][]" id="option" class="form-control" value="{{ $option['option_name'] }}">
                                                        </div>
                                                        <div class="col">
                                                            <select id="quiz[{{$key}}][correct_option]" name="quiz[{{$key}}][correct_option][]">
                                                                <option value="" disabled>--Select option--</option>
                                                                <option value="0" {{ $option['correct_option'] ? 'selected' : '' }}>false</option>
                                                                <option value="1" {{ $option['correct_option'] ? 'selected' : '' }}>true</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                @endforeach
                                                <div class="add-single-option-radio">
                                                </div>
                                                <button type="button" class="btn btn-warning add-one-field"><i class="fas fa-plus"></i></button>
                                            </div>
                                            <div class="mb-3">
                                            </div>
                                        </div>
                                        <div class="card card-primary card-outline">
                                        </div>
                                    </div>
                                    @else
                                    <div id="div-{{$key}}">
                                        <div class="form-group">
                                            <input type="hidden" class="form-input" name="quiz[{{$key}}][id]" value="{{ $quiz_question['id']  }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="question question_options">Question {{$key+1}}</label>
                                            <input type="text" name="quiz[{{$key}}][question]" id="question" class="form-control" value="{{ $quiz_question['question'] }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="option_type">Option Type</label>
                                            <select class="form-control" id="option_type-div-{{$key}}" name="quiz[{{$key}}][option_type]" required>
                                                <option value="" disabled selected>--Select Option Type--</option>
                                                @foreach ($input_field_types as $field_type)
                                                <option value="{{$field_type?->input_type}}" {{$quiz_question['option_type'] == $field_type?->input_type  ? 'selected' : ''}}>{{ucfirst($field_type?->input_type)}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="options">Options</label>
                                            <div id="answer_div-{{$key}}">
                                                @foreach ($quiz_question['options'] as $akey=> $option)
                                                <div class="form-check">
                                                    <div class="row">
                                                        <div class="form-group">
                                                            <input type="hidden" class="form-input" name="quiz[{{$key}}][option_id][]" value="{{ $option['id'] }}">
                                                        </div>
                                                        <div class="col">
                                                            <input type="text" name="quiz[{{$key}}][answer][]" id="option" class="form-control" value="{{ $option['option_name'] }}">
                                                        </div>
                                                        <div class="col">
                                                            <select id="quiz[{{$key}}][correct_option]" name="quiz[{{$key}}][correct_option][]">
                                                                <option value="" disabled>--Select option--</option>
                                                                <option value="0" {{ $option['correct_option'] ? 'selected' : '' }}>false</option>
                                                                <option value="1" {{ $option['correct_option'] ? 'selected' : '' }}>true</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                @endforeach
                                                <div class="add-single-option-checkbox">
                                                </div>
                                                <button type="button" class="btn btn-warning add-one-field"><i class="fas fa-plus"></i></button>
                                            </div>
                                            <div class="mb-3">
                                            </div>
                                        </div>
                                        <div class="card card-primary card-outline">
                                        </div>
                                    </div>
                                    @endif
                                    @endforeach
                                    <div class="questions-container">
                                        <div class="options-container">
                                        </div>
                                    </div>
                                </div>
                                <button type="button" class="btn btn-warning add-field"><i class="fas fa-plus"></i> Add Question</button>
                                <button type="submit" class="btn btn-primary">Update</button>
                            </form>
                        </div>
                    </div>
                </div>
        </section>
    </div>
</div>




<script>
    function deleteOptionSingleRow(num) {
        var row = document.getElementById('row_' + num);
        row.remove();
    }

    $(document).ready(function() {
        $('select[id^="option_type-div-"]').on('change', function() {
            var selectId = this.id;
            var selectedOption = $(this).val();
            var str = selectId;
            var num = parseInt(str.match(/\d+/)[0]);
            if (selectedOption === "radio" || selectedOption === "checkbox") {
                $('#answer_div-' + num).html('<button type="button" class="btn btn-warning add-one-field-in-selected-option"><i class="fas fa-plus"></i></button>');
                $('#answer_div-' + num).off('click', '.add-one-field-in-selected-option').on('click', '.add-one-field-in-selected-option', function() {
                    var optionHtml = '<div id="row_' + num + '" class="form-group"><div class="form-check"><div class="row"><div class="col"><input type="text" name="quiz[' + num + '][options][]" id="quiz[' + num + '][options][]" placeholder="Text Field"></div><div class="col"><select id="quiz[' + num + '][correct_option]" name="quiz[' + num + '][correct_option][]"><option value="" disabled>--Select option--</option><option value="0">false</option><option value="1">true</option></select></div><div class="col"><button onclick="deleteOptionSingleRow(' + num + ')" type="button" class="btn btn-danger remove-field"><i class="fas fa-minus"></i></button></div></div></div></div>';
                    $('#answer_div-' + num).append(optionHtml);
                });
            } else if (selectedOption === "text") {
                $('#answer_div-' + num).html('<div class="form"><div class="form" id="#answer_div-"' + num + '"><input type="hidden" class="form-input" name="quiz[' + num + '][field_name]" value="quiz[' + num + '][field_name]"><textarea class="form-control" id="quiz[' + num + '][field_value]" type="text" name="quiz[' + num + '][field_value]" cols="30" rows="5"></textarea></div></div>  <div class="mb-3"></div>');
            }
        });
    });
</script>



<script>
    // function for delete record 
    function deleteOptionRowInEditField(key, optionCount) {
        $('#quiz\\[' + key + '\\]\\[answer\\]\\[' + optionCount + '\\]').closest('.form-group').remove();
    }
    // function for delete row in table

    function deleteRrow(id) {
        $("#tr_" + id).remove();
    }
    var latestDiv = $('[id^="div-"]');
    var q = 1;
    var qCount = 0;
    var latestDivLenght = latestDiv?.length;

    $(document).ready(function() {


        $('.add-one-field').click(function() {


            var divId = $(this).closest("div[id^='div-']").attr("id");
            var key = divId.split("-")[1];
            var optionTypeSelectId = "#option_type-div-" + key;
            var optionType = $(optionTypeSelectId).val();
            var optionCount = $("#answer_div-" + key + " .form-check").length;
            var nextOptionCount = optionCount + 1;
            var questionOptionsCount = $('.question_options').length;
            var questiontextCount = $('.question_text').length;
            qCount = questionOptionsCount + questiontextCount + q;
            var optionCount = $('.options-container .form-group').length;
            var newField = $('<div class="form-group"><div class="form-check"><div class="row"><div class="col"><input type="text" name="quiz[' + key + '][answer][]"  id="quiz[' + key + '][answer][' + nextOptionCount + ']"  placeholder="Text Field"></div><div class="col"><select  id="quiz[' + key + '][correct_option]" name="quiz[' + key + '][correct_option][]" ><option value="" disabled>--Select option--</option><option value="0">false</option><option value="1">true</option></select></div><div class="col"><button type="button" onclick="deleteOptionRowInEditField(' + key + ',' + nextOptionCount + ')" class="btn btn-danger remove-field"><i class="fas fa-minus"></i></button></div></div></div></div>');
            $('.add-single-option-' + optionType).append(newField);
        });

        // Add new question field

        $('.add-field').click(function() {
            q++;


            var questionsContainer = document.querySelector('.questions-container');
            var questionLength = questionsContainer.querySelectorAll('.options-container').length;
            qCount = latestDivLenght + questionLength;
            var optionCount = $('.options-container .form-group').length;
            var newField = $('<div class="form-group"><label>Question ' + (qCount) + '</label><input type="text" class="form-control" name="quiz[' + (qCount - 1) + '][question]" placeholder="Enter question"><div class="options-container"></div><div class="mb-3"></div><button type="button" class="btn btn-success add-option"><i class="fas fa-plus"></i> Add Option</button>  <button type="button" class="btn btn-danger remove-field"><i class="fas fa-minus"></i> Remove Question</button><div class="mb-3"></div><div class="card card-primary card-outline"></div></div>');
            $('.questions-container').append(newField);
        });

        // Remove question field
        $('.questions-container').on('click', '.remove-field', function() {
            $(this).parent().remove();
        });


        // Add new option field
        $('.questions-container').on('click', '.add-option', function() {
            var questionCount = $('.questions-container .form-group').length;
            var $optionsContainer = $(this).closest('.form-group').find('.options-container');
            var optionCount = $optionsContainer.find('.form-check').length;



            var $dialog = $('<div class="modal fade"><div class="modal-dialog modal-lg"><div class="modal-content"><div class="modal-header"><h5 class="modal-title">Add Option</h5><button type="button" class="close" data-dismiss="modal">&times;</button></div><div class="modal-body"><div class="form-group"><label for="option-type">Option Type:</label><select name="option-type" class="form-control" id="option-type" required><option value="" disabled selected>--Select Option Type--</option>@foreach ($input_field_types as $field_type)<option value="{{$field_type->input_type}}"{{ isset($quiz_question) && ' + $quiz_question[option_type][0] + ' ==  $field_type?->input_type ? selected : null }}>{{$field_type->input_type}}</option>@endforeach</select></select></div></div><div class="modal-footer"><button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button><button type="button" class="btn btn-primary add-option-confirm">Add Option</button></div></div></div></div>');
            var $getOptionType = $dialog.find('#option-type');;

            var $optionCount = $dialog.find('#option-count');

            var $optionType = '';


            $dialog.find('#option-type').on('change', function() {

                $optionType = $(this).val();
                $dialog.find('.modal-body .form-group:not(:first-child)').remove();
                if ($optionType === 'text') {
                    $dialog.find('.option-group').remove();
                    var optionsHtml = '';
                    optionsHtml = '<div class="form-group"><label for="answer-name">Answer Name :</label><input type="text" class="form-control" name="answer-name" id="option-name" required></div>';
                    $dialog.find('.modal-body').append(optionsHtml);
                } else if ($optionType === 'radio') {
                    $dialog.find('.option-group').remove();
                    optionsHtml = '<div class="form-group"><label for="option-count" id="option-count-label">Option Count:</label><select class="form-control" name="option-count" id="option-count" required><option value="0">--Select Option--</option><option value="2">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option><option value="6">6</option><option value="7">7</option><option value="8">8</option></select></div>'
                    $dialog.find('.modal-body').append(optionsHtml);
                    $dialog.find('#option-count').on('change', function() {
                        var count = 0;
                        count = parseInt($(this).val());
                        var optionsHtml = '';
                        $dialog.find('.option-group').remove();
                        for (var i = 1; i <= count; i++) {
                            optionsHtml += '<div class="option-group row"><div class="form-group col-md-6"><label for="q-' + q + '-option-name-' + i + '">Option Name ' + i + ':</label><input type="text" class="form-control" name="option-name-' + i + '" id="q-' + q + '-option-name-' + i + '" required></div><div class="form-group option-correct-container radio-options col-md-6" id="option-correct-container"><label for="option-correct-' + i + '">Correct Option ' + i + ':</label><select class="form-control" name="option-correct-' + i + '" id="option-correct-' + i + '" required><option value="0">False</option><option value="1">True</option></select></div></div>';

                        }
                        $dialog.find('.modal-body').append(optionsHtml);
                    });
                } else if ($optionType === 'checkbox') {
                    $dialog.find('.option-group').remove();
                    optionsHtml = '<div class="form-group"><label for="option-count" id="option-count-label">Option Count:</label><select class="form-control" name="option-count" id="option-count" required><option value="0">--Select Option--</option><option value="2">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option><option value="6">6</option><option value="7">7</option><option value="8">8</option></select></div>'
                    $dialog.find('.modal-body').append(optionsHtml);
                    $dialog.find('#option-count').on('change', function() {
                        var count = 0;
                        count = parseInt($(this).val());
                        var optionsHtml = '';
                        $dialog.find('.option-group').remove();
                        for (var i = 1; i <= count; i++) {
                            optionsHtml += '<div class="option-group row"><div class="form-group col-md-6"><label for="q-' + q + '-option-name-' + i + '">Option Name ' + i + ':</label><input type="text" class="form-control" name="option-name-' + i + '" id="q-' + q + '-option-name-' + i + '" required></div><div class="form-group option-correct-container col-md-6" id="option-correct-container"><label for="option-correct-' + i + '">Correct Option ' + i + ':</label><select class="form-control" name="option-correct-' + i + '" id="option-correct-' + i + '" required><option value="0">False</option><option value="1">True</option></select></div></div>';
                        }
                        $dialog.find('.modal-body').append(optionsHtml);
                    });
                } else {}
            });


            $dialog.find('#option-type').on('change', function() {
                var selectedOption = $(this).val();
                if (selectedOption === 'text') {
                    $('#option-correct-container').remove();
                    $('label[for="option-name"]').text('Text Field Name');
                    $('.add-option-confirm').text('Add Text Field');
                } else {
                    if ($('#option-correct-container').length === 0) {
                        var optionCorrectContainer = '<div class="form-group option-correct-container" id="option-correct-container"><label for="option-correct">Correct Option:</label><select class="form-control" name="option-correct" id="option-correct" required><option value="0">False</option><option value="1">True</option></select></div>';
                        $('#option-name').parent().after(optionCorrectContainer);
                    }
                    $('label[for="option-name"]').text('Option Name');
                    $('.add-option-confirm').text('Add Option');
                }
            });



            $dialog.find('.add-option-confirm').click(function() {

                var optionType = $dialog.find('#option-type').val();
                var newOption = '';
                if (optionType === 'text') {
                    var optionName = $dialog.find('#option-name').val();
                    newOption = '<div class="form-check"><input type="text" class="form-input" name="quiz[' + (qCount - 1) + '][field_value]" value="' + optionName + '"> <label class="form-check-label">' + optionName + '</label>';
                    newOption += '<input type="hidden" class="form-check-input" name="quiz[' + (qCount - 1) + '][field_name]" value="' + optionName + '">';
                    newOption += '<input type="hidden" class="form-check-input" name="quiz[' + (qCount - 1) + '][option_type]" value="' + optionType + '"><label class="form-check-label">(' + optionType + ')</label><button type="button" class="btn btn-danger remove-option"><i class="fas fa-minus"></i></button></div>';
                } else {
                    var trueOptionCount = 0;
                    var trueRadioOptionCount = 0;

                    $dialog.find('.radio-options select').each(function() {
                        console.log("$(this).val() ", $(this).val());
                        if ($(this).val() == 1) {
                            trueRadioOptionCount++;
                        }
                    });
                    $dialog.find('.option-correct-container select').each(function() {
                        if ($(this).val() == 1) {
                            trueOptionCount++;
                        }
                    });
                    if (trueOptionCount < 1) {
                        alert('Select at least one correct option.');
                        return false;
                    } else if (trueRadioOptionCount >= 2) {
                        alert('Select one correct option.');
                        return false;
                    } else {
                        var optionNames = $('input[id^="q-' + q + '-option-name"]');
                        var optionCorrects = $('.option-correct-container select');


                        newOption = '<table class="table table-striped table-bordered">';
                        newOption += '<thead class="thead-dark">';
                        newOption += '<tr>';
                        newOption += '<th scope="col">Option Name</th>';
                        newOption += '<th scope="col" class="text-center">Remove</th>';
                        newOption += '</tr>';
                        newOption += '</thead>';
                        newOption += '<tbody>';
                        optionNames.each(function(index) {
                            newOption += '<tr id="tr_' + index + '">';
                            newOption += '<td>';
                            newOption += '<div class="form-check">';
                            newOption += '<input type="hidden" class="form-check-input" name="quiz[' + (qCount - 1) + '][option_type]" value="' + optionType + '">';
                            newOption += '<label class="form-check-label">(' + optionType + ')</label>';
                            newOption += '<input type="hidden" class="form-check-input" name="quiz[' + (qCount - 1) + '][answer][]" value="' + $(this).val() + '"> ';
                            newOption += '<label class="form-check-label">' + $(this).val() + '</label>';
                            newOption += '</div>';
                            newOption += '</td>';
                            newOption += '<td class="text-center">';
                            newOption += '<div><button onclick="deleteRrow(' + index + ')" type="button" class="btn btn-danger remove-option"><i class="fas fa-minus"></i></button></div>';
                            newOption += '<input type="hidden" class="form-check-input" name="quiz[' + (qCount - 1) + '][correct_option][]" value="' + optionCorrects.eq(index).val() + '">';
                            newOption += '</td>';
                            newOption += '</tr>';
                        });
                        newOption += '</tbody>';
                        newOption += '</table>';

                    }
                }
                $optionsContainer.append(newOption);
                $dialog.modal('hide');
            });
            $dialog.modal('show');

        });


        // Remove option field
        $('.options-container').on('click', '.remove-option', function() {
            $(this).closest('.form-group').find('.options-container .form-check:last').remove();
        });
    });
</script>

@endsection
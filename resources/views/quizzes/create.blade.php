@extends('layouts.app')

@section('content')


<div class="wrapper">
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Create Quiz</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item"><a href="#">Quizzes Table</a></li>
                            <li class="breadcrumb-item active">Create Quiz</li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <!-- left column -->
                    <div class="col-12">
                        <!-- general form elements -->
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Add Quiz Information</h3>
                            </div>
                            <form method="POST" action="{{ route('quizzes.store') }}">
                                @csrf
                                <div class="card-body">

                                    <div class="form-group">
                                        <label for="title">Name</label>
                                        <input type="text" class="form-control" id="title" name="title" placeholder="Enter quiz title" required>
                                    </div>
                                    <div class="questions-container">
                                        <div class="form-group">
                                            <label>Question 1</label>
                                            <input type="text" class="form-control" name="quiz[0][question]" placeholder="Enter question">
                                            <div class="options-container" id="options-container0-db">
                                            </div>
                                            <div class="mb-3">
                                            </div>
                                            <button type="button" class="btn btn-success add-option"><i class="fas fa-plus"></i> Add Option</button>
                                            <button type="button" class="btn btn-danger remove-field"><i class="fas fa-minus"></i> Remove Question</button>
                                        </div>
                                    </div>
                                    <button type="button" class="btn btn-warning add-field"><i class="fas fa-plus"></i> Add Question</button>
                                    <button type="submit" class="btn btn-primary float-right">Create Quiz</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
        </section>
    </div>
</div>

<script>
    var q = 0;


    function deleteRrow(id) {
        $("#tr_" + id).remove();
    }
    $(document).ready(function() {
        // Add new question field

        $('.add-field').click(function() {
            q++;
            var questionCount = $('.questions-container .form-group').length;
            var optionCount = $('.options-container .form-group').length;
            var newField = $('<div class="form-group"><label>Question ' + (questionCount + 1) + '</label><input type="text" class="form-control" name="quiz[' + q + '][question]" placeholder="Enter question"><div class="options-container"></div><div class="mb-3"></div><button type="button" class="btn btn-success add-option"><i class="fas fa-plus"></i> Add Option</button>  <button type="button" class="btn btn-danger remove-field"><i class="fas fa-minus"></i> Remove Question</button></div>');
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



            var $dialog = $('<div class="modal fade"><div class="modal-dialog modal-lg"><div class="modal-content"><div class="modal-header"><h5 class="modal-title">Add Option</h5><button type="button" class="close" data-dismiss="modal">&times;</button></div><div class="modal-body"><div class="form-group"><label for="option-type">Option Type:</label><select name="option-type" class="form-control" id="option-type" required><option value="" disabled selected>--Select Option Type--</option>@foreach ($input_field_types as $field_type)<option value="{{$field_type->input_type}}"{{ isset($quiz_question) && $quiz_question->option_type == $field_type?->input_type ? selected : null }}>{{$field_type->input_type}}</option>@endforeach</select></div></div><div class="modal-footer"><button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button><button type="button" class="btn btn-primary add-option-confirm">Add Option</button></div></div></div></div>');
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
                    newOption = '<div class="form-check"><input type="text" class="form-input" name="quiz[' + q + '][field_value]" value="' + optionName + '"> <label class="form-check-label">' + optionName + '</label>';
                    newOption += '<input type="hidden" class="form-check-input" name="quiz[' + q + '][field_name]" value="' + optionName + '">';
                    newOption += '<input type="hidden" class="form-check-input" name="quiz[' + q + '][option_type]" value="' + optionType + '"><label class="form-check-label">(' + optionType + ')</label><button type="button" class="btn btn-danger remove-option"><i class="fas fa-minus"></i></button></div>';
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

                        // optionNames.each(function(index) {
                        //     newOption += '<div class="form-check"><input type="hidden" class="form-check-input" name="quiz[' + q + '][answer][]" value="' + $(this).val() + '"> <label class="form-check-label">' + $(this).val() + '</label>';
                        //     newOption += '<input type="hidden" class="form-check-input" name="quiz[' + q + '][option_type]" value="' + optionType + '"><label class="form-check-label">(' + optionType + ')</label><button type="button" class="btn btn-danger remove-option"><i class="fas fa-minus"></i></button></div>';
                        // });

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
                            newOption += '<input type="hidden" class="form-check-input" name="quiz[' + q + '][answer][]" value="' + $(this).val() + '"> ';
                            newOption += '<label class="form-check-label">' + $(this).val() + '</label>';
                            newOption += '<input type="hidden" class="form-check-input" name="quiz[' + q + '][option_type]" value="' + optionType + '">';
                            newOption += '<label class="form-check-label">(' + optionType + ')</label>';
                            newOption += '</div>';
                            newOption += '</td>';
                            newOption += '<td class="text-center">';
                            newOption += '<div><button onclick="deleteRrow(' + index + ')" type="button" class="btn btn-danger remove-option"><i class="fas fa-minus"></i></button></div>';
                            newOption += '<input type="hidden" class="form-check-input" name="quiz[' + q + '][correct_option][]" value="' + optionCorrects.eq(index).val() + '">';
                            newOption += '</td>';
                            newOption += '</tr>';

                        });
                        newOption += '</tbody>';
                        newOption += '</table>';
                        // optionCorrects.each(function(index) {
                        //     newOption += '<input type="hidden" class="form-check-input" name="quiz[' + q + '][correct_option][]" value="' + $(this).val() + '">';
                        // });
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
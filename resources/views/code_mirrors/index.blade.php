@extends('layouts.app')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Code Mirror</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Code Mirror</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <a class="btn btn-success float-right" href="{{ route('categories.create') }}"> Create New category</a>
                        </div>

                        <!-- Default box -->
                        <div class="card card-solid">
                            <div class="card-body pb-0">
                                <div class="row">

                                    <div class="col-12">

                                        <form id="codeForm" method="post">
                                            <input type="hidden" id="_token" name="_token" value="{{ csrf_token() }}">
                                            <!-- <textarea id="editor" name="editor">
                                            &lt;?php
    $name = 'John';
    echo "Hello, $name!";
    ?&gt;
                                            </textarea> -->
                                            <textarea id="editor" name="editor"></textarea>
                                            <button class="btn btn-success" type="button" onclick="getOutput()">Run</button>
                                        </form>
                                        <div id="output"></div>
                                        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

                                        <script>
                                            var editor = CodeMirror.fromTextArea(document.getElementById('editor'), {
                                                mode: "xml",
                                                theme: "3024-night",
                                                lineNumbers: true,
                                                closeTags: true
                                            });
                                            editor.setSize('75vw', '150');

                                            function getOutput() {
                                                var textFieldValue = editor.getValue();
                                                var tokenValue = $("#_token").val();
                            
                                                $.ajax({
                                                    url: "{{ route('run_script') }}",
                                                    type: "post",
                                                    // data: $('#codeForm').serialize(),
                                                    data: $('#codeForm').serialize() + "&textFieldValue=" + encodeURIComponent(textFieldValue) + "&_token=" + encodeURIComponent(tokenValue),
                                                    success: function(response) {
                                                        // debugger
                                                        // $("#output").html(response);
                                                        document.getElementById('output').innerText = response;
                                                    },
                                                    error: function(jqXHR, textStatus, errorThrown) {
                                                        console.log(textStatus, errorThrown);
                                                    }
                                                });


                                            }
                                        </script>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</div>
@endsection
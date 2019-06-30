@extends('layouts.app')

@section('head')
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,500,700" rel="stylesheet" type="text/css">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0-alpha1/jquery.min.js"></script> -->

    <style>
        body {
            font-family: 'Raleway';
            margin-top: 25px;
        }

        button .fa {
            margin-right: 6px;
        }

        .table-text div {
            padding-top: 6px;
        }
    </style>

    <!-- <script>
        $(function () {
            $('#book-title').focus();
        });
    </script> -->
@endsection

@section('content')
    <div class="container">
        <div class="col-sm-offset-2 col-sm-8 mx-auto">
            <div class="card mb-3">
                <div class="card-header">
                    New Book
                </div>

                <div class="card-body">
                    <!-- Display Validation Errors -->
                    @include('common.errors')

                    <!-- New Book Form -->
                    <form action="/books" method="POST" class="form-horizontal">
                        {{ csrf_field() }}

                        <!-- Book Title -->
                        <div class="form-group">
                            <label for="task-name" class="col-sm-3 control-label">Book</label>

                            <div class="col-sm-6">
                                <input type="text" name="title" id="book-title" class="form-control" value="{{ old('book') }}">
                            </div>
                        </div>

                        <!-- Add Book Button -->
                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-6">
                                <button type="submit" class="btn btn-default">
                                    <i class="fa fa-plus"></i>本を追加する
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Books -->
            @if (count($books) > 0)
                <div class="card">
                    <div class="card-header">
                        書籍一覧
                    </div>

                    <div class="card-body">
                        <table class="table table-striped task-table">
                            <thead>
                                <th>Book</th>
                                <th>&nbsp;</th>
                            </thead>
                            <tbody>
                                @foreach ($books as $book)
                                    <tr>
                                        <td class="table-text"><div>{{ $book->title }}</div></td>

                                        <!-- Task Delete Button -->
                                        <td>
                                            <form action="/books/{{ $book->id }}" method="POST">
                                                {{ csrf_field() }}
                                                {{ method_field('DELETE') }}

                                                <button type="submit" class="btn btn-danger">
                                                    <i class="fa fa-trash"></i>削除
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            @endif
        </div>
    </div>
@endsection

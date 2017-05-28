@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="col-sm-offset-2 col-sm-8">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{$hello."testGit".Auth::user()->name."'s"}} Diary
                </div>

                <div class="panel-body">
                    <!-- Display Validation Errors -->
                @include('common.errors')

                <!-- New Diary Form -->
                    <form action="{{ url('diary') }}" method="POST" class="form-horizontal">
                    {{ csrf_field() }}

                    <!-- Task Name -->
                        <div class="form-group">
                            <label for="diary-name" class="col-sm-3 control-label">Diary</label>

                            <div class="col-sm-6">
                                <input type="text" name="title" id="diary-title" class="form-control" value="{{ old('diary') }}">
                                <input type="text" name="Content" id="diary-Content" class="form-control" value="{{ old('diary') }}">
                            </div>
                        </div>

                        <!-- Add Diary Button -->
                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-6">
                                <button type="submit" class="btn btn-default">
                                    <i class="fa fa-btn fa-plus"></i>Add Diary
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Current Diary -->
            @if (count($diaries) > 0)
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Current Diaries
                    </div>

                    <div class="panel-body">
                        <table class="table table-striped diarY-table">
                            <thead>
                            <th>Diary</th>
                            <th>&nbsp;</th>
                            </thead>
                            <tbody>
                            @foreach ($diaries as $diary)
                                <tr>
                                    <td class="table-text"><div>{{ $diary->title }}</div></td>

                                    <!-- Task Delete Button -->
                                    <td>
                                        <form action="{{url('diary/' . $diary->id)}}" method="POST">
                                            {{ csrf_field() }}
                                            {{ method_field('DELETE') }}

                                            <button type="submit" id="delete-diary-{{ $diary->id }}" class="btn btn-danger">
                                                <i class="fa fa-btn fa-trash"></i>Delete
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
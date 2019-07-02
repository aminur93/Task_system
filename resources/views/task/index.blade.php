@extends('layouts.master')

@push('css')
    @endpush

@section('content')
    <div class="row mt-5">
        <div class="col-md-6">
            {{--@if ($errors->any())--}}
                {{--@foreach($errors->all() as $error)--}}
                    {{--<div class="alert alert-danger">--}}
                        {{--{{ $error }}--}}
                    {{--</div>--}}
                    {{--@endforeach--}}
            {{--@endif--}}

            @if (session()->has('msg'))
                <div class="alert alert-success">{{ session()->get('msg') }}</div>
            @endif
            <div class="card">
                <div class="card-header">
                    Add Task
                </div>

                <div class="card-body">
                    <form action="{{ route('task.create') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="task">Task</label>
                            <input type="text" name="task" id="task" class="form-control {{ $errors->has('task') ? 'is-invalid' : '' }}" placeholder="Enter">
                            <div class="invalid-feedback">
                                {{ $errors->has('task') ? $errors->first('task') : '' }}
                            </div>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-success">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="row mt-5">
        <div class="col-md-6">

            @if (session()->has('mssg'))
                <div class="alert alert-danger">{{ session()->get('mssg') }}</div>
            @endif

            <div class="card">
                <div class="card-header">
                    View Task
                </div>

                <div class="card-body">
                    <table class="table table-bordered">
                        <tr>
                            <th>Sl No</th>
                            <th>Task Name</th>
                            <th style="width: 2em;">Action</th>
                        </tr>

                        @foreach($task as $ta)
                        <tr>
                            <td>{{ $ta->id }}</td>
                            <td>{{ $ta->title }}</td>
                            <td>
                                <form action="{{ route('task.destroy',$ta->id) }}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                            @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>

    @push('js')

    @endpush
@endsection
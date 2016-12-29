@extends('layouts.app')

@section('content')
  <div class="container">
    <form class="update-task-form" action="{{ url('/tasks/' . $task->id) }}" method="post">
      {!! csrf_field() !!}
      <div class="form-group">
        <label for="update-task-form__name-input">Edit Task Name</label>
        <input id="update-task-form__name-input" class="update-task-form__name-input form-control" type="text" name="name" placeholder="{{ $task->name }}" value="{{ $task->name }}">
        <input type="hidden" name="id" value="{{ $task->id }}">
      </div>
      <input class="btn btn-primary" type="submit" value="Submit">
    </form>
  </div>
@endsection

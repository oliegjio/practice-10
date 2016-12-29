@extends('layouts.app')

@section('content')
  <div class="container">
    <form class="create-task-form" action="{{ url('/tasks') }}" method="post">
      {!! csrf_field() !!}
      <div class="form-group">
        <label for="create-task-form__name-input">Task Name</label>
        <input id="create-task-form__name-input" class="create-task-form__name-input form-control" type="text" name="name" placeholder="Task's name">
      </div>
      <input class="btn btn-primary" type="submit" value="Submit">
    </form>
  </div>
@endsection

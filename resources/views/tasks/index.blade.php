@extends('layouts.app')

@section('content')
  <div class="container">
    <br>
    @if(count($tasks))
      <ul class="list-group" style="text-transform: capitalize;">
        @foreach($tasks as $task)
          <li class="list-group-item">
            <span class="label label-default">
              {{ $loop->index + 1 }}.
            </span>
            <span class="pull-right">
              <a class="btn btn-xs btn-danger" href="#" onclick="event.preventDefault();
              document.getElementById('delete-form-{{ $task->id }}').submit();
              ">Delete</a>
              <form id="delete-form-{{ $task->id }}" action="{{ url('/tasks/delete/' . $task->id) }}" method="post">
                {{ csrf_field() }}
              </form>
            </span>
            <span class="pull-right">
              <a class="btn btn-xs btn-success" href="#" onclick="event.preventDefault();
              document.getElementById('edit-form-{{ $task->id }}').submit();
              ">Edit</a>
              &nbsp&nbsp
              <form id="edit-form-{{ $task->id }}" action="{{ url('/tasks/' . $task->id . '/edit') }}" method="get">
                {{ csrf_field() }}
              </form>
            </span>
            &nbsp&nbsp&nbsp{{ $task->name }}
          </li>
        @endforeach
      </ul>
    @else
      <h2>There is no tasks yet!</h2>
    @endif
    <a href="{{ url('/tasks/create') }}" class="btn btn-primary">Add new Task</a>
  </div>
@endsection

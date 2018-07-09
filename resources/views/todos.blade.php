@extends('layout')

@section('content')

    <div class="row">

        <div class="col-lg-6 col-lg-offset-3">
            <form action="/create/todo" method="POST">
                {{ csrf_field() }}
                <input type="text" class="form-control input-lg" name="todo" placeholder="Create a New Todo">
            </form>
        </div>

    </div>

    <hr>

{{-- Display data from database --}}
    @foreach($todos as $todo)

        {{ $todo-> todo }} 

        {{-- Create a delete button --}}
        {{-- Access the delete route --}}
        {{-- Echoing result of route method --}}
        <a href="{{ route('todo.delete', ['id'=> $todo->id]) }}" class="btn btn-danger"> x </a>

        {{-- Update/edit button --}}
        <a href="{{ route('todo.update', ['id'=> $todo->id]) }}" class="btn btn-info btn-xs"> update </a>

        @if(!$todo->completed)
        
        {{-- Display button if not marked as complete --}}
        <a href="{{route('todos.completed', ['id'=> $todo->id])}}" class="btn btn-xs btn-success">Mark as Completed</a>

        @else

            <span class="text-success">Completed</span>

        @endif
        
        <hr>

    @endforeach

@stop
@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      @if($quiz->questions->count() > 0)
      <div class="card mt-3">
        <header class="card-header">
          <h4>{{ $quiz->name}}<h4>
          </header>
          <main class="card-body">
            <h4>Questions:</h4>
            @foreach($quiz->questions as $key => $question)
            <div class="card">
              <article class="card-header">
                <section class="row">
                  <div class="col">
                    {{$key+1}} . {{ $question->question_text }}
                  </div>
                  <div class="col text-right">
                    <div class="btn-groups">
                      @if(Auth::user()->role == "Edit" )
                      <button type="button" class="btn btn-success btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Options
                      </button>
                      <section class="dropdown-menu">
                        <a class="dropdown-item" href="/questions/{{ $question->id }}/edit">Edit</a>
                        <form class="form-inline" action="/questions/{{ $question->id }}/delete" method="post">
                          @csrf 
                          @method('DELETE')
                          <button type="submit" class="dropdown-item text-danger">Delete</button>
                        </form>
                      </section>
                      @endif
                    </div>
                  </div>
                </section>
              </article>
              @if(Auth::user()->role == "View" || Auth::user()->role == "Edit" )
              <section class="card-body">
                <ul class="list-group">
                  @foreach($question->answers as $index => $answer)
                  <li class="list-group-item" >
                    @if($index == 0)
                    <span class="answer-index" >A.</span>
                    @endif

                    @if($index == 1)
                    <span class="answer-index">B.</span>
                    @endif

                    @if($index == 2)
                    <span class="answer-index">C.</span>
                    @endif

                    @if($index == 3)
                    <span class="answer-index">D.</span>
                    @endif{{ $answer->answer_text }}
                    @if($answer->correct)
                    <span class="badge badge-success">correct answer</span>
                    @endif
                  </li>
                  @endforeach
                </ul>
              </section>
              @endif
            </div>
            @endforeach
          </main>
          @else
          <header class="container text-center">
            <h4>There are no questions for this quiz currently</h4>
            @if(Auth::user()->role == "Edit" )
            <a class="btn btn-success" href="/questions/create">Create the first question </a>
            @endif
          </header>
          @endif
          @if(Auth::user()->role == "Edit" )
        </div>
        @if($quiz->questions->count() > 0)
        <a href="/questions/create" class="btn btn-success mt-3">Add more questions</a>
        @endif
        @endif
      </div>
    </div>

  </div>

  @if(Session::has('message'))
  <div class="alert alert-success fixed-bottom mb-0">
    {{Session::get('message')}}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
  @endif

  @endsection

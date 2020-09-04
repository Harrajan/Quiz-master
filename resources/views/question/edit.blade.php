@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      @if(Auth::user()->role == "Edit" )
      <div class="card">
        <header class="card-header">
          <h4>Edit question<h4>
          </header>
          <main class="card-body">
            <form action="/questions/{{$question->id}}/update" method="post">
              @csrf
              <section id="question-edit-input-section" class="form-group">
                <label for="questionText">Question:</label>
                <input type="text" class="form-control  {{ $errors->has('question_text') ? 'is-invalid' : '' }}" placeholder="Enter question" id="questionText" value="{{ old('question_text') ?? $question->question_text }}" name="question_text">
                @error('question_text')
                <aside class="invalid-feedback">
                  {{ $message }}
                </aside>
                @enderror
              </section>
              <section id="answer1-edit-input-section"  class="form-group">
                <label for="questionText">Answer 1</label>
                <div class="row">
                  <div class="col-sm-10">
                    <input type="text" class="form-control {{ $errors->has('answer1') ? 'is-invalid' : '' }}" placeholder="Enter answer 1" id="answer1" name="answer1" value="{{ old('answer1') ?? $question->answers[0]->answer_text}}">
                    @error('answer1')
                    <aside class="invalid-feedback">
                      {{ $message }}
                    </aside>
                    @enderror
                  </div>
                  <div class="col-sm-2">
                    <div class="form-check mt-2">
                      <input class="form-check-input" type="radio" name="correct_answer" id="correct_answer1" value="answer1" {{ $question->answers[0]->correct ? 'checked' : '' }}>
                      <label class="form-check-label" for="correct_answer1">
                        <span class="{{ $errors->has('correct_answer') ? 'text-danger' : ''}}">correct</span>
                      </label>
                    </div>
                  </div>
                </div>
              </section>
              <section id="answer2-edit-input-section" class="form-group">
                <label for="questionText">Answer 2</label>
                <div class="row">
                  <div class="col-sm-10">
                    <input type="text" class="form-control {{ $errors->has('answer2') ? 'is-invalid' : '' }}" placeholder="Enter answer 1" id="answer2" name="answer2" value="{{ old('answer2')  ?? $question->answers[1]->answer_text }}">
                    @error('answer2')
                    <aside class="invalid-feedback">
                      {{ $message }}
                    </aside>
                    @enderror
                  </div>
                  <div class="col-sm-2">
                    <div class="form-check mt-2">
                      <input class="form-check-input" type="radio" name="correct_answer" id="correct_answer2" value="answer2"  {{ $question->answers[1]->correct ? 'checked' : '' }}>
                      <label class="form-check-label" for="correct_answer2">
                        <span class="{{ $errors->has('correct_answer') ? 'text-danger' : ''}}">correct</span>
                      </label>
                    </div>
                  </div>
                </div>
              </section>
              <section id="answer3-edit-input-section" class="form-group">
                <label for="questionText">Answer 3</label>
                <div class="row">
                  <div class="col-sm-10">
                    <input type="text" class="form-control {{ $errors->has('answer3') ? 'is-invalid' : '' }}" placeholder="Enter answer 1" id="answer3" name="answer3" value="{{ old('answer3')  ?? $question->answers[2]->answer_text }}">
                    @error('answer3')
                    <aside class="invalid-feedback">
                      {{ $message }}
                    </aside>
                    @enderror
                  </div>
                  <div class="col-sm-2">
                    <div class="form-check mt-2">
                      <input class="form-check-input" type="radio" name="correct_answer" id="correct_answer3" value="answer3"  {{ $question->answers[2]->correct ? 'checked' : '' }}>
                      <label class="form-check-label" for="correct_answer3">
                        <span class="{{ $errors->has('correct_answer') ? 'text-danger' : ''}}">correct</span>
                      </label>
                    </div>
                  </div>
                </div>
              </section>
              <section id="answer4-edit-input-section" class="form-group">
                <label for="questionText">Answer 4</label>
                <div class="row">
                  <div class="col-sm-10">
                    <input type="text" class="form-control {{ $errors->has('answer4') ? 'is-invalid' : '' }}" placeholder="Enter answer 1" id="answer4" name="answer4" value="{{ old('answer4')  ?? $question->answers[3]->answer_text }}">
                    @error('answer4')
                    <aside class="invalid-feedback">
                      {{ $message }}
                    </aside>
                    @enderror
                  </div>
                  <div class="col-sm-2">
                    <div class="form-check mt-2">
                      <input class="form-check-input" type="radio" name="correct_answer" id="correct_answer4" value="answer4"  {{ $question->answers[3]->correct ? 'checked' : '' }}>
                      <label class="form-check-label" for="correct_answer4">
                        <span class="{{ $errors->has('correct_answer') ? 'text-danger' : ''}}">correct</span>
                      </label>
                    </div>
                  </div>
                </div>
              </section>
              <button type="submit" class="btn btn-success">Save</button>
              @error('correct_answer')

              <span class="text-danger"> {{ $message }}</span>

              @enderror

            </form>
          </main>
          @else
          <article>
            YOU DON'T HAVE THE PERMISSIONS TO VIEW THIS PAGE
          </article>
          @endif
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

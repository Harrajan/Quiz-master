@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      @if(Auth::user()->role == "Edit" )
      <article class="card">
        <header class="card-header">
          <h4>Edit Quiz</h4>
        </header>
        <main class="card-body">
          <form action="/quiz/{{$quiz->id}}/update" method="post">
            @csrf
            <section id="quiz-edit-name-input-section" class="form-group">
              <label for="name">Quiz name</label>
              <input type="text" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" id="name" placeholder="Enter quiz name" name="name" value="{{$quiz->name}}">
              @error('name')
              <aside class="invalid-feedback">
                {{ $message }}
              </aside>
              @enderror
            </section>
            <section id="quiz-edit-description-input-section" class="form-group">
              <label for="description">Description</label>
              <input type="text" class="form-control {{ $errors->has('description') ? 'is-invalid' : '' }}" id="description" placeholder="Enter description" name="description" value="{{$quiz->description}}">
              @error('description')
              <aside class="invalid-feedback"> 
                {{ $message }}
              </aside>
              @enderror
            </section>
            <button type="submit" class="btn btn-primary">Save</button>
          </form>
        </main>
      </article>
      @else
      <article>
        YOU DON'T HAVE THE PERMISSIONS TO VIEW THIS PAGE
      </article>
      @endif
    </div>
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

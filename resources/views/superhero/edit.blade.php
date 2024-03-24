@extends('layouts.app') 

@section('content') 
  <style> 
    .uper { 
      margin-top: 40px; 
    } 

  </style> 
  <div class="card uper"> 
    <div class="card-header"> 
      Edit Superhero 
    </div> 
    <div class="card-body"> 
      @if ($errors->any()) 
        <div class="alert alert-danger"> 
          <ul> 
            @foreach ($errors->all() as $error) 
              <li>{{ $error }}</li> 
            @endforeach 
          </ul> 
        </div><br /> 
      @endif 
      <form method="post" action="{{ route('Superhero.update', $superhero->id) }}"> 
        @csrf 
        @method('PATCH') 
        <div class="form-group"> 
          <label for="real_name">Real Name:</label> 
          <input type="text" class="form-control" name="real_name" /> 
        </div> 
        <div class="form-group"> 
          <label for="superhero_name">Superhero Name:</label> 
          <input type="text" class="form-control" name="superhero_name" /> 
        </div> 
        <div class="form-group"> 
          <label for="photo">Photo URL:</label> 
          <textarea rows="5" columns="5" class="form-control" name="photo"></textarea> 
        </div> 
        <div class="form-group"> 
          <label for="additional_info">Additional info:</label> 
          <textarea rows="5" columns="5" class="form-control" name="additional_info"></textarea> 
        </div> 
        <button type="submit" class="btn btn-primary">Save</button> 
        <a href="{{ route('Superhero.index') }}" class="btn btn-primary">Return</a> 
      </form> 
    </div> 
  </div> 
@endsection 
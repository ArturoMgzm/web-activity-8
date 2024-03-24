@extends('layouts.app') 

@section('content') 
  <style> 
    .uper { 
      margin-top: 40px; 
    } 

  </style> 
  <div class="card uper"> 
    <div class="card-header"> 
      View Superhero 
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

      <div class="form-group"> 
        <label for="real_name">Real Name:</label> 
        <input type="text" class="form-control" name="real_name" value="{{ $superhero->real_name }}" disabled /> 
      </div> 
      <div class="form-group"> 
        <label for="superhero_name">Last Name:</label> 
        <input type="text" class="form-control" name="superhero_name" value="{{ $superhero->superhero_name }}" disabled /> 

      </div> 
      <div class="form-group"> 
        <label for="photo">Photo URL:</label> 
        <textarea rows="5" columns="5" class="form-control" name="photo" disabled>{{ $superhero->photo }}</textarea> 
      </div> 
      <div class="form-group"> 
        <label for="additional_info">Additional information:</label> 
        <textarea rows="5" columns="5" class="form-control" name="additional_info" disabled>{{ $superhero->additional_info }}</textarea> 
      </div> 
      <a href="{{ route('Superhero.edit', $superhero->id) }}" class="btn btn-primary">Edit</a> 
      <a href="{{ route('Superhero.index') }}" class="btn btn-primary">Index</a> 
    </div> 
  </div> 
@endsection 
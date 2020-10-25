@extends('layouts.app')

@section('content')

 <div class="card card-default">
     <div class="card-header"> {{isset($tag) ? " Update tag " : " Add a new tag "}} </div>
     <div class="card-body">

     <form action=" {{isset($tag) ? route('tags.update' , $tag->id) : route('tags.store') }}" method="POST">
            @csrf
            @if (isset($tag)) 
            @method("PUT")      
            @endif
            <div class="form-group">
                <label for="tags"> Tag Name : </label>
                <input type="text"  name="name" class="form-control" placeholder="add a new tag" value= "{{isset($tag) ? $tag->name : " "}} "> 
                 @if ($errors->has('name'))
                 <div class="class alert alert-danger">
                    {{ $errors->first('name') }}
                 </div> 
                @endif
            </div> 
            <div class="form-groupe">
                <button class="btn btn-success"> {{isset($tag) ? " Update " : " Add " }} </button>
            </div>

      

        </form>

     </div>

 </div>

@endsection
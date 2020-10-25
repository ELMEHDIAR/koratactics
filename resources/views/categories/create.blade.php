@extends('layouts.app')

@section('content')

 <div class="card card-default">
     <div class="card-header"> {{isset($category) ? " Update category " : " Add a new category "}} </div>
     <div class="card-body">

     <form action=" {{isset($category) ? route('categories.update' , $category->id) : route('categories.store') }}" method="POST">
            @csrf
            @if (isset($category)) 
            @method("PUT")      
            @endif
            <div class="form-group">
                <label for="categories"> Category Name : </label>
                <input type="text"  name="name" class="form-control" placeholder="add a new category" value= "{{isset($category) ? $category->name :""}} "> 
                 @if ($errors->has('name'))
                 <div class="class alert alert-danger">
                    {{ $errors->first('name') }}
                 </div> 
                @endif
            </div> 
            <div class="form-groupe">
                <button class="btn btn-success"> {{isset($category) ? " Update " : " Add " }} </button>
            </div>

      

        </form>

     </div>

 </div>

@endsection
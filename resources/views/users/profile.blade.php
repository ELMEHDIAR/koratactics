@extends('layouts.app')

@section('content')

 <div class="card card-default">
     <div class="card-header"> Update profile </div>
     <div class="card-body">

     <form action="{{route('users.update' , $user->id)}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="name"> Name : </label>
                <input type="text"  name="name" class="form-control" value= {{$user->name}}>  
            </div> 

            <div class="form-group">
                <label for="email"> Email : </label>
                <input type="email"  name="email" class="form-control" value= {{$user->email}} />  
            </div> 

            <div class="form-group">
                <label for="about"> About : </label>
                <textarea class="form-control" name="about"  rows="3">{{$profile->about}}</textarea> 
            </div> 

            <div class="form-group">
                <label for="facebook"> Facebook : </label>
                <input type="text" class="form-control" name="facebook" value="{{$profile->facebook}}"> 
            </div> 

            <div class="form-group">
                <label for="twitter"> Twiter : </label>
                <input type="text" class="form-control" name="twitter"  value="{{$profile->twitter}}">
            </div> 

            <div class="form-group">
                <label for="picture"> Picture : </label><br>
                <img src="{{ $user->hasPicture() ? asset('storage/' . $user->getPicture()) : $user->getGravatar()}} "  alt="" border-raduis= "60px" height="60px" width="60px"> 
                <input class="form-control mt-3" type="file" name="picture">
            </div>

            <div class="form-group">
                <button class="btn btn-success"> Update </button>
            </div>

      

        </form>

     </div>

 </div>

@endsection
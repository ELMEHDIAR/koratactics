@extends('layouts.app')

@section('content')

 <div class="clearfix">
     <a href="/users/create" class=" float-right btn btn-success"  style="margin-bottom: 10px"> Add Users  </a>
 </div> 
<div class="card card-default">
    <div class="card-header"> 
        All Users 
    </div>
      @if ($users->count() > 0)
      <div class="card-body"> 
        <table class="table">
            <thead>
                <tr>
                    <td> Image</td>
                    <td> Name</td> 
                    <td> permissions</td>  
                    <td> role</td>  
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                <tr>
                   <td>

                   <img src="{{ $user->hasPicture() ? asset('storage/' . $user->getPicture()) : $user->getGravatar()}} "  alt="" border-raduis= "60px" height="60px" width="60px">
                     
                   </td>

                   <td>{{$user->name}}</td>  
                   <td> 
                    @if (! $user->isAdmin())

                   <form action="{{route('users.make-admin' , $user->id)}}" method="POST">
                    @csrf 
                    <button class="btn btn-primary" type="submit"> make Admin</button>   
                  </form> 
                    @elseif(($user->isAdmin())) 
                    <form action="{{route('users.make-writer' , $user->id)}}" method="POST">
                        @csrf 
                        <button class="btn btn-success" type="submit"> make Writer</button>   
                       @endif
                </td>
                <td>

                    @if (!$user->isAdmin())
                        <span class="badge badge-success">{{$user->role}}</span>   
                        
                    @elseif($user->isAdmin())
                    <span class="badge badge-primary">{{$user->role}}</span>  

                   @endif
                    
                </td>  
               </tr>  
                @endforeach
               
            </tbody>
        </table> 
          @else 

          <div class="text-center">
              <h1> no users yet. </h1>
          </div>   
      @endif 
    
    </div>
</div>
    
@endsection


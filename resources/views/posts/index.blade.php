@extends('layouts.app')

@section('content')

 <div class="clearfix">
     <a href="/posts/create" class=" float-right btn btn-success"  style="margin-bottom: 10px"> Add Posts  </a>
 </div> 
<div class="card card-default">
    <div class="card-header"> 
        All Posts 
    </div>
      @if ($post->count() > 0)
      <div class="card-body"> 
        <table class="table">
            <thead>
                <tr>
                    <td class="text-center"> Image</td>
                    <td class="text-center"> Title</td>  
                    <td class="text-center"> Action</td>
                </tr>
            </thead>
            <tbody>
                @foreach ($post as $po)
                <tr>
                   <td class="text-center">
                         <img src={{asset('storage/'.$po->image)}} alt="" height="100px" width="120px">
                   </td>

                   <td class="text-center">{{$po->title}}</td>  

                   <td > 
                   <form class="float-right ml-2" action="{{route("posts.destroy" , $po->id)}}" method="POST"> 
                       @csrf
                       @method("DELETE")
                   <button class="btn btn-danger btn-sm"> {{ $po->trashed() ? 'Delete' : 'Trash'}}</button>     
                   </form>
                   @if (!$po->trashed()) 
                   <a href="{{route("posts.edit" , $po->id)}}" class="btn btn-primary float-right btn-sm  " > Edit </a>
                   @else
                   <a href="{{route("posts.restore" , $po->id)}}" class="btn btn-primary float-right btn-sm   "> restore </a>
                   @endif
                    </td> 
               </tr>  
                @endforeach
               
            </tbody>
        </table> 
          @else 
 
          <div class="text-center">
              <h1> no posts yet. </h1>
          </div>   
      @endif 
    
    </div>
</div>
    
@endsection


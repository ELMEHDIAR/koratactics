@extends('layouts.app')

@section('content')

@if (session()->has("error")) 
<div class="alert alert-danger">
    {{session()->get("error")}}
</div>

@endif

 <div class="clearfix">
     <a href="/categories/create" class=" float-right btn btn-success"  style="margin-bottom: 10px"> Add Category  </a>
 </div> 
<div class="card card-default">
    <div class="card-header"> 
        All Categories 
    </div>
    <div class="card-body"> 
         <table class="table">
             <tbody>
                 @foreach ($cat as $ca)
                 <tr>
                    <td>
                        {{$ca->name}}
                    </td>

                    <td> 
                    <form class="float-right ml-2" action="{{route("categories.destroy" , $ca->id)}}" method="POST"> 
                        @csrf
                        @method("DELETE")
                    <button class="btn btn-danger btn-sm"> Delete </button> 
                    </form>
                    <a href="{{route("categories.edit" , $ca->id)}}" class="btn btn-primary float-right btn-sm" > Edit </a>
                     </td> 
                </tr>  
                 @endforeach
                
             </tbody>
         </table>
    </div>
</div>     
@endsection
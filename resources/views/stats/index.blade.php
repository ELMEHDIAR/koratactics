@extends('layouts.app')

@section('content')



<style>
    
    .btn-primary{

        text-align:center
    }


</style> 

    <div class="clearfix">
        <a href="/stats/create" class=" float-right btn btn-success"  style="margin-bottom: 10px"> Add Players  </a>
    </div>  
<div class="card card-default">
    <div class="card-header"> 
        EUROPEAN GOLDEN BOOT 
    </div>
      @if ($stat->count() > 0)
      <div class="card-body"> 
        <table class="table">
            <thead>
                <tr> 
                    <td class="text-center"> Image</td>
                    <td class="text-center"> Name</td>
                    <td class="text-center"> Club</td>    
                    <td class="text-center"> Goals</td>
                    <td class="text-center"> Coefficient</td>
                    <td class="text-center"> Points </td> 
                    <td class="text-center"> Actions</td> 
                </tr>
            </thead>
            <tbody>
                
                @foreach ($stat as $st)
                @if($st->points >= 0)
                <tr>
                   <td class="text-center">
                         <img src={{asset('storage/'.$st->player->image)}} border-raduis= "40px" height="60px" width="60px">
                   </td> 
                <td class="text-center">{{$st->player->first_name}} {{$st->player->last_name}}</td>  

                <td class="text-center">{{$st->player->club->name}}</td>

                <td class="text-center">{{$st->goals}}</td>

                <td class="text-center">{{$st->coefficient}}</td> 
                
                <td class="text-center">{{$st->points}}</td> 
                <td class="text-center"> <a href="{{route("stats.edit" , $st->id)}}" class="btn btn-primary float-right btn-sm" > Edit </a> </td>  
               </tr>   
               @endif
               @endforeach  
               
               
            </tbody>
        </table> 
          @else 
 
          <div class="text-center">
              <h1> no stat yet. </h1>
          </div>   
      @endif  
      {!!$stat->links()!!}
    </div>
</div>
    
@endsection


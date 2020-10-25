@extends('layouts.app')

@section('content')

 <div class="clearfix">
     <a href="/players/create" class=" float-right btn btn-success"  style="margin-bottom: 10px"> Add Players  </a>
 </div> 
<div class="card card-default">
    <div class="card-header"> 
        Most Valuable Players 
    </div>
      @if ($player->count() > 0)
      <div class="card-body"> 
        <table class="table">
            <thead>
                <tr> 
                    <td class="text-center"> Image</td>
                    <td class="text-center"> Name</td>
                    <td class="text-center"> Birth/Age</td>
                    <td class="text-center"> Club</td>  
                    <td class="text-center"> Nationality</td>
                    <td class="text-center"> Market Value</td>
                </tr>
            </thead>
            <tbody>
                @foreach ($player as $pl)
                <tr>
                   <td class="text-center">
                         <img src={{asset('storage/'.$pl->image)}} border-raduis= "40px" height="60px" width="60px">
                   </td>

                <td class="text-center">{{$pl->first_name}} {{$pl->last_name}}</td> 
                
                <td class="text-center">{{$pl->date_birth}} ({{$pl->getAgeAttribute()}} years)</td> 

                <td class="text-center">{{$pl->club->name}}</td> 

                <td class="text-center">{{$pl->nationality}}</td>

                <td class="text-center">{{number_format($pl->market_value, 2) }}<i class="fas fa-euro-sign"></i></td>  
               </tr>  
                @endforeach 
            </tbody>
        </table> 
          @else 
 
          <div class="text-center">
              <h1> no player yet. </h1>
          </div>   
      @endif 
    
    </div>
</div>
    
@endsection


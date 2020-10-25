@extends('layouts.app')  

@section('content') 

 <div class="card card-default">
     <div class="card-header"> Edit Stat Player </div>
     <div class="card-body">

     <form action="{{ route('stats.update' , $stat->id) }}" method="POST">
            @csrf  
            @if (isset($stat))
            @method("PUT")
            @endif
            <div class="form-group">
                <label for="goals"> Goals : </label>
            <input type="text" name="goals" class="form-control" value="{{$stat->goals}}">        
            </div>  

            <div class="form-group">
                <label for="coefficient" >Coefficient</label>
                <select class="form-control"  name="coefficient">
                  <option value="1"> 1 </option> 
                  <option value="2"> 2 </option> 
                </select>
              </div> 
                  

              <div class="form-group"> 
              <input type="text" name="points" class="form-control" hidden value="{{$stat->points}}">        
            </div>  

            <div class="form-group"> 
                <input type="text" name="player_id" class="form-control" hidden  value="{{$stat->player_id}}">        
              </div>  <br>
              

            <div class="form-group ">
                <button type="submit" class="btn btn-success"> Add </button>
            </div> 
        </form> 
     </div> 
 </div>
 

@endsection  

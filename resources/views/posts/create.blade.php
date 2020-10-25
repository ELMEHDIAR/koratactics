@extends('layouts.app') 

<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />

@section('content')  
<html>
 
    <head>
        @trixassets
    </head>

</html>

 <div class="card card-default">
     <div class="card-header"> {{isset($post) ? "Update Post" : "Add a new Post" }} </div>
     <div class="card-body">

     <form action=" {{ isset($post) ? route('posts.update' , $post->id)  :  route('posts.store')}}" method="POST" enctype="multipart/form-data">
            @csrf 
            @if (isset($post))
                @method("PUT")
            @endif
            <div class="form-group">
                <label for="post title"> title : </label>
            <input type="text"  name="title" class="form-control" value="{{isset($post) ?  $post->title  : "" }}"   placeholder="add a new post">        
            </div> 

            <div class="form-group">
                <label for="post description"> description : </label> 
                <textarea class="form-control" name="description"  rows="3"  >{{
                isset($post) ?  $post->description  : "" }}</textarea>       
            </div> 

            <div class="form-group">
                <label for="post content"> Content : </label>
                <input id="content" type="hidden" name="content" value="{{isset($post) ?  $post->content  : "" }}"  >
                <trix-editor input="content"></trix-editor> 
            </div>


            @if (isset($post))   
            <div class="form-group">
                <label for="image post"></label>
            <img src = "{{asset('storage/' . $post->image)}}"  style="width: 100%"/>
            </div>    
            @endif

            

            <div class="form-group">
                <label for="image"> Image : </label>
                <input type="file" class="form-control-file" name="image">
              </div> 


            <div class="form-group">
                <label for="select category">select a categroy</label>
                <select class="form-control" id="category_id" name="category_id">
                    @foreach ($categories as $category)      
                <option value="{{$category->id}}">{{$category->name}}</option>
                    @endforeach
                </select>
              </div> 
              <div class="form-group">
                <label for="selectTag">select a tag</label>
                <select class="form-control tags" id="selectTag" name="tags[]" multiple>
                    @foreach ($tags as $tag)      
                <option value="{{$tag->id}}"     
                @if(isset($post))
                   @if($post->hasTags($tag->id))    
                    selected  
                   @endif     
                @endif   
                >
                {{$tag->name}}</option>
                    @endforeach
                </select>
              </div>  

              <div class="form-group">
              <input type="hidden"  name="user_id" class="form-control" value="{{Auth()->user()->id}}">        
            </div> 
              
            <div class="form-group ">
                <button type="submit" class="btn btn-success"> {{isset($post) ? "Update" : "Add"  }} </button>
            </div>
      

        </form>

     </div>

 </div>

 <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
 <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>

 <script type="text/javascript">

$(document).ready(function() {
    $('.tags').select2();
});


 </script>

@endsection   
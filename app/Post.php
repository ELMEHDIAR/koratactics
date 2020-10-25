<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Te7aHoudini\LaravelTrix\Traits\HasTrixRichText;
use App\Category;
use App\Tag;
use App\User;

class Post extends Model
{
    use HasTrixRichText;
    use SoftDeletes;
    protected  $fillable = ["title" , "description" , "content" , "image" , "category_id" , "user_id"];

    //protected $table = "posts";

 

    public function category(){

         return $this->belongsTo(Category::class);
      }

      public function tags()
      {
         return $this->belongsToMany(Tag::class , 'tag_posts');                   
      }

      public function hasTags($tagId){

         return in_array($tagId , $this->tags->pluck('id')->toArray());
      } 

      public function user(){

         return $this->belongsTo(User::class);
      }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Comment;

class Post extends Model
{
    use HasFactory;
    
    protected $fillable=[
        'title',
        'body',
        'path', 
        'user_id'
    ];

    public function getPathAttribute($value){
        return '/images/'.$value ;
    }

    public function comments(){
        return $this->hasMany('App\Models\Comment');
    }
}

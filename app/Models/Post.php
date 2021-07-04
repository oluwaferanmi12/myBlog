<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Comment;
use App\Models\User;

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

    public function user(){
        return $this->belongsTo('App\Models\User');

    }
}


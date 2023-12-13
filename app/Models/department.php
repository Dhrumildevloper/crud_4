<?php

namespace App\Models;
use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class department extends Model
{
    use HasFactory;

    public function list(){
        return $this->hasOne(Post::class);
    }


    public function data(){
        return $this->hasMany(Post::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class querycrud extends Model
{
    use HasFactory;
        protected $table = "posts";
    protected $fillable = [
    	'id',
    	'title',
    	'body',
    	'post_image',
    ];
}

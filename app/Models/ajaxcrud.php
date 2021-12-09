<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ajaxcrud extends Model
{
    use HasFactory;
    protected $table = "ajaxcruds";
    protected $fillable = [
    	'id',
    	'title',
    	'body',
    	'post_image',
    ];
}

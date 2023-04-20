<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    public $table = "posts";
    protected $fillable = array("*");
    public function usuarios(){
        return $this->belongsToMany(Usuario::class,"post_usuario");
    }
}

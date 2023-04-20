<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    use HasFactory;

    public $table = "usuarios";
    protected $fillable = [
        'nombre',
        'apellido',
        'foto',
        'id'
    ];
    
    
    public function posts(){
        return $this->belongsToMany(Post::class,"post_usuario");
    }
}

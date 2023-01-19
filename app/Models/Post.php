<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'titulo',
        'descripcion',
        'imagen',
        'user_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class)->select(['id', 'name', 'username']);
    }

    //un post va a tener multiples comentarios  
    public function comentarios()
    {
        return $this->hasMany(Comentario::class);
    }
    public function likes()
    {
        return $this->hasMany(Like::class);
    }
    public function checkLike(User $user)
    {
        //nos situamos en la tabla likes con la relacion, y buscamos en la columna user_id si existe el usuario
        return $this->likes->contains('user_id', $user->id);
    }
}

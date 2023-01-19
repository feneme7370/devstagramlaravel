<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'username'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function posts()
    {
        //one to many, uno a muchos
        //segundo parametro es la clave foranea
        return $this->hasMany(Post::class);
    }

    public function likes()
    {
        //one to many, uno a muchos
        //segundo parametro es la clave foranea
        return $this->hasMany(Like::class);
    }

    // almacena los seguidores de un usuario
    public function followers()
    {
        //aclara followers porque el id no esta como la convencion
        //creo que hace para un user_id, trae todos los follower_id, osea una condicion
        return $this->belongsToMany(User::class, 'followers', 'user_id', 'follower_id', );
    }
    // almacena los que seguimos de un usuario
    public function followings()
    {
        return $this->belongsToMany(User::class, 'followers', 'follower_id', 'user_id', );
    }
    // comprobar si un usuario sigue a otro
        //recibe como parametro el autenticado, this es el del muro y pregunta si contiene en sus seguidores el id del autenticado
    public function siguiendo(User $user)
    {
        //aclara followers porque el id no esta como la convencion
        return $this->followers->contains( $user->id );
    }

}

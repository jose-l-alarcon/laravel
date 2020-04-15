<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $primaryKey = 'idusuario';
    // RENOMBRAR EL ID QUE ESTA POR DE DEFECTO , idrol_usuario

    protected $fillable = [
        'apellido','nombre', 'username' , 'password' , 'estado','idrol_usuario',
    ];

    public function rolusuario(){

        // return $this->belongsTo(RolUsuario::class);

        return $this->belongsTo(RolUsuario::class,'idrol_usuario');
         
    }  //con esta clase decimos que un Administrador contiene un rol de usuario: vincular Administrador con rol de usaurio 
    
    

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}

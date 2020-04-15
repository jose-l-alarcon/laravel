<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RolUsuario extends Model
{
   public $table = 'rol_usuario';
   protected $primaryKey = 'idrol_usuario';
   // public $timestamps = false;  poner en null campo de creacion y ultima actualizacion 

    // $fillable te permite especificar qué campos sí quieres que se guarden en la base de datos. Es decir, se asignan únicamente los especificados en este array.

   // $guarded permite especificar qué campos no queremos que se asignen al modelo. Es decir, se asignan todos excepto los especificados en este array.
      // protected $guarded = ['is_admin'];

   protected $fillable = [
        'descripcion'
    ]; 


//     Evitar fallos de seguridad por asignación masiva de datos
// La excepción MassAssignmentException es una forma en la que el ORM nos protege. Una vulnerabilidad de asignación masiva ocurre cuando un usuario envía un parametro inesperado mediante una solicitud y dicho parametro realiza un cambio en la base de datos que no esperabas. Por ejemplo, un usuario podría, utilizando Chrome Developer Tools o herramientas similares, agregar un campo oculto llamado is_admin con el valor de 1 y enviar la solicitud de registro de esta manera. Si no tienes cuidado con esto entonces cualquier usuario podría convertirse en administrador de tu aplicación, con consecuencias nefastas para tu sistema.

// Para evitar esto, dentro del modelo agregamos la propiedad $fillable y asignamos como valor un array con las columnas que queremos permitir que puedan ser cargadas de forma masiva:

}

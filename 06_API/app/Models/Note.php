<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    use HasFactory;
    // Todos los elementos son complimentables
    protected $guarded = [];
    
    //Datos que no queremos mostrar en las respuestas
    protected $hidden = ['created_at', 'updated_at'];
}

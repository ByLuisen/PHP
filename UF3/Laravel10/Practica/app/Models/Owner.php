<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Owner extends Model
{
    use HasFactory;
    protected $table = 'propietarios';
    protected $fillable=[
        'nif','nom','email','movil'
    ];

    // protected $primaryKey = 'nif';



}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Serie extends Model
{
    use HasFactory;
    //obrigatorio declarar os campos q eu quero ao usar o $request->all()
    protected $fillable = ['nome'];
}

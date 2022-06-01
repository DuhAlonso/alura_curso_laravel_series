<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Series extends Model
{
    use HasFactory;
    // protected $with = ['seasons'];
    //obrigatorio declarar os campos q eu quero ao usar o $request->all()
    protected $fillable = ['nome'];

    public function seasons()
    {
        return $this->hasMany(Season::class, 'series_id');
    }
}

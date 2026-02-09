<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Students extends Model
{
     protected $table='students';
        protected $fillable = [
        'ime',
        'prezime',
        'status',
        'godiste',
        'prosjek',
    ];
   
    protected function casts(): array
    {
        return [
            'godiste' => 'integer',
            'created_at'=>'date',
            'prosjek'=>'double'
        ];
    }
}

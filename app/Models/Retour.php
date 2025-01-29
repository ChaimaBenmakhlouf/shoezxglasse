<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Retour extends Model
{
    use HasFactory;

    protected $table = 'retours';

    protected $fillable = [
        'nom',
        'etat',
        'type',
        'address',
    ];
}

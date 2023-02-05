<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Signature extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'description',
        'credits',
        'area',
        'dependency'
    ];
    public $timestamps = false;
}

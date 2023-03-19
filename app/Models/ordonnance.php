<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ordonnance extends Model
{
    use HasFactory;
    protected $fillable = ['NUM_ORDONNANCE','DATE_ORDONNANCE'];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class certificat_medical extends Model
{
    use HasFactory;
    protected $fillable = ['NUM_CERTIF','NB_JRS_REPOS','DATE_REPOS'];
}

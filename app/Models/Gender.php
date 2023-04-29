<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gender extends Model
{
    use HasFactory;

    const MALE_GENDER_ID = 1;
    const FEMALE_GENDER_ID = 2;
}

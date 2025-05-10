<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stage extends Model
{
    use HasFactory;
    protected $fillable = [
        "convention",
        "date_debut",
        "date_fin",
        "theme",
        "niveau",
        "rapport",
        "note"
    ];
}

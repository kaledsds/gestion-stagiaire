<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Probleme extends Model
{
    use HasFactory;
    protected $fillable = [
        "titre",
        "discription",
        "fichier_description",
        "date_soumission"
    ];
    public function users()
    {
        return $this->belongsTo(User::class);
    }
    public function solutions()
    {
        return $this->hasMany(Solution::class);
    }
}

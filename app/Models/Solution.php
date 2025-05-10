<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Solution extends Model
{
    use HasFactory;
    protected $fillable = [
        "titre",
        "discription",
        "fichier_solution",
        "date_response",
        "probleme_id",
        "user_id"
    ];
    public function users()
    {
        return $this->belongsTo(User::class);
    }
    public function problemes()
    {
        return $this->belongsTo(Probleme::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mentor extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'bio', 'expertise', 'linkedin', 'user_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function startups()
    {
        return $this->belongsToMany(Startup::class);
    }
}
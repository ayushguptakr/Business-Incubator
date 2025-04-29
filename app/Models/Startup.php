<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Startup extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'industry', 'stage', 'logo', 'user_id', 'incubator_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function incubator()
    {
        return $this->belongsTo(Incubator::class);
    }

    public function mentors()
    {
        return $this->belongsToMany(Mentor::class);
    }

    public function fundingApplications()
    {
        return $this->hasMany(Application::class);
    }
}
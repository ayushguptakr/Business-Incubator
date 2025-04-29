<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FundingOpportunity extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'description', 'amount', 'deadline', 'incubator_id'];

    protected $casts = [
        'deadline' => 'date',
    ];

    public function incubator()
    {
        return $this->belongsTo(Incubator::class);
    }

    public function applications()
    {
        return $this->hasMany(Application::class);
    }
}
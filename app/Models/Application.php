<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    use HasFactory;

    protected $fillable = ['proposal', 'status', 'startup_id', 'funding_opportunity_id'];

    public function startup()
    {
        return $this->belongsTo(Startup::class);
    }

    public function fundingOpportunity()
    {
        return $this->belongsTo(FundingOpportunity::class);
    }
}
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{   
    protected $fillable = [
        'name',
        'slug',
        'stripe_plan',
        'cost',
        'description',
        'time',
    ];

    public function getRouteKeyName()
    {
        return 'slug';
    }
    
    use HasFactory;
}

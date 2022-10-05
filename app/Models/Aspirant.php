<?php

namespace App\Models;

use App\Models\Voter;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Aspirant extends Model
{
    protected $fillable = [
        'f_name',
        'position',
        'dp',
        
    ];

    public function voter(){
        return $this->hasMany(Voter::class, 'aspirant_id');
     }
}

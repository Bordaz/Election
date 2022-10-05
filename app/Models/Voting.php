<?php

namespace App\Models;

use App\Models\Aspirant;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Voting extends Model
{
 protected $fillable =
 [
    'voter_id',
    'aspirant_id',
 ];

 public function aspirant()
 {
     return $this->belongsTo(Aspirant::class);
 }

 public function voter()
 {
     return $this->belongsTo(Voter::class,);
 }
}

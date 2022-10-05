<?php

namespace App\Models;


use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Voter extends Authenticatable
{
    use HasFactory;
    protected $guard = 'voter';
    protected $fillable = ['f_name','matric','password','nacoss_transac_id','level','program'];
    
    public function voting()
    {
        return $this->hasMany(Voting::class);
    }
}

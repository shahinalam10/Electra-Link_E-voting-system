<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VoterId extends Model {
    use HasFactory;
    protected $fillable = ['voter_id'];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vote extends Model
{
    use HasFactory;

    protected $fillable = ['voter_id', 'candidate_id']; // Ensure voter_id is fillable

    /**
     * Relationship with the Candidate model.
     */
    public function candidate()
    {
        return $this->belongsTo(Candidate::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdoptionRequest extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'animal_id',
        'application_text',
        'status',
    ];

    /**
     * Get the user that owns the adoption request.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the animal that the adoption request belongs to.
     */
    public function animal()
    {
        return $this->belongsTo(Animal::class);
    }
}

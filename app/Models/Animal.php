<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Animal extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'species',
        'breed',
        'birth_date',
        'sex',
        'health_status',
        'description',
        'image_path',
        'status',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'birth_date' => 'date',
        ];
    }

    /**
     * Get the adoption requests for the animal.
     */
    public function adoptionRequests()
    {
        return $this->hasMany(AdoptionRequest::class);
    }
}

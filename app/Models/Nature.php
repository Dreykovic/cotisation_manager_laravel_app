<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Nature extends Model
{
    use HasFactory;

    protected $fillable = [
        'designation',
    ];

    public function cotisations(): HasMany
    {
        return $this->hasMany(Cotisation::class);
    }
}

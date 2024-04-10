<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Cotisation extends Model
{
    use HasFactory;

    protected $fillable = [
        'montant',
        'membre_id',
        'tresorier_id',
        'nature_id',
        'date_cotisation',
    ];

    public function membre(): BelongsTo
    {
        return $this->belongsTo(Membre::class);
    }

    public function nature(): BelongsTo
    {
        return $this->belongsTo(Nature::class);
    }

    public function tresorier(): BelongsTo
    {
        return $this->belongsTo(Tresorier::class);
    }
}

<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    use HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        // 'name',
        'email',
        'password',
        'first_name',
        'last_name',
        'nom_pere',
        'nom_mere',
        'pays',
        'ville',

        'contact',
        'sexe',
        'date_naissance',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];
     /**
     * The storage format of the model's date columns.
     *
     * @var string
     */
    protected $dateFormat = 'Y-m-d H:i:sO';
    public function membre(): HasOne
    {
        return $this->hasOne(Membre::class);
    }

    public function tresorier(): HasOne
    {
        return $this->hasOne(Tresorier::class);
    }
}

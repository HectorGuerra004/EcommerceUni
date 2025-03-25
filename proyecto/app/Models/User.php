<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;
use App\Models\Cart;

/**
 * @property-read Cart|null $cart
 */

class User extends Authenticatable
{
    use HasApiTokens;

    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;


    protected $fillable = [
        'nombre',
        'apellido',
        'cedula',
        'telefono',
        'email',
        'password',
    ];

    // ✅ Renombrar la relación para evitar conflicto
    public function cartRelation()
    {
        return $this->hasOne(Cart::class);
    }

    public function getCartAttribute()
    {
        // Verifica si ya hay un carrito cargado
        if ($this->cartRelation) {
            return $this->cartRelation;
        }

        // Crea el carrito solo si no existe
        $cart = $this->cartRelation()->firstOrCreate([
            'user_id' => $this->id
        ]);

        // Recarga la relación para evitar recursión
        $this->load('cartRelation');

        return $cart;
    }

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array<int, string>
     */
    protected $appends = [
        'profile_photo_url',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }
}

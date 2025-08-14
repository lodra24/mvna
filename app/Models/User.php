<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Filament\Models\Contracts\FilamentUser;
use Filament\Panel;
use Laravel\Paddle\Billable;


class User extends Authenticatable implements FilamentUser
{
    use Billable;
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
        'google_id',
        'avatar',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
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

    /**
     * Kullanıcının verdiği cevaplar - Artık TestResult üzerinden erişiliyor
     */
    // public function userAnswers()
    // {
    //     return $this->hasMany(UserAnswer::class);
    // }

    /**
     * Kullanıcının test sonuçları
     */

      public function paddleName(): string|null
    {
        return $this->name;
    }
 
    /**
     * Get the customer's email address to associate with Paddle.
     */
    public function paddleEmail(): string|null
    {
        return $this->email;
    }

    public function testResults()
    {
        return $this->hasMany(TestResult::class);
    }

    /**
     * Filament panel erişim kontrolü
     * Sadece admin rolüne sahip kullanıcılar panele erişebilir
     */
    public function canAccessPanel(Panel $panel): bool
    {
        return $this->role === 'admin';
    }
}

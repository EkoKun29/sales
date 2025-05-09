<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Schema;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'uuid',
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

    public static function boot() {
        parent::boot();
        static::creating(function (User $item) {
            $item->uuid = Str::uuid()->toString();
        });

        Schema::defaultStringLength(191);
    }

    public function repeatOrder() {
        return $this->hasMany(RepeatOrder::class);
    }
    public function agusA(){
        return $this->hasMany(AgusA::class);
    }
    public function zaenal(){
        return $this->hasMany(Zaenal::class);
    }
    public function zaenuddin(){
        return $this->hasMany(Zaenuddin::class);
    }
    public function junaidi(){
        return $this->hasMany(Junaidi::class);
    }
}

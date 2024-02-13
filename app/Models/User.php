<?php

namespace App\Models;

use Spark\Billable;
use Laravel\Jetstream\HasTeams;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\Auth;
use Laravel\Jetstream\HasProfilePhoto;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use HasTeams;
    use Notifiable;
    use TwoFactorAuthenticatable;
    use Billable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'role',
        'password',
    ];

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
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array<int, string>
     */
    protected $appends = [
        'profile_photo_url',
    ];

    public function minishoporder(): HasMany
    {
        return $this->hasMany(MiniShopOrders::class);
    }

    /**
     * Checks if the team subscription threshold has been reached for the authenticated user.
     *
     * @return bool Returns true if the threshold has been reached, false otherwise.
     */
    static public function teamSubsciptionTresholdReached(): bool
    {
        $user = Auth::user();
        if (!$user) return true; // case no subscription or user
        if (!$user->subscribed()) return true; // case no subscription
        $subscription = $user->sparkPlan()->name;
        $ownedTeams = count($user->ownedTeams);
        $treshhold = 0;

        if ($subscription == "Standard") $treshhold = 3;
        if ($subscription == "Large") $treshhold = 10;

        return $ownedTeams >= $treshhold;
    }
}

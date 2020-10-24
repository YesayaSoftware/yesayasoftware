<?php

namespace App\Models;

use Laravel\Jetstream\HasTeams;
use Laravel\Sanctum\HasApiTokens;
use Laravel\Jetstream\HasProfilePhoto;
use Illuminate\Support\Facades\Storage;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, 
        HasFactory, 
        HasProfilePhoto, 
        HasTeams, 
        Notifiable, 
        TwoFactorAuthenticatable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 
        'email', 
        'password', 
        'profile_photo_path', 
        'provider_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'profile_photo_url', 'is_admin'
    ];

    /**
     * Get the URL to the user's profile photo.
     *
     * @return string
     */
    public function getProfilePhotoUrlAttribute()
    {
        $github_img = substr($this->profile_photo_path, 0, 4);
        
        if ($github_img == 'http') {
            $stored_image = $this->profile_photo_path;
        } else {
            $stored_image = Storage::disk($this->profilePhotoDisk())->url($this->profile_photo_path);
        }

        return $this->profile_photo_path
            ? $stored_image
            : $this->defaultProfilePhotoUrl();
    }

    /**
     * Get the default profile photo URL if no profile photo has been uploaded.
     *
     * @return string
     */
    protected function defaultProfilePhotoUrl()
    {
        return 'https://www.gravatar.com/avatar/' . md5(strtolower(trim($this->email)));
    }

    /**
     * Determine if the user is an administrator.
     *
     * @return bool
     */
    public function isAdmin()
    {
        return in_array($this->email, explode(',', env('APP_ADMINISTRATORS')));
    }

    /**
     * Get the URL to the user's profile photo.
     *
     * @return string
     */
    public function getIsAdminAttribute()
    {
        return $this->isAdmin();
    }
}

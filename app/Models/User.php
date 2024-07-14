<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

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
        'is_admin',
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

    public function posts(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
      return $this->hasMany(Post::class);
    }
    public static function rules($id = null): array
    {
        if($id == null) {
            return [
                'name'      => 'required',
                'email'     => 'required|unique:users|email',
                'password'  => 'required|min:6|max:32',
                'txtRePass' => 'same:password',
                'is_admin'  => 'required'
            ];
        }else{
            return [
                'name'      => 'required',
            ];
        }
    }
    public static function message($id = null): array
    {
        if($id == null) {
            return [
                'name' => 'The name field is required.',
                'email.required' => 'The email field is required.',
                'email.unique' => 'The email field is unique.',
                'password.required' => 'The password field is required.',
                'password.min' => 'The password must be at least 6',
                'password.max' => 'The password max length 32',
                'txtRePass' => 'The txtRePass must be same password',
                'is_admin' => 'The is_admin field is required.',
            ];
        }else{
            return [
                'name' => 'The name field is required.',
                'email.required' => 'The email field is required.',
                'email.unique' => 'The email field is unique.',
            ];
        }
    }
}

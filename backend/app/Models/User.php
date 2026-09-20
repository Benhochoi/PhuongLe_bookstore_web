<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

use PHPOpenSourceSaver\JWTAuth\Contracts\JWTSubject;

class User extends Authenticatable implements JWTSubject
{
    /** @use HasFactory<UserFactory> */
    use HasFactory, Notifiable;
    protected $table = 'users';
    protected $primaryKey = 'user_id';
    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    // $fillable chỉ các cột được khai báo mới được phép gán hàng loạt qua create() hoặc fill().
    protected $fillable = [
    'role_id',
    'username',
    'password',
    'full_name',
    'email',
    'phone',
    'gender',
    'date_of_birth',
    'address',
    'status'
];
    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password'
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'password' => 'hashed',
            'date_of_birth' => 'date',
            'created_at' => 'datetime',
            'updated_at' => 'datetime',
        ];
    }
    public function getAuthPassword()
    {
        return $this->password;
    }
    // public function getAuthIdentifierName()
    // {
    //     return 'email';
    // }

    // JWT: trả về ID của user
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    // JWT: thêm dữ liệu vào token (nếu cần)
    public function getJWTCustomClaims()
    {
        return [];
    }

    public function role()
    {
        return $this->belongsTo(\App\Models\Role::class, 'role_id', 'role_id');
    }

}

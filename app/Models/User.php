<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasUuids;

    protected $table = 'users';

    public $timestamps = false;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    // protected $fillable = [
    //     'name',
    //     'email',
    //     'profile_image',
    //     'password',
    //     'role_id',
    //     'accesses',
    //     'permissions',
    //     'remember_token',
    //     'status',
    //     'created_at',
    //     'created_by',
    //     'deleted_at',
    //     'deleted_by',
    //     'updated_at',
    //     'updated_by',
    //     'category_id',
    //     'zip', 
    //     'license_number'
    // ];

    protected $guarded = [];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'role_id', 'password', 'remember_token',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function area()
    {
        return $this->belongsTo(Area::class, 'zipCode', 'zipCode');
    }

    public function isAttorney()
    {
        return $this->user_type === 'attorny';
    }

    public function scopeAttorneys($query)
    {
        return $query->where('user_type', 'attorny');
    }

    public function uniqueIds()
    {
        return ['uuid'];
    }

    public function getRouteKeyName()
    {
        return 'uuid';
    }

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    // public function getNameAttribute()
    //     {
    //         return $this->attributes['name_english'];
    //     }

    //     public function employeesCreated()
    //     {
    //         return $this->hasMany(Employee::class, 'created_by');
    //     }

    //     public function employeesUpdated()
    //     {
    //         return $this->hasMany(Employee::class, 'updated_by');
    //     }

    public function createdBy() {
        return $this->belongsTo('App\Models\User','created_by','id') ;
    }

    public function updatedBy() {
        return $this->belongsTo('App\Models\User','updated_by','id') ;
    }

    public function deletedBy() {
        return $this->belongsTo('App\Models\User','deleted_by','id') ;
    }
    public function getDepartment()
    {
        return $this->belongsTo(Department::class, 'department_id');
    }
}
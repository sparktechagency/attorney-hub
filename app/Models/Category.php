<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'created_at',
        'created_by',
        'updated_at',
        'updated_by',
        'deleted_at',
        'deleted_by'
    ];
    protected $table = 'categories';

    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by','id');
    }

    public function updatedBy()
    {
        return $this->belongsTo(User::class, 'updated_by','id');
    }

    public function deleteBy()
    {
        return $this->belongsTo('App\Models\User','deleted_by','id');
    }


    public function getUser()
    {
        return $this->belongsTo(User::class, 'created_by','id');
    }

    public function getDepartment()
    {
        return $this->belongsTo(Department::class, 'department_id');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class Area extends Model
{
    use HasFactory, HasUuids;

    protected $fillable = [
        'zipCode',
        'city',
    ];
    protected $table = 'areas';

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

    public function uniqueIds()
    {
        return ['uuid'];
    }

    public function getRouteKeyName()
    {
        return 'uuid';
    }
}

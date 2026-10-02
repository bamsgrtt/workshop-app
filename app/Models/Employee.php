<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Employee extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name',
        'email',
        'password',
        'status',
        'role',
        'age',
        'points',
        'salary',
    ];

    public function setPasswordAttribute($value) {
        $this->attributes['password'] = bcrypt($value);
    }

    public function getNameAttribute($value) {
        return strtoupper($value);
    }

    public function scopeActive($query) {
        return $query->where('status', 'active');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $fillable = [
        'department_id',
        'name',
        'position',
        'salary',
        'joined_at',
    ];

    // Relasi Many-to-One: Pegawai dimiliki oleh satu departemen
    public function department()
    {
        return $this->belongsTo(Department::class);
    }
}
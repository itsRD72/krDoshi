<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'max_student',
        'length_in_week',
        'is_avail_sunday',
        'created_by',
        'updated_by',
    ];
    public function batches()
    {
        return $this->hasMany(Batch::class);
    }
}

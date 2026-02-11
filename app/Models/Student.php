<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Student extends Model
{
     use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'first_name',
        'middle_name',
        'last_name',
        'address',
        'village',
        'taluko',
        'district',
        'phone_number',
        'parent_number',
        'email',
        'parent_email',
        'created_by',
        'updated_by',
        'deleted_by',
    ];
    protected $dates = ['deleted_at'];

    public function batch()
    {
        return $this->belongsTo(Batch::class, 'batch_id');
    }
}

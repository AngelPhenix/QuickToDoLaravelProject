<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Historic extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'task_name',
        'completed_by',
        'completed_at'
    ]
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $fillable = [
        'name'
    ];

    // public function users()
    // {
    //     return $this->belongsTo(User::class);
    // }

    public function board()
    {
        return $this->belongsTo(Board::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'board_id'
    ];

    // public function users()
    // {
    //     return $this->belongsTo(User::class);
    // }

    public function board()
    {
        return $this->belongsTo(Board::class);
    }

    public function labels()
    {
        return $this->belongsToMany(Label::class);
    }
}

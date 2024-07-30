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
        'board_id',
        'modified_by',
        'modified_at',
        'action'
    ];

    public function board()
    {
        return $this->belongsTo(Board::class);
    }
}

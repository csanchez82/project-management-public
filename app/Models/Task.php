<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasUuids;

    protected $fillable = [
        'title',
        'description',
        'status',
        'due_date',
        'user_id',
        'completed',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

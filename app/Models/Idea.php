<?php

namespace App\Models;

use App\IdeaStatus;
use Illuminate\Database\Eloquent\Casts\AsArrayObject;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

// use Illuminate\Database\Eloquent\Relations\Pivot;

class Idea extends Model
{
    use HasFactory;

    //
    protected $casts = [
        'links' => AsArrayObject::class,
        'status' => IdeaStatus::class,
    ];

    protected $attributes = [
        'status' => IdeaStatus::PENDING,
    ];

    // Ideas belongs to a specific user
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    // Ideas can have multiple steps
    public function steps(): HasMany
    {
        return $this->hasMany(Step::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * App\Models\Task
 *
 * @property int $id
 * @property string $title
 * @property string $status
 * @method static \Illuminate\Pagination\LengthAwarePaginator paginate(int $perPage = 15)
 */

class Task extends Model
{
    protected $fillable = ['title'];
    use HasFactory;

    public function tags(): belongsToMany
    {
        return $this->belongsToMany(Tag::class);
    }
};


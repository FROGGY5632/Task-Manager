<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
}

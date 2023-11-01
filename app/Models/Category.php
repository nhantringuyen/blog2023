<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $table = 'categories';
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
      'name',
      'slug',
    ];

    public function posts(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
      return $this->hasMany(Post::class);
    }
}

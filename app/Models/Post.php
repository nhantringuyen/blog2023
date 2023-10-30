<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $table = 'posts';
    protected $fillable = [
      'title',
      'description',
      'content',
      'image',
      'view_count',
      'user_id',
      'new_post',
      'slug',
      'category_id',
      'highlight_post'
    ];
    public function user(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
      return $this->belongsTo(User::class);
    }
    public function category(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
      return $this->belongsTo(Category::class);
    }
    public function comments(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
      return $this->hasMany(Comment::class);
    }
}

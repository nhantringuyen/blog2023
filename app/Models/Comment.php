<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    protected $table = 'comments';
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
      'content',
      'user_id',
      'post_id'
    ];
    public function user(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
      return $this->belongsTo(User::class);
    }
    public function post(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
      return $this->belongsTo(Post::class);
    }
}

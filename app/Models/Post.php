<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Validation\Rule;

class Post extends Model
{
    use HasFactory;

    protected $table = 'posts';
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
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
    public static function rules($id = null): array
    {
        if($id == null) {
            return [
                'title' => 'required',
                'description' => 'required',
                'txtContent' => 'required',
                'image' => 'required',
                'category_id' => 'required',
            ];
        }else{
            return [
                'title' => 'required',
                'description' => 'required',
                'txtContent' => 'required',
                'category_id' => 'required',
            ];
        }
    }
    public static function message($id = null){
        if($id == null) {
            return [
                'title' => 'The title field is required.',
                'description' => 'The title field is required.',
                'txtContent' => 'The content field is required.',
                'image' => 'The image field is required.',
                'category_id' => 'The category field is required.',
            ];
        }else{
            return [
                'title' => 'The title field is required.',
                'description' => 'The title field is required.',
                'txtContent' => 'The content field is required.',
                'category_id' => 'The category field is required.',
            ];
        }
    }
    public function imageUrl(){
        return '/image/post/'.$this->image;
    }
}

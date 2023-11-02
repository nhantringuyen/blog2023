<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Validation\Rule;

class Category extends Model
{
    use HasFactory;
    protected $table = 'categories';
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['name', 'slug', 'description', 'parent', 'order'];

    public static function rules($id = null): array
    {
        return [
            'name' => [
                'required',
                Rule::unique('categories')->ignore($id),
            ],
            'description' => 'nullable',
            'parent' => 'nullable|exists:categories,id',
            'txtOrder' => 'integer|min:0',
        ];
    }

    public static function message(){
        return [
            'name.required' => 'The name field is required.',
            'name.unique' => 'The name must be unique among categories.',
            'parent.exists' => 'The selected parent category is invalid.',
            'txtOrder.integer' => 'The order must be an integer.',
            'txtOrder.min' => 'The order must be at least 0.',
        ];
    }

    public function posts(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
      return $this->hasMany(Post::class);
    }
}

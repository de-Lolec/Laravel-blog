<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BlogCategory extends Model
{
    use HasFactory;
    use SoftDeletes;

    const ROOT = 1;

    protected $fillable
    = [
        'title',
        'slug',
        'parent_id',
        'description',
            ];

    /**
     * Получить родительскую категорию
     *
     * @return BlogCategory
     */

    public function parentCategory()
    {
        return $this->belongsTo(BlogCategory::class, 'parent_id', 'id');
    }

    /**
     * Пиример аксесуара (Accessor)
     *
     * @return string
     */
    public function getParentTitleAttribute(): string
    {
        $title = $this->parentCategory->title
            ?? ($this->isRoot()
                ? 'Корень'
                : '???');
        return $title;
    }

    /**
     * Является ли текущий объект корневым
     *
     * @return bool
     */
    public function isRoot(): bool
    {
        return $this->id === BlogCategory::ROOT;

    }

}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function parent()
    {
        return $this->belongsTo(Category::class, 'parent_id', 'id');
    }

    public function children()
    {
        return $this->hasMany(Category::class, 'parent_id', 'id');
    }

    /**
     * 分类下的文章
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    public function allChildren()
    {
        return $this->children()->with('allChildren');
    }

    public function getLinkAttribute($link)
    {
        if (! empty($link)) {
            return $link;
        }
        return route('index.chooseCategory', $this->id);
    }
}

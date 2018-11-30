<?php

namespace App\Models;

use App\Utils\Markdown;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    protected $appends = [
        'display_content'
    ];

    use SoftDeletes;

    const STATUS_DRAFT = 'draft';
    const STATUS_PUBLISHED = 'published';

    public function scopePublished($query)
    {
        $query->where('status', self::STATUS_PUBLISHED);
    }

    public function getDisplayContentAttribute()
    {
        return (new \Parsedown())->text($this->attributes['content']);
    }

    public function getTocAttribute()
    {

    }

    public function getUrlAttribute()
    {
        $point = empty($this->slug) ? $this->title : $this->slug;
        return route('blog.posts.show', $point);
    }
}

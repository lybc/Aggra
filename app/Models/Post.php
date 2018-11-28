<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Mail\Markdown;

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

    public function getUrlAttribute()
    {
        $point = empty($this->slug) ? $this->title : $this->slug;
        return route('blog.posts.show', $point);
    }
}

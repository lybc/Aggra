<?php

namespace App\Http\ViewComposers;

use App\Models\Category;
use Illuminate\View\View;

class MenuComposer
{
    /**
     * @var Category
     */
    protected $menus;

    public function __construct(Category $category)
    {
        $this->menus = $category;
    }

    /**
     * 绑定菜单数据到系统
     * @param View $view
     */
    public function compose(View $view)
    {
        $view->with(
            'menus',
            $this->menus->with('allChildren')->where('parent_id', 0)->get()
        );
    }
}

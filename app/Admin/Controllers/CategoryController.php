<?php

namespace App\Admin\Controllers;

use App\Models\Category;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\HasResourceActions;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use Encore\Admin\Show;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    use HasResourceActions;

    /**
     * Index interface.
     *
     * @param Content $content
     * @return Content
     */
    public function index(Content $content)
    {
        return $content
            ->header('Index')
            ->description('description')
            ->body($this->grid());
    }

    /**
     * Show interface.
     *
     * @param mixed $id
     * @param Content $content
     * @return Content
     */
    public function show($id, Content $content)
    {
        return $content
            ->header('Detail')
            ->description('description')
            ->body($this->detail($id));
    }

    /**
     * Edit interface.
     *
     * @param mixed $id
     * @param Content $content
     * @return Content
     */
    public function edit($id, Content $content)
    {
        return $content
            ->header('Edit')
            ->description('description')
            ->body($this->form()->edit($id));
    }

    /**
     * Create interface.
     *
     * @param Content $content
     * @return Content
     */
    public function create(Content $content)
    {
        return $content
            ->header('Create')
            ->description('description')
            ->body($this->form());
    }

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Category);

        $grid->name('名称');
        $grid->icon('图标')->display(function ($icon) {
            return "<i class='fa {$icon}'></i>";
        });
        $grid->desc('描述');
        $grid->parent()->name('父级');
        $grid->cover('封面')->display(function ($url) {
            $href = Storage::disk('admin')->url($url);
            return "<a href='{$href}' target='_blank'>{$url}</a>";
        });
        $grid->is_index('默认首页');
        $grid->link('额外链接');
        $grid->link_target('额外链接target');
        $grid->created_at('创建时间');
        $grid->updated_at('修改时间');



        return $grid;
    }

    /**
     * Make a show builder.
     *
     * @param mixed $id
     * @return Show
     */
    protected function detail($id)
    {
        $show = new Show(Category::findOrFail($id));

        $show->id('Id');
        $show->name('Name');
        $show->icon('Icon');
        $show->desc('Desc');
        $show->parent_id('Parent id');
        $show->cover('Cover');
        $show->is_index('Is index');
        $show->link('Link');
        $show->link_target('Link target');
        $show->created_at('Created at');
        $show->updated_at('Updated at');

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Category);

        $form->text('name', '名称')->rules('required|max:100');
        $form->icon('icon', '图标')->rules('required|max:50');
        $form->text('desc', '描述')->rules('nullable|max:255');
        $form->select('parent_id', '父级分类')->options(function () {
            return Category::where('parent_id', 0)->get(['id', 'name'])->mapWithKeys(function ($c) {
                return [$c->id => $c->name];
            })->all();
        });
        $form->image('cover', '封面')->uniqueName();
        $form->switch('is_index', '默认首页');
        $form->url('link', '额外链接');
        $form->radio('link_target', '额外链接target')
            ->options([
                '_self' => '_self',
                '_blank' => '_blank',
                '_parent' => '_parent',
                '_top' => '_top',
            ])
            ->default('_self');
        $form->saving(function (Form $form) {
            if (empty($form->input('parent_id'))) {
                $form->input('parent_id', 0);
            }
        });
        return $form;
    }
}

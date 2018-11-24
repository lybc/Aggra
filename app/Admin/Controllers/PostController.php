<?php

namespace App\Admin\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\HasResourceActions;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use Encore\Admin\Show;

class PostController extends Controller
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
            ->header('文章列表')
            ->description('博客文章列表')
            ->body($this->grid());
    }

    /**
     * Show interface.
     *
     * @param mixed $id
     * @param Content $content
     * @return Content
     */
    public function show($id)
    {
        return view('admin.posts.show');
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
            ->header('编辑文章')
//            ->description('description')
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
            ->header('新增文章')
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
        $grid = new Grid(new Post);
        $grid->title('标题');
        $grid->slug('Slug');
        $grid->status('状态')->display(function ($status) {
            $map = [
                'draft' => 'yellow',
                'published' => 'green'
            ];
            return "<span class='badge bg-{$map[$status]}'>{$status}</span>";
        });
//        $grid->content('Content');
        $grid->views('点击数');
        $grid->comments('回复数');
        $grid->category_id('文章分类')->display(function ($categoryId) {
            return Category::find($categoryId)->name;
        });
        $grid->created_at('创建时间');
        $grid->updated_at('最后修改时间');

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
        $show = new Show(Post::findOrFail($id));

        $show->title('Title');
        $show->slug('Slug');
        $show->status('Status');
        $show->content('Content');
        $show->views('Views');
        $show->comments('Comments');
        $show->category_id('Category id');
        $show->deleted_at('Deleted at');
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
        $form = new Form(new Post);

        $form->text('title', '标题')
            ->placeholder('请输入文章标题')
            ->rules('required|max:255');
        $form->radio('status', '状态')->options([
            'published' => '发布',
            'draft' => '草稿',
        ])->default('published');
        $form->select('category_id', '分类')->options(function () {
            return Category::all(['id', 'name'])->mapWithKeys(function ($c) {
                return [$c->id => $c->name];
            })->all();
        })->rules('required');
        $form->markdown('content', '内容')->rules('required');
        return $form;
    }
}

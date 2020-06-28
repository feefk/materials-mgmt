<?php

namespace App\Admin\Controllers;

use App\Models\Bead;
use App\Models\Category;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class CategoryController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = '种类';


    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Category);

        /**
         * 搜索
         * */
        $grid->filter(function($filter){
            // 去掉默认的id过滤器
            $filter->disableIdFilter();
        });

        /**
         * 列信息
         * */
        $grid->column('id', __('ID'))->sortable();
        $grid->column('name', __('category_name'));
        $grid->column('disable', __('Disable'))->using([0 => '否', 1 => '是']);;
        $grid->column('created_at', __('Created at'));
        $grid->column('updated_at', __('Updated at'));

        return $grid;
    }

    /**
     * Make a show builder.
     *
     * @param mixed   $id
     * @return Show
     */
    protected function detail($id)
    {
        $show = new Show(Category::findOrFail($id));

        $show->field('id', __('ID'));
        $show->field('name', __('category_name'));
        $show->field('Disable', __('Disable'));
        $show->field('created_at', __('Created at'));
        $show->field('updated_at', __('Updated at'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Category());

        $form->display('id', __('ID'));
        $form->text('name', __('category_name'));
        $disable = [
            0 => '否',
            1 => '是'
        ];
        $form->select('Disable', __('Disable'))->options($disable)->default(1);

        return $form;
    }
}

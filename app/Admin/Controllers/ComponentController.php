<?php

namespace App\Admin\Controllers;

use App\Models\Category;
use App\Models\Component;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class ComponentController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = '元器件';


    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Component());

        /**
         * 搜索
         * */
        $grid->filter(function($filter){
            // 去掉默认的id过滤器
            $filter->disableIdFilter();
            // 在这里添加字段过滤器
            $filter->like('Part_Number_SITRI', 'Part_Number_SITRI');
        });

        /**
         * 列信息
         * */
        $grid->column('id', __('ID'))->sortable();
        $grid->column('category_id', 'category')->display(function($categoryId) {
            return Category::find($categoryId)->name;
        });

        $grid->column('Part_Number_SITRI', __('Part_Number_SITRI'));
        $grid->column('Part_Type', __('Part_Type'));
        $grid->column('Value', __('Value'));
        $grid->column('Description', __('Description'));
        $grid->column('Schematic_Part', __('Schematic_Part'));
        $grid->column('PCB_Footprint', __('PCB_Footprint'));
        $grid->column('Manufacturer', __('Manufacturer'));
        $grid->column('Manufacturer_PN', __('Manufacturer_PN'));
        $grid->column('Datasheet', __('Datasheet'));
        $grid->column('Disable', __('Disable'))->using([0 => '否', 1 => '是']);
        $grid->column('created_at', __('Created at'));
        $grid->column('updated_at', __('Updated at'));

//        if (!Admin::user()->isAdministrator()) {
//            $grid->disableCreateButton();
//        }

//        $grid->actions(function (Grid\Displayers\Actions $actions) {
//
//            if ($actions->getKey() % 2 == 0) {
//                $actions->disableDelete();
//                $actions->append('<a href=""><i class="fa fa-paper-plane"></i></a>');
//            } else {
//                $actions->disableEdit();
//                $actions->prepend('<a href=""><i class="fa fa-paper-plane"></i></a>');
//            }
//        });


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
        $show = new Show(Component::findOrFail($id));

        $show->field('id', __('ID'));
        $show->field('Part_Number_SITRI', __('Part_Number_SITRI'));
        $show->field('Part_Type', __('Part_Type'));
        $show->field('Value', __('Value'));
        $show->field('Description', __('Description'));
        $show->field('Schematic_Part', __('Schematic_Part'));
        $show->field('PCB_Footprint', __('PCB_Footprint'));
        $show->field('Manufacturer', __('Manufacturer'));
        $show->field('Manufacturer_PN', __('Manufacturer_PN'));
        $show->field('Datasheet', __('Datasheet'));
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
        $form = new Form(new Component());

        $form->display('id', __('ID'));
        $form->select('category_id')->options(Category::all()->where('disable', 0)->pluck('name', 'id'))->required();

        if (Admin::user()->inRoles(['schematic', 'administrator'])) {
            $form->text('Part_Type', __('Part_Type'))->required();
            $form->text('Value', __('Value'))->required();
            $form->text('Description', __('Description'))->required();
            $form->text('Schematic_Part', __('Schematic_Part'))->required();
            $form->text('Manufacturer', __('Manufacturer'))->required();
            $form->text('Manufacturer_PN', __('Manufacturer_PN'))->required();
            $form->text('Datasheet', __('Datasheet'))->required();
            $form->select('Disable', __('Disable'))->options([0 => '否', 1 => '是'])->default(0)->required();
        }

        if (Admin::user()->inRoles(['pcb', 'administrator'])) {
            $form->text('Part_Number_SITRI', __('Part_Number_SITRI'));
            $form->text('PCB_Footprint', __('PCB_Footprint'));
        }

        return $form;
    }
}

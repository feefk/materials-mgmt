<?php

namespace App\Admin\Controllers;

use App\Models\Bead;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class BeadController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Bead';


    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Bead());

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
        $grid->column('Part_Number_SITRI', __('Part_Number_SITRI'));
        $grid->column('Part_Type', __('Part_Type'));
        $grid->column('Value', __('Value'));
        $grid->column('Description', __('Description'));
        $grid->column('Schematic_Part', __('Schematic_Part'));
        $grid->column('PCB_Footprint', __('PCB_Footprint'));
        $grid->column('Manufacturer', __('Manufacturer'));
        $grid->column('Manufacturer_PN', __('Manufacturer_PN'));
        $grid->column('Datasheet', __('Datasheet'));
        $grid->column('Disable', __('Disable'));
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


        $show = new Show(Bead::findOrFail($id));

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
        $form = new Form(new Bead());

        $form->display('id', __('ID'));
        $form->text('Part_Number_SITRI', __('Part_Number_SITRI'));
        $form->text('Part_Type', __('Part_Type'));
        $form->text('Value', __('Value'));
        $form->text('Description', __('Description'));
        $form->text('Schematic_Part', __('Schematic_Part'));
        $form->text('PCB_Footprint', __('PCB_Footprint'));
        $form->text('Manufacturer', __('Manufacturer'));
        $form->text('Manufacturer_PN', __('Manufacturer_PN'));
        $form->text('Datasheet', __('Datasheet'));
        $disable = [
            0 => '否',
            1 => '是'
        ];
        $form->select('Disable', __('Disable'))->options($disable)->default(1);

        return $form;
    }
}

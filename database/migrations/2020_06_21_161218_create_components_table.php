<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComponentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('components', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('category_id');
            $table->string('Part_Number_SITRI');
            $table->string('Part_Type');
            $table->string('Value');
            $table->text('Description');
            $table->string('Schematic_Part');
            $table->string('PCB_Footprint');
            $table->string('Manufacturer');
            $table->string('Manufacturer_PN');
            $table->string('Datasheet');
            $table->enum('Disable', [0, 1])->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('components');
    }
}

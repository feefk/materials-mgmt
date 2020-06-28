<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBeadsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('beads', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('Part_Number_SITRI')->nullable();
            $table->string('Part_Type')->nullable();
            $table->string('Value')->nullable();
            $table->text('Description')->nullable();
            $table->string('Schematic_Part')->nullable();
            $table->string('PCB_Footprint')->nullable();
            $table->string('Manufacturer')->nullable();
            $table->string('Manufacturer_PN')->nullable();
            $table->string('Datasheet')->nullable();
            $table->enum('Disable', [0, 1])->nullable(false)->default(1);
            $table->softDeletes();
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
        Schema::dropIfExists('beads');
    }
}

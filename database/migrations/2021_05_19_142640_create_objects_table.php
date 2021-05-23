<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateObjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('objects', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('PARENT_ID')->nullable();
            $table->string('OBJECT_CODE',50)->unique();
            $table->string('OBJECT_URL',500)->nullable();
            $table->string('OBJECT_NAME',100);
            $table->string('DESCRIPTION',500)->nullable();
            $table->string('OBJECT_LEVEL');
            $table->integer('status')->default(1);
            $table->integer('SHOW_MENU')->default(1);
            $table->string('created_by')->nullable();
            $table->string('updated_by')->nullable();
            $table->timestamps();

            $table->foreign('PARENT_ID')->references('id')
                ->on('objects')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('objects');
    }
}

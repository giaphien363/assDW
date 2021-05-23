<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRoleObjectTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('role_object', function (Blueprint $table) {
            $table->unsignedInteger('OBJECT_ID');
            $table->unsignedInteger('ROLE_ID');
            $table->integer('status')->default(1);
            $table->string('created_by',50)->nullable();
            $table->timestamps();

            $table->foreign('OBJECT_ID')->references('id')
                ->on('objects')
                ->onDelete('cascade');
            $table->foreign('ROLE_ID')->references('id')
                ->on('roles')
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
        Schema::dropIfExists('role_object');
    }
}

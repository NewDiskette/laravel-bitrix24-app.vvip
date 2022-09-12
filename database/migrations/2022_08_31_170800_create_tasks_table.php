<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            $table->string('title');

            $table->unsignedTinyInteger('client_id');
            $table->foreign('client_id')
                ->references('id')
                ->on('clients')
                ->cascadeOnDelete()
            ;
            $table->text('business_task');
            $table->unsignedSmallInteger('expert_rating')->default(0);
            $table->unsignedSmallInteger('hour_price')->default(0);
            $table->unsignedInteger('task_bitrix_id')->nullable();

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tasks');
    }
}

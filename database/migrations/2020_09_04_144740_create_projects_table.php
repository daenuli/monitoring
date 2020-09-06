<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('progress_id');
            $table->unsignedBigInteger('production_area_id');
            $table->unsignedBigInteger('maintenance_area_id');
            // $table->foreignId('user_id')->constrained('users');
            // $table->foreignId('progress_id')->constrained('progress');
            // $table->foreignId('production_area_id')->constrained('production_areas');
            // $table->foreignId('maintenance_area_id')->constrained('maintenance_areas');

            $table->integer('work_order_number');
            $table->string('name');
            $table->text('description');
            $table->enum('type', ['jasa', 'barang']);
            $table->date('due_date');
            $table->integer('status');
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
        Schema::dropIfExists('projects');
    }
}

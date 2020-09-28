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
            $table->integer('user_id');
            // $table->integer('inisiasi_id');
            $table->integer('sub_inisiasi_id');
            $table->integer('production_area_id')->nullable();
            $table->integer('maintenance_area_id');
            $table->string('work_order_number');
            $table->string('reference_number');
            $table->string('notification_number');
            $table->string('purchase_order_number');
            $table->string('purchase_request_number');
            $table->string('spppmk_number');
            $table->string('vendor_name');
            $table->string('buyer_name');
            $table->text('description');
            $table->text('impact');
            $table->enum('type', ['jasa', 'barang']);
            $table->date('start_date');
            $table->boolean('is_urgent');
            $table->integer('status'); // 0. Tidak Aktif, 1. Aktif
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

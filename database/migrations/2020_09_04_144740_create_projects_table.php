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
            $table->integer('parent_id')->nullable();
            // $table->integer('inisiasi_id');
            $table->integer('sub_inisiasi_id')->nullable();
            // $table->integer('production_area_id')->nullable();
            $table->integer('maintenance_area_id')->nullable();
            $table->string('work_order_number')->nullable();
            $table->string('reference_number')->nullable();
            $table->string('notification_number')->nullable();
            $table->string('purchase_order_number')->nullable();
            $table->string('purchase_request_number')->nullable();
            $table->string('spppmk_number')->nullable();
            $table->string('vendor_name')->nullable();
            $table->string('buyer_name')->nullable();
            $table->text('description')->nullable();
            $table->text('impact')->nullable();
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

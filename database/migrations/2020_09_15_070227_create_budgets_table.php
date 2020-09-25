<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBudgetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('budgets', function (Blueprint $table) {
            $table->id();
            $table->string("work_order_number")->nullable();
            $table->text("description");
            $table->integer("budget_discipline_id");
            $table->integer("wbs_id");
            $table->integer("budget")->nullable();
            $table->integer("actual")->nullable();
            $table->integer("commitment")->nullable();
            $table->integer("rop")->nullable();
            $table->year("year")->nullable();
            // $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('budgets');
    }
}

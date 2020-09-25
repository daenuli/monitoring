<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('nip');
            $table->string('phone');
            $table->string('name');
            $table->string('email')->unique();
            // $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->boolean('status'); // 0: tidak aktif, 1: aktif
            $table->string('department');
            $table->string('photo')->nullable();
            $table->integer('discipline_id');
            // $table->unsignedBigInteger('discipline_id');

            // $table->foreign('discipline_id')->references('id')->on('disciplines');

            // $table->foreignId('discipline_id')->constrained('disciplines');
            $table->enum('role', ['budgeting', 'planner', 'engineer', 'procurement', 'scheduler', 'ma', 'admin']);
            // $table->rememberToken();
            $table->timestamps();
            // $table->foreign('discipline_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}

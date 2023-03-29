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
            $table->id('id_user');
            $table->string('name');
            $table->string('username');
            $table->string('email')->unique();
            $table->text('address');
            $table->string('no_hp');
            $table->tinyInteger('status')
                    ->comment('1.pelajar, 2.karyawan')
                    ->default(0);
            $table->enum('jabatan', ['dosen', 'pj', 'ajm']);
            $table->integer('ativity_id')->nullable();
            $table->integer('contact_id')->nullable();
            $table->integer('course_id')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}

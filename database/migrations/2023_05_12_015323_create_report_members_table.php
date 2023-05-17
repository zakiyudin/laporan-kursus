<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReportMembersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('report_members', function (Blueprint $table) {
            $table->id();
            $table->date('date_course');
            $table->string('book')->comment('kitab yg dikaji');
            $table->text('contact')->comment('kontakan mingguan');
            $table->tinyInteger('attendance')->comment('1: hadir, 2: terlambat, 3: absen');
            $table->text('evidence')->comment('keterangan');
            $table->unsignedBigInteger('member_id');
            $table->timestamps();

            $table->foreign('member_id')
                    ->references('id')
                    ->on('members')
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
        Schema::dropIfExists('report_members');
    }
}

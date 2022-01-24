<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use function Ramsey\Uuid\v1;

class CreateMCqresultTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('m_cqresult', function (Blueprint $table) {
            $table->increments('cqid');
            $table->string('construction_no');
            $table->string('customer_name');
            $table->boolean('operating_schedule_sales');
            $table->boolean('operating_schedule_design');
            $table->boolean('operating_schedule_Construction');
            $table->date('operating_date_st');
            $table->date('operating_date_ed');
            $table->integer('answer1');
            $table->integer('answer2');
            $table->integer('answer3');
            $table->integer('answer4');
            $table->integer('answer5');
            $table->integer('answer6');
            $table->integer('answer7');
            $table->text('answer_freetext');
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
        Schema::dropIfExists('m_cqresult');
    }
}

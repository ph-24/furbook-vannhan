<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cats', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->date('date_of_birth');
            $table->integer('breed_id')->unsigned()/* biên độ giá trị n ko lưu số âm, not unsigned -n/2 ~n/2 */->nullable()/* cho phép null */;
            $table->foreign('breed_id')->references('id')->on('breeds');
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
        Schema::dropIfExists('cats');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('tip_id');
            $table->text('naziv');
            $table->text('slug')->nullable();
            $table->date('datum')->nullable();
            $table->text('ukratko')->nullable();
            $table->longText('detaljno')->nullable();
            $table->string('redosled');
            $table->boolean('aktivan');
            $table->timestamps();

            $table->foreign('tip_id')
                    ->references('id')
                    ->on('post_types')
                    ->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Comentarios extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comentarios', function (Blueprint $table) {
            $table->increments('id');
            $table->text('texto');
            $table->Integer('like');
            $table->timestamps();
            $table->unsignedInteger('usuario_id');
            $table->foreign('usuario_id')->references('id')->on('users');
            $table->unsignedInteger('tema_id');
            $table->foreign('tema_id')->references('id')->on('temas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
    
        Schema::table('comentarios', function (Blueprint $table) {
            $table->dropForeign(['usuario_id']);
              $table->dropColumn('usuario_id');
          });

          Schema::table('comentarios', function (Blueprint $table) {
            $table->dropForeign(['tema_id']);
              $table->dropColumn('tema_id');
          });

          Schema::drop('comentarios');
    }
}

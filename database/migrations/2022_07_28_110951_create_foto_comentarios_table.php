<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFotoComentariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('foto_comentarios', function (Blueprint $table) {
            $table->id();
            $table->text('comentario');
            $table->foreignId('id_user')->constrained('users')->onDelete('CASCADE')->onUpgrade('CASCADE');
            $table->foreignId('id_foto_galeria')->constrained('foto_galerias')->onDelete('CASCADE')->onUpgrade('CASCADE');
            $table->text('slug');
            $table->softDeletes();
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
        Schema::dropIfExists('foto_comentarios');
    }
}

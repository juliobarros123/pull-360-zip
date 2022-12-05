<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFotoGaleriasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('foto_galerias', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_user')->constrained('users')->onDelete('CASCADE')->onUpgrade('CASCADE');
            $table->foreignId('id_area')->constrained('areas')->onDelete('CASCADE')->onUpgrade('CASCADE');
            $table->text('foto');
            $table->text('descricao')->nullable();
            $table->text('titulo')->nullable();
            $table->text('slug');
            $table->double('largura');
            $table->double('altura');
            $table->double('bits');
            $table->string('mime');
            $table->double('preco')->nullable();
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
        Schema::dropIfExists('foto_galerias');
    }
}

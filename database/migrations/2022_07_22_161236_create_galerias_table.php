<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGaleriasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('galerias', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_user')->constrained('users')->onDelete('CASCADE')->onUpgrade('CASCADE');
            $table->text('capa');
            $table->text('titulo')->nullable();
            $table->text('descricao');
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
        Schema::dropIfExists('galerias');
    }
}

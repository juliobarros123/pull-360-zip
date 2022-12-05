<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMeuSobresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('meu_sobres', function (Blueprint $table) {
            $table->id();
            $table->text('saudacao')->nullable();
            $table->text('descricao')->nullable();
            $table->foreignId('id_user')->constrained('users')->onDelete('CASCADE')->onUpgrade('CASCADE');
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
        Schema::dropIfExists('meu_sobres');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('messages', function (Blueprint $table) {
            $table->bigIncrements('id');

            // Persona que envía el mensaje
            $table->integer('sender_id')->unsigned();
            $table->foreign('sender_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            // Persona que recibe el mensaje
            $table->integer('receiver_id')->unsigned();
            $table->foreign('receiver_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');

            // Relación con la sala de chat
            $table->integer('conversation_id')->unsigned();
            $table->foreign('conversation_id')->references('id')->on('conversations')->onDelete('cascade')->onUpdate('cascade');

            $table->text('message')->nullable();
            $table->boolean('read')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('messages');
    }
};

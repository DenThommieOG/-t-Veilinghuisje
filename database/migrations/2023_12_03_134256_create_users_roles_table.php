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
        Schema::create('users_roles', function (Blueprint $table) {
            $table->foreignId('user_id');
            $table->foreignId('role_id');

            //FOREIGN KEY
            $table->foreign(['user_id'], 'user_id_fk_1')->references('id')->on('users')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign(['role_id'], 'role_id_fk_1')->references('id')->on('roles')->onUpdate('CASCADE')->onDelete('CASCADE');

            //PRIMARY KEYS
            $table->primary(['user_id', 'role_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users_roles');
    }
};

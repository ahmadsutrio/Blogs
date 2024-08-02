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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('username')->nullable(false);
            $table->string('email')->nullable(false)->unique('email_unique');
            $table->text('password')->nullable(false);
            $table->enum('role',['administrator','pengguna'])->default('pengguna')->nullable();
            $table->string('foto')->nullable()->default('profiles/users.png');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};

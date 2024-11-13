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
            $table->string('nik');
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->integer('is_admin')->default(0);
            $table->boolean('is_mamber')->default(1);
            $table->string('foto')->default('default.png');
            $table->string('alamat');
            $table->string('tlp');
            $table->date('tglLahir');
            $table->boolean('is_active')->default(1);
            $table->integer('role');
            $table->rememberToken();
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

// public function up(): void
// {
//     Schema::create('users', function (Blueprint $table) {
//         $table->id();
//         $table->string('nik')->unique(); // Buat NIK menjadi unik
//         $table->string('name');
//         $table->string('email')->unique();
//         $table->timestamp('email_verified_at')->nullable();
//         $table->string('password');
//         $table->boolean('is_admin')->default(0); // Ubah ke boolean
//         $table->boolean('is_mamber')->default(1);
//         $table->string('foto')->default('default.png');
//         $table->string('alamat');
//         $table->string('tlp', 20); // Panjang nomor telepon ditentukan
//         $table->date('tglLahir');
//         $table->boolean('is_active')->default(1);
//         $table->integer('role')->default(0); // Pertimbangkan apakah masih dibutuhkan
//         $table->rememberToken();
//         $table->timestamps();
//     });
// }

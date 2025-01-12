<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('admins', function (Blueprint $table) {
            $table->id();
            $table->char('username', 50);
            $table->string('password');
            $table->timestamps();
        });

        // Thêm tài khoản admin mặc định
        DB::table('admins')->insert([
            'username' => 'admin@gmail.com',
            'password' => Hash::make('123123123'), // Mật khẩu mặc định là 'password'
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('admins');
    }
};

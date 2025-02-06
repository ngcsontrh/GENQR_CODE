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
        Schema::table('qrcodes', function (Blueprint $table) {
            $table->string('qr_code_name')->nullable(); // Tên mã qr
            $table->string('file_category')->nullable(); // Danh mục nội dung cho loại File
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('qrcodes', function (Blueprint $table) {
            $table->dropColumn('qr_code_name');
            $table->dropColumn('file_category');
        });
    }
};

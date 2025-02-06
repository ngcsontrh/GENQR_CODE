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
            $table->string("bank_acq_id")->nullable(); // Id ngân hàng
            $table->string("bank_account_no")->nullable(); // STK ngân hàng
            $table->string("bank_account_name")->nullable(); // Tên tài khoản ngân hàng
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('qrcodes', function (Blueprint $table) {
            $table->dropColumn("bank_acq_id");
            $table->dropColumn("bank_account_no");
            $table->dropColumn("bank_account_name");
        });
    }
};

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
        Schema::create('qrcodes', function (Blueprint $table) {
            $table->id();
            $table->string('unique_id')->unique(); // Mã định danh duy nhất
            $table->unsignedBigInteger('user_id')->nullable();
            $table->string('type'); // Loại dữ liệu (URL, Vcard, Email, SMS, etc.)
            $table->string('qr_code_path'); // Đường dẫn mã QR code

            // Cột dữ liệu cho từng loại form
            $table->string('url')->nullable(); // URL
            $table->string('vcard_name')->nullable(); // Tên cho Vcard
            $table->string('vcard_lastname')->nullable(); // Họ cho Vcard
            $table->string('vcard_email')->nullable(); // Email cho Vcard
            $table->string('email_address')->nullable(); // Địa chỉ email
            $table->string('email_subject')->nullable(); // Tiêu đề email
            $table->text('email_body')->nullable(); // Nội dung email
            $table->string('phone_number')->nullable(); // Số điện thoại
            $table->text('sms_content')->nullable(); // Nội dung SMS
            $table->string('docs_content')->nullable(); // Nội dung văn bản (Docs)
            $table->string('wifi_name')->nullable(); // Tên WiFi (SSID)
            $table->string('wifi_password')->nullable(); // Mật khẩu WiFi
            $table->string('wifi_encryption')->nullable(); // Loại mã hóa WiFi (WPA, WEP, nopass)

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

            $table->timestamps(); // Thời gian tạo và cập nhật
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('qrcodes');
    }
};

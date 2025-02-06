<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class QRCode extends Model
{
    use HasFactory;
    protected $table = 'qrcodes';
    protected $fillable = [
        'user_id',
        'type',
        'qr_code_path',
        'url',
        'vcard_name',
        'vcard_lastname',
        'vcard_email',
        'email_address',
        'email_subject',
        'email_body',
        'phone_number',
        'sms_content',
        'unique_id',
        'wifi_name',
        'wifi_password',
        'wifi_encryption',
        'docs_content',
        'bank_acq_id',
        'bank_account_no',
        'bank_account_name',
        'qr_code_name',
        'file_category',
        ''
    ];
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}

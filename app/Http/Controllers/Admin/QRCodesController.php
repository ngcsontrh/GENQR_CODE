<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\QRCode;
use Illuminate\Support\Facades\Storage;

class QRCodesController extends Controller
{
    public function index() {
        $qrcodes = QRCode::with('user')->orderBy('created_at', 'desc')->paginate(10);
        return view('admins.qrcodes.index', compact('qrcodes'));
    }
    public function destroy($id)
    {
        $qrcode = QRCode::findOrFail($id);
        // Xóa file hình ảnh nếu có
        Storage::delete($qrcode->qr_code_path);
        // Xóa bản ghi trong database
        $qrcode->delete();

        return redirect()->back()->with('success', 'Mã QR đã được xóa thành công.');
    }

}

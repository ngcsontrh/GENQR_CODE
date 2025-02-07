<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\QRCode;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;

class QRCodesController extends Controller
{
    public function index(Request $request) {
        $qrcodeName = $request->input('qr_code_name');

        $qrcodes = QRCode::query();
        if ($qrcodeName) {
            $qrcodes = $qrcodes->where('qr_code_name', 'like', '%' . $qrcodeName . '%');
        }

        $qrcodes = $qrcodes->with('user')->orderBy('created_at', 'desc')->paginate(10);

        // Gọi API lấy danh sách ngân hàng
        try {
            $response = Http::withOptions([
                'verify' => false,
            ])->get("https://api.vietqr.io/v2/banks");
            $bankData = $response->json();

            // Tạo map ngân hàng
            $bankMap = [];
            foreach ($bankData['data'] as $bank) {
                $bankMap[$bank['bin']] = $bank['name'] . ' - ' . $bank['shortName'];
            }

            // Gán tên ngân hàng vào từng bản ghi
            foreach ($qrcodes as $qrcode) {
                if ($qrcode->type === 'Bank') {
                    $qrcode->bank_acq_name = $bankMap[$qrcode->bank_acq_id];
                }
            }
        } catch (\Exception $e) {
            // Nếu lỗi API, gán giá trị mặc định
            foreach ($qrcodes as $qrcode) {
                $qrcode->bank_acq_name = 'Không xác định';
            }
        }

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

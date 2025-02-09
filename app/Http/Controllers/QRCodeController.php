<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;
use App\Models\QRCode;
use Endroid\QrCode\QrCode as EndroidQrCode;
use Endroid\QrCode\Writer\PngWriter;
use Endroid\QrCode\Logo\Logo;
use Endroid\QrCode\Label\Label;
use Zxing\QrReader;

class QRCodeController extends Controller
{
    public function index()
    {
        return view('generator');
    }
    public function store(Request $request)
    {
        $type = $request->input('type');
        if (!$type) {
            return response()->json(['error' => 'Invalid type'], 400);
        }

        $qrData = $this->getQrDataByType($type, $request);
        if (!$qrData) {
            return response()->json(['error' => 'Invalid data for QR Code'], 400);
        }

        // Tạo unique_id cho QR Code
        $uniqueId = uniqid();

        // Tạo file QR Code
        $fileName = $this->generateFileName($request->hasFile('logo'));
        $filePath = 'qrcodes/' . $fileName;

        if ($type === 'Bank') {
            $response = Http::withOptions([
                'verify' => false,
            ])->post('https://api.vietqr.io/v2/generate', $qrData);

            if (!$response->successful() || !isset($response['data']['qrDataURL'])) {
                return response()->json(['error' => 'Failed to generate QR code'], 500);
            }

            Storage::put('public/' . $filePath, file_get_contents($response['data']['qrDataURL']));
        }
        else {
            $writer = new PngWriter();
            $qrCode = EndroidQrCode::create($qrData) // Sử dụng dữ liệu thực
                ->setSize(300)
                ->setMargin(10);

            $logo = $this->getLogoIfExists($request);

            $result = $writer->write($qrCode, $logo);

            Storage::put('public/' . $filePath, $result->getString());
        }
        $this->storeQrCodeToDatabase($request, $type, $filePath, $uniqueId);

        return response()->json(['path' => Storage::url($filePath)]);
    }

    /**
     * Xử lý dữ liệu QR Code dựa trên type.
     */
    private function getQrDataByType($type, Request $request)
    {
        switch ($type) {
            case 'URL':
                return $request->input('url');

            case 'Vcard':
                return "BEGIN:VCARD\nVERSION:3.0\n" .
                    "FN:{$request->input('vcard_name')} {$request->input('vcard_lastname')}\n" .
                    "EMAIL:{$request->input('vcard_email')}\n" .
                    "END:VCARD";

            case 'Email':
                return "mailto:{$request->input('email_address')}?subject=" . urlencode($request->input('email_subject')) .
                    "&body=" . urlencode($request->input('email_body'));

            case 'Phone':
                return "tel:{$request->input('phone_number')}";

            case 'SMS':
                return "SMSTO:{$request->input('phone_number')}:{$request->input('sms_content')}";

            case 'Docs': // Văn bản
                return $request->input('docs_content'); // Trả về nội dung văn bản

            case 'Wifi': // WiFi
                $ssid = $request->input('wifi_name');
                $password = $request->input('wifi_password');
                $encryption = $request->input('wifi_encryption', 'nopass'); // Mặc định là không mã hóa
                return "WIFI:S:{$ssid};T:{$encryption};P:{$password};;";

            case 'Bank':
                return [
                    'acqId' => $request->input('bank_acq_id'),
                    'accountNo' => $request->input('bank_account_no'),
                    'accountName' => $request->input('bank_account_name'),
                    'template' => 'qr_only'
                ];

            case 'File':
                // Lấy danh mục file từ request
                $fileCategory = $request->input('file_category');

                // Lấy file từ request
                if ($request->hasFile('file_upload')) {
                    $fileUpload = $request->file('file_upload');

                    // Sinh tên file mới
                    $fileName = time() . '.' . $fileUpload->getClientOriginalExtension();

                    // Định nghĩa đường dẫn lưu file trong storage
                    $filePath = 'users/' . $fileName;

                    // Lưu file vào storage (public disk)
                    Storage::put('public/' . $filePath, file_get_contents($fileUpload));

                    // Lấy URL của file đã lưu
                    $fileUrl = url(Storage::url($filePath));
                    $request->merge(['url' => $fileUrl]);

                    return "File type: {$fileUpload->getClientOriginalExtension()}\n" .
                        "Category: {$fileCategory}\n" . // Danh mục file
                        "URL: {$fileUrl}"; // Url dẫn tới file
                }
                else {
                    return '';
                }

            default:
                return null;
        }
    }

    /**
     * Tạo file name cho QR Code.
     */
    private function generateFileName($hasLogo)
    {
        $prefix = $hasLogo ? 'My_qr_withlogo_' : 'My_qr_';
        return $prefix . time() . '.png';
    }

    /**
     * Lấy logo nếu tồn tại trong request.
     */
    private function getLogoIfExists(Request $request)
    {
        if ($request->hasFile('logo')) {
            $logoPath = $request->file('logo')->getRealPath();
            return Logo::create($logoPath)
                ->setResizeToWidth(60); // Resize logo nếu cần
        }
        return null;
    }

    /**
     * Lưu thông tin QR Code vào database.
     */
    private function storeQrCodeToDatabase(Request $request, $type, $filePath, $uniqueId)
    {
        $user = auth()->user();

        QRCode::create([
            'user_id' => $user ? $user->id : null,
            'type' => $type,
            'qr_code_name' => $request->input('qr_code_name'), // Tên mã QR
            'qr_code_path' => $filePath,
            'unique_id' => $uniqueId, // Lưu unique_id
            'url' => $request->input('url'),
            'vcard_name' => $request->input('vcard_name'),
            'vcard_lastname' => $request->input('vcard_lastname'),
            'vcard_email' => $request->input('vcard_email'),
            'email_address' => $request->input('email_address'),
            'email_subject' => $request->input('email_subject'),
            'email_body' => $request->input('email_body'),
            'phone_number' => $request->input('phone_number'),
            'sms_content' => $request->input('sms_content'),
            'docs_content' => $request->input('docs_content'), // Nội dung văn bản
            'wifi_name' => $request->input('wifi_name'), // Tên WiFi (SSID)
            'wifi_password' => $request->input('wifi_password'), // Mật khẩu WiFi
            'wifi_encryption' => $request->input('wifi_encryption'), // Loại mã hóa WiFi
            'bank_acq_id' => $request->input('bank_acq_id'), // Mã ngân hàng
            'bank_account_no' => $request->input('bank_account_no'), // STK ngân hàng
            'bank_account_name' => $request->input('bank_account_name'), // Tên tài khoản ngân hàng
            'file_category' => $request->input('file_category'), // Danh mục file
        ]);
    }

    public function dynamicQr($unique_id)
    {
        $qrcode = QRCode::where('unique_id', $unique_id)->firstOrFail();

        $data = [
            'type' => $qrcode->type,
            'url' => $qrcode->url,
            'vcard_name' => $qrcode->vcard_name,
            'vcard_lastname' => $qrcode->vcard_lastname,
            'vcard_email' => $qrcode->vcard_email,
            'email_address' => $qrcode->email_address,
            'email_subject' => $qrcode->email_subject,
            'email_body' => $qrcode->email_body,
            'phone_number' => $qrcode->phone_number,
            'sms_content' => $qrcode->sms_content,
            'docs_content' => $qrcode->docs_content, // Nội dung văn bản
            'wifi_name' => $qrcode->wifi_name, // Tên WiFi
            'wifi_password' => $qrcode->wifi_password, // Mật khẩu WiFi
            'wifi_encryption' => $qrcode->wifi_encryption, // Loại mã hóa WiFi
            'bank_acq_id' => $qrcode->bank_acq_id, // Mã định danh ngân hàng (thường gọi là BIN)
            'bank_account_no' => $qrcode->bank_account_no, // STK ngân hàng
            'bank_account_name' => $qrcode->bank_account_name, // Tên tài khoản ngân hàng
        ];

        return response()->json($data);
    }

    public function edit($unique_id)
    {
        $qrcode = QRCode::where('unique_id', $unique_id)->firstOrFail();
        return view('qr_edit', compact('qrcode'));
    }

    public function update(Request $request, $unique_id)
    {
        $qrcode = QRCode::where('unique_id', $unique_id)->firstOrFail();

        $qrcode->update($request->all());

        return redirect()->route('qr.edit', $unique_id)->with('success', 'QR Code đã được cập nhật.');
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
    public function history()
    {
        $user = auth()->user();
        $qrcodes = QRCode::where('user_id', $user->id)->orderBy('created_at', 'desc')->paginate(6);

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

        return view('qr_history', compact('qrcodes'));
    }

    public function decode()
    {
        return view('qr_decode');
    }

    public function decodeQr(Request $request)
    {
        $request->validate([
            'qr_file' => 'required|image'
        ]);

        $tempPath = $request->file('qr_file')->getRealPath();

        // Dịch mã QR code
        $qrReader = new QrReader($tempPath);
        $decodedText = $qrReader->text();
        return response()->json([
            'decoded' => $decodedText ?? 'Không có dữ liệu mã QR.'
        ]);
    }
}

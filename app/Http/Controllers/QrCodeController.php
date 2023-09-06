<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Route;
use App\Models\ShortLinks;
use Str;
//use Endroid\QrCode\QrCode;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Illuminate\Http\Request;

class QrCodeController extends Controller
{
    public function showQrCode($short_link)
{
    $find = ShortLinks::where('short_link', $short_link)->first();

    if ($find) {
        // สร้าง URL ต้นแบบที่ผู้ใช้สามารถเข้าถึงได้
        $originalLink = url($find->original_link);

        // สร้าง QR Code โดยใช้ Facade QrCode
        $qrCode = QrCode::size(200)->generate($originalLink);

        return view('show_qr', [
            'qrCode' => $qrCode,
            'originalLink' => $originalLink,
        ]);
        
        
    } else {
        // หากไม่พบ short link ในฐานข้อมูล
        return redirect()->back()->with('error', 'Short Link not found.');
        
    }
}
}

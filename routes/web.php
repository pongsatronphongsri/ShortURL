<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LinksController;
use App\Http\Controllers\QrCodeController;
use App\Models\ShortLinks;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/',[LinksController::class,'index']);

Route::get('short-link',[LinksController::class,'index']);
Route::post('short-link',[LinksController::class,'store'])->name('shortlink.post');
Route::get('{original_link}',[LinksController::class,'shortLink'])->name('shorten.link');
Route::get('/show-qr/{short_link}', [QrCodeController::class, 'showQrCode'])->name('show.qr');

Route::get('clear-shortlink/{short_link}', [LinksController::class, 'clearShortLink'])->name('clear.shortlink');

/*Route::get('qr-code-g/{short_link}', function ($short_link) {
    $shortUrl = ShortLinks::where('short_link', $short_link)->first();

    if (!$shortUrl) {
        return redirect()->back()->with('error', 'Short Link not found.');
    }

    $originalLink = url($shortUrl->original_link);

    // สร้าง QR Code
    $qrCode = QrCode::generate($originalLink);

    return view('qrCode', ['qrCode' => $qrCode]);
});*/



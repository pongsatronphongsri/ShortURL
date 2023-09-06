<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\ShortLinks;
use Str;
class LinksController extends Controller
{
    public function index(){
        $shortLinks = ShortLinks::latest()->get();
       return view('shortenLink',compact('shortLinks'));
    }

    public function store(Request $request){
        $request->validate([
            'original_link' => 'required|url'

        ]);

        $input['original_link'] = $request->original_link;
        $input['short_link'] = Str::random(6);
        ShortLinks::create($input);
        return redirect('short_link')->with('success','Shorten Link alert-successfully.');
    }
    public function shortLink($short_link){
        $find = ShortLinks::where('short_link',$short_link)->first();
      
        if ($find) {
            $find->increment('open_count');
            return redirect($find->original_link);
        } else {
            // ในกรณีที่ไม่พบ short link ที่ตรงกัน
            return redirect()->back()->with('error', 'ไม่พบ Shorten Link ที่คุณร้องขอ');
        }

    }
    //clear

    public function clearShortLink($short_link)
    {
        $find = ShortLinks::where('short_link', $short_link)->first();

        if ($find) {
            // ลบ Short Link จากฐานข้อมูล
            $find->delete();

            // ส่งข้อความออกไปยังหน้า shortlink.blade.php หรือทำอย่างอื่นตามที่คุณต้องการ
            return redirect('short_link')->withSuccess('Clear Link alert-successfully.');
        } else {
            // ในกรณีที่ไม่พบ short link ที่ตรงกัน
            return redirect('short_link')->withSuccess('error Clear Link alert-successfully.');
        }
    }

  
}

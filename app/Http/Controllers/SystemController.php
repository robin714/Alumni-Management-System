<?php

namespace App\Http\Controllers;

use App\Event;
use App\Notice;
use Illuminate\Http\Request;

class SystemController extends Controller
{
    public function index()
    {
        $data['event'] = Event::where('status',1)->orderBy('created_at','desc')->limit(5)->get();
        $data['notice'] = Notice::where('status',1)->orderBy('created_at','desc')->limit(5)->get();
        return view('alumni.index',['data'=>$data]);
    }
    public function event()
    {
        $events = Event::where('status',1)->paginate(10);
        return view('alumni.event')->with(['events'=>$events]);
    }
    public function notice()
    {
        $notices = Notice::where('status',1)->paginate(10);
        return view('alumni.notice-list')->with(['notices'=>$notices]);
    }
    public function about()
    {
        return view('alumni.about');
    }
}

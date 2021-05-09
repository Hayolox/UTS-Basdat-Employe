<?php

namespace App\Http\Controllers;

use App\Notification;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function index(){

        $notifs = Notification::paginate(10);
        return view('notification.index',compact('notifs'));
    }

    public function delete($id)
    {
        $aatr = Notification::findOrFail($id);
        $aatr->delete();
        return back();

    }
}

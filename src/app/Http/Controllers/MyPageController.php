<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Services\MyPageService;
use App\Models\User;
use App\Models\Event;
use App\Models\Reservation;
use Carbon\Carbon;

class MyPageController extends Controller
{
    public function index()
    {
        $user = User::findOrFail(Auth::id());
        $events = $user->events;
        $fromTodayEvents = MyPageService::reservedEvent($events, 'fromToday');
        $pastEvents      = MyPageService::reservedEvent($events, 'past');
        // dd($events, $fromTodayEvents, $pastEvents);
        return view('mypage/index', compact('fromTodayEvents', 'pastEvents'));
    }

    public function show($id)
    {
        $event = Event::findOrFail($id);
        $reservation = Reservation::where('user_id', '=', Auth::id())
                                  ->where('event_id', '=', $id)->latest()->first();
        return view('mypage/show', compact('event', 'reservation'));
    }

    public function cancel($id)
    {
      $reservation = Reservation::where('user_id', '=', Auth::id())
                                ->where('event_id', '=', $id)->latest()->first();
      $reservation->canceled_date = Carbon::now()->format('Y-m-d H:i:s');
      $reservation->save();
      session()->flash('status', 'キャンセルが完了しました。');
      return view('dashboard');
    }
}

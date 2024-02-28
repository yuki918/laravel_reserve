<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\Reservation;
use App\Services\EventService;

class ReservationController extends Controller
{
    public function dashboard()
    {
        return view('dashboard');
    }

    public function detail($id)
    {
        $event = Event::findOrFail($id);
        $reservedPeople = DB::table('reservations')
            ->select('event_id', DB::raw('sum(number_of_people) as number_of_people'))
            ->whereNull('canceled_date')->groupBy('event_id')->having('event_id', $event->id)->first();
        if(!is_null($reservedPeople)) {
          $resevablePeople = $event->max_people - $reservedPeople->number_of_people;
        } else {
          $resevablePeople = $event->max_people;
        }
        $isReservation = Reservation::where('user_id', '=', Auth::id())
            ->where('event_id', '=', $id)->where('canceled_date', '=', null)->latest()->first();
        return view('event-detail', compact('event', 'resevablePeople', 'isReservation'));
    }

    public function reserve(Request $request)
    {
        $event = Event::findOrFail($request->id); 
        $reservedPeople = DB::table('reservations')
            ->select('event_id', DB::raw('sum(number_of_people) as number_of_people'))
            ->whereNull('canceled_date')->groupBy('event_id')->having('event_id', $request->id )->first();
        // 現状の予約人数がない場合、若しくはイベントの定員数よりも現所の約人数とリクエストのあった予約人数が少ない場合
        if(is_null($reservedPeople) || $event->max_people >= $reservedPeople->number_of_people + $request->reserved_people) {
            Reservation::create([
                'user_id' => Auth::id(),
                'event_id' => $request->id,
                'number_of_people' => $request->reserved_people,
            ]);
            session()->flash('status', '予約が完了しました。');
            return view('dashboard');
        } else {
            session()->flash('status', '定員数を越えています。');
            return view('dashboard');
        }
    }
}

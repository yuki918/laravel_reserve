<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Http\Requests\StoreEventRequest;
use App\Http\Requests\UpdateEventRequest;
use App\Models\Event;
use App\Services\EventService;
use Carbon\Carbon;

class EventController extends Controller
{
    public function index()
    {
        $today = Carbon::today();
        $events = DB::table('events')->whereDate('start_date', '>=', $today)
                      ->orderBy('start_date', 'asc')->paginate(10);
        return view('manager.events.index', compact('events'));
    }

    public function create()
    {
        return view('manager.events.create');
    }

    public function store(StoreEventRequest $request)
    {
        $check = EventService::checkEventDuplication($request['event_date'], $request['start_time'], $request['end_time']);
        if($check) {
          session()->flash('status', 'この時間は既に登録済みです。');
          return view('manager.events.create');
        }

        $startDate = EventService::joinDateAndTime($request['event_date'], $request['start_time']);
        $endDate   = EventService::joinDateAndTime($request['event_date'], $request['end_time']);

        Event::create([
            'name' => $request['event_name'],
            'information' => $request['information'],
            'start_date' => $startDate,
            'end_date' => $endDate,
            'max_people' => $request['max_people'],
            'is_visible' => $request['is_visible'],
        ]);
        session()->flash('status', '登録が完了しました。');
        return to_route('events.index');
    }

    public function show(Event $event)
    {
        $event = Event::findOrFail($event->id);
        $eventDate = $event->eventDate;
        $startTime = $event->startTime;
        $endTime = $event->endTime;
        // dd($eventDate, $startTime, $endTime);
        return view('manager.events.show', compact(['event', 'eventDate', 'startTime', 'endTime', ]));
    }

    public function edit(Event $event)
    {
        $event = Event::findOrFail($event->id);
        $eventDate = $event->editEventDate;
        $startTime = $event->startTime;
        $endTime = $event->endTime;
        return view('manager.events.edit', compact(['event', 'eventDate', 'startTime', 'endTime', ]));
    }

    public function update(UpdateEventRequest $request, Event $event)
    {
        $event = Event::findOrFail($event->id);
        $check = EventService::countEventDuplication($request['event_date'], $request['start_time'], $request['end_time']);
        if($check > 1) {
          $eventDate = $event->editEventDate;
          $startTime = $event->startTime;
          $endTime = $event->endTime;
          session()->flash('status', 'この時間は既に登録済みです。');
          return view('manager.events.edit', compact(['event', 'eventDate', 'startTime', 'endTime', ]));
        }

        $startDate = EventService::joinDateAndTime($request['event_date'], $request['start_time']);
        $endDate   = EventService::joinDateAndTime($request['event_date'], $request['end_time']);

        $event->name = $request['event_name'];
        $event->information = $request['information'];
        $event->start_date = $startDate;
        $event->end_date = $endDate;
        $event->max_people = $request['max_people'];
        $event->is_visible = $request['is_visible'];
        $event->save();

        session()->flash('status', '情報が更新されました。');
        return to_route('events.index');
    }

    public function past()
    {
        $today = Carbon::today();
        $events = DB::table('events')->whereDate('start_date', '<', $today)
                      ->orderBy('start_date', 'desc')->paginate(10);
        return view('manager.events.past', compact('events'));
    }

    public function destroy(Event $event)
    {
        //
    }
}

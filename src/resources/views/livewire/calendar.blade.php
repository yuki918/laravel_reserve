<div>
    <div class="text-center text-sm">
      日付を選択してください。本日から最大30日先まで選択可能です。
    </div>
    <div class="flex justify-center mt-4">
      <input id="calendar" class="block mt-1 w-40 m-auto" 
              type="text" name="calendar" autofocus value="{{ $currentDate }}"
              wire:change="getDate($event.target.value)"/>
    </div>
    <div class="flex border mx-auto mt-4">
        <x-calendar-time />
        @for($i = 0; $i < 7; $i++)
          <div class="w-40">
            <div class="py-1 px-2 border border-gray-200 text-center">{{ $currentWeek[$i]['day'] }}</div>
            <div class="py-1 px-2 border border-gray-200 text-center">{{ $currentWeek[$i]['dayOfWeek'] }}</div>
            @for($j = 0; $j < 21; $j++)
              @if($events->isNotEmpty())
                @php $event = $events->firstWhere('start_date', $currentWeek[$i]['checkDay'] . " " . \EventConst::EVENT_TIME[$j]); @endphp
                @if(!is_null($event))
                  @php $eventPeriod = \Carbon\Carbon::parse($event->start_date)->diffInMinutes($event->end_date) / 30 - 1; @endphp
                  <div class="py-1 px-2 h-8 border border-gray-200 text-xs flex items-center justify-center bg-blue-100">
                    <a href="{{ route('events.detail', ['id' => $event->id]) }}" class="block">{{ $event->name }}</a>
                  </div>
                  @if ($eventPeriod > 0)
                    @for($k = 0; $k < $eventPeriod; $k++)
                      <div class="py-1 px-2 h-8 border border-gray-200 text-xs flex items-center justify-center bg-blue-100"></div>
                    @endfor
                    @php $j += $eventPeriod; @endphp
                  @endif
                @else
                  <div class="py-1 px-2 h-8 border border-gray-200"></div>
                @endif
              @else
                <div class="py-1 px-2 h-8 border border-gray-200"></div>
              @endif
            @endfor
          </div>
        @endfor
    </div>
</div>

<div>
  カレンダー
  <input id="calendar" class="block mt-1 w-full" 
          type="text" name="calendar" autofocus value="{{ $currentDate }}"
          wire:change="getDate($event.target.value)"/>
  {{ $currentDate }}
  @for($day = 0; $day < 7; $day++)
    {{ $currentWeek[$day] }}
  @endfor
  @foreach ($events as $event)
      {{ $event->start_date }}<br>
  @endforeach
</div>

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            イベント詳細
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
              <div class="container p-10 mx-auto">
                <div class="w-full mx-auto overflow-auto">
                    <x-jet-validation-errors class="mb-4" />
                    @if (session('status'))
                        <div class="mb-4 font-medium text-sm text-green-600">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('events.reserve', ['id' => $event->id]) }}">
                        @csrf
                        <div>
                            <x-jet-label for="event_name" value="イベント名" />
                            <div class="">{{ $event->name }}</div>
                        </div>
                        <div class="mt-4">
                            <x-jet-label for="information" value="イベント詳細" />
                            <div class="">{!! nl2br(e($event->information)) !!}</div>
                        </div>
                        <div class="mt-4">
                            <x-jet-label for="start_time" value="イベント日付" />
                            <div class="">{{ $event->eventDate }}</div>
                        </div>
                        <div class="mt-4">
                            <x-jet-label for="start_time" value="開始時間" />
                            <div class="">{{ $event->start_time }}</div>
                        </div>
                        <div class="mt-4">
                            <x-jet-label for="end_time" value="終了時間" />
                            <div class="">{{ $event->end_time }}</div>
                        </div>
                        <div class="mt-4">
                            <x-jet-label for="max_people" value="定員数" />
                            <div class="">{{ $event->max_people }}人</div>
                        </div>
                        <div class="mt-4">
                            <x-jet-label for="reserved_people" value="予約人数" />
                            @if ($resevablePeople <= 0)
                                満員です。
                            @else
                              <select name="reserved_people" id="reserved_people">
                                @for($i = 1; $i <= $resevablePeople; $i++)
                                  <option value="{{$i}}">{{$i}}人</option>
                                @endfor
                              </select>
                            @endif
                        </div>
                        <input type="hidden" name="id" value="{{ $event->id }}">
                        @if ($isReservation === null)
                            @if ($resevablePeople > 0)
                              <x-jet-button class="mt-4">
                                  予約
                              </x-jet-button>
                            @endif
                        @else
                            <p class="mt-4">このイベントは既に予約済みです。</p>
                        @endif
                    </form>
                </div>
              </div>
            </div>
        </div>
    </div>
</x-app-layout>

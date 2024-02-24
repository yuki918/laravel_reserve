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

                    <form method="GET" action="{{ route('events.edit', ['event' => $event->id]) }}">
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
                            <x-jet-label for="" value="表示設定" />
                            <div class="">
                              @if ($event->is_visible)
                                  表示
                              @else
                                  非表示
                              @endif
                            </div>
                        </div>
                        @if ($event->eventDate >= \Carbon\Carbon::today()->format('Y年m月d日'))
                            <div class="flex items-center justify-end mt-4">
                                <x-jet-button class="ml-4">
                                    編集
                                </x-jet-button>
                            </div>
                        @endif
                    </form>
                </div>
              </div>
            </div>
        </div>
    </div>
</x-app-layout>

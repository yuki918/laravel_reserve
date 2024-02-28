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
                        <x-jet-label for="end_time" value="定員数" />
                        <div class="">{{ $event->max_people }}人</div>
                    </div>
                    <div class="mt-4">
                        <x-jet-label for="max_people" value="予約人数" />
                        <div class="">{{ $reservation->number_of_people }}人</div>
                    </div>
                    @if ($event->eventDate >= \Carbon\Carbon::today()->format('Y年m月d日'))
                      <form method="post" id="cancel_{{ $event->id }}" action="{{ route('mypage.cancel', ['id' => $event->id]) }}">
                        @csrf
                        <div class="flex items-center justify-end mt-4">
                          <a data-id="{{ $event->id }}" onclick="cancelPost(this)" class="mt-4 inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition">キャンセル</a>
                        </div>
                      </form>
                    @endif
                </div>
              </div>
            </div>
        </div>
    </div>
    <script>
      function cancelPost(e) {
        'use strict';
        if(confirm('本当にキャンセルしてもよろしいですか？')) {
          document.getElementById('cancel_' + e.dataset.id).submit();
        }
      }
      </script> 
</x-app-layout>

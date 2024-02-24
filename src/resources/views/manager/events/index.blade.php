<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            今日以降のイベント一覧
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
              <section class="text-gray-600 body-font">
                <div class="container p-10 mx-auto">
                  @if (session('status'))
                      <div class="mb-4 font-medium text-sm text-green-600">
                          {{ session('status') }}
                      </div>
                  @endif
                  <div class="w-full mx-auto overflow-auto">
                    <div class="flex gap-4">
                      <button onclick="location.href='{{ route('events.past') }}'" class="flex text-white bg-indigo-500 border-0 py-2 px-6 focus:outline-none hover:bg-indigo-600 rounded">過去のイベント一覧</button>
                      <button onclick="location.href='{{ route('events.create') }}'" class="flex text-white bg-indigo-500 border-0 py-2 px-6 focus:outline-none hover:bg-indigo-600 rounded">新規登録</button>
                    </div>
                    <table class="mt-8 table-auto w-full text-left whitespace-no-wrap">
                      <thead>
                        <tr>
                          <th class="border-2 text-center text-bold px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">イベント名</th>
                          <th class="border-2 text-center text-bold px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">開始日時</th>
                          <th class="border-2 text-center text-bold px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">終了日時</th>
                          <th class="border-2 text-center text-bold px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">予約人数</th>
                          <th class="border-2 text-center text-bold px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">定員数</th>
                          <th class="border-2 text-center text-bold px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">表示・非表示</th>
                          <th class="border-2 text-center text-bold px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">詳細</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($events as $event)
                          <tr>
                            <td class="px-4 py-3 border-2">{{ $event->name }}</td>
                            <td class="px-4 py-3 border-2">{{ $event->start_date }}</td>
                            <td class="px-4 py-3 border-2">{{ $event->end_date }}</td>
                            <td class="px-4 py-3 border-2">
                              @if(is_null($event->number_of_people))
                                  0
                              @else
                                  {{ $event->number_of_people }}
                              @endif
                            </td>
                            <td class="px-4 py-3 border-2">{{ $event->max_people }}</td>
                            <td class="px-4 py-3 border-2">
                              @if ($event->is_visible === 1)
                                  表示中
                              @else
                                  非表示
                              @endif
                            </td>
                            <td class="px-4 py-3 border-2"><a href="{{ route('events.show', ['event' => $event->id]) }}" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition">詳細</a></td>
                          </tr>
                        @endforeach
                      </tbody>
                    </table>
                    <div class="mt-8">{{ $events->links() }}</div>
                  </div>
                </div>
              </section>
            </div>
        </div>
    </div>
</x-app-layout>

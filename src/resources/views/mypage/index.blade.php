<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            予約済みのイベント一覧
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
                  <h2>今日以降の予約一覧</h2>
                  <div class="w-full mx-auto overflow-auto">
                    <table class="mt-8 table-auto w-full text-left whitespace-no-wrap">
                      <thead>
                        <tr>
                          <th class="border-2 text-center text-bold px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">イベント名</th>
                          <th class="border-2 text-center text-bold px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">開始日時</th>
                          <th class="border-2 text-center text-bold px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">終了日時</th>
                          <th class="border-2 text-center text-bold px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">定員数</th>
                          <th class="border-2 text-center text-bold px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">予約人数</th>
                          <th class="border-2 text-center text-bold px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">詳細</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($fromTodayEvents as $event)
                          <tr>
                            <td class="px-4 py-3 border-2">{{ $event['name'] }}</td>
                            <td class="px-4 py-3 border-2">{{ $event['start_date'] }}</td>
                            <td class="px-4 py-3 border-2">{{ $event['end_date'] }}</td>
                            <td class="px-4 py-3 border-2">{{ $event['max_people'] }}</td>
                            <td class="px-4 py-3 border-2">{{ $event['number_of_people'] }}</td>
                            <td class="px-4 py-3 border-2"><a href="{{ route('mypage.show', ['id' => $event['id']]) }}" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition">詳細</a></td>
                          </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div>
                </div>
              </section>
            </div>
        </div>
    </div>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
              <section class="text-gray-600 body-font">
                <div class="container p-10 mx-auto">
                  <div class="w-full mx-auto overflow-auto">
                    <h2>過去の予約一覧</h2>
                    <table class="mt-8 table-auto w-full text-left whitespace-no-wrap">
                      <thead>
                        <tr>
                          <th class="border-2 text-center text-bold px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">イベント名</th>
                          <th class="border-2 text-center text-bold px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">開始日時</th>
                          <th class="border-2 text-center text-bold px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">終了日時</th>
                          <th class="border-2 text-center text-bold px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">定員数</th>
                          <th class="border-2 text-center text-bold px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">予約人数</th>
                          <th class="border-2 text-center text-bold px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">詳細</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($pastEvents as $event)
                          <tr>
                            <td class="px-4 py-3 border-2">{{ $event['name'] }}</td>
                            <td class="px-4 py-3 border-2">{{ $event['start_date'] }}</td>
                            <td class="px-4 py-3 border-2">{{ $event['end_date'] }}</td>
                            <td class="px-4 py-3 border-2">{{ $event['max_people'] }}</td>
                            <td class="px-4 py-3 border-2">{{ $event['number_of_people'] }}</td>
                            <td class="px-4 py-3 border-2"><a href="{{ route('mypage.show', ['id' => $event['id']]) }}" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition">詳細</a></td>
                          </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div>
                </div>
              </section>
            </div>
        </div>
    </div>
</x-app-layout>

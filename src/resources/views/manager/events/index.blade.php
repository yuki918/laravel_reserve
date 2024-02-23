<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
              <section class="text-gray-600 body-font">
                <div class="container p-10 mx-auto">
                  <div class="w-full mx-auto overflow-auto">
                    <table class="table-auto w-full text-left whitespace-no-wrap">
                      <thead>
                        <tr>
                          <th class="border-2 text-center text-bold px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">イベント名</th>
                          <th class="border-2 text-center text-bold px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">開始日時</th>
                          <th class="border-2 text-center text-bold px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">終了日時</th>
                          <th class="border-2 text-center text-bold px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">予約人数</th>
                          <th class="border-2 text-center text-bold px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">定員数</th>
                          <th class="border-2 text-center text-bold px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">表示・非表示</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($events as $event)
                          <tr>
                            <td class="px-4 py-3 border-2">{{ $event->name }}</td>
                            <td class="px-4 py-3 border-2">{{ $event->start_date }}</td>
                            <td class="px-4 py-3 border-2">{{ $event->end_date }}</td>
                            <td class="px-4 py-3 border-2">後ほど</td>
                            <td class="px-4 py-3 border-2">{{ $event->max_people }}</td>
                            <td class="px-4 py-3 border-2">{{ $event->is_visible }}</td>
                          </tr>
                        @endforeach
                      </tbody>
                    </table>
                    <div class="mt-4">{{ $events->links() }}</div>
                  </div>
                  {{-- <div class="flex pl-4 mt-4 lg:w-2/3 w-full mx-auto">
                    <a class="text-indigo-500 inline-flex items-center md:mb-2 lg:mb-0">Learn More
                      <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-4 h-4 ml-2" viewBox="0 0 24 24">
                        <path d="M5 12h14M12 5l7 7-7 7"></path>
                      </svg>
                    </a>
                    <button class="flex ml-auto text-white bg-indigo-500 border-0 py-2 px-6 focus:outline-none hover:bg-indigo-600 rounded">Button</button>
                  </div> --}}
                </div>
              </section>
            </div>
        </div>
    </div>
</x-app-layout>

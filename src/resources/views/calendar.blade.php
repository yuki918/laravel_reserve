<x-calendar-layout>
  <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          イベントカレンダー
      </h2>
  </x-slot>

  <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
          <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
            <div class="container p-10 mx-auto">
              <div class="w-full mx-auto overflow-auto">
                @livewire('calendar')
              </div>
            </div>
          </div>
      </div>
  </div>
</x-calendar-layout>

<div style="text-align: center">
  <button wire:click="increment">+</button>
  <h1>{{ $count }}</h1>
  <hr class="mt-8">
  <h1>こんにちは {{ $name }} さん!</h1>
  <div class="mt-2"><input wire:model="name" type="text"></div>
  {{-- <div class="mt-2"><input wire:model.debounce.2000ms="name" type="text"></div> --}}
  {{-- <div class="mt-2"><input wire:model.lazy="name" type="text"></div> --}}
  {{-- <div class="mt-2"><input wire:model.defer="name" type="text"></div> --}}
  <button wire:mouseOver="mouseOver">マウスを合わせる</button>
</div>
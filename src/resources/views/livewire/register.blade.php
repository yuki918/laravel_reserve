<div>
    <form wire:submit.prevent="register">
      <div>
        <label for="name">お名前</label>
        <input type="text"  wire:model.lazy="name" id="name"><br>
        @error('name') <span class="text-red-500 font-bold">{{ $message }} </span> @enderror 
      </div>
      <div class="mt-8">
        <label for="email">メールアドレス</label>
        <input type="email"  wire:model.lazy="email" id="email"><br>
        @error('email') <span class="text-red-500 font-bold">{{ $message }} </span> @enderror 
      </div>
      <div class="mt-8">
        <label for="password">パスワード</label>
        <input type="password"  wire:model.lazy="password" id="password"><br>
        @error('password') <span class="text-red-500 font-bold">{{ $message }} </span> @enderror 
      </div>
      <button>登録する</button>
    </form>
</div>

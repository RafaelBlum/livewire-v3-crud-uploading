<div class="min-w-0 p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">

    @if(session('success'))
        <h4 class="mb-4 text-lg font-semibold text-gray-600 dark:text-gray-300">
            {{session('success')}}
        </h4>
    @else
        <h4 class="mb-4 font-semibold text-gray-800 dark:text-gray-300">
            Form create user
        </h4>
    @endif
    {{-- WIRE SUBMIT --}}
    <form wire:submit="save">
        @if (session('status'))
            <div class="min-w-0 p-3 mb-2 text-white text-sm bg-green-600 rounded-lg shadow-xs">
                {{ session('status') }}
            </div>
        @endif

        {{-- WIRE NAME --}}
        <label class="text-sm w-full">
            <span class="text-gray-700 dark:text-gray-400">Name</span>
            <input wire:model.lazy="name" class="w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                   placeholder="Informe nome"/>
            <div class="text-red-500">
                @error('name') <span class="error">{{ $message }}</span> @enderror
            </div>
        </label>

        {{-- WIRE EMAIL --}}
        <label class="mt-4 text-sm w-full">
            <span class="text-gray-700 dark:text-gray-400">E-mail</span>
            <input wire:model.live="email" class="w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                   placeholder="Email"/>
            <div class="text-red-500">
                @error('email') <span class="error">{{ $message }}</span> @enderror
            </div>
        </label>

        <div class="grid grid-cols-2 gap-4">
            {{-- WIRE PASSWORD --}}
            <label class="mt-4 text-sm w-full">
                <span class="text-gray-700 dark:text-gray-400">Senha</span>
                <input wire:model.live="password" class="w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                       placeholder="Senha"
                       type="password"/>
                <div class="text-red-500">
                    @error('password') <span class="error">{{ $message }}</span> @enderror
                </div>
            </label>

            {{-- IMAGE --}}
            <label for="prd-img" class="mt-4 block text-sm">
                <span class="text-gray-700 dark:text-gray-400">Image</span>
                <div class="flex justify-center align-middle">
                    <input class="lock w-full mt-1 text-sm dark:text-gray-800 dark:border-gray-600 dark:bg-gray-700 shadow-sm rounded-md focus:z-10 focus:border-blue-500 focus:ring-blue-500 dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400 file:bg-transparent file:border-0 file:bg-gray-100 file:mr-4 file:py-3 file:px-4 dark:focus:shadow-outline-gray dark:file:text-gray-400"
                           wire:model="image"
                           type="file"
                           id="prd-img">
                </div>
                <div class="text-red-500">
                    @error('image') <span class="error">{{ $message }}</span> @enderror
                </div>
            </label>
        </div>



        <div class="flex justify-center mt-4 text-sm">
            <button wire:confirm.prompt="Você quer realmente criar o usuário? \n Para confirmar  digite CONFIRME to confirm |CONFIRM" type="submit" class="flex w-full items-center justify-between px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                <span>Criar usuário</span>
                <i class="text-2xl ri-save-line"></i>
            </button>
            <div class="flex justify-between text-sm ml-2">
                <img class="object-cover border border-transparent rounded-lg" src="{{(isset($image) ? $image->temporaryUrl() : '/storage/default.jpg')}}" alt="" width="50"/>
            </div>
        </div>
    </form>
</div>

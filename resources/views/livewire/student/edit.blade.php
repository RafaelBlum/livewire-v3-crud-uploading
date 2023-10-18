{{-- WIRE SUBMIT --}}
<form wire:submit="update" class="px-4 py-3 mb-8 bg-white rounded-lg dark:bg-gray-800">

    {{-- MESSAGE STATUS --}}
    @if (session('status'))
        <div class="min-w-0 p-3 mb-2 text-white text-sm bg-green-600 rounded-lg shadow-xs">

        </div>
        <div id="toast-success" class="flex items-center w-full p-4 mb-4 text-gray-300 bg-white rounded-lg shadow dark:text-gray-400 dark:bg-gray-700" role="alert">
            <div class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-green-500 bg-green-100 rounded-lg dark:bg-green-800 dark:text-green-200">
                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z"/>
                </svg>
                <span class="sr-only">Check icon</span>
            </div>
            <div class="ml-3 text-sm font-normal">{{ session('status') }}</div>
            <button type="button" class="ml-auto -mx-1.5 -my-1.5 bg-white text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex items-center justify-center h-8 w-8 dark:text-gray-500 dark:hover:text-white dark:bg-gray-700 dark:hover:bg-gray-700" data-dismiss-target="#toast-success" aria-label="Close">
                <span class="sr-only">Close</span>
                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                </svg>
            </button>
        </div>
    @endif

    {{-- WIRE NAME --}}
    <label class="block text-sm">
        <span class="text-gray-700 dark:text-gray-400">Name</span>
        <input wire:model.live="form.name" class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
               placeholder="Informe nome"/>
        <div class="text-red-500">
            @error('form.name') <span class="error">{{ $message }}</span> @enderror
        </div>
    </label>

    {{-- WIRE EMAIL --}}
    <label class="mt-4 block text-sm">
        <span class="text-gray-700 dark:text-gray-400">E-mail</span>
        <input wire:model.live="form.email" class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
               placeholder="Email"/>
        <div class="text-red-500">
            @error('form.email') <span class="error">{{ $message }}</span> @enderror
        </div>
    </label>

    {{-- IMAGE --}}
    <label for="prd-img" class="mt-4 block text-sm">
        <div wire:loading wire:target="form.image" class="w-full min-w-0 p-2 mb-2 text-white text-sm bg-purple-600 rounded-lg shadow-xs">
            baixando image...
        </div>
        @if($form->image)
            <div class="text-gray-700 dark:text-green-400 mb-2">Imagem seleciona com sucesso! </div>
        @else
            <div class="text-gray-700 dark:text-gray-400 mb-2">Escolha sua imagem</div>
        @endif


        <div x-data="{ uploading: false, progress: 0}"
             x-on:livewire-upload-start="uploading = true"
             x-on:livewire-upload-finish="uploading = false"
             x-on:livewire-upload-error="uploading = false"
             x-on:livewire-upload-progress="progress = $event.detail.progress">

            {{-- INPUT IMAGE --}}
            <div class="flex justify-center align-middle">
                @if($form->image == null )
                    <img class="object-cover rounded-full mr-2" src="{{ ($student->image == 'storage/default.jpg' ? asset($student->image) : asset('storage/'.$student->image)) }}" alt="{{$student->name}}"
                         width="50px" loading="lazy"/>
                @else
                    <img class="p-1 rounded-full ring-2 ring-gray-300 dark:ring-green-400 object-cover mr-2" src="{{$form->image->temporaryUrl()}}"
                         alt="" width="50" loading="lazy"/>
                @endif


                <input class="lock w-full ml-2 mt-1 text-sm dark:text-gray-800 dark:border-gray-600 dark:bg-gray-700 shadow-sm rounded-md focus:z-10 focus:border-blue-500 focus:ring-blue-500 dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400 file:bg-transparent file:border-0 file:bg-gray-100 file:mr-4 file:py-3 file:px-4 dark:focus:shadow-outline-gray dark:file:text-gray-400"
                       wire:model.live="form.image"
                       type="file"
                       id="prd-img">
            </div>

            <div class="m-8" x-show="uploading" class="h-1 w-full bg-neutral-200 dark:bg-neutral-600 bg-red-600">
                <progress class="h-4 bg-red-600" max="100" x-bind:value="progress" style="width: 100%"></progress>
            </div>

        </div>

        <div class="text-red-500 mt-2">
            @error('image') <span class="error">{{ $message }}</span> @enderror
        </div>
    </label>

    <div class="grid grid-cols-2 gap-4">
        {{-- DISCIPLINA --}}
        <label class="block mt-4 text-sm">
        <span class="text-gray-700 dark:text-gray-400">
          Disciplina
        </span>
            <select wire:model.live="class_id" id="class_id" class="block w-full mt-1 text-sm dark:text-gray-300 text-gray-800 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray">
                <option value="">Selecione a disciplina</option>
                @foreach ($classes as $class)
                    <option value="{{ $class->id }}">
                        {{ $class->name }}
                    </option>
                @endforeach
            </select>
            <div class="text-red-500">
                @error('class_id') <span class="error">{{ $message }}</span> @enderror
            </div>
        </label>

        {{-- TURMA --}}
        <label class="block mt-4 text-sm">
        <span class="text-gray-700 dark:text-gray-400">
          Turma
        </span>
            <select wire:model.live="form.section_id" id="section_id" class="block w-full mt-1 text-sm dark:text-gray-300 text-gray-800 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray">
                <option value="">Selecione a turma</option>
                @foreach ($sections as $section)
                    <option value="{{ $section->id }}">
                        {{ $section->name }} - {{ $section->class->name }}
                    </option>
                @endforeach
            </select>
            <div class="text-red-500">
                @error('form.section_id') <span class="error">{{ $message }}</span> @enderror
            </div>
        </label>

{{--        @if($image)--}}
{{--            <div class="flex justify-between mt-4 text-sm">--}}
{{--                <img class="object-cover rounded-full" src="{{$image}}" alt="" width="120"/>--}}
{{--            </div>--}}
{{--        @endif--}}
    </div>

    {{-- MESSAGE UPDATING --}}
    <div wire:loading wire:target="update" class="w-full py-2.5 px-5 mt-4 mr-2 text-sm font-medium text-gray-900 bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700 items-center">
        <svg aria-hidden="true" role="status" class="inline w-4 h-4 mr-3 text-gray-200 animate-spin dark:text-gray-600" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="currentColor"/>
            <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="#1C64F2"/>
        </svg>
        Analisando a atualização solicitada...
    </div>

    <div class="flex justify-between mt-4 text-sm" wire:loading.remove>
        <a href="{{ route('students.index') }}" class="flex items-center justify-between px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
            <span>Cancelar</span>
            <svg class="w-4 h-4 ml-2 -mr-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M12.0007 10.5865L16.9504 5.63672L18.3646 7.05093L13.4149 12.0007L18.3646 16.9504L16.9504 18.3646L12.0007 13.4149L7.05093 18.3646L5.63672 16.9504L10.5865 12.0007L5.63672 7.05093L7.05093 5.63672L12.0007 10.5865Z"></path></svg>
        </a>
        <button type="submit" class="flex items-center justify-between px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
            <span>Editar</span>
            <svg class="w-4 h-4 ml-2 -mr-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M5 5V19H19V7.82843L16.1716 5H5ZM4 3H17L20.7071 6.70711C20.8946 6.89464 21 7.149 21 7.41421V20C21 20.5523 20.5523 21 20 21H4C3.44772 21 3 20.5523 3 20V4C3 3.44772 3.44772 3 4 3ZM12 18C10.3431 18 9 16.6569 9 15C9 13.3431 10.3431 12 12 12C13.6569 12 15 13.3431 15 15C15 16.6569 13.6569 18 12 18ZM6 6H15V10H6V6Z"></path></svg>
        </button>
    </div>
</form>

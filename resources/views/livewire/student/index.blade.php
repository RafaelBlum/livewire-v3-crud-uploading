<div class="mb-6">
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

    {{-- TABLE STUDENTS --}}
    <div class="w-full overflow-hidden rounded-lg shadow-xs">
        <div class="w-full overflow-x-auto">
            <table class="w-full whitespace-no-wrap">
                <thead>
                    <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                        <th class="px-4 py-3">Aluno</th>
                        <th class="px-4 py-3">Disciplina</th>
                        <th class="px-4 py-3">Turma</th>
                        <th class="px-4 py-3">Data</th>
                        <th class="px-4 py-3">Ações</th>
                    </tr>
                </thead>

                <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                    <label class="block mb-2 text-sm">
                        <span class="text-gray-700 dark:text-gray-400">
                            Estudantes
                        </span>
                        <div class="relative text-gray-500 focus-within:text-purple-600">

                        {{-- SEARCH STUDENT --}}
                        <input wire:model.live="search" class="block w-full pr-20 mt-1 text-sm text-black dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray form-input"
                            placeholder="buscar aqui..."
                            name="search"/>

                            <button wire:click="$set('search', '')" class="absolute inset-y-0 right-0 px-4 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-r-md active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                                @if($search) <i class="ri-brush-line"></i> Limpar @else <i class='ri-search-line'></i> Pesquisar @endif
                            </button>
                        </div>
                    </label>

                    {{-- LIST STUDENTS --}}
                    @foreach($students as $student)
                        <tr class="text-gray-700 dark:text-gray-400">
                            <td class="px-4 py-3">
                                <div class="flex items-center text-sm">

                                    {{-- AVATAR IMAGE --}}
                                    <div class="relative hidden w-8 h-8 mr-3 rounded-full md:block">
                                        @if($student->image != 'storage/default.jpg')
                                            <img class="object-cover w-full h-full rounded-full" src="{{ asset('storage/' . $student->image) }}" alt=""
                                                 width="60px" loading="lazy"/>
                                        @else
                                            <img class="object-cover w-full h-full rounded-full" src="/storage/default.jpg" alt="" loading="lazy"/>
                                        @endif
                                        <div class="absolute inset-0 rounded-full shadow-inner" aria-hidden="true"></div>
                                    </div>
                                    <div>
                                        {{-- NAME/EMAIL --}}
                                        <p class="font-semibold text-md">
                                            {{$student->name}}
                                        </p>
                                        <p class="text-xs text-gray-600 dark:text-gray-400">
                                            {{$student->email}}
                                        </p>
                                    </div>
                                </div>
                            </td>

                            {{-- DISCIPLINA --}}
                            <td class="px-4 py-3 text-sm">
                                {{$student->class->name}}
                            </td>

                            {{-- TURMA --}}
                            <td class="px-4 py-3 text-xs">
                                <span class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-full dark:bg-green-700 dark:text-green-100">
                                  {{$student->section->name}}
                                </span>
                            </td>

                            {{-- CREATE DATE --}}
                            <td class="px-4 py-3 text-sm">
                                {{date('d-m-Y', strtotime($student->created_at))}}
                            </td>

                            {{-- ACTINOS --}}
                            <td class="px-4 py-3">
                                <div class="flex items-center space-x-4 text-sm">

                                    {{-- EDIT --}}
                                    <a href="{{route("students.edit", $student->id)}}" class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray" aria-label="Edit">
                                        <i class="ri-edit-2-fill text-2xl"></i>
                                    </a>

                                    {{-- MESSAGE LOADING --}}
                                    <div wire:loading wire:target="delete({{$student}})">
                                        <svg aria-hidden="true" role="status" class="inline w-4 h-4 mr-3 text-gray-200 animate-spin dark:text-gray-600" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="currentColor"/>
                                            <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="#1C64F2"/>
                                        </svg>
                                    </div>

                                    {{-- DELETE --}}
                                    <button class="flex items-center justify-between px-1 py-1 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray" aria-label="Delete"
                                            wire:confirm="Deseja excluir o aluno {{$student->name}}"
                                            wire:click="delete({{$student}})"
                                            wire:loading.attr="disabled">
                                        <i class="ri-delete-bin-5-line text-2xl"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        {{-- FOOTER PAGINATOR --}}
        {{$students->links('livewire/utilities/paginator')}}

    </div>
</div>
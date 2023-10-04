<div>
    {{-- TITLE PRODUCTS --}}
    <h4 class="mb-4 mt-3 text-lg font-semibold text-gray-600 dark:text-gray-300">
        Produtos
    </h4>
    <div class="w-full overflow-hidden rounded-lg shadow-xs">
        <div class="w-full overflow-x-auto">

            {{-- TABLE PRODUCTS --}}
            <table class="w-full whitespace-no-wrap">
                <thead>
                <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                    <th class="px-4 py-3">Produto</th>
                    <th class="px-4 py-3">Valor</th>
                    <th class="px-4 py-3">Data</th>
                    <th class="px-4 py-3">Ações</th>
                </tr>
                </thead>
                <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">

                {{-- SEARCH PRODUCTS --}}
                <label class="block mb-2 text-sm">
                    <span class="text-gray-700 dark:text-gray-400">
                        Produtos
                    </span>
                    <div class="relative text-gray-500 focus-within:text-purple-600">
                        <input  wire:model.live="search" class="block w-full pr-20 mt-1 text-sm text-black dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray form-input"
                                placeholder="buscar aqui..."
                                name="search"/>
                        <button wire:click="$set('search', '')" class="absolute inset-y-0 right-0 px-4 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-r-md active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                            @if($search) <i class="ri-brush-line"></i> Limpar @else <i class='ri-search-line'></i> Pesquisar @endif
                        </button>
                    </div>
                </label>

                @foreach($products as $product)
                    <tr class="text-gray-700 dark:text-gray-400">

                        {{-- DETAILS NAME/DATE PRODUCT --}}
                        <td class="px-4 py-3">
                            <div>
                                <p class="font-semibold">
                                    {{$product->product}}
                                </p>
                                <p class="text-xs text-gray-600 dark:text-gray-400">
                                    {{date('d-m-Y', strtotime($product->created_at))}}
                                </p>
                            </div>
                        </td>

                        {{-- DETAILS PRICE FORMAT PRODUCT --}}
                        <td class="px-4 py-3 text-sm">
                            R$ {{number_format($product->price, 2, '.', ',')}}
                        </td>

                        {{-- DETAILS IMAGE PRODUCT --}}
                        <td class="px-4 py-3 text-sm">
                            <div class="relative hidden w-16 h-16 mr-3 rounded-full md:block">
                                @if(\Illuminate\Support\Facades\Storage::disk('public')->exists($product->image))
                                    <img class="object-cover w-full h-full rounded-md" src="/storage/{{$product->image}}" alt=""
                                         width="180px" loading="lazy"/>
                                @else
                                    <img class="object-cover w-full h-full rounded-full" src="/storage/default.jpg" alt="" loading="lazy"/>
                                @endif
                                <div class="absolute inset-0 rounded-full shadow-inner" aria-hidden="true"></div>
                            </div>
                        </td>

                        {{-- DETAILS ACTIONS PRODUCT --}}
                        <td class="px-4 py-3">
                            <div class="flex items-center space-x-4 text-sm">

                                {{-- EDIT PRODUCT --}}
                                <button class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray" aria-label="Edit">
                                    <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z"></path>
                                    </svg>
                                </button>

                                {{-- DELETE PRODUCT --}}
                                <a wire:click="delete({{$product->id}})" class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray" aria-label="Delete">
                                    <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                                    </svg>
                                </a>
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>

        {{-- FOOTER TABLE LIST --}}
        <div class="grid px-4 py-3 text-xs font-semibold tracking-wide text-gray-500 uppercase border-t dark:border-gray-700 bg-gray-50 sm:grid-cols-9 dark:text-gray-400 dark:bg-gray-800">
                <span class="flex items-center col-span-3">
                  Showing 21-30 of 100
                </span>
            <span class="col-span-2"></span>
            <!-- Pagination -->
            <span class="flex col-span-4 mt-2 sm:mt-auto sm:justify-end">
                  <nav aria-label="Table navigation">
                    <ul class="inline-flex items-center">
                      <li>
                        <button class="px-3 py-1 rounded-md rounded-l-lg focus:outline-none focus:shadow-outline-purple" aria-label="Previous">
                          <svg class="w-4 h-4 fill-current" aria-hidden="true" viewBox="0 0 20 20">
                            <path d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd" fill-rule="evenodd"></path>
                          </svg>
                        </button>
                      </li>
                      <li>
                          {{$products->links()}}

                      </li>
                      <li>
                        <button class="px-3 py-1 rounded-md rounded-r-lg focus:outline-none focus:shadow-outline-purple" aria-label="Next">
                          <svg class="w-4 h-4 fill-current" aria-hidden="true" viewBox="0 0 20 20">
                            <path d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" fill-rule="evenodd"></path>
                          </svg>
                        </button>
                      </li>
                    </ul>
                  </nav>
                </span>
        </div>
    </div>
</div>

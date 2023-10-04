<div  class="text-white flex flex-col">
    <title></title>
    <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
        <p class="text-lg text-white dark:text-gray-400" wire:stream="winner">
            {{($winner != null ?
                ($winner == 'Rafael Fernando Goulart Blum' ?
                    "Ai carai!!!! " . $winner . "!!!" :
                    "O vencedor foi " . $winner . "!!!")
                : 'Inicie o sorteio dos estudantes')}}
        </p>


    </div>

    <button wire:click="run" class="px-10 py-4 font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
        Iniciar sorteio {{$git}}
    </button>
</div>

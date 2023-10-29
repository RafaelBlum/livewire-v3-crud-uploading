<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
	<a href="#"  target="_blank" title="calculadora com livewire">
		<img src="public/images/gif-todo-3.gif" alt="Todo list with livewire" width="100%">
	</a>
</p>

<p align="center">
	<img src="https://img.shields.io/badge/version project-2.0-brightgreen" alt="version project todo">
    <img src="https://img.shields.io/badge/Php-8.2-informational&color=brightgreen" alt="stack project">
    <img src="https://img.shields.io/static/v1?label=Laravel&message=10.10&color=brightgreen?style=for-the-badge" alt="stack project">
    <img src="https://img.shields.io/static/v1?label=Livewire&message=3.0.1&color=brightgreen?style=for-the-badge" alt="stack project">
	<a href="https://opensource.org/licenses/GPL-3.0">
		<img src="https://img.shields.io/badge/license-MIT-blue.svg" alt="GPLv3 License">
	</a>
</p>
<p align="center">
    <img src="https://img.shields.io/static/v1?label=Tailwindcss&message=3.3.3&color=brightgreen?style=for-the-badge" alt="stack project">
    <img src="https://img.shields.io/static/v1?label=AlpineJs&message=2.8.2&color=brightgreen?style=for-the-badge" alt="stack project">
    <img src="https://img.shields.io/static/v1?label=Remixicon&message=2.5.0&color=brightgreen?style=for-the-badge" alt="stack project">
</p>


# 🚀 [Livewire 3.0 - CRUD and uploading image](#) 

### Objetivo do projeto

Demonstrar o poder do `livewire` na `versão 3.0` com a criação de `CRUD` de `produto`, `estudante` e `users`, juntamente com o `uploading de imagens`.
E inclui um `sorteio ramdomico` de estudantes, `graficos com chartJS`, e `adaptação de layout administrativo` para o projeto trabalhando as views 
com partials, layouts e `skeletons de loadings`.


###  Tecnologias (serviços externos, libs, frameworks, hospedagem etc.) e instalações.

- 🧩 <a href="#" target="_blank">Php `8.2`</a>
- 🧩 <a href="#" target="_blank">Laravel `10.10`</a> [Projeto laravel] composer create-project laravel/laravel name-project
- 🧩 <a href="#" target="_blank">Livewire `3.0`</a> [Livewire] composer require livewire/livewire
- 🧩 <a href="#" target="_blank">laravel debugbar `3.8`</a> [Debugbar] composer require barryvdh/laravel-debugbar --dev
- 🧩 <a href="#" target="_blank">Remixicon `2.5.0`</a> [Docs](https://remixicon.com/)
- 🧩 <a href="#" target="_blank">Tailwindcss `3.3.3`</a> [Install](https://tailwindcss.com/docs/guides/laravel) npm install -D tailwindcss postcss autoprefixer
- 🧩 <a href="#" target="_blank">Flowbite `1.8.1`</a> [cdn Install](https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.8.1/flowbite.min.css)
- 🧩 <a href="#" target="_blank">ChartJS `4.4.0`</a> [cdn Install](https://cdn.jsdelivr.net/npm/chart.js)

## :construction: Desenvolvimento das camadas de componentes
- `php artisan livewire:make gallery.create ` [Component's gallery Product] 
- `php artisan livewire:make gallery.edit `
- `php artisan livewire:make gallery.index `
- `php artisan livewire:make student.create ` [Component's student Student] 
- `php artisan livewire:make student.edit `
- `php artisan livewire:make student.index `
- `php artisan livewire:make users.create ` [Component's users Users] 
- `php artisan livewire:make users.edit `
- `php artisan livewire:make users.index `
- `php artisan livewire:make raffle.sortition ` [Component's raffle Sortition] 
- `php artisan livewire:make adm.painel-button ` [Component's adm Painel-button] 


## Desenvolvimento (Frontend layout e lógica)


| Classe | Explicação table |
| :---         |     :---      |
| `validate(['title' => ['required', 'min:3']]` | * Validação de criação e mensagens personalizadas de cada tipo* |
| `$this->emitTo` | *EmitTo é uma função que avisa um componente de alguma atividade realizada e apartir disso podemos por exemplo, realizar `refresh`* |



## Description title
 
- Session
    - `comandos...` [descriptons] | _descriptons..._.


- Session
    - subsession
~~~~~~description
    Code description
~~~~~~


## :label: Exemplo `Atividades de aluno`

- Introduction
- install and setup Laravel/Livewire and Breeze
- Setup Models/Migrations/Factories/Seeders
- Work On Index/Create page UI
- Display Students Data and Implement Pagination
- Implement Hot Reloads for Livewire Components
- Work On the Create Form
- Implement Validations
- Implement Image Upload

- Implement Dependent Dropdown [Documentação](https://livewire.laravel.com/docs/lifecycle-hooks#update)
    - updating é renderizado com todas propriedade que após forem atualizadas/selecionada, mas Updated atualização da `propriedade especifica`, no caso a `class_id`
~~~~~~method updated

    #[Rule('required', message: 'Precisa selecionar uma disciplina.')]
    public $class_id;

    public $sections = [];

    public function updatedClassId($value)
    {
        $this->sections = Section::where('class_id', $value)->get();
    }
~~~~~~

- Na view
~~~~~~foreach sections
    <select wire:model="section_id" id="section_id"">
        <option value="">Selecione a turma</option>
        @foreach ($sections as $section)
            <option value="{{ $section->id }}">
                {{ $section->name }} - {{ $section->class->name }}
            </option>
        @endforeach
    </select>

~~~~~~

-  `STORAGE::` Exemplos com a classe Storage
~~~~~~
if(storage_path('app/public/'.$this->student->image)){
                 1.create a new folder
                Storage::makeDirectory('testeImage');

                 2.store file in directory
                Storage::putFile('testeImage', $this->image);

                 3.file generated name hash name
                $generatedName = $this->image->hashName();
                dd($generatedName);

                 4.store file in directory and rename
                Storage::putFileAs('testeImage', $this->image, "student-".$this->student->id.".".$this->image->extension());

                 5.copy file to another directory
                Storage::copy('testeImage/student-1.jpg', 'public/imageCopy.png');


                 6.cut file to another directory
                Storage::move('public/imageCopy.png', 'public/testeImage/cutImage.png');

                 7.list files or sub files inside folder
                $array[] = Storage::files('public/students');
                $array[] = Storage::allFiles('public');
                dd($array);

                 8.show files
                $file = Storage::get('public/default.jpg');
                //get file diretory and create to another diretory
                dd(Storage::put('students/student-1.jpg', $file));

                 9.download file
                return Storage::download('public/default.jpg');

                 10.delete file(s)
                if(Storage::exists('students/student-1.jpg')){
                    dd(Storage::delete('students/student-1.jpg'));
                }

                if(Storage::directoryExists('students')){
                    dd("DIRETÓRIO EXCLUIDO!", Storage::deleteDirectory('students'));
                }

                dd('sem arquivo e diretório');

                dd(Storage::disk('public'));

            }
~~~~~~

- DATA BIND
> Passando ID student via rota controller laravel. Poderiamos passar direto pelo component, direto na view sem layout
~~~~~~
    <livewire:student.edit :key='$student'/>
~~~~~~



## Dicas e exemplos básicos

- Como criar uma TAG com um valor inicial
> Na propria chamada do componente criamos um propriedade e definimos seu valor e na view a TAG já terá seu valor.

~~~~~~
    <livewire:raffle.sortition title="Sorteio de inscritos"/>
    
    {{-- IN VIEW COMPONENT --}}
    <title></title>
~~~~~~


- Como passar um valor de uma variável para view de um componente
> Exemplo criando uma variável, mas poderia receber de uma variável de um component.

~~~~~~
    <?php
      $teste = "GitHub";
    ?>
    <livewire:raffle.sortition :git="$teste"/>
~~~~~~
> No controller temos que inicializar no metodo construtor do component `mount`

~~~~~~
    public $git;

    public function mount($git = null)
    {
        $this->git = $git;
    }
~~~~~~

- Actions
> Ações de botões e formulários que reagem com click de botão, form's chamado algum metodo.
~~~~~~
    <form wire:submit="save"> ... </form>
    <button wire:click="methodName"> ... </button>
~~~~~~


- Atualizar algum component modificado
> Exemplo que atualiza a tabela de usuários. Basta incluir na `div` do componente para o _liveiwre_ fazer a **poll** - `wire:poll.visible`

~~~~~~
    <table class="w-full whitespace-no-wrap" wire:poll.visible> ... </table>
~~~~~~
 
- Data Binding
> É a forma que vamos interagir e definir valores as propriedades do nosso componente livewire. `wire:model="propertyName"` ou
> na nova versão 3.0 `wire:model.live="propertyName"`.

~~~~~~view component
    <form wire:submit="save">
        <input wire:model.live="name"/>
        <input wire:model.lazy="name"/>
    </form>
~~~~~~

~~~~~~class component
    class Create extends Component
    {
        public $name;

        public function save(){
            User::create([
                'name'      => $this->name,
            ]);
        }
    }
~~~~~~

- Validation
> Na versão 2.0 do livewire seria assim a validação no metodo save.

~~~~~~
public function save(){
    $this->validate(
        [
        'name'      => 'required|min:3|max:200',
        'email'     => 'required|email|unique:users',
        'password'  => 'required|min:8'
        ],
        [
            'name.required'         => 'Nome é obrigatório!',
            'name.min'              => 'O minimo para seu nome é 3 caracteres.',
            'name.max'              => 'O maximo para seu nome é de 200 caracteres',
            'email.required'        => 'Email é obrigatório!',
            'email.unique'          => 'Este e-mail já foi registrado!',
            'password.required'     => 'A senha é obrigatória!',
            'password.min'          => 'A senha deve ter no minimo 8 caracteres.',
        ]
    );
}
~~~~~~

> Na versão 3.0 já ficou mais limpo e claro com as anotações.

~~~~~~Exemple
    use Livewire\Attributes\Rule;    

    #[Rule(['name'=>'required|min:3'], message: ['required' => 'O :attribute é necessário.'], attribute: ['name' => 'nome'])]
    public $name;

    public function save(){
        $this->validate()
        ...
    }
~~~~~~



- Flash Messages
> Passando messagem de retorno para front-end. Utilizando o `helper` `request() e session()` com flush que passamos `2 argumentos`.
> E também podemos **_redirecionar_ para outra rota**, juntamente com uma messagem with.

~~~~~~
    request()->session()->flush('success', 'Usuário criado com sucesso!!');
    return redirect(router('/...'))->with('success', 'Usuário criado com sucesso!');
~~~~~~


- Paginação
> A paginação é bem parecida com a do laravel, só precisamos chamar na classe o `WithPagination`.

~~~~~~
    use WithPagination;
    
    public function render()
    {
        return view('livewire.users.users',
        [
            'users' => User::paginate(2)
        ]);
    }
~~~~~~

> Na view
~~~~~~
    <li>
        {{$users->links()}}
    </li>
~~~~~~

- Loading files|states [Documents loading](https://livewire.laravel.com/docs/uploads)
> Para trabalhar com loading de arquivos, primeiro add na classe `WithFileUploads` e com metodo de armazenar os arquivos `store`.

~~~~~~Class component
    use WithFileUploads;

    /**
     *@var TemporaryUploadedFile|mixed $image
     */
    #[Rule('required|max:1024', message: 'Image obrigatória ou o tamanho é maior que 1024MB.')]
    public $image;
 
    public function save()
    {
        $this->image->store('image');
    }
~~~~~~

> Configuração completa na view. `Visualização temporaria`, `carregamento de progresso`.

~~~~~~View component
        {{-- IMAGE --}}
        <label for="prd-img" class="mt-4 block text-sm">
            <span class="text-gray-700 dark:text-gray-400">Image</span>


            <div x-data="{ uploading: false, progress: 0}"
                 x-on:livewire-upload-start="uploading = true"
                 x-on:livewire-upload-finish="uploading = false"
                 x-on:livewire-upload-error="uploading = false"
                 x-on:livewire-upload-progress="progress = $event.detail.progress">

                {{-- INPUT IMAGE --}}
                <div class="flex justify-center align-middle mt-1">

                    @if($image)
                        <div class="flex justify-between text-sm mr-3">
                            <img class="object-cover rounded-full" src="{{$image->temporaryUrl()}}" alt="" width="50"/>
                        </div>
                    @endif

                    <input class="lock w-full mt-1 text-sm dark:text-gray-800 dark:border-gray-600 dark:bg-gray-700 shadow-sm rounded-md focus:z-10 focus:border-blue-500 focus:ring-blue-500 dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400 file:bg-transparent file:border-0 file:bg-gray-100 file:mr-4 file:py-3 file:px-4 dark:focus:shadow-outline-gray dark:file:text-gray-400"
                           wire:model="image"
                           type="file"
                           id="prd-img">
                </div>


                <div class="m-8" x-show="uploading" class="h-1 w-full bg-neutral-200 dark:bg-neutral-600 bg-red-600">
                    <div wire:loading.duration.200ms wire:target="image" class="text-white text-sm">
                        baixando image...
                    </div>
                    <progress class="h-4 bg-red-600" max="100" x-bind:value="progress" style="width: 100%; background-color: red;"></progress>
                </div>

            </div>

            <div class="text-red-500 mt-2">
                @error('image') <span class="error">{{ $message }}</span> @enderror
            </div>
        </label>
~~~~~~


- Eventos [Documents events](https://livewire.laravel.com/docs/events)
> O metodo `dispatch()` é responsável por fazer a comunicação entre as classes doscomponentes e fazer a atualização `update`.
> O processo é realizado chamando o `dispatch` gerando um nome e passar dados adicionais com o evento passando os dados como segundo parâmetro

~~~~~~Classe User
    $user = User::create([// ... ]);
    $this->dispatch('user-created', $user);
~~~~~~

~~~~~~Classe List users
    use Livewire\Attributes\On;

    #[On('user-created')]
    public function updateList($user = null){ //.. }
~~~~~~

- Polling [Documents Polling](https://livewire.laravel.com/docs/wire-poll)
> Uma alternativa para não criar este evento é trabalhar com `wire:poll`
> Desta forma, qualquer atualização no componente será feito o refresh | `<div wire:poll.visible> ... </div>`.

~~~~~~
    <table class="w-full whitespace-no-wrap" wire:poll.keep-alive>
        @foreach($users as $user)
        // ...
        @endforeach
    </table>
~~~~~~

- Lazy Loading [Documents Loading](https://livewire.laravel.com/docs/lazy) e animação de Loading Skeletons [Skeletons](https://delba.dev/blog/animated-loading-skeletons-with-tailwind)
> O componente esqueleto pode ser usado como um indicador de `carregamento alternativo` ao controle giratório, `imitando` o conteúdo que será carregado.

~~~~~~
    public function mount()
    {
        sleep(2);
    }

    /**
     * https://livewire.laravel.com/docs/lazy
    */
    public function placeholder()
    {
        return <<<'HTML'
            <p class="text-lg font-semibold text-gray-700 dark:text-gray-200 bg-purple-600 p-2 rounded text-center">
                    lazy loading Carregando...
            </p>
        HTML;
    }
~~~~~~

~~~~~~
    <livewire:adm.painel-button lazy/>
~~~~~~

- Propriedades Computadas [Property computer](https://livewire.laravel.com/docs/computed-properties)
> As propriedades computadas permitem acessar valores e armazená-los em cache para acesso futuro durante a solicitação

~~~~~~Class
    use Livewire\Attributes\Computed;

    #[Computed()]
    public function users()
    {
        return User::paginate(2);
    }
~~~~~~

~~~~~~View
    @foreach($this->users as $user)
        //..
    @endforeach
~~~~~~

- Criar Layout  [Layout](https://livewire.laravel.com/docs/quickstart#create-a-template-layout)
                - [Tutorial](https://www.youtube.com/watch?v=SKxIXm-MOE4&list=PLqDySLfPKRn543NM_fTrJRdhjBgsogzSC&index=16&ab_channel=YeloCode)
> o Livewire procurará automaticamente um arquivo de layout.

~~~~~~
    php artisan livewire:layout
~~~~~~

~~~~~~
    <!DOCTYPE html>
    <html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
        <head>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
     
            <title>{{ $title ?? 'Page Title' }}</title>
        </head>
        <body>
            {{ $slot }}
        </body>
    </html>
~~~~~~

- [Form Objects | ](https://livewire.laravel.com/docs/forms) 
> Os objetos de formulário permitem reutilizar a lógica do formulário entre os componentes e fornecem uma ótima maneira 
>de manter a classe do componente mais limpa, agrupando todo o código relacionado ao formulário em uma classe separada.

~~~~~~
php artisan livewire:form PostForm
~~~~~~

~~~~~~
    // class form
    class PostForm extends Form
    {
        #[Rule('required|min:5')]
        public $title = '';
     
        #[Rule('required|min:5')]
        public $content = '';
    }
    
    //class createForm
    public PostForm $form;
     
    public function save()
    {
        $this->validate();
    
        Post::create(
            $this->form->all()
        );
    
        return $this->redirect('/posts');
    }

    //view
    {{$form->title}}
~~~~~~

- [URL Query Parameters | ](https://livewire.laravel.com/docs/url)
> 
~~~~~~
    #[Url(as: 'busca', keep: true, history: true)]
    public $search = '';
~~~~~~

- [Offline States | ]()
> Para você pode notificar os usuários caso eles estejam offline `wire:offline`.

~~~~~~
    <div class="p-4 mb-4 text-sm text-white-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert" wire:offline>
        <span class="font-medium text-red-800">Voçê encontra-se offline!</span> Por favor, tente esabelecer a conexão ou tenta mais tarde.
    </div>
~~~~~~

- [Multi File Upload | ](https://livewire.laravel.com/docs/uploads#handling-multiple-files)
- [Livewire | File Upload - Pinguim do Laravel | 50:30](https://www.youtube.com/watch?v=gYs5cwzgAUA&t=3772s&ab_channel=PinguimdoLaravel%C2%B7RafaelLunardelli)
> multiple arquivo em um registro
> Precisa criar relação do usuário com imagens

~~~~~~

~~~~~~

- [Wire:navigate | ](https://livewire.laravel.com/docs/wire-navigate)
> 
~~~~~~
<a href="/" wire:navigate.hover>Dashboard</a>
~~~~~~

- [Custom validation attribute name | ]()
> 
~~~~~~

~~~~~~

- [Lifecycle hooks | ](https://livewire.laravel.com/docs/lifecycle-hooks)
> Ciclo de vida dos hooks que permitem executar código em pontos específicos durante o ciclo de vida de um componente.

| Hook Method   | Explicação    |
| :---          |     :---      |
| `mount()`     | *É como se fosse o `__construct()` de uma classe. * _Chamado quando um componente é criado._ |
| `hydrate()`   | _Chamado quando um componente é reidratado no início de uma solicitação subsequente._|
| `boot()`      | *É um metodo que sempre é chamado sempre. * _Chamado no início de cada solicitação no backend. Tanto inicial quanto subsequente._|
| `updating()`  | _Chamado antes de atualizar uma propriedade de componente._|
| `updated()`   | _Chamado após atualizar uma propriedade._|
| `rendering()` | _Chamado antes `render()` é chamado._|
| `rendered()`  | _Chamado depois `render()` é chamado._|
| `dehydrate()` | _Chamado no final de cada solicitação de componente._|


- [Keyboard Shortcuts | ](https://livewire.laravel.com/docs/actions#listening-for-specific-keys)
> Os keywords são eventos de ações para o usuário.
~~~~~~
<form wire:submit.prevent="save" enctype="multipart/form-data" wire:keydown.space.window="save">
    @csrf
    //...
</form>
~~~~~~

- [Magic Actions | ](https://livewire.laravel.com/docs/actions#magic-actions)
> Livewire fornece um conjunto de ações "mágicas" que permitem executar tarefas comuns em seus componentes sem definir métodos personalizados.
~~~~~~
    //$parent
    //$set          | Modiica uma propriedade.
    //$refresh      | aciona uma nova renderização do seu componente
    //$toggle
    //$dispatch
    //$event

    //exemples
    <button wire:click="$refresh">Refresh</button>
    <button wire:click="$set('oldValue', 'newValue')">Reset Set</button>
    <button wire:click="$toggle('sortAsc')">
        Sort {{ $sortAsc ? 'Descending' : 'Ascending' }}
    </button>
~~~~~~





## Dicas laravel Backpack annotatio
Return ids:
~~~~~~
$ids = User::all()->pluck('id');
$ids = User::all()->modelKeys();
~~~~~~


## Contatos

- 👇🏼 [rafaelblum_digital@hotmail.com]

[![Youtube Badge](https://img.shields.io/badge/-Youtube-FF0000?style=flat-square&labelColor=FF0000&logo=youtube&logoColor=white&link=https://www.youtube.com/channel/UCMvtn8HZ12Ud-sdkY5KzTog)](https://www.youtube.com/channel/UCMvtn8HZ12Ud-sdkY5KzTog)
[![Instagram Badge](https://img.shields.io/badge/-rafablum_-violet?style=flat-square&logo=Instagram&logoColor=white&link=https://www.instagram.com/rafablum_/)](https://www.instagram.com/rafablum_/)
[![Twitter: universoCode](https://img.shields.io/twitter/follow/universoCode?style=social)](https://twitter.com/universoCode)
[![Linkedin: RafaelBlum](https://img.shields.io/badge/-RafaelBlum-blue?style=flat-square&logo=Linkedin&logoColor=white&link=https://www.linkedin.com/in/rafael-blum-378656285/)](https://www.linkedin.com/in/rafael-blum-378656285/)
[![GitHub RafaelBlum](https://img.shields.io/github/followers/RafaelBlum?label=follow&style=social)](https://github.com/RafaelBlum)


<img src="https://media.giphy.com/media/LnQjpWaON8nhr21vNW/giphy.gif" width="60"> 
    <em><b>Adoro me conectar com pessoas diferentes,</b> então se você quiser dizer <b>oi, ficarei feliz em conhecê-lo mais!</b> :)</em>


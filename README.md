<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

# [Gallery livewire products](#) 

[![Tweet](https://img.shields.io/twitter/url/http/shields.io.svg?style=social&logo=twitter)](https://twitter.com/intent/tweet?url=https://www.creative-tim.com/product/soft-ui-dashboard-tailwind&text=Check%20Soft%20UI%20Dashboard%20Tailwind%20made%20by%20@CreativeTim%20#webdesign%20#dashboard%20#softdesign%20#html%20https://www.creative-tim.com/product/soft-ui-dashboard-tailwind) 
[![Discord](https://badgen.net/badge/icon/discord?icon=discord&label)](https://discord.gg/FhCJCaHdQa)

![version](https://img.shields.io/badge/version-1.0.5-blue.svg) 
[![GitHub issues open](https://img.shields.io/github/issues/creativetimofficial/soft-ui-dashboard-tailwind.svg)](https://github.com/creativetimofficial/soft-ui-dashboard-tailwind/issues?q=is%3Aopen+is%3Aissue) 
[![GitHub issues closed](https://img.shields.io/github/issues-closed-raw/creativetimofficial/soft-ui-dashboard-tailwind.svg)](https://github.com/creativetimofficial/soft-ui-dashboard-tailwind/issues?q=is%3Aissue+is%3Aclosed)



<p align="center">
	<a href="#"  target="_blank" title="calculadora com livewire">
		<img src="public/images/gif-todo-3.gif" alt="Todo list with livewire" width="100%">
	</a>
</p>

<p align="center">
	<img src="https://img.shields.io/badge/version project-2.0-brightgreen" alt="version project todo">
    <img src="https://img.shields.io/badge/Php-8.2-informational&color=brightgreen" alt="stack project">
    <img src="https://img.shields.io/static/v1?label=Laravel&message=9.52.5&color=brightgreen?style=for-the-badge" alt="stack project">
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


🧪 [See it live](https://windmillui.com/dashboard-html)

- 🦮 Thoroughly accessible
- 🌗 Light and dark themes
- 💅 Styled with Tailwind CSS
- 🧩 Various components
- ❄ [React version](https://windmillui.com/dashboard-react)

## 🚀 Usage

### What's included

Within the download you'll find the following directories and files:

```
soft-ui-dashboard-tailwind
├── build
│   ├── assets
│   │   ├── css
│   │   │   ├── soft-ui-dashboard-tailwind.css
│   │   │   ├── soft-ui-dashboard-tailwind.min.css
│   │   ├── fonts
│   │   ├── img
│   │   └── js
│   │       ├── plugins
│   │       ├── soft-ui-dashboard-tailwind.js
│   │       └── soft-ui-dashboard-tailwind.min.js
│   ├── docs
│   │   └── documentation.html
│   ├── index.html
│   └── pages
├── package.json
├── src
│   └── styles.css
└── tailwind.config.js

```


## Projeto Todo task v.2.0
Este é uma `aplicação Laravel` utilizando a "extensão" `Livewire`. Uma extensão reativa, que agiliza o desenvolvimento
com `componentes reativo` "sem" o uso de javascript (Existe o javascript, mas não precisamos se preocupar com  desenvolvimento).



##### Descrição de funcionalidades do `app x`
- descriptions...

> Com **livewire** temos componentes responsivos e juntamente com o blade, temos uma ferramenta poderosa. Componentes que podemos atualizar sem
>precisar atualizar toda página de forma fácil e rápida.

<p align="center">
	<a href="#"  target="_blank" title="Diagrama">
		<img src="public/images/diagram-2.jpg" alt="Diagramação de componentes livewire" style="border-radius: 5px;" width="600">
	</a>
</p>

######  Tecnologias (serviços externos, libs, frameworks, hospedagem etc.) e instalações.

- <a href="#" target="_blank">Php `8.2`</a>
- <a href="#" target="_blank">Laravel `9.52.5`</a> [Projeto laravel] composer create-project laravel/laravel name-project
- <a href="#" target="_blank">Livewire `2.12`</a> [Livewire] composer require livewire/livewire
- <a href="#" target="_blank">laravel debugbar `3.8`</a> [Debugbar] composer require barryvdh/laravel-debugbar --dev
- <a href="#" target="_blank">Remixicon `2.5.0`</a> [Docs](https://remixicon.com/)
- <a href="#" target="_blank">Tailwindcss `3.3.3`</a> [Tailwindcss] npm install -D tailwindcss postcss autoprefixer
    - Configuração do framework esta neste link [Install Tailwind CSS with Laravel](https://tailwindcss.com/docs/guides/laravel)
- <a href="#" target="_blank">Alpine jS `2.8.2`</a> [Docs](https://github.com/alpinejs/alpine/tree/v2.8.2)

## Desenvolvimento (backend lógica e comandos)
- `php artisan serve --port=8000` [inicializando servidor] 
- `php artisan livewire:make todo ` [Criando componente todo] 
- `php artisan make:model Todo -m ` [Criado a tabela modelo para add propriedades] 


## Pacotes auxiliares
- `composer require "spatie/laravel-medialibrary` [oferece componentes Blade, Vue e React para lidar com uploads para a biblioteca de mídia e administrar o conteúdo de uma coleção da biblioteca de mídia.] 
    
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


## Lista de comandos
- `composer create-project laravel/laravel product-gallery` [Criação do projeto] 
- `composer require laravel/breeze --dev` [laravel Breeze] 
- `php artisan breeze:install --dark` [Breeze dark mod] 
- `php artisan migrate` [inicializando tabelas e banco mysql]
- `php artisan serve` [inicializando servidor]
- `git init` []
- `git add .` []
- `git commit -m ":tada: first commit` []
- `git branch -M main` []
- `git remote add origin https://github.com/RafaelBlum/products-gallery.git` []
- `git push -u origin main` []
- `composer require livewire/livewire` []
- `php artisan make:livewire gallery.create --test` []
- `composer require spatie/ray --dev` []
- `` []
- `` []

## Exemplo `Atividades de aluno`

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

-  `Na IMAGE` Para tornar esses arquivos acessíveis na web: Para criar o link simbólico, você pode usar o storage:linkcomando Artisan
~~~~~~
    php artisan storage:link

    <img class="object-cover w-full h-full rounded-full" src="{{$student?->getMedia()?->last()?->getUrl()}}" alt="" width="60px" loading="lazy"/>
~~~~~~



- Work on Edit Form
[Link tutorial](https://www.youtube.com/watch?v=9hDL-LVF3OY&t=3317s&ab_channel=TapanSharma)
- Extract Create Form to a Form Object
- Extract Edit Form to Form Object
- Display Flash Messages
- Delete Individual Records
- Add Confirm Dialog and Register Custom Directive
- Implement wire:navigate




## Contatos

- 👇🏼 [rafaelblum_digital@hotmail.com]

[![Youtube Badge](https://img.shields.io/badge/-Youtube-FF0000?style=flat-square&labelColor=FF0000&logo=youtube&logoColor=white&link=https://www.youtube.com/channel/UCMvtn8HZ12Ud-sdkY5KzTog)](https://www.youtube.com/channel/UCMvtn8HZ12Ud-sdkY5KzTog)
[![Instagram Badge](https://img.shields.io/badge/-rafablum_-violet?style=flat-square&logo=Instagram&logoColor=white&link=https://www.instagram.com/rafablum_/)](https://www.instagram.com/rafablum_/)
[![Twitter: universoCode](https://img.shields.io/twitter/follow/universoCode?style=social)](https://twitter.com/universoCode)
[![Linkedin: RafaelBlum](https://img.shields.io/badge/-RafaelBlum-blue?style=flat-square&logo=Linkedin&logoColor=white&link=https://www.linkedin.com/in/rafael-blum-378656285/)](https://www.linkedin.com/in/rafael-blum-378656285/)
[![GitHub RafaelBlum](https://img.shields.io/github/followers/RafaelBlum?label=follow&style=social)](https://github.com/RafaelBlum)


<img src="https://media.giphy.com/media/LnQjpWaON8nhr21vNW/giphy.gif" width="60"> 
    <em><b>Adoro me conectar com pessoas diferentes,</b> então se você quiser dizer <b>oi, ficarei feliz em conhecê-lo mais!</b> :)</em>


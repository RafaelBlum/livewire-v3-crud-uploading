@extends('admin.master.layout')

@section('content')
  {{-- SCRIPT CHARTS --}}
  <script src="{{asset('/src/assets/js/chart.min_2.9.3.js')}}" defer></script>
  <script src="{{asset('/src/assets/js/charts-lines.js')}}" defer></script>
  <script src="{{asset('/src/assets/js/charts-pie.js')}}" defer></script>

<div class="container px-6 mx-auto grid">
    <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
      Dashboard
    </h2>

    {{-- CTA --}}
    <livewire:adm.painel-button lazy/>

    {{-- USERS TABLES/CREATE --}}
    @livewire('users.users')

    {{-- STUDENTS TABLES --}}
    @livewire('student.index')

    {{-- STUDENTS TABLES --}}
    @livewire('gallery.index')



    {{-- CHARTS --}}
    <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
      Gráficos
    </h2>

    <div class="grid gap-6 mb-8 md:grid-cols-2">
      <div class="min-w-0 p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
        <h4 class="mb-4 font-semibold text-gray-800 dark:text-gray-300">
          Revenue
        </h4>

        {{-- GRAFIC PIE --}}
        <canvas id="pie"></canvas>

        <div class="flex justify-center mt-4 space-x-3 text-sm text-gray-600 dark:text-gray-400">

          <!-- Chart legend -->
          <div class="flex items-center">
            <span class="inline-block w-3 h-3 mr-1 bg-blue-500 rounded-full"></span>
            <span>Shirts</span>
          </div>

          <div class="flex items-center">
            <span class="inline-block w-3 h-3 mr-1 bg-teal-600 rounded-full"></span>
            <span>Shoes</span>
          </div>

          <div class="flex items-center">
            <span
              class="inline-block w-3 h-3 mr-1 bg-purple-600 rounded-full"></span>
            <span>Bags</span>
          </div>
        </div>
      </div>

      <div class="min-w-0 p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
        <h4 class="mb-4 font-semibold text-gray-800 dark:text-gray-300">
          Traffic
        </h4>

        {{-- GRAFIC LINE --}}
        <canvas id="line"></canvas>

        <div class="flex justify-center mt-4 space-x-3 text-sm text-gray-600 dark:text-gray-400">
          <!-- Chart legend -->
          <div class="flex items-center">
            <span
              class="inline-block w-3 h-3 mr-1 bg-teal-600 rounded-full"
            ></span>
            <span>Organic</span>
          </div>
          <div class="flex items-center">
            <span
              class="inline-block w-3 h-3 mr-1 bg-purple-600 rounded-full"
            ></span>
            <span>Paid</span>
          </div>
        </div>
      </div>
    </div>
</div>

@endsection

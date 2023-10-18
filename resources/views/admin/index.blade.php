@extends('admin.master.layout')

@section('content')


<div class="container px-6 mx-auto grid">
    <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
      Dashboard
    </h2>

    {{-- CTA #Lazy loading: https://livewire.laravel.com/docs/lazy --}}
    <livewire:adm.painel-button lazy/>

    {{-- USERS TABLES/CREATE --}}
    @livewire('users.users')

    {{-- STUDENTS TABLES --}}
    @livewire('student.index')

    {{-- STUDENTS TABLES --}}
    @livewire('gallery.index')



    {{-- CHARTS #ChartJS --}}
    <div class="grid gap-6 mb-8 md:grid-cols-2 my-6">
      <div class="min-w-0 p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
        <h4 class="mb-4 font-semibold text-gray-800 dark:text-gray-300">
          {{$chart}}
        </h4>
        {{-- GRAFIC PIE --}}
        <canvas id="pie"></canvas>
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

      <div>
        <canvas id="myChart"></canvas>
      </div>
    </div>
</div>

@endsection

@push('grafico')
  <script>


    /**
     * For usage, visit Chart.js docs https://www.chartjs.org/docs/latest/
     */
    const pieConfig = {
      type: 'doughnut',
      data: {
        labels: [{{$studentAno}}],
        datasets: [
          {
            data: [{{$studentTotal}}],
            /**
             * These colors come from Tailwind CSS palette
             * https://tailwindcss.com/docs/customizing-colors/#default-color-palette
             */
            backgroundColor: ['#0694a2', '#1c64f2', '#7e3af2'],
            label: [{!! $studentLabel !!}],
          },
        ],
      },
      options: {
        responsive: true,
        cutoutPercentage: 80,
        /**
         * Default legends are ugly and impossible to style.
         * See examples in charts.html to add your own legends
         *  */
        legend: {
          display: false,
        },

      },
    }

    // change this to the id of your chart element in HMTL
    const pieCtx = document.getElementById('pie')

    window.myPie = new Chart(pieCtx, pieConfig)

    /**
     * For usage, visit Chart.js docs https://www.chartjs.org/docs/latest/
     */
    const lineConfig = {
      type: 'line',
      data: {
        labels: [{{$studentAno}}],
        datasets: [
          {
            label: [{!! $studentLabel !!}],
            /**
             * These colors come from Tailwind CSS palette
             * https://tailwindcss.com/docs/customizing-colors/#default-color-palette
             */
            backgroundColor: '#0694a2',
            borderColor: '#0694a2',
            data: [{{$studentTotal}}],
            fill: false,
          },
          {
            label: 'Paid',
            fill: false,
            /**
             * These colors come from Tailwind CSS palette
             * https://tailwindcss.com/docs/customizing-colors/#default-color-palette
             */
            backgroundColor: '#7e3af2',
            borderColor: '#7e3af2',
            data: [24, 50, 64, 74, 52, 51, 65],
          },
        ],
      },
      options: {
        responsive: true,
        /**
         * Default legends are ugly and impossible to style.
         * See examples in charts.html to add your own legends
         *  */
        legend: {
          display: false,
        },
        tooltips: {
          mode: 'index',
          intersect: false,
        },
        hover: {
          mode: 'nearest',
          intersect: true,
        },
        scales: {
          x: {
            display: true,
            scaleLabel: {
              display: true,
              labelString: 'Month',
            },
          },
          y: {
            display: true,
            scaleLabel: {
              display: true,
              labelString: 'Value',
            },
          },
        },
      },
    }

    // change this to the id of your chart element in HMTL
    const lineCtx = document.getElementById('line')
    window.myLine = new Chart(lineCtx, lineConfig)
  </script>
@endpush
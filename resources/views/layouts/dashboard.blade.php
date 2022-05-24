<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <section class="container">
        @if (session('status'))
            <div class="alert alert-success" role="alert">
              <strong>{{  session('status')  }}</strong>
            </div>
        @endif
    </section>
    @yield('content')
</x-app-layout>

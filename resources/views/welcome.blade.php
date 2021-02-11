<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>{{ config('app.name', 'Laravel') }}</title>

  <!-- Scripts -->
  <script src="{{ asset('js/app.js') }}" defer></script>

  <!-- Styles -->
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body>
<div class="relative antialiased text-gray-900">
  <main>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <!-- Replace with your content -->
      <div class="px-4 py-6 sm:px-0">
        <div class="w-full md:w-2/3 lg:w-3/5 xl:w-2/3 mx-auto p-6 rounded-lg border border-gray-200 shadow mt-6">
          <h3 class="text-4xl semibold mt-4 mb-8">Sign Me Up</h3>
          @if(session()->has('verified-message'))
            <div class="my-4 p-4 rounded bg-green-500 text-white">{{ session('verified-message') }}</div>
          @endif
          @if(session()->has('verification-success'))
            <div class="my-4 p-4 rounded bg-green-500 text-white">{{ session('verification-success') }}</div>
          @endif
          <form method="POST" action="{{ route('verify-email') }}">
            @csrf
            <div class="mt-4">
              <label for="name">Name</label>
              <input type="text" id="name" name="name" class="w-full mt-1 py-1 px-3 rounded border border-gray-200" value="{{ old('name') }}">
              @error('name')
              <span class="text-red-500 italic text-xs">{{ $message }}</span>
              @enderror
            </div>
            <div class="mt-4">
              <label for="email">Email</label>
              <input type="email" id="email" name="email" class="w-full mt-1 py-1 px-3 rounded border border-gray-200" value="{{ old('email') }}">
              @error('email')
              <span class="text-red-500 italic text-xs">{{ $message }}</span>
              @enderror
            </div>
            <button type="submit"
                    class="mt-8 bg-blue-500 hover:bg-blue-600 rounded-lg text-white py-1 px-4 focus:outline-none">
              Subscribe
            </button>
          </form>
        </div>
      </div>
      <!-- /End replace -->
    </div>
  </main>
</div>
</body>
</html>
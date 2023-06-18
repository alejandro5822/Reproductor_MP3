<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Laravel</title>

  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.bunny.net">
  <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

  <!-- Styles -->
  <style>
    /* Custom styles for the login and registration page */
    body {
      font-family: 'Figtree', sans-serif;
      background-color: #f7fafc;
    }

    .container {
      max-width: 480px;
      margin: 0 auto;
      padding: 2rem;
      background-color: #ffffff;
      border-radius: 0.5rem;
      box-shadow: 0 2px 6px rgba(0, 0, 0, 0.05);
    }

    .title {
      text-align: center;
      font-size: 2rem;
      font-weight: 600;
      color: #374151;
      margin-bottom: 2rem;
    }

    .form-group {
      margin-bottom: 1.5rem;
    }

    .form-label {
      display: block;
      font-size: 1rem;
      font-weight: 600;
      color: #374151;
      margin-bottom: 0.5rem;
    }

    .form-input {
      width: 100%;
      padding: 0.75rem;
      border-radius: 0.375rem;
      border: 1px solid #e5e7eb;
      font-size: 1rem;
      color: #4b5563;
    }

    .form-button {
      width: 100%;
      padding: 0.75rem;
      border-radius: 0.375rem;
      background-color: #60a5fa;
      color: #ffffff;
      font-size: 1rem;
      font-weight: 600;
      text-align: center;
      cursor: pointer;
    }

    .form-button:hover {
      background-color: #3b82f6;
    }

    .form-link {
      display: block;
      text-align: center;
      margin-top: 1rem;
      font-size: 0.875rem;
      color: #374151;
      text-decoration: underline;
    }
  </style>
</head>
<body>
    <div class="container mx-auto flex flex-col items-center mt-8">
      <h1 class="title mb-8">Bienvenido al registro de canciones MP3.</h1>
      <div class="flex gap-2">
        <a href="{{ route('login') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Log in</a>
        <a href="{{ route('register') }}" class="ml-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Register</a>
      </div>
    </div>
  </body>  
</html>





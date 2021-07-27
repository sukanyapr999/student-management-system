<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
        <link rel="stylesheet" href="//cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css" crossorigin="anonymous">
        <style>
            .content{ padding: 42px; }
            .center{ text-align: center; }
        </style>
        @yield('styles')
        
        <title>@yield('title')</title>
    </head>
    <body class="content">
        <header >
            <nav>
                <a href="{{ url('teachers')}}">Teachers</a> &nbsp;&nbsp;&nbsp;
                <a href="{{ url('students')}}">Students</a> &nbsp;&nbsp;&nbsp;
                <a href="{{ url('student-marks')}}">Student Marks</a>
            </nav>
        </header><br>
        <main>
          @yield('content')
        </main>
        <footer>
            <div>
            </div>
        </footer>
        
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.js" integrity="sha512-WNLxfP/8cVYL9sj8Jnp6et0BkubLP31jhTG9vhL/F5uEZmg5wEzKoXp1kJslzPQWwPT1eyMiSxlKCgzHLOTOTQ==" crossorigin="anonymous"></script>
        <script src="//cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
        
        @yield('scripts')
        
    </body>
  
</html>
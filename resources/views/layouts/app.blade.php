<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/storage/styles/tailwind.css" />
    {{-- @vite('resources/css/app.css') --}}
    <title>Main</title>
</head>
<body>
    <header>
        @include('layouts.header')
    </header>
    <main class="w-11/12 m-auto">
        @yield("content")
    </main>
    <footer>
        @include('layouts.footer')
    </footer>

</body>
@stack('scripts')
<script src="https://unpkg.com/@popperjs/core@2/dist/umd/popper.js"></script>
<script>
    /* Make dynamic date appear */
    (function () {
      if (document.getElementById("get-current-year")) {
        document.getElementById("get-current-year").innerHTML =
          new Date().getFullYear();
      }
    })();
    /* Function for opning navbar on mobile */
    function toggleNavbar(collapseID) {
      document.getElementById(collapseID).classList.toggle("hidden");
      document.getElementById(collapseID).classList.toggle("block");
    }
    /* Function for dropdowns */
    function openDropdown(event, dropdownID) {
      let element = event.target;
      while (element.nodeName !== "A") {
        element = element.parentNode;
      }
      Popper.createPopper(element, document.getElementById(dropdownID), {
        placement: "bottom-start"
      });
      document.getElementById(dropdownID).classList.toggle("hidden");
      document.getElementById(dropdownID).classList.toggle("block");
    }
  </script>
</html>

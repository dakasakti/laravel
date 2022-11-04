<!--

=========================================================
* Notus Tailwind JS - v1.1.0 based on Tailwind Starter Kit by Creative Tim
=========================================================

* Product Page: https://www.creative-tim.com/product/notus-js
* Copyright 2021 Creative Tim (https://www.creative-tim.com)
* Licensed under MIT (https://github.com/creativetimofficial/notus-js/blob/main/LICENSE.md)

* Tailwind Starter Kit Page: https://www.creative-tim.com/learning-lab/tailwind-starter-kit/presentation

* Coded by Creative Tim

=========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.

-->
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="theme-color" content="#000000" />
    <link rel="shortcut icon" href="/storage/img/favicon.ico" />
    <link
      rel="apple-touch-icon"
      sizes="76x76"
      href="/storage/img/apple-icon.png"
    />
    <link
      rel="stylesheet"
      href="/storage/vendor/@fortawesome/fontawesome-free/css/all.min.css"
    />
    <link rel="stylesheet" href="/storage/styles/tailwind.css" />
    <title>Dashboard | Dakasakti</title>
  </head>
  <body class="text-blueGray-700 antialiased">
    <noscript>You need to enable JavaScript to run this app.</noscript>
    <div id="root">
      @include('layouts.dashboard.sidebar')
      <div class="relative md:ml-64 bg-blueGray-50">
        @include('layouts.dashboard.header')
        <!-- Header -->
        <div class="relative bg-pink-600 md:pt-32 pb-32 pt-12">
          @include('layouts.dashboard.info')
        </div>
        <div class="px-4 md:px-10 mx-auto w-full -m-24">
          <div class="flex flex-wrap mt-4">
            @yield('content')
          </div>
          @include('layouts.dashboard.footer')
        </div>
      </div>
    </div>
    @stack('scripts')
    <script src="https://unpkg.com/@popperjs/core@2/dist/umd/popper.js"></script>
    <script type="text/javascript">
      /* Make dynamic date appear */
      (function () {
        if (document.getElementById("get-current-year")) {
          document.getElementById("get-current-year").innerHTML =
            new Date().getFullYear();
        }
      })();
      /* Sidebar - Side navigation menu on mobile/responsive mode */
      function toggleNavbar(collapseID) {
        document.getElementById(collapseID).classList.toggle("hidden");
        document.getElementById(collapseID).classList.toggle("bg-white");
        document.getElementById(collapseID).classList.toggle("m-2");
        document.getElementById(collapseID).classList.toggle("py-3");
        document.getElementById(collapseID).classList.toggle("px-6");
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
  </body>
</html>

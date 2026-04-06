<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="utf-8" />
  <meta http-equiv="x-ua-compatible" content="ie=edge" />
  <meta name="description" content="KizNet Service — Télécommunication et ingénierie logicielle à Pointe-Noire, Congo Brazzaville." />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <title>KizNet Service | On connecte. On construit. On sécurise.</title>
  <link rel="shortcut icon" href="{{ asset('logov2.jpeg') }}" type="image/jpeg" />
  <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}" />
  <link rel="stylesheet" href="{{ asset('assets/css/lineicons.css') }}" />
  <link rel="stylesheet" href="{{ asset('assets/css/tiny-slider.css') }}" />
  <link rel="stylesheet" href="{{ asset('assets/css/glightbox.min.css') }}" />
  <link rel="stylesheet" href="{{ asset('style.css') }}" />
</head>

<body>

  @include('components.nav')
  @include('components.sidebar')

  @yield('content')

  <!-- Scroll Top -->
  <a href="javascript:void(0)" class="scroll-top">
    <i class="lni lni-chevron-up"></i>
  </a>

  <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('assets/js/glightbox.min.js') }}"></script>
  <script src="{{ asset('assets/js/tiny-slider.js') }}"></script>
  <script src="{{ asset('assets/js/main.js') }}"></script>
  <script>
    (function () {
      // Sidebar
      var menuBar = document.querySelector('.menu-bar');
      var sidebarLeft = document.querySelector('.sidebar-left');
      var overlayLeft = document.querySelector('.overlay-left');
      var sidebarClose = document.querySelector('.sidebar-close .close');
      if (menuBar) {
        menuBar.addEventListener('click', function (e) {
          e.preventDefault();
          sidebarLeft.classList.add('open');
          overlayLeft.classList.add('open');
        });
      }
      function closeSidebar() {
        sidebarLeft.classList.remove('open');
        overlayLeft.classList.remove('open');
      }
      if (sidebarClose) sidebarClose.addEventListener('click', function (e) { e.preventDefault(); closeSidebar(); });
      if (overlayLeft) overlayLeft.addEventListener('click', closeSidebar);

      // Copyright year
      var yearEl = document.getElementById('currentYear');
      if (yearEl) yearEl.textContent = new Date().getFullYear();

      // Contact form
      var form = document.getElementById('contactForm');
      if (form) {
        form.addEventListener('submit', function (e) {
          e.preventDefault();
          var valid = true;
          var name = document.getElementById('contactName');
          var email = document.getElementById('contactEmail');
          var message = document.getElementById('contactMessage');
          [name, email, message].forEach(function (field) {
            var ok = field.value.trim().length > 0;
            if (field.type === 'email') ok = ok && /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(field.value);
            if (!ok) { field.classList.add('is-invalid'); field.classList.remove('is-valid'); valid = false; }
            else { field.classList.remove('is-invalid'); field.classList.add('is-valid'); }
          });
          if (valid) {
            document.getElementById('formSuccess').style.display = 'block';
            form.reset();
            [name, email, message].forEach(function (f) { f.classList.remove('is-valid'); });
            setTimeout(function () { document.getElementById('formSuccess').style.display = 'none'; }, 6000);
          }
        });
      }
    })();
  </script>

  @include('components.footer')

</body>
</html>

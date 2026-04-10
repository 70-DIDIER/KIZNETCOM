<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="utf-8" />
  <meta http-equiv="x-ua-compatible" content="ie=edge" />
  <meta name="description" content="KizNet Service — Télécommunication et ingénierie logicielle à Pointe-Noire, Congo Brazzaville." />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <title>KizNet Service | On connecte. On construit. On sécurise.</title>
  <link rel="shortcut icon" href="{{ $setting->logoUrl() }}" type="image/jpeg" />
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

          // Validation côté client
          var valid = true;
          var nameField    = document.getElementById('contactName');
          var emailField   = document.getElementById('contactEmail');
          var messageField = document.getElementById('contactMessage');
          [nameField, emailField, messageField].forEach(function (field) {
            var ok = field.value.trim().length > 0;
            if (field.type === 'email') ok = ok && /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(field.value);
            if (!ok) { field.classList.add('is-invalid'); field.classList.remove('is-valid'); valid = false; }
            else      { field.classList.remove('is-invalid'); field.classList.add('is-valid'); }
          });
          if (!valid) return;

          // Envoi AJAX
          var btn       = document.getElementById('contactSubmitBtn');
          var successEl = document.getElementById('formSuccess');
          var errorEl   = document.getElementById('formError');
          var errorText = document.getElementById('formErrorText');

          btn.disabled = true;
          btn.innerHTML = 'Envoi en cours… <i class="lni lni-spinner-arrow" style="margin-left:6px;"></i>';
          successEl.style.display = 'none';
          errorEl.style.display   = 'none';

          var formData = new FormData(form);

          fetch('{{ route('contact.send') }}', {
            method: 'POST',
            headers: { 'X-Requested-With': 'XMLHttpRequest' },
            body: formData,
          })
          .then(function (res) {
            return res.json().then(function (data) { return { status: res.status, data: data }; });
          })
          .then(function (res) {
            if (res.status === 200) {
              successEl.style.display = 'block';
              form.reset();
              [nameField, emailField, messageField].forEach(function (f) { f.classList.remove('is-valid'); });
              setTimeout(function () { successEl.style.display = 'none'; }, 8000);
            } else {
              var msg = res.data.errors
                ? Object.values(res.data.errors).flat().join(' ')
                : (res.data.message || 'Une erreur est survenue.');
              errorText.textContent = msg;
              errorEl.style.display = 'block';
            }
          })
          .catch(function () {
            errorText.textContent = 'Impossible d\'envoyer le message. Vérifiez votre connexion.';
            errorEl.style.display = 'block';
          })
          .finally(function () {
            btn.disabled = false;
            btn.innerHTML = 'Envoyer le message <i class="lni lni-telegram-original" style="margin-left:6px;"></i>';
          });
        });
      }
    })();
  </script>

  @include('components.footer')

</body>
</html>

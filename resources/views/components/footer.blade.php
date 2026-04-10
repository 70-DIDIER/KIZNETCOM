<!-- FOOTER -->
  <footer class="footer">
    <div class="container">
      <div class="row">
        <div class="col-lg-4 col-md-6 col-12">
          <div class="footer-widget">
            <div class="footer-logo">
              <a href="{{ url('/') }}">
                <img src="{{ $setting->logoUrl() }}" alt="KizNet Services" height="60" style="max-height:60px;object-fit:contain;" />
              </a>
            </div>
            <p class="footer-desc">Votre partenaire technologique à Pointe-Noire. Télécommunication, ingénierie logicielle et cybersécurité pour votre transformation numérique.</p>
            <div class="footer-social">
              <a href="javascript:void(0)" aria-label="Facebook"><i class="lni lni-facebook-filled"></i></a>
              <a href="javascript:void(0)" aria-label="Twitter"><i class="lni lni-twitter-original"></i></a>
              <a href="javascript:void(0)" aria-label="LinkedIn"><i class="lni lni-linkedin-original"></i></a>
              <a href="https://wa.me/24206931747" target="_blank" rel="noopener" aria-label="WhatsApp"><i class="lni lni-whatsapp"></i></a>
            </div>
          </div>
        </div>
        <div class="col-lg-2 col-md-6 col-6">
          <div class="footer-widget">
            <h5 class="footer-title">Navigation</h5>
            <ul class="footer-links">
              <li><a class="page-scroll" href="#hero-area">Accueil</a></li>
              <li><a class="page-scroll" href="#about">À Propos</a></li>
              <li><a class="page-scroll" href="#services">Services</a></li>
              <li><a class="page-scroll" href="#blog">Réalisations</a></li>
              <li><a class="page-scroll" href="#pricing">Témoignages</a></li>
              <li><a class="page-scroll" href="#clients">Contact</a></li>
            </ul>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 col-6">
          <div class="footer-widget">
            <h5 class="footer-title">Nos Services</h5>
            <ul class="footer-links">
              <li><a href="javascript:void(0)">Caméras CCTV/IP</a></li>
              <li><a href="javascript:void(0)">Réseau LAN</a></li>
              <li><a href="javascript:void(0)">Internet &amp; Hotspot</a></li>
              <li><a href="javascript:void(0)">Développement Web</a></li>
              <li><a href="javascript:void(0)">Agents IA</a></li>
              <li><a href="javascript:void(0)">Cybersécurité</a></li>
            </ul>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 col-12">
          <div class="footer-widget">
            <h5 class="footer-title">Contact</h5>
            <ul class="footer-contact">
              <li><i class="lni lni-phone"></i><a href="tel:{{ preg_replace('/\s+/', '', $setting->telephone()) }}">{{ $setting->telephone() }}</a></li>
              <li><i class="lni lni-envelope"></i><a href="mailto:{{ $setting->email() }}">{{ $setting->email() }}</a></li>
              <li><i class="lni lni-map-marker"></i>Pointe-Noire, Congo</li>
              <li><i class="lni lni-timer"></i>Lun–Sam 8h–18h | Urgences 24/7</li>
            </ul>
          </div>
        </div>
      </div>
      <div class="footer-bottom">
        <p>© <span id="currentYear"></span> KizNet Service. Tous droits réservés. — Pointe-Noire, Congo Brazzaville.</p>
      </div>
    </div>
  </footer>
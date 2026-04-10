<!-- CONTACT -->
  <div id="clients" class="brand-area section">
    <div class="section-title-five">
      <div class="container">
        <div class="row">
          <div class="col-12">
            <div class="content">
              <h6>Contact</h6>
              <h2 class="fw-bold">Parlons de votre projet</h2>
              <p>Notre équipe est disponible du lundi au samedi de 8h à 18h, et 24/7 pour les urgences.</p>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="container">
      <div class="row">
        <div class="col-lg-7 col-12">
          <div class="contact-form-wrap">
            <form id="contactForm" novalidate>
              @csrf
              <div class="row">
                <div class="col-md-6">
                  <div class="mb-3">
                    <label for="contactName" class="form-label">Nom complet <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="contactName" name="nom" placeholder="Votre nom complet" required />
                    <div class="invalid-feedback">Veuillez entrer votre nom.</div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="mb-3">
                    <label for="contactEmail" class="form-label">Email <span class="text-danger">*</span></label>
                    <input type="email" class="form-control" id="contactEmail" name="email" placeholder="votre@email.com" required />
                    <div class="invalid-feedback">Veuillez entrer un email valide.</div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="mb-3">
                    <label for="contactPhone" class="form-label">Téléphone</label>
                    <input type="tel" class="form-control" id="contactPhone" name="telephone" placeholder="+242 06 000 00 00" />
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="mb-3">
                    <label for="contactService" class="form-label">Service concerné</label>
                    <select class="form-select" id="contactService" name="service">
                      <option value="">-- Choisir un service --</option>
                      <option>Caméras de Surveillance (CCTV/IP)</option>
                      <option>Installation Réseau LAN</option>
                      <option>Service Internet Maison</option>
                      <option>Service Hotspot</option>
                      <option>Connexion Wi-Fi Public</option>
                      <option>Ingénierie Logicielle</option>
                      <option>Développement Web &amp; Mobile</option>
                      <option>Automatisation</option>
                      <option>Agents IA</option>
                      <option>Marketing Digital</option>
                      <option>Sécurité Informatique</option>
                      <option>Fourniture Équipements IT</option>
                    </select>
                  </div>
                </div>
                <div class="col-12">
                  <div class="mb-3">
                    <label for="contactMessage" class="form-label">Message <span class="text-danger">*</span></label>
                    <textarea class="form-control" id="contactMessage" name="message" rows="5" placeholder="Décrivez votre projet ou votre besoin..." required></textarea>
                    <div class="invalid-feedback">Veuillez entrer votre message.</div>
                  </div>
                </div>
                <div class="col-12">
                  <button type="submit" id="contactSubmitBtn" class="btn primary-btn">
                    Envoyer le message <i class="lni lni-telegram-original" style="margin-left:6px;"></i>
                  </button>
                  <div id="formSuccess" class="alert alert-success mt-3" style="display:none;border-radius:8px;">
                    <i class="lni lni-checkmark-circle"></i> Merci ! Votre message a été envoyé. Nous vous répondrons dans les plus brefs délais.
                  </div>
                  <div id="formError" class="alert alert-danger mt-3" style="display:none;border-radius:8px;">
                    <i class="lni lni-warning"></i> <span id="formErrorText">Une erreur est survenue. Veuillez réessayer.</span>
                  </div>
                </div>
              </div>
            </form>
          </div>
        </div>
        <div class="col-lg-5 col-12">
          <div class="contact-info-wrap">
            <div class="single-contact-info">
              <div class="contact-info-icon"><i class="lni lni-phone"></i></div>
              <div class="contact-info-content">
                <h6>Téléphone</h6>
                <p><a href="tel:{{ preg_replace('/\s+/', '', $setting->telephone()) }}">{{ $setting->telephone() }}</a></p>
              </div>
            </div>
            <div class="single-contact-info">
              <div class="contact-info-icon"><i class="lni lni-envelope"></i></div>
              <div class="contact-info-content">
                <h6>Email</h6>
                <p><a href="mailto:{{ $setting->email() }}">{{ $setting->email() }}</a></p>
              </div>
            </div>
            <div class="single-contact-info">
              <div class="contact-info-icon"><i class="lni lni-map-marker"></i></div>
              <div class="contact-info-content">
                <h6>Adresse</h6>
                <p>Pointe-Noire, République du Congo Brazzaville</p>
              </div>
            </div>
            <div class="single-contact-info">
              <div class="contact-info-icon"><i class="lni lni-timer"></i></div>
              <div class="contact-info-content">
                <h6>Horaires</h6>
                <p>Lun – Sam : 8h00 – 18h00</p>
                <p>Urgences : 24h/7j</p>
              </div>
            </div>
            <div class="single-contact-info">
              <div class="contact-info-icon" style="background:var(--accent-light);border-color:var(--accent);color:var(--accent);"><i class="lni lni-whatsapp"></i></div>
              <div class="contact-info-content">
                <h6>WhatsApp</h6>
                <p><a href="https://wa.me/24206931747" target="_blank" rel="noopener">Discuter sur WhatsApp →</a></p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
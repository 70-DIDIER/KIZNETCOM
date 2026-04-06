{{-- RÉALISATIONS --}}
<section id="blog" class="kiz-realisations">

  <div class="container">

    {{-- En-tête --}}
    <div class="row justify-content-center">
      <div class="col-lg-7 text-center">
        <div class="kiz-section-header">
          <span class="kiz-section-tag">Nos Réalisations</span>
          <h2>Projets récents</h2>
          <p>Découvrez quelques-uns de nos projets réalisés pour des entreprises et institutions en République du Congo.</p>
        </div>
      </div>
    </div>

    @if($realisations->isEmpty())

      <div class="row justify-content-center">
        <div class="col-lg-6 text-center">
          <div class="kiz-empty">
            <i class="lni lni-construction"></i>
            <p>Les projets arrivent bientôt...</p>
          </div>
        </div>
      </div>

    @else

      {{-- Filtres par catégorie --}}
      @php
        $categories = $realisations->pluck('categorie')->unique()->values();
      @endphp

      @if($categories->count() > 1)
        <div class="row justify-content-center mb-4">
          <div class="col-auto">
            <div class="kiz-filters">
              <button class="kiz-filter-btn active" data-filter="all">Tous</button>
              @foreach($categories as $cat)
                <button class="kiz-filter-btn" data-filter="{{ Str::slug($cat) }}">{{ $cat }}</button>
              @endforeach
            </div>
          </div>
        </div>
      @endif

      {{-- Grille de projets --}}
      <div class="row kiz-grid" id="realisationsGrid">
        @foreach($realisations as $projet)
          <div class="col-lg-4 col-md-6 col-12 kiz-grid-item" data-category="{{ Str::slug($projet->categorie) }}">
            <div class="kiz-card">

              {{-- Image + overlay --}}
              <div class="kiz-card-image">
                <img src="{{ asset('storage/' . $projet->image_principale) }}" alt="{{ $projet->titre }}" loading="lazy" />

                {{-- Badge catégorie --}}
                <span class="kiz-badge" style="background: {{ $projet->couleur_categorie }}">
                  {{ $projet->categorie }}
                </span>

                {{-- Overlay hover --}}
                <div class="kiz-overlay">
                  <p class="kiz-overlay-desc">{{ Str::limit($projet->description, 120) }}</p>
                  <div class="kiz-overlay-actions">

                    @if($projet->lien)
                      <a href="{{ $projet->lien }}" target="_blank" rel="noopener" class="kiz-btn-overlay">
                        <i class="lni lni-link"></i> Voir le projet
                      </a>
                    @endif

                    @if($projet->images && count($projet->images) > 0)
                      <a href="{{ asset('storage/' . $projet->images[0]) }}"
                         class="kiz-btn-overlay kiz-btn-gallery glightbox"
                         data-gallery="galerie-{{ $projet->id }}"
                         data-title="{{ $projet->titre }}">
                        <i class="lni lni-gallery"></i> Galerie
                      </a>
                      {{-- Images cachées pour glightbox --}}
                      @foreach(array_slice($projet->images, 1) as $img)
                        <a href="{{ asset('storage/' . $img) }}"
                           class="glightbox d-none"
                           data-gallery="galerie-{{ $projet->id }}"></a>
                      @endforeach
                    @endif

                  </div>
                </div>
              </div>

              {{-- Contenu carte --}}
              <div class="kiz-card-body">
                <h4 class="kiz-card-title">{{ $projet->titre }}</h4>
                <p class="kiz-card-desc">{{ Str::limit($projet->description, 90) }}</p>
                <div class="kiz-card-footer">
                  @if($projet->lien)
                    <a href="{{ $projet->lien }}" target="_blank" rel="noopener" class="kiz-link">
                      Voir le projet <i class="lni lni-arrow-right"></i>
                    </a>
                  @else
                    <span class="kiz-link-disabled">Projet interne</span>
                  @endif
                </div>
              </div>

            </div>
          </div>
        @endforeach
      </div>

    @endif

  </div>

</section>

{{-- Styles --}}
<style>
/* ============================
   SECTION RÉALISATIONS
   ============================ */
.kiz-realisations {
  padding: 100px 0;
  background: #f8faff;
}

/* En-tête */
.kiz-section-header {
  margin-bottom: 50px;
}
.kiz-section-tag {
  display: inline-block;
  background: rgba(41, 171, 226, 0.12);
  color: var(--kiz-blue, #29ABE2);
  font-size: 13px;
  font-weight: 700;
  letter-spacing: 1.5px;
  text-transform: uppercase;
  padding: 6px 18px;
  border-radius: 50px;
  margin-bottom: 16px;
}
.kiz-section-header h2 {
  font-size: 2.2rem;
  font-weight: 800;
  color: #1a1a2e;
  margin-bottom: 14px;
}
.kiz-section-header p {
  color: #6b7280;
  font-size: 1rem;
  line-height: 1.7;
}

/* Filtres */
.kiz-filters {
  display: flex;
  flex-wrap: wrap;
  gap: 10px;
  justify-content: center;
  margin-bottom: 10px;
}
.kiz-filter-btn {
  border: 2px solid #e5e7eb;
  background: #fff;
  color: #6b7280;
  font-size: 13px;
  font-weight: 600;
  padding: 8px 22px;
  border-radius: 50px;
  cursor: pointer;
  transition: all 0.25s ease;
}
.kiz-filter-btn:hover,
.kiz-filter-btn.active {
  background: var(--kiz-blue, #29ABE2);
  border-color: var(--kiz-blue, #29ABE2);
  color: #fff;
}

/* Carte */
.kiz-card {
  background: #fff;
  border-radius: 16px;
  overflow: hidden;
  box-shadow: 0 4px 20px rgba(0,0,0,0.07);
  transition: transform 0.3s ease, box-shadow 0.3s ease;
  margin-bottom: 30px;
  height: calc(100% - 30px);
  display: flex;
  flex-direction: column;
}
.kiz-card:hover {
  transform: translateY(-6px);
  box-shadow: 0 16px 40px rgba(41, 171, 226, 0.18);
}

/* Image */
.kiz-card-image {
  position: relative;
  overflow: hidden;
  height: 220px;
}
.kiz-card-image img {
  width: 100%;
  height: 100%;
  object-fit: cover;
  transition: transform 0.4s ease;
}
.kiz-card:hover .kiz-card-image img {
  transform: scale(1.07);
}

/* Badge */
.kiz-badge {
  position: absolute;
  top: 14px;
  left: 14px;
  color: #fff;
  font-size: 11px;
  font-weight: 700;
  letter-spacing: 0.8px;
  text-transform: uppercase;
  padding: 4px 14px;
  border-radius: 50px;
  z-index: 2;
  box-shadow: 0 2px 8px rgba(0,0,0,0.2);
}

/* Overlay */
.kiz-overlay {
  position: absolute;
  inset: 0;
  background: linear-gradient(135deg, rgba(26,26,46,0.92), rgba(41,171,226,0.85));
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
  padding: 24px;
  opacity: 0;
  transition: opacity 0.35s ease;
  z-index: 3;
}
.kiz-card:hover .kiz-overlay {
  opacity: 1;
}
.kiz-overlay-desc {
  color: rgba(255,255,255,0.92);
  font-size: 13.5px;
  line-height: 1.6;
  text-align: center;
  margin-bottom: 20px;
}
.kiz-overlay-actions {
  display: flex;
  gap: 10px;
  flex-wrap: wrap;
  justify-content: center;
}
.kiz-btn-overlay {
  display: inline-flex;
  align-items: center;
  gap: 6px;
  background: rgba(255,255,255,0.15);
  border: 2px solid rgba(255,255,255,0.6);
  color: #fff;
  font-size: 13px;
  font-weight: 600;
  padding: 8px 18px;
  border-radius: 50px;
  text-decoration: none;
  transition: all 0.25s ease;
  backdrop-filter: blur(4px);
}
.kiz-btn-overlay:hover {
  background: #fff;
  color: #1a1a2e;
  border-color: #fff;
}

/* Corps */
.kiz-card-body {
  padding: 24px;
  flex: 1;
  display: flex;
  flex-direction: column;
}
.kiz-card-title {
  font-size: 1.05rem;
  font-weight: 700;
  color: #1a1a2e;
  margin-bottom: 10px;
  line-height: 1.4;
}
.kiz-card-desc {
  color: #6b7280;
  font-size: 13.5px;
  line-height: 1.6;
  flex: 1;
  margin-bottom: 16px;
}
.kiz-card-footer {
  border-top: 1px solid #f1f3f5;
  padding-top: 14px;
}
.kiz-link {
  color: var(--kiz-blue, #29ABE2);
  font-size: 13px;
  font-weight: 700;
  text-decoration: none;
  display: inline-flex;
  align-items: center;
  gap: 5px;
  transition: gap 0.2s ease;
}
.kiz-link:hover {
  gap: 10px;
  color: var(--kiz-blue, #29ABE2);
}
.kiz-link-disabled {
  color: #9ca3af;
  font-size: 13px;
  font-style: italic;
}

/* État vide */
.kiz-empty {
  padding: 60px 20px;
  color: #9ca3af;
}
.kiz-empty i {
  font-size: 3rem;
  display: block;
  margin-bottom: 14px;
}

/* Animation filtre */
.kiz-grid-item {
  transition: opacity 0.3s ease, transform 0.3s ease;
}
.kiz-grid-item.hidden {
  opacity: 0;
  pointer-events: none;
  position: absolute;
}

/* Mobile */
@media (max-width: 767px) {
  .kiz-realisations { padding: 60px 0; }
  .kiz-section-header h2 { font-size: 1.7rem; }
  .kiz-card-image { height: 190px; }
}
</style>

{{-- Script filtre --}}
<script>
document.addEventListener('DOMContentLoaded', function () {
  const btns = document.querySelectorAll('.kiz-filter-btn');
  const items = document.querySelectorAll('.kiz-grid-item');

  btns.forEach(function (btn) {
    btn.addEventListener('click', function () {
      btns.forEach(function (b) { b.classList.remove('active'); });
      btn.classList.add('active');

      const filter = btn.dataset.filter;
      items.forEach(function (item) {
        if (filter === 'all' || item.dataset.category === filter) {
          item.style.display = '';
        } else {
          item.style.display = 'none';
        }
      });
    });
  });
});
</script>

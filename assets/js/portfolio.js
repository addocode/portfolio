(function(){
  const state = {
    filter: "all",
    query: ""
  };

  const chips = document.querySelectorAll('[data-filter]');
  const search = document.querySelector('#portfolioSearch');
  const cases = Array.from(document.querySelectorAll('.case'));

  const modalBackdrop = document.querySelector('#caseModalBackdrop');
  const modalTitle = document.querySelector('#caseModalTitle');
  const modalSubtitle = document.querySelector('#caseModalSubtitle');
  const modalHero = document.querySelector('#caseModalHero');
  const modalSituation = document.querySelector('#caseModalSituation');
  const modalRole = document.querySelector('#caseModalRole');
  const modalDeliverables = document.querySelector('#caseModalDeliverables');
  const modalTools = document.querySelector('#caseModalTools');
  const modalOutcome = document.querySelector('#caseModalOutcome');
  const modalGallery = document.querySelector('#caseModalGallery');

  function normalize(s){ return (s||"").toLowerCase().trim(); }

  function apply(){
    const q = normalize(state.query);

    cases.forEach(el => {
      const cat = el.dataset.category || "";
      const text = normalize(el.dataset.search || "");
      const passCat = (state.filter === "all" || cat === state.filter);
      const passQ = (!q || text.includes(q));
      el.style.display = (passCat && passQ) ? "" : "none";
    });
  }

  chips.forEach(chip => {
    chip.addEventListener('click', () => {
      chips.forEach(c => c.setAttribute('aria-pressed', 'false'));
      chip.setAttribute('aria-pressed', 'true');
      state.filter = chip.dataset.filter;
      apply();
    });
  });

  if(search){
    search.addEventListener('input', (e) => {
      state.query = e.target.value;
      apply();
    });
  }

  function openModal(caseEl){
    const data = caseEl.dataset;

    modalTitle.textContent = data.title || "Projekt";
    modalSubtitle.textContent = data.subtitle || "";
    modalHero.style.backgroundImage = `url('${data.hero || ""}')`;

    modalSituation.textContent = data.situation || "";
    modalRole.innerHTML = (data.role || "").split("||").map(x => `<li>${x}</li>`).join("");
    modalDeliverables.innerHTML = (data.deliverables || "").split("||").map(x => `<li>${x}</li>`).join("");
    modalTools.textContent = data.tools || "";
    modalOutcome.textContent = data.outcome || "";

    // Gallery (optional, pipe-separated urls)
    modalGallery.innerHTML = "";
    const gallery = (data.gallery || "").split("||").map(s => s.trim()).filter(Boolean);
    if(gallery.length){
      const wrap = document.createElement('div');
      wrap.className = "grid";
      gallery.forEach(url => {
        const card = document.createElement('div');
        card.className = "card";
        card.style.gridColumn = "span 6";
        card.innerHTML = `<div style="height:220px;border-radius:14px;border:1px solid var(--line);background:url('${url}') center/cover;"></div>`;
        wrap.appendChild(card);
      });
      modalGallery.appendChild(wrap);
    }

    modalBackdrop.classList.add('open');
    document.body.style.overflow = "hidden";

    // Deep-link
    if(data.slug) history.replaceState(null, "", `#case=${encodeURIComponent(data.slug)}`);
  }

  function closeModal(){
    modalBackdrop.classList.remove('open');
    document.body.style.overflow = "";
    // clear hash only if we set it
    if(location.hash.startsWith("#case=")) history.replaceState(null, "", location.pathname);
  }

  document.addEventListener('click', (e) => {
    const card = e.target.closest('.case');
    if(card) openModal(card);
  });

  document.querySelectorAll('[data-close-modal]').forEach(btn => {
    btn.addEventListener('click', closeModal);
  });

  modalBackdrop?.addEventListener('click', (e) => {
    if(e.target === modalBackdrop) closeModal();
  });

  document.addEventListener('keydown', (e) => {
    if(e.key === "Escape" && modalBackdrop.classList.contains('open')) closeModal();
  });

  // Open via hash
  function openFromHash(){
    const m = location.hash.match(/^#case=(.+)$/);
    if(!m) return;
    const slug = decodeURIComponent(m[1]);
    const el = cases.find(c => (c.dataset.slug || "") === slug);
    if(el) openModal(el);
  }

  apply();
  openFromHash();
})();
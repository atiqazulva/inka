document.addEventListener("DOMContentLoaded", () => {
  const reduce = matchMedia("(prefers-reduced-motion: reduce)").matches;

  document.querySelectorAll("img.avatar").forEach((img) => {
    const pakaiInisial = () => {
      const d = document.createElement("div");
      d.className = img.className + " avatar-fallback";
      d.textContent = img.dataset.inisial || "?";
      img.replaceWith(d);
    };
    img.addEventListener("error", pakaiInisial);
    if (img.complete && img.naturalWidth === 0) pakaiInisial();
  });

  document.querySelectorAll(".bar__isi").forEach((el) => {
    const w = el.dataset.lebar + "%";
    reduce
      ? (el.style.width = w)
      : requestAnimationFrame(() =>
          setTimeout(() => (el.style.width = w), 150),
        );
  });

  document.querySelectorAll("[data-count]").forEach((el) => {
    const target = +el.dataset.count;
    if (reduce) {
      el.textContent = target;
      return;
    }
    const mulai = performance.now(),
      durasi = 800;
    const step = (t) => {
      const p = Math.min((t - mulai) / durasi, 1);
      el.textContent = Math.round(target * p);
      if (p < 1) requestAnimationFrame(step);
    };
    requestAnimationFrame(step);
  });

  const toast = document.getElementById("toast");
  let timer;
  const tampilToast = (pesan) => {
    toast.textContent = pesan;
    toast.classList.add("show");
    clearTimeout(timer);
    timer = setTimeout(() => toast.classList.remove("show"), 2200);
  };

  document
    .getElementById("btnNotif")
    .addEventListener("click", () => tampilToast("Belum ada notifikasi baru"));

  document
    .querySelectorAll(".sertif__item")
    .forEach((a) =>
      a.addEventListener("click", () =>
        tampilToast(
          "Mengunduh sertifikat: " + a.querySelector("span").textContent,
        ),
      ),
    );

  document.getElementById("btnKeluar").addEventListener("click", (e) => {
    if (!confirm("Yakin ingin keluar dari akun?")) e.preventDefault();
  });
});

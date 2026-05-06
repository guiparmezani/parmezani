const body = document.body;
const switcherButtons = document.querySelectorAll("[data-study-target]");
const savedStudy = window.localStorage.getItem("portfolio-study");
const requestedStudy = new URLSearchParams(window.location.search).get("study");
const allowedStudies = new Set(["atelier", "field", "signal"]);

function setStudy(study) {
  body.dataset.study = study;
  switcherButtons.forEach((button) => {
    button.setAttribute("aria-pressed", String(button.dataset.studyTarget === study));
  });
  window.localStorage.setItem("portfolio-study", study);
}

const initialStudy = allowedStudies.has(requestedStudy) ? requestedStudy : savedStudy;

if (allowedStudies.has(initialStudy)) {
  setStudy(initialStudy);
}

switcherButtons.forEach((button) => {
  button.addEventListener("click", () => setStudy(button.dataset.studyTarget));
});

document.querySelectorAll('a[href^="#"]').forEach((link) => {
  link.addEventListener("click", (event) => {
    const target = document.querySelector(link.getAttribute("href"));
    if (!target) return;
    event.preventDefault();
    target.scrollIntoView({ behavior: "smooth", block: "start" });
  });
});

if (window.gsap && window.ScrollTrigger) {
  gsap.registerPlugin(ScrollTrigger);

  gsap.from(".site-header", {
    y: -18,
    opacity: 0,
    duration: 0.7,
    ease: "power3.out",
  });

  gsap.utils.toArray("[data-reveal]").forEach((element) => {
    if (element.classList.contains("site-header")) return;
    if (element.classList.contains("capability-list")) return;

    gsap.from(element, {
      y: 28,
      opacity: 0,
      duration: 0.8,
      ease: "power3.out",
      scrollTrigger: {
        trigger: element,
        start: "top 82%",
      },
    });
  });

  gsap.from(".capability-card", {
    y: 34,
    opacity: 0,
    rotateZ: -1.2,
    duration: 0.75,
    ease: "power3.out",
    stagger: 0.08,
    scrollTrigger: {
      trigger: ".capability-list",
      start: "top 82%",
    },
  });

  gsap.to(".hero-card--one", {
    yPercent: -8,
    scrollTrigger: {
      trigger: ".hero",
      start: "top top",
      end: "bottom top",
      scrub: true,
    },
  });

  gsap.to(".hero-card--two", {
    yPercent: 10,
    scrollTrigger: {
      trigger: ".hero",
      start: "top top",
      end: "bottom top",
      scrub: true,
    },
  });

  gsap.to(".hero-card--three", {
    xPercent: 12,
    scrollTrigger: {
      trigger: ".hero",
      start: "top top",
      end: "bottom top",
      scrub: true,
    },
  });
}

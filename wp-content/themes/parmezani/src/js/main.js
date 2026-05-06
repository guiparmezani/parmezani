import { gsap } from "gsap";
import { ScrollTrigger } from "gsap/ScrollTrigger";

const root = document.documentElement;
const themeToggle = document.querySelector(".theme-toggle");
const themeToggleText = document.querySelector(".theme-toggle__text");
const storageKey = "parmezani-theme";

function currentTheme() {
  return root.dataset.theme === "dark" ? "dark" : "light";
}

function setTheme(theme) {
  root.dataset.theme = theme;
  window.localStorage.setItem(storageKey, theme);

  if (!themeToggle) return;

  const isDark = theme === "dark";
  themeToggle.setAttribute("aria-pressed", String(isDark));

  if (themeToggleText) {
    themeToggleText.textContent = isDark ? "Light" : "Dark";
  }
}

if (themeToggle) {
  setTheme(currentTheme());
  themeToggle.addEventListener("click", () => {
    setTheme(currentTheme() === "dark" ? "light" : "dark");
  });
}

document.querySelectorAll('a[href^="#"]').forEach((link) => {
  link.addEventListener("click", (event) => {
    const target = document.querySelector(link.getAttribute("href"));
    if (!target) return;

    event.preventDefault();
    target.scrollIntoView({ behavior: "smooth", block: "start" });
  });
});

const reducedMotion = window.matchMedia("(prefers-reduced-motion: reduce)").matches;

if (!reducedMotion) {
  gsap.registerPlugin(ScrollTrigger);

  gsap.from(".site-header", {
    y: -18,
    opacity: 0,
    duration: 0.7,
    ease: "power3.out",
  });

  gsap.utils.toArray("[data-reveal]").forEach((element) => {
    if (element.classList.contains("site-header")) return;

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

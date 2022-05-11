//-------------------- Responsive Navbar -----------------------//
const hamburger = document.querySelector("#hamburger");
const navMenu = document.querySelector("#nav-menu");

hamburger.addEventListener("click", () => {
  document.body.classList.toggle("nav-filter");
  hamburger.classList.toggle("active");
  navMenu.classList.toggle("active");
});

document.querySelectorAll(".nav-link").forEach((n) =>
  n.addEventListener("click", () => {
    hamburger.classList.remove("active");
    navMenu.classList.remove("active");
    document.body.classList.remove("nav-filter");
  })
);

//-------------------- ScrollReveal JS -----------------------//
const sr = ScrollReveal({
  origin: "top",
  distance: "100px",
  duration: 2000,
  delay: 250,
});

sr.reveal("#nav-menu");
sr.reveal(".home-content");
sr.reveal(".home-reviews, .contact-content", {
  origin: "bottom",
  duration: 2500,
  delay: 300,
});
sr.reveal("#logo", { origin: "bottom", delay: 100 });
sr.reveal(".footer-content");
sr.reveal(".footer-card ul li, .cards-container", {
  distance: "150px",
  origin: "right",
});
sr.reveal(".main-image", {
  rotate: {
    x: 180,
    z: 180,
  },
  duration: 1500,
  delay: 250,
  origin: "left",
  distance: "250px",
});
sr.reveal(".residencies-header");
sr.reveal(".residencies-container, .value-content", {
  origin: "bottom",
  duration: 2500,
  delay: 300,
});

//-------------------- Swiper JS -----------------------//
var swiper = new Swiper(".residencies-container", {
  grabCursor: true,
  centeredSlides: true,
  slidesPerView: "auto",
  loop: true,
  autoplay: {
    delay: 2000,
    disableOnInteraction: false,
  },
  navigation: {
    nextEl: ".swiper-button-next",
    prevEl: ".swiper-button-prev",
  },
});

//-------------------- Accordion Collapse -----------------------//
const accordionItems = document.querySelectorAll(".value-accordion-item");
accordionItems.forEach((item) => {
  const accordionHeader = item.querySelector(".accordion-header");

  accordionHeader.addEventListener("click", () => {
    const openItem = document.querySelector(".accordion-open");

    toggleItem(item);

    if (openItem && openItem !== item) {
      toggleItem(openItem);
    }
  });
});

const toggleItem = (item) => {
  const accordionContent = item.querySelector(".accordion-content");

  if (item.classList.contains("accordion-open")) {
    accordionContent.removeAttribute("style");
    item.classList.remove("accordion-open");
  } else {
    accordionContent.style.height = accordionContent.scrollHeight + "px";
    item.classList.add("accordion-open");
  }
};

//-------------------- Button to scroll up -----------------------//
const toTop = document.querySelector(".to-top");

window.addEventListener("scroll", () => {
  if (window.scrollY > 200) {
    toTop.classList.add("active");
  } else {
    toTop.classList.remove("active");
  }
});

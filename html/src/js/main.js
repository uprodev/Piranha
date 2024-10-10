// lenis
const lenis = new Lenis({
  lerp: 0.3,
});

function raf(time) {
  lenis.raf(time);
  requestAnimationFrame(raf);
}

requestAnimationFrame(raf);

lenis.on("scroll", ScrollTrigger.update);

gsap.ticker.add((time) => {
  lenis.raf(time * 1000);
});

// animate home main title
var tlH1 = gsap.timeline({
  repeat: -1,
});
tlH1
  .to(
    ".title-animated span",
    {
      y: "-1em",
      duration: 1,
      ease: "power2.in",
    },
    "+=2"
  )
  .to(
    ".title-animated span",
    {
      y: 0,
      duration: 1,
      ease: "power2.in",
    },
    "+=2"
  );

// navbar
document.querySelectorAll(".navbar-toggler").forEach((toggler) => {
  toggler.addEventListener("click", function () {
    if (document.querySelector(".header-navbar").classList.contains("active")) {
      document.querySelector(".header").classList.remove("nav-opened");
      document.querySelector(".header-navbar").classList.remove("active");
    } else {
      document.querySelector(".header-navbar").classList.add("active");
      document.querySelector(".header").classList.add("nav-opened");
    }
  });
});

// languages
if (document.querySelector(".lang-switcher")) {
  document.querySelector(".lang-switcher button").addEventListener("click", function (e) {
    e.stopPropagation();
    this.closest(".lang-switcher").classList.toggle("active");
  });
  document.querySelectorAll(".lang-switcher ul a").forEach((el) => {
    el.addEventListener("click", function (e) {
      e.stopPropagation();
      // e.preventDefault();
      var text = this.innerText;
      this.closest(".lang-switcher").querySelector("button").innerText = text;
      this.closest(".lang-switcher").classList.remove("active");
    });
  });
  document.addEventListener("click", function () {
    document.querySelector(".lang-switcher").classList.remove("active");
  });
}

// video
if (document.querySelector(".btn-sound")) {
  document.querySelectorAll(".btn-sound").forEach((btn) => {
    btn.addEventListener("click", function (e) {
      e.preventDefault();
      const video = this.closest(".video").querySelector("video");
      if (video.muted) {
        (video.muted = false), this.classList.add("off");
      } else {
        (video.muted = true), this.classList.remove("off");
      }
    });
  });
}

//animate home page
if (document.querySelector(".home-banner")) {
  const animatedColorChars = SplitType.create(".animated-color", { types: "words, chars" });
  const start = window.innerHeight - 125;

  lenis.on("scroll", function () {
    if (lenis.actualScroll < start) {
      document.querySelector(".header").classList.add("header-light");
    }
  });

  document.querySelector(".scroll-link").addEventListener("click", function (e) {
    e.preventDefault();
    lenis.scrollTo(document.querySelector(".home-section-1"), { duration: 1 });
  });

  gsap.to(".home-section-1", {
    scrollTrigger: {
      trigger: ".home-section-1",
      scrub: true,
      start: "top " + start,
      end: "top top",
    },
    width: "100%",
    onComplete: function () {
      document.querySelector(".header").classList.remove("header-light");
    },
  });

  gsap.to(".home-section-1", {
    scrollTrigger: {
      trigger: ".home-section-1",
      scrub: true,
      start: "top bottom",
      end: () => `+=125`,
    },
    opacity: 1,
  });

  gsap.to(".home-section-1 .text", {
    scrollTrigger: {
      trigger: ".home-section-1 .text",
      start: "top 90%",
    },
    opacity: 1,
    duration: 0.4,
    ease: "power2.in",
  });
  gsap.to(animatedColorChars.chars, {
    scrollTrigger: {
      trigger: ".home-section-1 .text",
      start: "top 50%",
    },
    duration: 0.05,
    ease: "none",
    color: "#3da9ff",
    stagger: 0.05,
  });

  gsap.to(
    ".home-section-1 .video",
    {
      scrollTrigger: {
        trigger: ".home-section-1 .video",
        start: "top 90%",
      },
      opacity: 1,
      duration: 0.5,
      ease: "power2.in",
    },
    "+=0.4"
  );
}

if (document.querySelector(".animated-text-lines")) {
  var splits1 = document.querySelectorAll(".animated-text-lines p");

  function splitLines() {
    splits1.forEach((txt) => {
      const text = SplitType.create(txt);

      var lines = txt.querySelectorAll(".line");

      lines.forEach((line, i) => {
        gsap.to(line, {
          scrollTrigger: {
            trigger: txt,
            start: "top 80%",
          },
          y: 0,
          opacity: 1,
          duration: 1,
          delay: 0.2 * i,
          ease: "power.easeIn",
          onComplete: function () {
            txt.classList.add("animated");
          },
        });
      });

      splits1.forEach((el) => {
        el.style.visibility = "visible";
      });
    });
  }

  splitLines();

  var winWidth = window.innerWidth;
  window.addEventListener("resize", function () {
    if (window.innerWidth !== winWidth) {
      splitLines();
      winWidth = window.innerWidth;
    }
  });
}

// fade in
document.querySelectorAll(".fade-in, .fade-in-wrapper > *").forEach((el) => {
  gsap.to(el, {
    scrollTrigger: {
      trigger: el,
      start: "top 80%",
    },
    y: 0,
    opacity: 1,
    duration: 1,
    ease: "power.easeIn",
  });
});

var getUrlParameter = function getUrlParameter(sParam) {
  var sPageURL = window.location.search.substring(1),
    sURLVariables = sPageURL.split("&"),
    sParameterName,
    i;
  for (i = 0; i < sURLVariables.length; i++) {
    sParameterName = sURLVariables[i].split("=");
    if (sParameterName[0] === sParam) {
      return sParameterName[1] === undefined ? true : decodeURIComponent(sParameterName[1]);
    }
  }
  return false;
};
if (getUrlParameter("id")) {
  var dest = document.getElementById(getUrlParameter("id"));
  tlHomeSection.play(0);
  tlHomeSectionAnimated = true;
  setTimeout(() => {
    lenis.scrollTo(dest, { duration: 1 });
  }, 2000);
}

// lenis
const lenis = new Lenis({
  lerp: 0.06,
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
document.querySelector(".lang-switcher button").addEventListener("click", function (e) {
  e.stopPropagation();
  this.closest(".lang-switcher").classList.toggle("active");
});
document.querySelectorAll(".lang-switcher ul a").forEach((el) => {
  el.addEventListener("click", function (e) {
    e.stopPropagation();
    e.preventDefault();
    var text = this.innerText;
    this.closest(".lang-switcher").querySelector("button").innerText = text;
    this.closest(".lang-switcher").classList.remove("active");
  });
});
document.addEventListener("click", function () {
  document.querySelector(".lang-switcher").classList.remove("active");
});

// video
if (document.querySelector(".btn-sound")) {
  document.querySelectorAll(".btn-sound").forEach((btn) => {
    btn.addEventListener("click", function (e) {
      e.preventDefault();
      const video = this.closest(".video").querySelector("video");
      if (video.muted) {
        (video.muted = false), (this.querySelector("span").innerText = "sound off");
      } else {
        (video.muted = true), (this.querySelector("span").innerText = "sound on");
      }
    });
  });
}

//animate home page
if (document.querySelector(".home-banner")) {
  const animatedColorChars = SplitType.create(".animated-color", { types: "words, chars" });

  var tlHomeSectionAnimated = false;
  var animationTop = window.innerHeight - 125;
  var tlHomeSection = gsap.timeline({
    paused: true,
    onComplete: function () {
      ScrollTrigger.refresh();
    },
    onReverseComplete: function () {
      tlHomeSectionAnimated = false;
      ScrollTrigger.refresh();
    },
  });
  tlHomeSection
    .set(".page-content", {
      zIndex: 8,
    })
    .to(".home-section-1", {
      opacity: 1,
      marginTop: animationTop,
      duration: 0.2,
      ease: "none",
    })
    .to(".home-banner .section-panel", {
      opacity: 0,
      duration: 0.2,
      ease: "none",
    })
    .to(".home-section-1", {
      width: "100%",
      marginTop: 0,
      duration: 1.5,
      ease: "expo.out",
      onComplete: function () {
        tlHomeSectionAnimated = true;
        ScrollTrigger.refresh();
        document.querySelector(".header").classList.remove("header-light");
      },
    })
    .to(
      ".home-section-1 .text",
      {
        opacity: 1,
        duration: 0.4,
        ease: "power2.in",
      },
      "-=1.2"
    )
    .to(
      ".home-section-1 .video",
      {
        opacity: 1,
        duration: 0.5,
        ease: "power2.in",
      },
      "+=0.4"
    )
    .to(
      animatedColorChars.chars,
      {
        duration: 0.05,
        ease: "none",
        color: "#3da9ff",
        stagger: 0.05,
      },
      "-=1.4"
    );

  let mm = gsap.matchMedia();
  mm.add("(min-width: 1024px)", () => {
    lenis.on("scroll", function () {
      if (lenis.direction === 1) {
        if (lenis.actualScroll > 0 && lenis.actualScroll < window.innerHeight) {
          if (!tlHomeSectionAnimated) {
            lenis.scrollTo(0, { duration: 0 });
            tlHomeSection.play();
          }
        }
      } else {
        if (lenis.actualScroll > 0 && lenis.targetScroll === 0) {
          if (tlHomeSectionAnimated) {
            document.querySelector(".header").classList.add("header-light");
            tlHomeSection.reverse(1.2, { duration: 0.2 });
          }
        }
      }
    });
    document.querySelector(".scroll-link").addEventListener("click", function (e) {
      e.preventDefault();
      tlHomeSection.play();
    });
  });
  mm.add("(max-width: 1023px)", () => {
    gsap.to(animatedColorChars.chars, {
      scrollTrigger: {
        trigger: ".animated-color",
        start: "top center",
      },
      duration: 0.04,
      ease: "none",
      color: "#3da9ff",
      stagger: 0.03,
    });

    lenis.on("scroll", function () {
      if (lenis.actualScroll > window.innerHeight) {
        document.querySelector(".header").classList.remove("header-light");
      } else {
        document.querySelector(".header").classList.add("header-light");
      }
    });

    document.querySelector(".scroll-link").addEventListener("click", function (e) {
      e.preventDefault();
      lenis.scrollTo(document.querySelector(".home-section-1"), { duration: 1 });
    });
  });
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

  var winWidth = $(window).width();
  $(window).on("resize", function () {
    if ($(window).width() !== winWidth) {
      splitLines();
      winWidth = $(window).width();
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

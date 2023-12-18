// AOS 이벤트
function aosEvent() {
  AOS.init({
    // offset:300,
    duration: 800,
    once: true,
  });
}

// 상단 메뉴 이벤트
function menuEvent() {
  // 기본 변하지않는 변수
  const html = document.querySelector("html");
  const body = document.querySelector("body");
  const header = document.querySelector("header");

  let menuWrap = document.querySelector(".h_main__wrap");
  var burgerBtn = document.querySelector(".h_mobile__btn");

  menuWrap.addEventListener("mouseover", function () {
    header.setAttribute("data-menu", "on");
  });

  menuWrap.addEventListener("mouseout", function () {
    header.removeAttribute("data-menu");
  });

  // 상단 메뉴 이벤트 - 모바일
  function mobileEvent() {
    let linkToggle;

    function hideSubMenu() {
      linkToggle = document.querySelectorAll(".h_mo .h_menu__link");
      for (let i = 0; i < linkToggle.length; i++) {
        linkToggle[i].setAttribute("aria-toggle", "false");
      }
    }

    function clickSubMenu() {
      hideSubMenu();
      for (let i = 0; i < linkToggle.length; i++) {
        linkToggle[i].addEventListener("click", function () {
          if (this.getAttribute("aria-toggle") === "true") {
            hideSubMenu();
          } else {
            hideSubMenu();
            this.setAttribute("aria-toggle", "true");
          }
        });
      }
    }

    clickSubMenu();

    // 기존 태그에 없던 속성추가
    // data-hamburger-effect : 햄버거 버튼클릭시 body에 효과
    function burgerMaker(event) {
      if (
        event === undefined ||
        event.getAttribute("aria-pressed") === "true"
      ) {
        header.setAttribute("data-header-mobile", "off");
        body.setAttribute("data-hamburger-effect", "off");

        burgerBtn.setAttribute("aria-pressed", "false");
        hideSubMenu();
      } else {
        burgerBtn.setAttribute("aria-pressed", "true");
        header.setAttribute("data-header-mobile", "on");
        body.setAttribute("data-hamburger-effect", "on");

        linkToggle.forEach((link) => {
          link.addEventListener("click", function (event) {
            event.preventDefault();
          });
        });
      }
    }

    burgerBtn.addEventListener("click", function () {
      burgerMaker(this);
    });
  }

  mobileEvent();
}

menuEvent();

// SWIPER
const testswiper_swiper = new Swiper("#testswiper", {
  // Optional parameters
  // direction: 'vertical',
  loop: true,

  // If we need pagination
  pagination: {
    el: "#testswiper .swiper-pagination",
  },

  // Navigation arrows
  navigation: {
    nextEl: "#testswiper .swiper-button-next",
    prevEl: "#testswiper .swiper-button-prev",
  },

  // And if we need scrollbar
  scrollbar: {
    el: ".swiper-scrollbar",
  },
});

const waffle_swiper = new Swiper(".swiper", {
  // Optional parameters
  // direction: 'vertical',
  loop: true,

  // If we need pagination
  pagination: {
    el: ".swiper-pagination",
  },

  // Navigation arrows
  navigation: {
    nextEl: ".swiper-button-next",
    prevEl: ".swiper-button-prev",
  },

  // And if we need scrollbar
  scrollbar: {
    el: ".swiper-scrollbar",
  },
});

function mainMenu() {
  const tabList = document.querySelectorAll(".menu--main .tab-menu > li");
  const tabCon = document.querySelectorAll(".menu--main .tab-con > li");
  const tab = document.querySelectorAll(".menu--main .tab-menu > li .button");

  // console.log(tabBlock.length);

  tabList.forEach((list, index) => {
    list.addEventListener("click", function (e) {
      e.preventDefault();

      tabList.forEach((current) => {
        current.classList.remove("on");
      });

      list.classList.add("on");

      tabCon.forEach((current) => {
        current.classList.remove("on");
      });

      tabCon[index].classList.add("on");
    });
  });

  let menuItems = document.querySelectorAll(".menu--main .block");

  menuItems.forEach((menitem, count) => {
    let slideContainer = menitem.querySelector(".swiper-container--main");
    let elementBoxs = menitem.querySelectorAll(".element-item");

    let menuSlide = new Swiper(slideContainer, {
      slidesPerView: 1,
      effect: "fade",
      fadeEffect: {
        crossFade: true,
      },
      speed: 1000,
      observer: true,
      observeParents: true,
      watchOverflow: true,
      pagination: {
        el: ".swiper-container--main  .pagination",
        clickable: true,
      },
      on: {
        slideChange: function () {
          let activeSlideIndex = this.realIndex;

          elementBoxs.forEach(function (box) {
            box.classList.remove("on");
          });

          elementBoxs[activeSlideIndex].classList.add("on");
        },
      },
    });
  });

  let menuPart = new Swiper(".menu--main .swiper-container--part", {
    slidesPerView: 4,
    slidesPerGroup: 4,
    spaceBetween: 8,
    speed: 1000,
    watchOverflow: true,
    observer: true,
    observeParents: true,
    allowTouchMove: true,
    pagination: {
      el: ".swiper-container--part .pagination",
      clickable: true,
    },
    breakpoints: {
      1201: {
        spaceBetween: 30,
        slidesPerView: 5,
        slidesPerGroup: 5,
        allowTouchMove: false,
      },
      992: {
        spaceBetween: 16,
        slidesPerView: 5,
        slidesPerGroup: 5,
      },
      768: {
        spaceBetween: 16,
        slidesPerView: 5,
        slidesPerGroup: 5,
      },
      577: {
        slidesPerView: 5,
        slidesPerGroup: 5,
      },
    },
  });
}

const burgerMenu = document.querySelector('.header-bottom');
const body = document.querySelector("body");
const cartBtn = document.querySelector(".cart-parrent");

document.addEventListener('click', (e) => {
    if (e.target.classList.contains("header__burger")) {
        burgerMenu.classList.add('_active');
        body.style.overflow = `hidden`;
        cartBtn.classList.add('_full');
    } else if (e.target.dataset.action === "close-burger") {
        burgerMenu.classList.remove('_active');
        body.style.overflow = `auto`;
        cartBtn.classList.remove('_full');
    }
});
const gutter = header.offsetHeight + document.querySelector('.navigation-list').offsetHeight - 60;
const markers = document.querySelectorAll(".navigation-marker");

markers.forEach(el => {
    el.style.top = `-${gutter}px`;
})



window.addEventListener("scroll", checkScroll);
document.addEventListener("DOMContentLoaded", checkScroll);

let navButtons = document.querySelectorAll('.navigation-list__button');


function checkScroll() {
    let scrollPos = window.scrollY;
    let navigation = document.querySelector(".main__navigation").offsetTop;

    if((scrollPos + header.offsetHeight) > navigation) {
        document.querySelector(".navigation-list").classList.add('nav-fixed')
    } else {
        document.querySelector(".navigation-list").classList.remove('nav-fixed')
    }

    if (scrollPos + gutter >= document.getElementById('video-present-content').offsetTop) {
        navButtons.forEach(el => {
            el.classList.remove("_current");
        })
        document.querySelector('[data-translate="video-present"]').classList.add('_current');

    }
    if (scrollPos + gutter >= document.getElementById('description-content').offsetTop) {
        navButtons.forEach(el => {
            el.classList.remove("_current");
        })
        document.querySelector('[data-translate="description"]').classList.add('_current');

    }
    if (scrollPos + gutter >= document.getElementById('characteristics-content').offsetTop) {
        navButtons.forEach(el => {
            el.classList.remove("_current");
        })
        document.querySelector('[data-translate="characteristics"]').classList.add('_current');

    }
    if (scrollPos + gutter >= document.getElementById('festival-gallery-content').offsetTop) {
        navButtons.forEach(el => {
            el.classList.remove("_current");
        })
        document.querySelector('[data-translate="festival-gallery"]').classList.add('_current');

    }
    if (scrollPos + gutter >= document.getElementById('sets-content').offsetTop) {
        navButtons.forEach(el => {
            el.classList.remove("_current");
        })
        document.querySelector('[data-translate="sets"]').classList.add('_current');

    }
}
$(document).ready(function() {
 $("a.navigation-list__button").click(function() {
      $("html, body").animate({
         scrollTop: $($(this).attr("href")).offset().top + 30
      }, {
         duration: 500,
         easing: "swing"
      });
      return false;
 });
});
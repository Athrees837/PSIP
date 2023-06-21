function init() {
    let map = new ymaps.Map('map', {
        center: [53.89392331242095,30.329759038061887],
        zoom: 13
    });
}

ymaps.ready(init);

function showModal() {
alert("Разработчик сайта: https://github.com/Athrees837");
}

setTimeout(showModal, 3000);


document.addEventListener("click", (e) => {
    if (e.target.dataset.action === "spoiler") {
        let eParrent = e.target.closest(".spoiler");
        eParrent.classList.toggle('_active');
    }
});

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

const btnUp = {
  el: document.querySelector('.btn-up'),
  scrolling: false,
  show() {
    if (this.el.classList.contains('btn-up_hide') && !this.el.classList.contains('btn-up_hiding')) {
      this.el.classList.remove('btn-up_hide');
      this.el.classList.add('btn-up_hiding');
      window.setTimeout(() => {
        this.el.classList.remove('btn-up_hiding');
      }, 300);
    }
  },
  hide() {
    if (!this.el.classList.contains('btn-up_hide') && !this.el.classList.contains('btn-up_hiding')) {
      this.el.classList.add('btn-up_hiding');
      window.setTimeout(() => {
        this.el.classList.add('btn-up_hide');
        this.el.classList.remove('btn-up_hiding');
      }, 300);
    }
  },
  addEventListener() {
    // при прокрутке окна (window)
    window.addEventListener('scroll', () => {
      const scrollY = window.scrollY || document.documentElement.scrollTop;
      if (this.scrolling && scrollY > 0) {
        return;
      }
      this.scrolling = false;
      // если пользователь прокрутил страницу более чем на 200px
      if (scrollY > 400) {
        // сделаем кнопку .btn-up видимой
        this.show();
      } else {
        // иначе скроем кнопку .btn-up
        this.hide();
      }
    });
    // при нажатии на кнопку .btn-up
    document.querySelector('.btn-up').onclick = () => {
      this.scrolling = true;
      this.hide();
      // переместиться в верхнюю часть страницы
      window.scrollTo({
        top: 0,
        left: 0,
        behavior: 'smooth'
      });
    }
  }
}
btnUp.addEventListener();

function animateElements() {
const textElements = document.querySelectorAll('.about .text span');
const attentionElements = document.querySelectorAll('.about .attention span, .about .attention div');

let delay = 0;

textElements.forEach((element) => {
    setTimeout(() => {
       element.style.opacity = '1';
       element.style.transform = 'translateY(0)';
    }, delay);
    delay += 300;
});

delay = 0;

attentionElements.forEach((element) => {
    setTimeout(() => {
            element.style.opacity = '1';
            element.style.transform = 'translateY(0)';
        }, delay);
        delay += 300;
    });
}

function checkScroll() {
    const aboutSection = document.querySelector('.about');
    const aboutSectionTop = aboutSection.offsetTop;
    const aboutSectionHeight = aboutSection.offsetHeight;
    const windowHeight = window.innerHeight;

    if (window.pageYOffset > aboutSectionTop - windowHeight + aboutSectionHeight / 2) {
        animateElements();
        window.removeEventListener('scroll', checkScroll);
    }
}

window.addEventListener('scroll', checkScroll);

var slideIndex = 1;
var sliderContainer = document.querySelector('.slider_container');
var prevArrow = document.querySelector('.slider_arrow.left');
var nextArrow = document.querySelector('.slider_arrow.right');

prevArrow.addEventListener('click', function () {
    if (slideIndex > 1) {
        slideIndex--;
        sliderContainer.style.transform = `translateX(-${(slideIndex - 1) * 33.33}%)`;
        }
    });

nextArrow.addEventListener('click', function () {
    if (slideIndex < 3) {
        slideIndex++;
        sliderContainer.style.transform = `translateX(-${(slideIndex - 1) * 33.33}%)`;
        }
    });

let tooltipElem;

document.onmouseover = function(event) {
  let target = event.target;
// если у нас есть подсказка...
  let tooltipHtml = target.dataset.tooltip;
  if (!tooltipHtml) return;
      // ...создадим элемент для подсказки
  tooltipElem = document.createElement('div');
  tooltipElem.className = 'tooltip';
  tooltipElem.innerHTML = tooltipHtml;
  document.body.append(tooltipElem);

  // спозиционируем его сверху от аннотируемого элемента (top-center)
  let coords = target.getBoundingClientRect();

  let left = coords.left + (target.offsetWidth - tooltipElem.offsetWidth) / 2;
  if (left < 0) left = 0; // не заезжать за левый край окна

  let top = coords.top - tooltipElem.offsetHeight - 5;
  if (top < 0) { // если подсказка не помещается сверху, то отображать её снизу
    top = coords.top + target.offsetHeight + 5;
  }

  tooltipElem.style.left = left + 'px';
  tooltipElem.style.top = top + 'px';
};

document.onmouseout = function(e) {

  if (tooltipElem) {
    tooltipElem.remove();
    tooltipElem = null;
  }
};

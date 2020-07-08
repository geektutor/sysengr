var slideIndex = 1;
showSlides(slideIndex);

function plusSlides(n) {
  showSlides(slideIndex += n);
}

function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("dot");
  if (n > slides.length) {
    slideIndex = 1
  }
  if (n < 1) {
    slideIndex = slides.length
  }
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";
  }
  for (i = 0; i < dots.length; i++) {
    dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";
  dots[slideIndex-1].className += " active";
}

function showsearch() {
  var input = document.getElementById('input');
  if (input.className === "search") {
    input.className += " show";
  } else if (input.className === "search show") {
    input.className += " ram";
  } else if (input.className === "search show ram") {
    input.className = "search show";
  }
  else {
    input.className = "search";
  }
}

function toggleDropdown() {
    let navbarToggle = document.getElementById("navbar-toggle");
    let dropdown = document.getElementById("dropdown");
    if (navbarToggle.className === 'navbar') {
        navbarToggle.className += ' responsive';

    } else if (navbarToggle.className === 'navbar responsive') {
      navbarToggle.className += ' ness';
    } else if (navbarToggle.className === 'navbar responsive ness') {
      navbarToggle.className = 'navbar responsive'
    }
    else {
        navbarToggle.className = 'navbar';
    }

    if (dropdown.className === 'menu-container') {
      dropdown.className += ' responsive';
    } else if (dropdown.className === 'menu-container responsive') {
      dropdown.className += ' close';
    } else if (dropdown.className === 'menu-container responsive close') {
      dropdown.className = 'menu-container responsive';
    } else {
      dropdown.className = 'menu-container';
    }
}

var coll = document.getElementsByClassName('drop-btn');
var i;

for (i = 0; i < coll.length; i++) {
  coll[i].addEventListener("click", function(){
    this.classList.toggle("active");
    var content = this.nextElementSibling;
    if (content.style.maxHeight) {
      content.style.maxHeight = null;
    } else {
      content.style.maxHeight = content.scrollHeight + "px";
    }
  });
}

var pro = document.getElementsByClassName('pro');

for (i = 0; i < coll.length; i++) {
  pro[i].addEventListener("click", function(){
    this.classList.toggle("active");
    var content = this.nextElementSibling;
    if (content.style.maxHeight) {
      content.style.maxHeight = null;
    } else {
      content.style.maxHeight = content.scrollHeight + "px";
    }
  });
}

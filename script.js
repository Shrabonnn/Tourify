document.addEventListener('DOMContentLoaded', function() {
    let menu = document.getElementById('menu-btn');
    let navbar = document.querySelector('.navbar');

    menu.onclick = function() {
        menu.classList.toggle('fa-bars');
        menu.classList.toggle('fa-times');
        navbar.classList.toggle('active');
    };

    window.onscroll = function() {
       
        menu.classList.remove('fa-times');
        navbar.classList.remove('active');
    }; 
    var swiper = new Swiper(".home-slider", {
      loop:true,
      navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
      },
    }); 

      var swiper = new Swiper(".reviews-slider", {
        
        loop: true,
        spaceBetween: 20,
        autoHeight: true,
        grabCursor: true,
        breakpoints: {
          0: {
            slidesPerView: 1,
          },
          700: {
            slidesPerView: 2,
          },
          1000: {
            slidesPerView: 3,
          },
        },
      });
      
});

let loadMoreBtn = document.querySelector('.packages .load-more .btn')
let currentItem = 3;

loadMoreBtn.onclick =() =>{
  let boxes = [...document.querySelectorAll('.packages .box-container .box')];
  for(var i= currentItem; i < currentItem +3 ; i++){
    boxes[i].style.display = 'inline-block';

  };
  currentItem += 3;
  if(currentItem >= boxes.length){
    loadMoreBtn.style.display = 'none';
  }

}  

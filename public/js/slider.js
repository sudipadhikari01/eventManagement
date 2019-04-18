//AUTO PLAY
var autoplay = true,
  time = 5, //seconds
  time = time * 1000; //miliseconds

    //MEDIA QUERY change image size
var isize = ''; //prefix inainte de extensiunea imaginii
  if (window.matchMedia("(max-width: 576px)").matches)  { isize = '-xs'; /* -xs Extra Small*/  }
  if (window.matchMedia("(min-width: 576px)").matches)  { isize = '-sm'; /* -sm Small*/ }
  if (window.matchMedia("(min-width: 768px)").matches)  { isize = '-md'; /* -md Medium*/}
  if (window.matchMedia("(min-width: 992px)").matches)  { isize = '-lg'; /* -lg Large*/  }
  if (window.matchMedia("(min-width: 1200px)").matches) { isize = '-xl'; /* -xl Extra Large*/ }
  if (window.matchMedia("(min-width: 1800px)").matches) { isize = '';     /* Original (2000px)*/ }

    /* VAR SELECTORS */
var btn_prev = document.querySelector('#gzSlider .buttons .prev'),
    btn_next = document.querySelector('#gzSlider .buttons .next'),
    mouse_enter = document.getElementById('gzSlider').onmouseenter = slideOnMouseEneter,
    mouse_enter = document.getElementById('gzSlider').onmouseleave = slideOnMouseLeave,
    slider_item = document.querySelectorAll('#gzSlider .sliders .sliders_item'),
    sliderImages = document.querySelectorAll('#gzSlider .sliders img'),
    progres_circle = document.querySelector('.progress-circle-prog');

  /* Other var */
var n = slider_item.length - 1,  //Slide numbers
  isLoad = new Array(),  //If i slider is Loaded
    progress_i = 0,
    current = 0,
    next_slide = 0,
    prev_slide = 0,
    paused = false;   


//Mouse Enter Slider
function slideOnMouseEneter(){ paused = true; }

//Mouse Leave Slider
function slideOnMouseLeave(){ paused = false; }

//Clear all images
function slideReset(){
  for (var i = 0; i <= n; i++) {
    slider_item[i].classList.remove("showed");
  }
  progress_i = 0;
  progres_circle.style.strokeDasharray = '0, 999';
}


//add set src
function slideSetSrc(i) {
  if(isLoad[i] != 1){
    if(sliderImages[i].hasAttribute('src') == false){
      sliderImages[i].src = sliderImages[i].getAttribute('data-src').replace(/(\.[\w\d_-]+)$/i, '-thumb'+'$1');
    }
    sliderImages[i].onload = function () { //IF small image is load
      setInterval(function() {
        sliderImages[i].src = sliderImages[i].getAttribute('data-src').replace(/(\.[\w\d_-]+)$/i, isize+'$1');
        sliderImages[i].onload = function () { //IF big image is load
          isLoad[i] = 1; //This image isLoad = TRUE
          sliderImages[i].classList.remove("blur");
          sliderImages[i].classList.add('noblur');
        }
        }, 100);  
    } 
  } 
}

//Show Prev
function slidePrev(){
  current--;
  slideReset();
  slider_item[current].classList.add('showed');
  slideSetSrc(current);

  if(current != 0){ prev_slide=current-1;}
  else{prev_slide = n;}
  if( isLoad[prev_slide] != 1 ) { slideSetSrc(prev_slide); }
  
}
//Show Next
function slideNext(){
  current++;
  slideReset();
  slideSetSrc(current);
  slider_item[current].classList.add('showed');

  if(current != n){ next_slide=current+1; }
  else{next_slide = 0;}
  if( isLoad[next_slide] != 1 ) { slideSetSrc(next_slide); }
}

//Prev buton click
btn_prev.addEventListener('click', function(){
  if(current === 0){
    current = n; //modfff
  }
  slidePrev();
});

//Next buton click
btn_next.addEventListener('click', function(){
  if(current === n){
    current = -1;
  }
  slideNext();
});


function progressCircle(){
  var progress = setInterval( function() {
  
    if(!paused){ 
      progress_i++; 
      progres_circle.style.strokeDasharray = (progress_i * 0.94)  + ' 999'; //circumference of the circle = 2*pi*r = 94 
    }

    if(progress_i > 100){
      if(current == n){ current = -1; }
      slideNext();
    }

  }, time/100); 
}

//Init slider
function startSlider() {
  if(!autoplay){ document.querySelector('.progress').style.display = "none"; }
  slider_item[0].classList.add('showed');
  slideSetSrc(0);

  var loadFirst = setInterval(function(){
    if (document.readyState == 'complete' && isLoad[0] ) {
      slideSetSrc(1);
      slideSetSrc(n);
      if(autoplay){ progressCircle(); }
      clearInterval(loadFirst);
    }
  }, 100);

}

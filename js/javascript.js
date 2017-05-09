var slideIndex = 1;
showDivs(slideIndex);

function plusDivs(n) {
  showDivs(slideIndex += n);
}

function currentDiv(n) {
  showDivs(slideIndex = n);
}

function showDivs(n) {
  var i;
  var x = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("circle");
  
  if (n > x.length) {slideIndex = 1}    
  if (n < 1) {slideIndex = x.length}
  for (i = 0; i < x.length; i++) {
     x[i].style.display = "none";  
  }
  for (i = 0; i < dots.length; i++) {
     dots[i].className = dots[i].className.replace(" white_cl", "");
  }
  x[slideIndex-1].style.display = "block";  
  dots[slideIndex-1].className += " white_cl";
}

  $("footer a[href='#myPage']").click(function() {
  $("html, body").animate({ scrollTop: 0 }, "slow");
  return false;
});

$(document).ready(function () {

    var a = $('.scrollup').offset().top;
  
    $(window).scroll(function () {
        if ($(this).scrollTop() > 700) {
            $('.scrollup').fadeIn();
        } else {
            $('.scrollup').fadeOut();
        }
    });

    $('.scrollup').click(function () {
        $("html, body").animate({
            scrollTop: 0
        }, 600);
        return false;
    });

});

function toggle_visibility(id) {
  var e = document.getElementById(id);
  // var kk = document.getElementById("add_btn");
  if(e.style.display == 'block'){
    e.style.display = 'none';
    // kk.disabled = true;
  } else{
    e.style.display = 'block';
  }
}

function block_visibility(id) {
  var e = document.getElementById(id);
  
  if (id == 'user_area'){
    var o = document.getElementById('doctor_area');
    var bar = document.getElementById('foo1');
    if (e.style.display = 'none'){
      e.style.display = 'block'; 
      o.style.display = 'none';
      bar.style.display = 'none';
    }
  } else{
    var o = document.getElementById('user_area')
    var foo = document.getElementById('foo');
    if (e.style.display = 'none'){
      e.style.display = 'block';
      o.style.display = 'none';
      foo.style.display = 'none';
    }
  } 
}
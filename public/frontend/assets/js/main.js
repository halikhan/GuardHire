wow = new WOW({
    boxClass: 'wow', // default
    animateClass: 'animated', // default
    offset: 0, // default
    mobile: true, // default
    live: true // default
  })
  wow.init();


  $('.sideBarButton').on('click', () => {
    let navvi = document.getElementById("mySidenav");
    $(navvi).toggleClass("navToggleMenu");
  })

  function closeNav() {
    let navvi = document.getElementById("mySidenav");
    $(navvi).css("width", "0");
  }

  $(document).ready(function() {
    $('#nav-icon1').click(function() {
      $(this).toggleClass('open');
    });
  });


window.onscroll = function () { scrollFunction() };

function scrollFunction() {
if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
document.getElementById("navbarHeader").classList.add('color');
document.getElementById("navMenu").classList.add('navMenuColor');
} else {
document.getElementById("navbarHeader").classList.remove('color');
document.getElementById("navMenu").classList.remove('navMenuColor');
}
}

$(".categories").chosen({disable_search_threshold: 10});


function base_url(string){
    return base_url + string;
  }
  
  var base_url = window.location.href.substr(window.location.href.lastIndexOf("/")+1);
  if(base_url == "index.php"){
    $("#home").addClass("active");
  }
  if(base_url == "how-it-works.php"){
    $("#works").addClass("active");
  }
  if(base_url == "browse-services.php"){
    $("#services").addClass("active");
  }
  if(base_url == "browse-quotes.php"){
    $("#quotes").addClass("active");
  }
  if(base_url == "browse-companies.php"){
    $("#company").addClass("active");
  }
  if(base_url == "blogs.php"){
    $("#blog").addClass("active");
  }
  if(base_url == "sign-in.php"){
    $("#signIn").addClass("active");
  }
  if(base_url == "sign-up.php"){
    $("#signUp").addClass("active");
  }

  var x, i, j, l, ll, selElmnt, a, b, c;
/*look for any elements with the class "custom-select":*/
x = document.getElementsByClassName("custom-select");
l = x.length;
for (i = 0; i < l; i++) {
  selElmnt = x[i].getElementsByTagName("select")[0];
  ll = selElmnt.length;
  /*for each element, create a new DIV that will act as the selected item:*/
  a = document.createElement("DIV");
  a.setAttribute("class", "select-selected");
  a.innerHTML = selElmnt.options[selElmnt.selectedIndex].innerHTML;
  x[i].appendChild(a);
  /*for each element, create a new DIV that will contain the option list:*/
  b = document.createElement("DIV");
  b.setAttribute("class", "select-items select-hide");
  for (j = 1; j < ll; j++) {
    /*for each option in the original select element,
    create a new DIV that will act as an option item:*/
    c = document.createElement("DIV");
    c.innerHTML = selElmnt.options[j].innerHTML;
    c.addEventListener("click", function(e) {
        /*when an item is clicked, update the original select box,
        and the selected item:*/
        var y, i, k, s, h, sl, yl;
        s = this.parentNode.parentNode.getElementsByTagName("select")[0];
        sl = s.length;
        h = this.parentNode.previousSibling;
        for (i = 0; i < sl; i++) {
          if (s.options[i].innerHTML == this.innerHTML) {
            s.selectedIndex = i;
            h.innerHTML = this.innerHTML;
            y = this.parentNode.getElementsByClassName("same-as-selected");
            yl = y.length;
            for (k = 0; k < yl; k++) {
              y[k].removeAttribute("class");
            }
            this.setAttribute("class", "same-as-selected");
            break;
          }
        }
        h.click();
    });
    b.appendChild(c);
  }
  x[i].appendChild(b);
  a.addEventListener("click", function(e) {
      /*when the select box is clicked, close any other select boxes,
      and open/close the current select box:*/
      e.stopPropagation();
      closeAllSelect(this);
      this.nextSibling.classList.toggle("select-hide");
      this.classList.toggle("select-arrow-active");
    });
}
function closeAllSelect(elmnt) {
  /*a function that will close all select boxes in the document,
  except the current select box:*/
  var x, y, i, xl, yl, arrNo = [];
  x = document.getElementsByClassName("select-items");
  y = document.getElementsByClassName("select-selected");
  xl = x.length;
  yl = y.length;
  for (i = 0; i < yl; i++) {
    if (elmnt == y[i]) {
      arrNo.push(i)
    } else {
      y[i].classList.remove("select-arrow-active");
    }
  }
  for (i = 0; i < xl; i++) {
    if (arrNo.indexOf(i)) {
      x[i].classList.add("select-hide");
    }
  }
}
/*if the user clicks anywhere outside the select box,
then close all select boxes:*/
document.addEventListener("click", closeAllSelect);


const passwordField = document.querySelector("#password");
const eyeIcon = document.querySelector("#eye");
eye.addEventListener("click", function () {
    this.classList.toggle("fa-eye-slash");
    const type = passwordField.getAttribute("type") === "password" ? "text" : "password";
    passwordField.setAttribute("type", type);
})

$('[data-fancybox="gallery"]').fancybox({
  buttons: [
    "slideShow",
    "thumbs",
    "zoom",
    "fullScreen",
    "share",
    "close"
  ],
  loop: false,
  protect: true
});
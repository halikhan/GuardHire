$('.sideBarButton').on('click', () => {
  let navvi = document.getElementById("mySidenav");
  $(navvi).toggleClass("navToggleMenu");
})

function closeNav() {
  let navvi = document.getElementById("mySidenav");
  $(navvi).css("width", "0");
}

$(document).ready(function () {
  $('#nav-icon1').click(function () {
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

function readURL(input) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();
    reader.onload = function (e) {
      $('#imagePreview').css('background-image', 'url(' + e.target.result + ')');
      $('#imagePreview').hide();
      $('#imagePreview').fadeIn(650);
    }
    reader.readAsDataURL(input.files[0]);
  }
}

$("#imageUpload").change(function () {
  readURL(this);
});

$(document).ready(function () {
  var selector = $('#locationSets, #locationSetsOne');
  selector.selectize({
    plugins: ['remove_button']
  });
});




$(document).ready(function () {
  $('#simple').selectize();
});

$(document).ready(function () {
  $('#exampleOne').DataTable();
  $('#exampleTwo').DataTable();
  $('#exampleThree').DataTable();
});


var selector = '.chatOpen';
var tabButtonOne = '.tabButtonOne';
var tabButtonTwo = '.tabButtonTwo';
var tabContentOne = '.tabContentOne';
var tabContentTwo = '.tabContentTwo';
$(selector).on('click', function () {
  $(tabButtonOne).removeClass('active');
  $(tabButtonTwo).addClass('active');
  $(tabContentOne).removeClass('active show');
  $(tabContentTwo).addClass('active show');
});


// var getSidebar = document.querySelector('.sideNavBar');
// var getToggle = document.getElementsByClassName('toggle');
// for (var i = 0; i <= getToggle.length; i++) {
//     getToggle[i].addEventListener('click', function () {
//         getSidebar.classList.toggle('active');
//});
//


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

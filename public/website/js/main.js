new WOW().init();
// scroll navbar
$(window).scroll(function () {
	var scroll = $(window).scrollTop();
	if (scroll > 100) {
		$("#navbar-fixed-top").css("background", "#FFEEEF");
		$("#navbar-fixed-top").css("box-shadow", "rgb(0 0 0 / 46%) 8px 8px 33px")
	}
	else {
		$("#navbar-fixed-top").css("background", "none");
		$("#navbar-fixed-top").css("box-shadow", "none")

	}
})
// scroll navbar
$(window).scroll(function () {
	var scroll = $(window).scrollTop();
	if (scroll > 100) {
		$("#register-form").css("background", "#000000");
		$("#register-form").css("box-shadow", "rgb(0 0 0 / 46%) 8px 8px 33px")
	}
	else {
		$("#register-form").css("background", "none");
		$("#register-form").css("box-shadow", "none")

	}
})
// MOBILE SCREEN SIDE NAV
var sidebarBox = document.querySelector('#box');
var sidebarBtn = document.querySelector('#btn');
var pageWrapper = document.querySelector('#main-content');

sidebarBtn.addEventListener('click', function (event) {

	if (this.classList.contains('active')) {
		this.classList.remove('active');
		sidebarBox.classList.remove('active');
	} else {
		this.classList.add('active');
		sidebarBox.classList.add('active');
	}
});

pageWrapper.addEventListener('click', function (event) {

	if (sidebarBox.classList.contains('active')) {
		sidebarBtn.classList.remove('active');
		sidebarBox.classList.remove('active');
	}
});

window.addEventListener('keydown', function (event) {

	if (sidebarBox.classList.contains('active') && event.keyCode === 27) {
		sidebarBtn.classList.remove('active');
		sidebarBox.classList.remove('active');
	}
});
// slider
var swiper = new Swiper(".mySwiper", {
	slidesPerView: 3,
	spaceBetween: 30,
	loop: true,
	pagination: {
		el: ".swiper-pagination",
		clickable: true,
	},

	navigation: {
		nextEl: '.swiper-button-next',
		prevEl: '.swiper-button-prev',
	},
	autoplay:
	{
		delay: 2000,
	},
	breakpoints: {
		// when window width is >= 320px
		768: {
			slidesPerView: 2,
			spaceBetween: 20
		},
		375: {
			slidesPerView: 1,
			spaceBetween: 50
		},
		1920: {
			slidesPerView: 4,
			spaceBetween: 20
		},
		1600: {
			slidesPerView: 4,
			spaceBetween: 20

		},
		1400: {
			slidesPerView: 4,
			spaceBetween: 20
		},
		358: {
			slidesPerView: 1,
			spaceBetween: 20

		},
		320: {
			slidesPerView: 1,
			spaceBetween: 150

		},
		820: {
			slidesPerView: 2,
			spaceBetween: 20
		},
		1366: {
			slidesPerView: 4,
			spaceBetween: 30

		},
		1024: {
			slidesPerView: 3,
			spaceBetween: 10

		}
	}

});
//
$(document).ready(function () {
	// Swiper: Slider
	new Swiper('.swiper-container', {
		loop: true,
		slidesPerView: 3,
		paginationClickable: true,
		spaceBetween: 20,
		navigation: {
			nextEl: '.swiper-button-next',
			prevEl: '.swiper-button-prev',
		},
		autoplay:
	{
		delay: 2000,
	},
		breakpoints: {
			768: {
				slidesPerView: 1,
				spaceBetween: 20
			},
			375: {
				slidesPerView: 1,
				spaceBetween: 50
			},
			1920: {
				slidesPerView: 3,
				spaceBetween: 20
			},
			1600: {
				slidesPerView:3,
				spaceBetween: 20

			},
			1400: {
				slidesPerView: 3,
				spaceBetween: 20
			},
			358: {
				slidesPerView: 1,
				spaceBetween: 20

			},
			320: {
				slidesPerView: 1,
				spaceBetween: 150

			},
			820: {
				slidesPerView: 2,
				spaceBetween: 20
			},
			768: {
				slidesPerView: 2,
				spaceBetween: 20
			},
			1366: {
				slidesPerView: 3,
				spaceBetween: 30

			},
			2560:{
				slidesPerView: 3,
				spaceBetween: 30
			},
			1024: {
				slidesPerView: 3,
				spaceBetween: 20

			},
			1440:{
				slidesPerView: 3,
				spaceBetween:10

			},
			autoplay:
			{
				delay: 2000,
			},
		}
	});
});
// wedding-inner-page image change path

function changeimg(url, e) {
	document.getElementById("img").src = url;
	let nodes = document.getElementById("thumb_img");
	let img_child = nodes.children;
	for (i = 0; i < img_child.length; i++) {
		img_child[i].classList.remove('active')
	}
	e.classList.add('active');

}


// date & timepicker
// get a new date (locale machine date time)
var date = new Date();
// get the date as a string
var n = date.toDateString();
// get the time as a string
var time = date.toLocaleTimeString();

// find the html element with the id of time
// set the innerHTML of that element to the date a space the time
// document.getElementById('time').innerHTML = n + ' ' + time;
document.getElementById('time').innerHTML = time + ' ' + n;











































  function imgGallery() {
      $('.swiper-slide-active').attr("data-bs-toggle", "modal")
      $('.swiper-slide-active').attr("data-bs-target", "#staticBackdrop")
      $(".swiper-slide-active").click(function () {
          let allSlides = document.querySelectorAll('[data-swiper-slide-index]')
          let currentSlide = $("[data-swiper-slide-index]").index(this);
        //   console.log(currentSlide);
        //   console.log(allSlides[currentSlide].childNodes[1].childNodes[1].src);
          let img = $(this).find('img').attr('src');
        //   console.log('allSlides.length ', allSlides.length);
          document.getElementById('modal_img').setAttribute('src', img)
          $('.swiper-slide-active').removeAttr("data-bs-toggle")
          $('.swiper-slide-active').removeAttr("data-bs-target")
          $("#next_btn_modal_slider").click(function () {
              currentSlide++
              if (currentSlide == allSlides.length) {
                  currentSlide = 0
              }
              let nextImg = allSlides[currentSlide].childNodes[1].childNodes[1].src
              document.getElementById('modal_img').setAttribute('src', nextImg)
          });
          $("#prev_btn_modal_slider").click(function () {
              if (currentSlide == 0) {
                  currentSlide = allSlides.length
              }
              currentSlide--
              let nextImg = allSlides[currentSlide].childNodes[1].childNodes[1].src
              document.getElementById('modal_img').setAttribute('src', nextImg)
          });
      });
  }



  


  //   let allStars = document.querySelectorAll('.client_rating_star')
  //     let clickStarIndex = $(".client_rating_star").index(this);
  //     for (let i = 0; i < allStars.length; i++) {
  //         allStars[i].style.color = "#625b54";
  //     }
  //     console.log(clickStarIndex);
  //     console.log(allStars);
  //     for (let j = 0; j <= clickStarIndex; j++) {
  //         allStars[j].style.color = "#85be2d";
  //     }
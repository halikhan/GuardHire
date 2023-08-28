<script src="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.8.2/chosen.jquery.js"></script>
<script
  src="https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.min.js"
  integrity="sha512-Eak/29OTpb36LLo2r47IpVzPBLXnAMPAVypbSZiZ4Qkf8p/7S/XRG5xp7OKWPPYfJT6metI+IORkR5G8F900+g=="
  crossorigin="anonymous"
  referrerpolicy="no-referrer"
></script>

<script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>
<script src="<?php echo e(asset('frontend/assets/js/main.js')); ?>"></script>
<script>
  var swiper = new Swiper(".mySwiper", {
    slidesPerView: 3,
    spaceBetween: 30,
    pagination: {
      el: ".swiper-pagination",
      clickable: true,
    },
    autoplay: {
delay: 2000,
},
breakpoints: {
320: {
        slidesPerView: 1,
        spaceBetween: 20,
      },
360: {
        slidesPerView: 1,
        spaceBetween: 20,
      },
375: {
        slidesPerView: 1,
        spaceBetween: 20,
      },
393: {
        slidesPerView: 1,
        spaceBetween: 20,
      },
414: {
        slidesPerView: 1,
        spaceBetween: 20,
      },
428: {
        slidesPerView: 1,
        spaceBetween: 20,
      },
      540: {
        slidesPerView: 1,
        spaceBetween: 20,
      },
      768: {
        slidesPerView: 2,
        spaceBetween: 20,
      },
      1024: {
        slidesPerView: 3,
        spaceBetween: 30,
      },
},
  });
</script>

<script>
    function greet() {
                console.clear();
            }
            setTimeout(greet, 5000);
</script>
<?php /**PATH C:\xampp\htdocs\guard_hire\resources\views/frontend/layouts/scripts.blade.php ENDPATH**/ ?>
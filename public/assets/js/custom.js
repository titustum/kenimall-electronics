document.addEventListener("DOMContentLoaded", function () {
  const swiper = new Swiper('.hero-swiper-container', {
      loop: true, // Enable loop mode
      autoplay: {
          delay: 5000, // Delay between slides
          disableOnInteraction: false,
      },
      navigation: {
          nextEl: '.hero-swiper-button-next',
          prevEl: '.hero-swiper-button-prev',
      },
      pagination: {
          el: '.hero-swiper-pagination',
          clickable: true,
      },
      effect: 'fade', // Optional: Use fade effect for smooth transitions
      on: {
          slideChange: function () {
              // Remove any previously applied animations from the content
              const slides = document.querySelectorAll('.swiper-slide');
              slides.forEach(slide => {
                  const content = slide.querySelector('.slide-content');
                  if (content) {
                      content.classList.remove('animate__animated', 'animate__fadeIn', 'animate__fadeOut');
                  }
              });

              // Apply fadeIn animation to the new slide content
              const activeSlide = swiper.slides[swiper.activeIndex];
              const activeContent = activeSlide.querySelector('.slide-content');
              if (activeContent) {
                  activeContent.classList.add('animate__animated', 'animate__fadeIn');
              }
          },
      },
  });
});




function initializeSwiperCarousels() {
    // Select all swiper containers and loop through each one
    document.querySelectorAll(".swiper-container").forEach(carousel => {
      // Get configuration values from the element's data attributes, with defaults
      const speed = carousel.getAttribute("data-speed") || 400;
      const spaceBetween = carousel.getAttribute("data-space-between") || 100;
      const hasPagination = "true" === carousel.getAttribute("data-pagination");
      const hasNavigation = "true" === carousel.getAttribute("data-navigation");
      const hasAutoplay = "true" === carousel.getAttribute("data-autoplay");
      const autoplayDelay = carousel.getAttribute("data-autoplay-delay") || 3000;
      const paginationType = carousel.getAttribute("data-pagination-type") || "bullets";
      const effect = carousel.getAttribute("data-effect") || "slide";
      const breakpointsData = carousel.getAttribute("data-breakpoints");
  
      let breakpoints = {};
  
      // If breakpoints data exists, try to parse it as JSON
      if (breakpointsData) {
        try {
          breakpoints = JSON.parse(breakpointsData);
        } catch (error) {
          console.error("Error parsing breakpoints data:", error);
        }
      }
  
      // Default swiper configuration
      const swiperConfig = {
        speed: parseInt(speed),
        spaceBetween: parseInt(spaceBetween),
        breakpoints: breakpoints,
        effect: effect,
      };
  
      // If effect is "fade", enable fadeEffect
      if (effect === "fade") {
        swiperConfig.fadeEffect = { crossFade: true };
      }
  
      // Configure pagination if enabled
      if (hasPagination) {
        const paginationElement = carousel.querySelector(".swiper-pagination");
        swiperConfig.pagination = {
          el: paginationElement,
          type: paginationType,
          dynamicBullets: true,
          clickable: true,
        };
  
        // If pagination type is custom, define custom rendering
        if (paginationType === "custom") {
          swiperConfig.pagination.renderCustom = (swiper, current, total) => {
            let paginationHtml = "";
            for (let i = 1; i <= total; i++) {
              if (current === i) {
                paginationHtml += `<span class="swiper-pagination-numbers swiper-pagination-numbers-active">${i}</span>`;
              } else {
                paginationHtml += `<span class="swiper-pagination-numbers">${i}</span>`;
              }
            }
            return paginationHtml;
          };
        }
      }
  
      // Configure navigation if enabled
      if (hasNavigation) {
        swiperConfig.navigation = {
          nextEl: ".swiper-button-next",
          prevEl: ".swiper-button-prev",
        };
      } else {
        const navigationElement = carousel.querySelector(".swiper-navigation");
        if (navigationElement) {
          navigationElement.classList.add("swiper-navigation-hidden");
        }
      }
  
      // Configure autoplay if enabled
      if (hasAutoplay) {
        swiperConfig.autoplay = {
          delay: parseInt(autoplayDelay),
        };
      }
  
      // Initialize the Swiper instance with the calculated config
      new Swiper(carousel, swiperConfig);
    });
  }
  


  
document.addEventListener("DOMContentLoaded", function () {
  // Initialize all Swiper carousels
  initializeSwiperCarousels();
});
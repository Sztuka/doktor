(function ($) {
  $(document).ready(function () {
    scripts.init();
  });

  const scripts = {
    // BEGIN EDIT HERE

    init: function () {
      this.toggleAndCloseSubmenu();
      this.setupCarousel();
      this.stickyHeader();
      this.handleGradientVisibility();
    },

    // Function to toggle submenus and close them when clicking outside
    toggleAndCloseSubmenu: function () {
      // Select all dropdown items with the class 'dropdown-toggle'
      var dropdowns = document.querySelectorAll(
        ".dropdown-submenu .dropdown-toggle"
      );

      // Add click event listener to each dropdown item
      dropdowns.forEach(function (dropdown) {
        dropdown.addEventListener("click", function (e) {
          e.preventDefault(); // Prevent default action (like navigating to link)
          e.stopPropagation(); // Prevent events from being triggered on parent elements

          // Find the nearest parent dropdown menu
          var dropdownMenu = e.target.nextElementSibling;

          // Close all other submenus by removing 'show' class
          document
            .querySelectorAll(".dropdown-submenu .dropdown-menu.show")
            .forEach(function (openDropdown) {
              // Check if the open dropdown is not the clicked dropdown
              if (
                openDropdown !== dropdownMenu &&
                !dropdownMenu.contains(openDropdown)
              ) {
                openDropdown.classList.remove("show");
              }
            });

          // Toggle 'show' class to hide/show the dropdown menu
          dropdownMenu.classList.toggle("show");
        });
      });

      // Add click event listener to the document
      document.addEventListener("click", function (e) {
        // Check if click was triggered on or within a dropdown, if it was not, close all submenus
        if (!e.target.closest(".dropdown-submenu")) {
          document
            .querySelectorAll(".dropdown-submenu .dropdown-menu.show")
            .forEach(function (openDropdown) {
              openDropdown.classList.remove("show");
            });
        }
      });
    },

    // Function to setup and initialize Owl Carousel
    setupCarousel: function () {
      $(".owl-carousel").owlCarousel({
        loop: true,
        margin: 10,
        autoplay: true,
        autoplayTimeout: 3000, // Time per slide
        autoplaySpeed: 3000, // Transition speed
        smartSpeed: 3000, // Speed of "go to" actions
        fluidSpeed: 3000, // Speed of stage pull to edge
        nav: false, // Disable navigation arrows
        dots: false, // Disable navigation dots
        responsiveClass: true,
        responsive: {
          0: {
            items: 1, // 1 item for screens <350px
          },
          350: {
            items: 2, // 2 items for screens ≥350px and <450px
          },
          450: {
            items: 3, // 3 items for screens ≥450px and <576px
          },
          576: {
            items: 4, // 4 items for screens ≥576px and <768px
          },
          768: {
            items: 5, // 5 items for screens ≥768px and <992px
          },
          992: {
            items: 6, // 6 items for screens ≥992px
          },
        },
      });
    },

    stickyHeader: function () {
      $(window).scroll(function () {
        if ($(window).scrollTop() >= 66) {
          $(".navbar").addClass("i-m_sticked");
        } else {
          $(".navbar").removeClass("i-m_sticked");
        }
      });
    },

    // New function to handle gradient visibility
    handleGradientVisibility: function () {
      var opiniaText = document.getElementById("opiniaText");
      var gradient = document.getElementById("gradient");

      // Check if the content is overflowed
      if (opiniaText.scrollHeight > opiniaText.clientHeight) {
        gradient.classList.add("gradient-visible");
      }
    },

    // END EDIT HERE
  };
})(jQuery);

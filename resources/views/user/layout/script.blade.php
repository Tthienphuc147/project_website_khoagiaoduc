<!-- All JS Custom Plugins Link Here here -->
<script src="{{ asset('/public/user/js/vendor/modernizr-3.5.0.min.js') }}"></script>
<!-- Jquery, Popper, Bootstrap -->

<script src="{{ asset('/public/user/js/popper.min.js') }}"></script>
<script src="{{ asset('/public/user/js/bootstrap.min.js') }}"></script>
<!-- Jquery Mobile Menu -->
<script src="{{ asset('/public/user/js/jquery.slicknav.min.js') }}"></script>

<!-- Jquery Slick , Owl-Carousel Plugins -->
<script src="{{ asset('/public/user/js/owl.carousel.min.js') }}"></script>
<script src="{{ asset('/public/user/js/slick.min.js') }}"></script>
<!-- Date Picker -->
<script src="{{ asset('/public/user/js/gijgo.min.js') }}"></script>
<!-- One Page, Animated-HeadLin -->
<script src="{{ asset('/public/user/js/wow.min.js') }}"></script>
<script src="{{ asset('/public/user/js/animated.headline.js') }}"></script>
<script src="{{ asset('/public/user/js/jquery.magnific-popup.js') }}"></script>

<!-- Breaking New Pluging -->
<script src="{{ asset('/public/user/js/jquery.ticker.js') }}"></script>
<script src="{{ asset('/public/user/js/site.js') }}"></script>

<!-- Scrollup, nice-select, sticky -->
<script src="{{ asset('/public/user/js/jquery.scrollUp.min.js') }}"></script>
<script src="{{ asset('/public/user/js/jquery.nice-select.min.js') }}"></script>
<script src="{{ asset('/public/user/js/jquery.sticky.js') }}"></script>

<!-- contact js -->
<script src="{{ asset('/public/user/js/contact.js') }}"></script>
<script src="{{ asset('/public/user/js/jquery.form.js') }}"></script>
<script src="{{ asset('/public/user/js/jquery.validate.min.js') }}"></script>
<script src="{{ asset('/public/user/js/mail-script.js') }}"></script>
<script src="{{ asset('/public/user/js/jquery.ajaxchimp.min.js') }}"></script>

<!-- Jquery Plugins, main Jquery -->
<script src="{{ asset('/public/user/js/plugins.js') }}"></script>
<script src="{{ asset('/public/user/js/main.js') }}"></script>
<script>
  let modalId = $('#image-gallery');

$(document)
  .ready(function () {

    loadGallery(true, 'a.thumbnail');

    //This function disables buttons when needed
    function disableButtons(counter_max, counter_current) {
      $('#show-previous-image, #show-next-image')
        .show();
      if (counter_max === counter_current) {
        $('#show-next-image')
          .hide();
      } else if (counter_current === 1) {
        $('#show-previous-image')
          .hide();
      }
    }

    /**
     *
     * @param setIDs        Sets IDs when DOM is loaded. If using a PHP counter, set to false.
     * @param setClickAttr  Sets the attribute for the click handler.
     */

    function loadGallery(setIDs, setClickAttr) {
      let current_image,
        selector,
        counter = 0;

      $('#show-next-image, #show-previous-image')
        .click(function () {
          if ($(this)
            .attr('id') === 'show-previous-image') {
            current_image--;
          } else {
            current_image++;
          }

          selector = $('[data-image-id="' + current_image + '"]');
          updateGallery(selector);
        });

      function updateGallery(selector) {
        let $sel = selector;
        current_image = $sel.data('image-id');
        $('#image-gallery-title')
          .text($sel.data('title'));
        $('#image-gallery-image')
          .attr('src', $sel.data('image'));
        disableButtons(counter, $sel.data('image-id'));
      }

      if (setIDs == true) {
        $('[data-image-id]')
          .each(function () {
            counter++;
            $(this)
              .attr('data-image-id', counter);
          });
      }
      $(setClickAttr)
        .on('click', function () {
          updateGallery($(this));
        });
    }
  });

// build key actions
$(document)
  .keydown(function (e) {
    switch (e.which) {
      case 37: // left
        if ((modalId.data('bs.modal') || {})._isShown && $('#show-previous-image').is(":visible")) {
          $('#show-previous-image')
            .click();
        }
        break;

      case 39: // right
        if ((modalId.data('bs.modal') || {})._isShown && $('#show-next-image').is(":visible")) {
          $('#show-next-image')
            .click();
        }
        break;

      default:
        return; // exit this handler for other keys
    }
    e.preventDefault(); // prevent the default action (scroll / move caret)
  });

</script>
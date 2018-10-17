(function() {
  // ---------------- loading spiner class ---------------
  window.LoadingSpinner = class LoadingSpinner {
    constructor($container, options) {
      var defaults;
      // set default options
      defaults = {
        fadeDuration: 300
      };
      // override the defaults with the passed in options
      this.options = $.extend(defaults, options);
      if (!$("div").hasClass("loadingSpinner")) {
        // create the spinner and add it to the container
        this.$spinner = $("<div>").addClass("loadingSpinner");
        $container.append(this.$spinner);
        this.$spinner.hide().fadeIn(this.options.fadeDuration);
      }
    }

    destroy() {
      return this.$spinner.fadeOut(this.options.fadeDuration, () => {
        this.$spinner.remove();
        return this.$spinner = null;
      });
    }

  };

  // ---------------- spinner <a> class ---------------
  window.SpinnerA = class SpinnerA {
    constructor($a, clickCallback, options) {
      var defaults;
      this.$a = $a;
      this.clickCallback = clickCallback;
      // set default options
      defaults = {
        aContentTag: "span",
        fadeDuration: 300,
        classDuringLoading: "spinning"
      };
      // override the defaults with the passed in options
      this.options = $.extend(defaults, options);
      // if the a has a single dom node inside it, store a reference to it. else, create a new node and put the a text (or children) inside it
      if (this.$a.children().length === 1) {
        this.$childContent = $(this.$a.children()[0]);
      } else {
        this.$childContent = $(`<${this.options.aContentTag}>`);
        if (this.$a.children().length > 1) {
          this.$childContent.append(this.$a.children());
        } else {
          this.$childContent.text(this.$a.text());
          this.$a.empty();
        }
        this.$a.append(this.$childContent);
      }
      // listen for click on the a (if we have a callback function)
      if (this.clickCallback != null) {
        this.$a.click((() => {
          return this.handleClick();
        }));
      }
    }

    handleClick() {
      // start the loading animation
      this.start();
      // call the click callback function if we have one (else, return true so the natural a event chain continues to fire)
      if (this.clickCallback != null) {
        return this.clickCallback();
      } else {
        return true;
      }
    }

    start() {
      // start the loading animation, set the a's class and fade out the existing a content
      this.$a.addClass(this.options.classDuringLoading);
      this.$childContent.animate({
        display: 0
      }, this.options.fadeDuration);
      this.spinner = new LoadingSpinner(this.$a, {
        fadeDuration: this.options.fadeDuration
      });
      // disable the a
      this.$a.prop("disabled", "true");
      return this.$a.addClass("disable");
    }

    stop() {
      // fade back in the existing a content and destroy the loading spinner
      this.$childContent.animate({
        opacity: 1
      }, this.options.fadeDuration);
      this.spinner.destroy();
      this.spinner = null;
      // re-enable the a and remove its class
      this.$a.prop("disabled", "");
      return this.$a.removeClass(this.options.classDuringLoading);
    }

  };

  // ---------------------- usage -----------------------
  $(document).ready(function() {
    var spinnerA;
    // create a spinnerA
    return spinnerA = new SpinnerA($("a.spinner"), function() {
      // you can stop the a by calling .stop()
      return setTimeout(function() {
        return spinnerA.stop();
      }, 160000);
    });
  });

  // run code on click
// $('#home-finder-link').click(
//   $(this).addClass('disable')
// )

}).call(this);

//# sourceMappingURL=maps/button-spinner-script.js.map

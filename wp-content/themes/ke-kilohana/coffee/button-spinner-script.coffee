# ---------------- loading spiner class ---------------

class window.LoadingSpinner

  constructor: ($container, options) ->

    # set default options
    defaults = {
      fadeDuration: 300
    }

    # override the defaults with the passed in options
    @options = $.extend(defaults, options)

    if (!$("div").hasClass("loadingSpinner"))
      # create the spinner and add it to the container
      @$spinner = $("<div>").addClass("loadingSpinner")
      $container.append(@$spinner)
      @$spinner.hide().fadeIn(@options.fadeDuration)


  destroy: ->

    @$spinner.fadeOut(@options.fadeDuration, =>
      @$spinner.remove()
      @$spinner = null
    )




# ---------------- spinner <a> class ---------------

class window.SpinnerA

  constructor: (@$a, @clickCallback, options) ->

    # set default options
    defaults = {
      aContentTag: "span",
      fadeDuration: 300,
      classDuringLoading: "spinning"
    }

    # override the defaults with the passed in options
    @options = $.extend(defaults, options)

    # if the a has a single dom node inside it, store a reference to it. else, create a new node and put the a text (or children) inside it
    if @$a.children().length == 1
      @$childContent = $(@$a.children()[0])
    else

      @$childContent = $("<#{@options.aContentTag}>")

      if @$a.children().length > 1
        @$childContent.append(@$a.children())
      else
        @$childContent.text(@$a.text())
        @$a.empty()

      @$a.append(@$childContent)

    # listen for click on the a (if we have a callback function)
    if @clickCallback? then @$a.click(( => @handleClick() ))


  handleClick: ->

    # start the loading animation
    @start()

    # call the click callback function if we have one (else, return true so the natural a event chain continues to fire)
    if @clickCallback? then @clickCallback() else return true


  start: ->

    # start the loading animation, set the a's class and fade out the existing a content
    @$a.addClass(@options.classDuringLoading)
    @$childContent.animate({display: 0}, @options.fadeDuration)
    @spinner = new LoadingSpinner(@$a, { fadeDuration: @options.fadeDuration })

    # disable the a
    @$a.prop("disabled", "true")

    @$a.addClass("disable")


  stop: ->

    # fade back in the existing a content and destroy the loading spinner
    @$childContent.animate({opacity: 1}, @options.fadeDuration)
    @spinner.destroy()
    @spinner = null

    # re-enable the a and remove its class
    @$a.prop("disabled", "")
    @$a.removeClass(@options.classDuringLoading)




# ---------------------- usage -----------------------

$(document).ready( ->

  # create a spinnerA
  spinnerA = new SpinnerA($("a.spinner"), ->

    # you can stop the a by calling .stop()
    setTimeout( ->
      spinnerA.stop()
    , 160000)
  )
)

# run code on click
# $('#home-finder-link').click(
#   $(this).addClass('disable')
# )

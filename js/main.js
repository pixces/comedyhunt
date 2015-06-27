$(document).ready(function() {
    $("#CH-VideoCarousel").owlCarousel({
        //autoPlay: 3000, //Set AutoPlay to 3 seconds
        items: 4,
        itemsDesktop: [1199, 3],
        itemsDesktopSmall: [979, 3],
        itemsMobile: [600, 1],
        navigation: true
    });
    $("#CH-MobileMenu").click(function() {
        $(this).next().slideToggle();
    });

    // function to show our popups
    function showPopup(whichpopup) {
        var docHeight = $(document).height();
        var scrollTop = $(window).scrollTop();
        $('.overlay-wrapper').show().css({'height': docHeight});
        $('.popup' + whichpopup).show();
    }

    // function to close our popups
    function closePopup() {
        $('.overlay-wrapper, .overlay-content').hide(); //hide the overlay
    }

    $('.show-popup').on('click', function(event) {
        event.preventDefault();
        var selectedPopup = $(this).data('showpopup');
        showPopup(selectedPopup);

        var VideoURL = $(this).attr('data-videoURL');
        var VideoTitle = $(this).attr('data-videoTitle');

        var iframeTemplate = '<iframe width="853" height="480" src="https://www.youtube.com/embed/' + VideoURL + '?rel=0&amp;controls=0&amp;showinfo=0&amp;autoplay=1&amp;modestbranding=1;enablejsapi=1" frameborder="0" allowfullscreen id="th-553fed94be2f27b50100729a-video"></iframe>';

        $(".overlay-content .overlay-title").html(VideoTitle);
        $(".overlay-content .modalVideo").html(iframeTemplate);
    });

    // hide popup when user clicks on close button or if user clicks anywhere outside the container
    $('.close-btn, .overlay-wrapper').on('click', function() {
        $(".overlay-content .overlay-title").empty();
        $(".overlay-content .modalVideo").empty();
        closePopup();
    });

    // hide the popup when user presses the esc key
    $(document).keyup(function(e) {
        if (e.keyCode == 27) { // if user presses esc key
            closePopup();
        }
    });

    /*$('.CH-Video .CH-VideoThumbPlay a').on('click',function(event){
     var CHVideoURL = $(this).attr('data-CHVideoURL');
     var CHVideoTitle = $(this).attr('data-CHVideoTitle');
     
     var iframeTemplate1 = '<iframe width="853" height="480" src="https://www.youtube.com/embed/'+CHVideoURL+'?rel=0&amp;controls=0&amp;showinfo=0&amp;autoplay=1&amp;modestbranding=1;enablejsapi=1" frameborder="0" allowfullscreen id="th-553fed94be2f27b50100729a-video"></iframe>';
     
     $(".CH-VideoOverlay .CH-VideoTitle").html(CHVideoTitle);
     $(".CH-VideoOverlay .CH-VideoDescription").html(iframeTemplate1);
     $(".CH-VideoOverlay").show();
     });
     
     $('.CH-VideoClose').on('click',function(){
     $(".CH-VideoOverlay .CH-VideoTitle").empty();
     $(".CH-VideoOverlay .CH-VideoDescription").empty();
     $(".CH-VideoOverlay").hide();
     });*/

    $(window).resize(function() {
        var windowWidth = $(window).width();
        if (windowWidth > 767) {
            $(".CH-MainMenu ul").show();
        } else {
            $(".CH-MainMenu ul").hide();
        }
    });
    /**
     * 
     * @type @call;$
     */
    var jScrollContainer = $('.CH-GalleryList .scroll-pane');

    /**
     * jSCROLLPANE ON SCROLL
     */
    jScrollContainer

            .bind(
                    'jsp-scroll-y',
                    function(event, scrollPositionY, isAtTop, isAtBottom)
                    {
//					console.log('Handle jsp-scroll-y', this,
//								'scrollPositionY=', scrollPositionY,
//								'isAtTop=', isAtTop,
//								'isAtBottom=', isAtBottom);
                        if (!isAtBottom && scrollPositionY != 0) {

                            var loadCounter = $("#loadCounter").val();
                            if (globalLoadCounter !== loadCounter) {
                                loadCounter = parseInt(loadCounter) + 1;
                                var data = 'page=' + loadCounter + '&isAjaxRequest=1';
                                $.ajax({
                                    type: 'POST',
                                    dataType: 'json',
                                    url: HOST + '/gallery/index',
                                    data: data,
                                    success: function(data) {
                                        if (data.count > 0) {
                                            $("#gallerieVideoContent").html(data.content);
                                            $("#loadCounter").val(loadCounter);
                                        }
                                        
                                    }, error: function(xhr, status, error,data) {
                                        console.log(data);
                                        // $('#ImgError').html(data.error);

                                    }
                                });

                            }

                        }

                    }
            )


            .jScrollPane();

    jScrollContainer.jScrollPane({
        autoReinitialise: true
    });
});




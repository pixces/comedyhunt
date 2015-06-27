$(document).ready(function(){	
	$("#CH-VideoCarousel").owlCarousel({
		//autoPlay: 3000, //Set AutoPlay to 3 seconds
		items:4,
		itemsDesktop:[1199,4],
		itemsDesktopSmall:[979,3],
		itemsMobile:[600,1],
		navigation:true
	});
	$("#CH-MobileMenu").click(function(){
		$(this).next().slideToggle();
	});
	
	// function to show our popups
    function showPopup(whichpopup){
        var docHeight = $(document).height(); 
        var scrollTop = $(window).scrollTop(); 
        $('.overlay-wrapper').show().css({'height' : docHeight}); 
        $('.popup'+whichpopup).show(); 
    }
	
	// function to close our popups
    function closePopup(){
        $('.overlay-wrapper, .overlay-content').hide(); //hide the overlay
    }
	
    $('.show-popup').on('click',function(event){
        event.preventDefault();
        var selectedPopup = $(this).data('showpopup');		
        showPopup(selectedPopup); 
		
		var VideoURL = $(this).attr('data-videoURL');
		var VideoTitle = $(this).attr('data-videoTitle');
		
		var iframeTemplate = '<iframe width="853" height="480" src="https://www.youtube.com/embed/'+VideoURL+'?rel=0&amp;controls=0&amp;showinfo=0&amp;autoplay=1&amp;modestbranding=1;enablejsapi=1" frameborder="0" allowfullscreen id="th-553fed94be2f27b50100729a-video"></iframe>';
		
		$(".overlay-content .overlay-title").html(VideoTitle);
		$(".overlay-content .modalVideo").html(iframeTemplate);
    });
	
	// hide popup when user clicks on close button or if user clicks anywhere outside the container
    $('.close-btn, .overlay-wrapper').on('click',function(){
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
	
	$(window).resize(function(){
		var windowWidth = $(window).width();
		if(windowWidth > 767){
			$(".CH-MainMenu ul").show();
		}else{
			$(".CH-MainMenu ul").hide();
		}
	});
	
	$('.CH-GalleryList .scroll-pane').jScrollPane({
		autoReinitialise:true
	});
	
	$('.CH-FaqList .scroll-pane').jScrollPane({
		autoReinitialise:true
	});
	
	$('.CH-RulesList .scroll-pane').jScrollPane({
		autoReinitialise:true
	});
	
	$(".videoThumb4").ytplaylist({
		holderId: 'ytvideo4',
		html5: true,
		playerWidth: '520',
		autoPlay: true,
		sliding: false,
		listsliding: true,
		slidingshow: true,
		social: true,
		autoHide: false,
		playfirst: 0,
		playOnLoad: false,
		modestbranding: true,
		showInfo: false
	});
	
	$(".videoThumb3").ytplaylist({
		holderId: 'ytvideo3',
		html5: true,
		playerWidth: '520',
		autoPlay: true,
		sliding: false,
		listsliding: true,
		slidingshow: true,
		social: true,
		autoHide: false,
		playfirst: 0,
		playOnLoad: false,
		modestbranding: true,
		showInfo: false
	});
	
});

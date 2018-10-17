$.fn.newsTickerSlider = function(options) {

	var $this = this;
    var defaults = {
		newscontainer: ".fresh_news_wrap",
		newsinnercontainer: ".fresh_news_wrap_inner",
		newsinneritems: ".fresh_news_item",
		visible:false,
		visibletab:false,
		visiblemob:false,
		animationspeed:2000,
		animationdelay:500,
		navShow:true,
		
		textTicker:false,
		textTickerConfig:{
				textTickerTitle:false,
				textTickerSkin:false,
				textTickerBorder:false,
				textTickerBorderColor:false,
				labelTextColor:false,
				labelBorderColor:false,
				labelBackgroundColor:false,
				navigationBorderColor:false,
				navigationBackgroundColor:false
		},
		navNextInner:  '<img src="/wp-content/themes/ke-kilohana/img/optimized/next.png" alt="Next">',
		navPrevInner:  '<img src="/wp-content/themes/ke-kilohana/img/optimized/prev.png" alt="Previous">'
   	};
 	
	var settings 				  = $.extend( {}, defaults, options );

	/* News Container */
	var news_container 			  = settings.newscontainer;
	var news_container_inner 	  = settings.newsinnercontainer;
	var news_container_items 	  = settings.newsinneritems;
	var news_container_diff 	  = 1000;

	/* Visible Items */
	var visibleItems 			  = settings.visible;
	var visibleItemsDesktop 	  = settings.visible;
	var visibleItemsTablet  	  = visibleItems ? (settings.visibletab == false ? 2 : settings.visibletab) : false;
	var visibleItemsMobile  	  = visibleItems ? (settings.visiblemob == false ? 1 : settings.visiblemob) : false;
	
	/* Mixed Settings Variables */
	var newtickerAnimation 		  = settings.newtickerAnimation;
	var itemswidth 				  = newtickerAnimation == true ? 'auto' : 0;
	var scroll_left 			  = 2;
	var clone_element 			  = $this.find(news_container_inner).html();
	var animationspeed 			  = newtickerAnimation == true ? 30 : settings.animationspeed;
	var animationdelay 			  = newtickerAnimation == true ? 20 : settings.animationdelay;
	var animationInterval 		  = 0;
	var total_width  			  = 0;
	var pauseslide 				  = 0;
	var rotate_till 			  = 0;
	var current_index 			  = 0;

	/* Navigation Settings */
	var navShow 				  = settings.navShow;
	var newsNavigation 			  = '.fresh_news_navigation';
	var navNext  				  = '.navNext';
	var navPrev  				  = '.navPrev';
	var navPause 				  = '.navPause';
	var navPlay  				  = '.navPlay';

	var navNextInner  			  = settings.navNextInner;
	var navPrevInner  			  = settings.navPrevInner;
	var navPauseInner 			  = settings.navPauseInner;
	var navPlayInner  			  = settings.navPlayInner;

	/* Text Ticker Configuration */
	var textTickerElement  	      = '.fresh_text_ticker';
	var textTickerTitleElement    = '.fresh_news_navigation_title';
	var textTicker 		          = settings.textTicker;
	
	var textTickerConfig          = settings.textTickerConfig;
	var textTickerTitle           = textTickerConfig.textTickerTitle;
	var textTickerSkin            = textTickerConfig.textTickerSkin;
	var textTickerBorder          = textTickerConfig.textTickerBorder;
	var textTickerBorderColor     = textTickerConfig.textTickerBorderColor;
	var labelTextColor            = textTickerConfig.labelTextColor;
	var labelBorderColor          = textTickerConfig.labelBorderColor;
	var labelBackgroundColor      = textTickerConfig.labelBackgroundColor;
	var navigationBorderColor     = textTickerConfig.navigationBorderColor;
	var navigationBackgroundColor = textTickerConfig.navigationBackgroundColor;
	var textTickerTitleDiff   	  = 50;
	
	var textTickerStyle 		  = '';
	var labelStyle 				  = '';
	var navigationStyle 		  = '';
	

	var methods = {
        init : function() {
			if(textTicker)
			{
				textTickerStyle += textTickerConfig.textTickerBorderColor ? 'border-color:'+textTickerConfig.textTickerBorderColor+';' : textTickerStyle;
				if(textTickerStyle)
					$(textTickerElement).attr('style',textTickerStyle);
					
				if(textTickerTitle)
				{
					labelStyle += textTickerConfig.labelTextColor ? 'color:'+textTickerConfig.labelTextColor+';' : labelStyle;
					labelStyle += textTickerConfig.labelBackgroundColor ? 'background-color:'+textTickerConfig.labelBackgroundColor+';' : labelStyle;
					labelStyle += textTickerConfig.labelBorderColor ? 'border-color:'+textTickerConfig.labelBorderColor+';' : labelStyle;
					labelStyle = labelStyle ? 'style="'+labelStyle+'"' : '';
					
					$this.append('<div class="fresh_news_navigation_title" '+labelStyle+'></div>');
					$this.find(news_container_inner).css({left:$(textTickerTitleElement).width() + textTickerTitleDiff + -15});
				}	
				if(navShow == true)
				{
					navigationStyle += textTickerConfig.navigationBorderColor ? 'border-color:'+textTickerConfig.navigationBorderColor+';' : navigationStyle;
					navigationStyle += textTickerConfig.navigationBackgroundColor ? 'background-color:'+textTickerConfig.navigationBackgroundColor+';' : navigationStyle;
					navigationStyle = navigationStyle ? 'style="'+navigationStyle+'"' : '';	
				}
			}
			
			if(navShow == true)
			{
				$this.append('<div class="fresh_news_navigation" '+navigationStyle+'><a href="javascript:void(0);" class="navPrev">'+navPrevInner+'</a><a href="javascript:void(0);" class="navNext">'+navNextInner+'</a></div>');
				
				$this.find(navNext).bind("click", methods.navigateNext);
				$this.find(navPrev).bind("click", methods.navigatePrev);
				$this.find(navPause).bind("click", methods.navigatePause);
				$this.find(navPlay).bind("click", methods.navigatePlay);
				methods.updateVisibles();
			}
			if(textTickerElement && textTickerSkin) { $this.parents(textTickerElement).addClass(textTickerSkin);$this.parents(textTickerElement).addClass(textTickerBorder); }

        },
		setup: function(){
			if(visibleItems) { itemswidth = methods.itemsWidth(); }
			if(!newtickerAnimation) { scroll_left = itemswidth; }
			total_width = methods.calculateWidth();
			methods.startAnimation();
			setTimeout(function(){
				$this.find(newsNavigation).show();
				$this.find(news_container_inner).bind("mouseover", methods.mouseOver);
				$this.find(news_container_inner).bind("mouseout", methods.mouseOut);
				$this.find(news_container_items).fadeIn();
			},500);
		},
        calculateWidth : function() {
				var check_width = 0;
				$this.find(news_container_items).each(function(){
					check_width +=	$(this).width();
				});
				check_width = check_width + news_container_diff;
				$this.find(news_container_inner).css({width:check_width+'px'});
				total_width = check_width;
				return total_width;
		},
		itemsWidth: function(){
			if(visibleItems) {
				var itemwidth = $this.width() / visibleItems;
				$this.find(news_container_items).css({width:itemwidth+'px'});
				return itemwidth;
			}
		},
		updateVisibles: function(){
			if(visibleItems) {
				if($(window).width() < 480)
				{
					visibleItems = visibleItemsMobile;
				}
				else if($(window).width() < 768)
				{
					visibleItems = visibleItemsTablet;
				}
				else {
					visibleItems = visibleItemsDesktop;
				}
			}
		},
		startAnimation: function(){
			animationInterval = setInterval(function(){
				if(!pauseslide)
				{
					rotate_till = rotate_till + scroll_left;
					current_index++;
					$this.find(news_container_inner).animate({marginLeft:-rotate_till+'px'},animationdelay);
					methods.resetContainer();
				}
			},animationspeed);

		},
		resetContainer: function(){
			if((total_width - rotate_till - news_container_diff) < $this.width())
			{
				$this.find(news_container_inner).append($(clone_element).hide());
				if(visibleItems)
				{
					itemswidth = methods.itemsWidth();
				}
				total_width = methods.calculateWidth();
				$this.find(news_container_items+':hidden').show();
			}
		},
		updateContainer:function(){
			if(visibleItems && !newtickerAnimation)
			{
				methods.updateVisibles();
				scroll_left = methods.itemsWidth();
				total_width = methods.calculateWidth();
				rotate_till = current_index * scroll_left;
				$this.find(news_container_inner).animate({marginLeft:-rotate_till+'px'},0);
				pauseslide = 1;
				setTimeout(function(){
					pauseslide = 0;
				},2000);
			}
		},
		mouseOver: function(){
			pauseslide = 1;
		},
		mouseOut: function() {
			pauseslide = 0;
		},
		navigateNext:function(){
			if(newtickerAnimation == true && visibleItems)
			{
				j=0;
				for(var i=0;i<=rotate_till;i+=itemswidth)
				{
					j++;
				}
				if(j==0) j=1;
				rotate_till = j*itemswidth;
				$this.find(news_container_inner).animate({marginLeft:-rotate_till+'px'},200);
				pauseslide = 1;
				clearInterval(animationInterval);
				rotate_till = rotate_till + scroll_left;
				//methods.resetNavigation();
				methods.resetContainer();
			}
			else
			{
				pauseslide = 1;
				clearInterval(animationInterval);
				var find_width = 0,find_flag = 0, find_diff = 0;
				$this.find(news_container_items).each(function(){
					find_width +=	$(this).width();
					if(find_width > rotate_till && find_flag == 0)
					{
						find_flag = 1;
						find_diff = find_width - rotate_till;
						rotate_till = rotate_till + find_diff;
						$this.find(news_container_inner).animate({marginLeft:-rotate_till+'px'},animationdelay);
					}

				});
				//methods.resetNavigation();
				methods.resetContainer();

			}
		},
		navigatePrev:function(){
			pauseslide = 1;
			if(newtickerAnimation == true && visibleItems)
			{
				j=0;
				for(var i=0;i<rotate_till;i+=itemswidth)
				{
					j++;
				}
				if(j!=0)
				{
					if((rotate_till - (j-1)*itemswidth) >  100)
						rotate_till = (j-1)*itemswidth;
					else if(j-2 >= 0)
						rotate_till = (j-2)*itemswidth;
					else
						rotate_till = (j-1)*itemswidth;
					$this.find(news_container_inner).animate({marginLeft:-rotate_till+'px'},200);
				}
			}
			else
			{
				var find_width = 0,find_flag = 0, find_diff = 0,prev_length = 0;
				$this.find(news_container_items).each(function(){
					find_width 	+=	$(this).width();
					if(find_width >= rotate_till && find_flag == 0)
					{
						find_flag = 1;
						find_diff = rotate_till + find_width;
						rotate_till = prev_length;
						$this.find(news_container_inner).animate({marginLeft:-rotate_till+'px'},animationdelay);
					}
					if(find_flag == 0)
							prev_length +=	$(this).width();

				});
			}
			clearInterval(animationInterval);
			//methods.resetNavigation();

		},
		navigatePause:function(){
			pauseslide = 1;
			clearInterval(animationInterval);
			//methods.resetNavigation();
		},
		navigatePlay:function(){
			pauseslide = 0;

			rotate_till = rotate_till + scroll_left;
			$this.find(news_container_inner).animate({marginLeft:-rotate_till+'px'},animationdelay);

			//methods.resetNavigation();
			methods.resetContainer();
			methods.setup();
		},
		/*resetNavigation: function(){
			if(pauseslide == 1)
			{
				$this.find(navPlay).show();
				$this.find(navPause).hide();
			}
			else
			{
				$this.find(navPlay).hide();
				$this.find(navPause).show();
			}
		}*/

    };

	return this.each(function() {
		methods.init();
		methods.setup();
		$(window).bind("resize", methods.updateContainer);
	});

};

(function($) {

/* Navigation Toggle
   ========================================================================== */

$(document).on('click', '.navigation-toggle', function(event) {
	event.preventDefault();
	$(this).toggleClass('navigation-toggle-active');
	$('.navigation-collapse').toggleClass('navigation-open');
});

$(document).ready(function ($) {

	/* Telephone Links
	   ========================================================================== */

	$('.tel[data-phone], .tel .value[data-phone]').each(function () {
		var me = $(this),
			link = $('<a/>');

		link.html(me.html());
		link.attr('href', 'tel:' + me.data('phone'));
		link.attr('class', me.attr('class'));

		me.replaceWith(link);
	});

	/* HTML5 Placeholder
	   ========================================================================== */

	$('input, textarea').placeholder();
	
	/* Slider
	   ========================================================================== */
	
	$('.slides').slick();

	/* Tabset
	   ========================================================================== */

	var tabLinks = $('[data-tab]');
	var	tabContents = $('[data-tab-content]');
	var	tabLinkActive = '.tab-link.active';
	var	tabLinkActiveClass = 'active';
	var	tabActiveClass = 'active';

	$('[data-tabset]').each(function () {
		var wrapper = $(this);
		var group = wrapper.data('tab-group');
		var scope = '[data-tab-group=' + group + ']';
		var tabs = tabLinks.filter(scope);
		var content = tabContents.filter(scope);
		var initTab = wrapper.data('tab-init');
		
		//
		// Init Tab
		//
		
		$(window).on('load', function () {
			$('[data-tab]' + scope).each(function (index, a) {
				if ($(a).attr('href') === window.location.hash) {
					// Do nothing
				}
				else {
					tabs.filter('[data-tab='+ initTab + ']').addClass(tabLinkActiveClass);
					content.filter('[data-tab-content=' + initTab + ']').addClass(tabActiveClass);
				}
			});
		});
		
		//
		// Tabs
		//
		
		tabs.on('click', function (event) {
			var tab = $(this);
			var	activeTab = tab.data('tab');
			
			if (wrapper.hasClass('tabset-responsive') && window.innerWidth < 768) {
				tabs.filter('[data-tab='+ activeTab +']').toggleClass(tabLinkActiveClass);
				content.filter('[data-tab-content=' + activeTab + ']').toggle(0).end();
			}
			else {
				tabs.removeClass(tabLinkActiveClass).filter('[data-tab='+ activeTab +']').addClass(tabLinkActiveClass);
				content.removeClass(tabActiveClass).filter('[data-tab-content=' + activeTab + ']').addClass(tabActiveClass);
			}
			
			$(window).on('load resize', function () {
				if (window.innerWidth > 767) {
					tabs.removeClass(tabLinkActiveClass).filter('[data-tab='+ activeTab +']').addClass(tabLinkActiveClass);
					content.css('display', '').removeClass(tabActiveClass).filter('[data-tab-content=' + activeTab + ']').addClass(tabActiveClass);
				}
			}).resize();
			
			$.fn.matchHeight._update(); // Update match height
			event.preventDefault();
		});
		
		//
		// Pevious Tab
		//
		
		wrapper.on('click', '[data-tab-prev]' + scope, function (event) {
			for (var i = tabs.length - 1; i >= 0; i--) {
				var tab = tabs.eq(i);

				if (tab.is(tabLinkActive)) {
					tabs.eq(i - 1).trigger('click');

					break;
				}
			}
			
			$.fn.matchHeight._update(); // Update match height
			event.preventDefault();
		});
		
		//
		// Next Tab
		//
		
		wrapper.on('click', '[data-tab-next]' + scope, function (event) {
			for (var i = 0, last = tabs.length; i < last; i++) {
				var tab = tabs.eq(i);
		
				if (tab.is(tabLinkActive)) {
					tabs.eq((i + 1) % last).trigger('click');
					break;
				}
			}
			
			$.fn.matchHeight._update(); // Update match height
			event.preventDefault();
		});
		
		//
		// Hash Tab
		//
		
		$(window).on('hashchange load', function () {
			$('[data-tab]' + scope).each(function (index, a) {
				var tab = $(this);
				var	activeTab = tab.data('tab');
				
				if ($(a).attr('href') === window.location.hash && window.location.href) {
					tabs.removeClass(tabLinkActiveClass).filter('[data-tab='+ activeTab +']').addClass(tabLinkActiveClass);
					content.removeClass(tabActiveClass).filter('[data-tab-content=' + activeTab + ']').addClass(tabActiveClass);
				}
			});
		});
		
		//
		// Link Tab
		//
		
		wrapper.on('click', '[data-tab-link]' + scope, function () {
			var tab = $(this);
			var	activeTab = tab.data('tab-link');
			
			tabs.removeClass(tabLinkActiveClass).filter('[data-tab='+ activeTab +']').addClass(tabLinkActiveClass);
			content.removeClass(tabActiveClass).filter('[data-tab-content=' + activeTab + ']').addClass(tabActiveClass);
				
			$.fn.matchHeight._update(); // Update match height
		});
	});

	/* Accordion
	   ========================================================================== */

	var accordion = '[data-accordion]';
	var	accordionHeader = '[data-accordion-header]';
	var	accordionContent = '[data-accordion-content]';
	var	accordionActiveClass = 'active';

	$(accordion)
	.find(accordionContent).hide().end()
	.find(accordionHeader +':first').addClass(accordionActiveClass).end()
	.find(accordionContent +':first').show().end()
	.on('click', accordionHeader, function (event) {
		var self = $(this);
		var	accordionBody = self.closest(accordion);

		if (!self.hasClass(accordionActiveClass)) {
			accordionBody
				.find(accordionHeader).removeClass(accordionActiveClass).end()
				.find(accordionContent).slideUp().end();

			self.addClass(accordionActiveClass)
				.next(accordionContent).slideDown(function(){
					$.fn.matchHeight._update();
				}).end();

		}

		event.preventDefault();

	});
	
	/* Tooltip
	   ========================================================================== */
	
	$('[data-tooltip]')
		.mouseenter(function() {	
			var title = $(this).attr('title');
			$(this).attr('temp_title', title);
			$(this).attr('title','');
		})
		.mouseleave(function() {
			var title = $(this).attr('temp_title');
			$(this).attr('title', title);
		})
		.click(function() {	
			var title = $(this).attr('temp_title');
			$(this).attr('title', title);
		});

	/* Gallery Shortcode Fancybox
	   ========================================================================== */
	
	$('.gallery-thumbnail a').attr('rel','gallery');
	
	/* $('.gallery a').fancybox({
		maxWidth	: 800,
		maxHeight	: 600,
		fitToView	: false,
		width		: '70%',
		height		: '70%',
		autoSize	: false,
		closeClick	: false,
		openEffect	: 'none',
		closeEffect	: 'none'
	}); */
		
}); // end.ready



$('.hide-content').hide();
$('.learn-btn').click(function(event) {
event.preventDefault();
jQuerythis = $(this);


$(this).toggleClass('hidden-cls');
$('.hide-content').slideToggle('slow');
if ( !$(this).hasClass('hidden-cls') ) {
  $('html, body').animate({
	  scrollTop: $(".hide-content").offset().top-300
  }, 400);
}
jQuerythis.parents('.hidden-part').find('.learn-btn.spage').text(jQuerythis.text() == 'Read Less' ? 'Read More' : 'Read Less');
jQuerythis.parents('.hidden-part').find('.learn-btn.homepage-rm').text(jQuerythis.text() == 'Read Less -' ? 'Read More +' : 'Read Less -');

/* if(jQuerythis).hasClass('homepage-rm'){
	jQuerythis.parents('.hidden-part').find('.learn-btn').text(jQuerythis.text() == 'Read Less -' ? 'Read More +' : 'Read Less -');
}
else{
	
} */

});

$('.menu li.menu-item').each(function(){  
var link = $(this).find('a').attr('href'); 
if (link == '#') {
$(this).addClass('dead-link-anchor'); 
$('.dead-link-anchor > a').removeAttr('href');     
}
}); 
if (jQuery(window).width() < 1199) {
 $("a.button-mobile").on("click touchend", function(e) {
	var el = $(this);
	var link = el.attr("href");
	var attrA = $(this).attr('target');

	e.preventDefault();
	$(el).addClass('button-active');
	setTimeout(function(){ 

	if (attrA === '_blank' ) {
	window.open( link, '_blank');  
	} else {
	window.location = link;  
	}

	}, 600);	  
});

}





}(jQuery));



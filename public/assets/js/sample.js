/* Scripts Created and maintained by James Daly 2011, 2012
1/0 Technologies
 */


$(document).ready(function () {
    loadFancyBox();

    $("table#past_games tr:nth-child(odd)").css("background-color", "#f3f2ed");

    // MAIN NAVIGATION drop down
    $('li.nav_items').hover(function () {
        var li_width = parseInt($(this).css('width'));
        var last_li_width = (li_width - 2)

        if ($(this).hasClass('first_link')) {
            $(this).find('ul').css('width', li_width);
            $(this).find('ul').css('left', '-1px');
        } else {
            $(this).find('ul').css('width', --li_width);
        }
        $(this).find('ul').stop(true, true).slideDown(300);
        if ($(this).find('ul').css('display') == 'block') {
            $(this).find('a:eq(0)').css('color', '#F50021');
        }
        $(this).find('.regions_dropdown:last').css('border-bottom', 'none');

    }, function () {
        $(this).find('ul').stop(true, true).hide();
        $(this).find('a:eq(0)').css('color', 'white');
    });

    // this is adding an data-link = external attribute to all external links for GA tracking

    $('a').not('ul.ad-thumb-list li a').not('div#readspeaker_button1 a, div#readspeaker_button1_1 a').filter(function () {
        return this.hostname && this.hostname !== location.hostname;
		}).attr('data-link', 'external').click(function() {
		var link = $(this).attr('href')
		recordOutboundLink(this, 'Outbound Links', link);
		return false;
    });
	
    function recordOutboundLink(link, category, action) {
        try {
            var pageTracker = _gat._getTracker("UA-3967275-3");
            pageTracker._trackEvent(category, action);
            setTimeout('document.location = "' + link.href + '"', 300)
        } catch (err) { }
    }

	
	//$("a[data-link*='external']")
	/*$('ul.ad-thumb-list li a').removeAttr('data-link');
    $("a[data-link*='external']").click(function () {
        pageTracker._trackPageview('/outgoing/' + $(this).attr('href'));
    }); */
    //alternative way to google tracking	

    $('.nav_items:last').css('width', '163px');

    // for dropdown on change language and regions
    var timeout = 300;
    var closetimer = '';

    $('.change').hover(function () {
        if (closetimer) {
            clearTimeout(closetimer);
        }
        $(this).find('ul').stop(true, true).slideDown(300);
        $(this).find('.regions_dropdown:last').css('border-bottom', 'none');
    },
    function () {
        var that = this;
        closetimer = setTimeout(mclose, timeout);
        function mclose() {
            $(that).find('ul').hide();
        }
    });

    $('li.change:eq(1)').find('ul.hide').addClass('area_dropdown');


    $('div.regions_article').each(function () {
        $(this).find('p.article_content').not(':first').css('width', 'auto');
    });

    var clickToOpen = $('.related_slideshows span.block')
    $(clickToOpen).click(function () {

        $(this).prev().toggle();
        $(this).html('view less &rsaquo;&rsaquo;');

        if ($(this).prev().css('display') == 'none') {
            $(this).html('view more &rsaquo;&rsaquo;');
        }
    });

    var program_location_table = $('#show_more_events').prev();
    var last_rows = $(program_location_table).find('tr:eq(3)').nextAll();
    $(last_rows).hide();
    // var show_less = $('#show_more_events').html('less events &rsaquo;&rsaquo;');
    // var show_more = $('#show_more_events').html('more events &rsaquo;&rsaquo;');

    $('#show_more_events').click(function () {
        $(last_rows).toggle();
        if ($(last_rows).is(':visible')) {
            $('#show_more_events').html('less events &rsaquo;&rsaquo;');
        }
        else {
            $('#show_more_events').html('more events &rsaquo;&rsaquo;');
        }

    });

    function loadFancyBox() {
        $("a.image-overlay").fancybox({
            'titlePosition': 'inside',
            'transitionIn': 'elastic',
            'transitionOut': 'elastic'
        });
    }



    $('.related_slideshows').each(function () {
        $(this).find('.slideshow_pics').slice(3).nextAll().hide();
    });


    $('.slideshow_wrapper').find("br:last").css('display', 'block');




    $('.view_it').toggle(function () {
        var further_rows = $(this).next().next().find('.slideshow_pics').slice(3).nextAll();
        //$(further_rows).prev('br').toggle();
        $(further_rows).slideDown();
        $(this).text('[View fewer]')
        $('.slideshow_wrapper').find("br:last").css('display', 'block');
    }, function () {
        var further_rows = $(this).next().next().find('.slideshow_pics').slice(3).nextAll();
        $(further_rows).slideUp('fast').siblings('br').hide('slow');
        $(this).text('[View more]')
        $(this).next().next().find('br:last').css('display', 'block');
    });


    // removing empty paragraphs that Ektron spits out because it's a silly goose
    $('p').each(function() {
    if ($(this).children().length === 0) {
    $(this).filter(function () {
        return $.trim($(this).text()) === ''
    }).remove()   
    }
	});

    // this is for the three/four column pages that change Global Leadership team is an example
    $('div.four_columns').find('div.columns:last').css('margin-right', '0px');

    $('div.content_subsection').find('p:last').css('margin-bottom', '0px');

	var image_manipulation = function () {
    //this is for article page that has two different size images css is based on size
    $('div.top_article_image a img').filter(function () {
        var width = $(this).width();
        if (width < 290) {
            $(this).parent('a').next('p').css('width', '230px');
        }
    })
    $('div.top_article_image > img').filter(function () {
        var width = $(this).width();
        if (width < 290) {
            $(this).next('p').css('width', '230px');
        } else {
			$(this).next('p').css('width', '100%');
		}
    })
    //this is for article page that has two different size videos css is based on size
    $('div.top_article_image object').filter(function () {
        var width = $(this).width();
        return width < 290;
    }).next('p').css('width', '230px');
	
	} // end image manipulation
	setTimeout(function() {image_manipulation()}, 1100);

    // This is for jquery image map on right rail
    $('.world_map_container area').each(function () {

        // Assigning an action to the mouseover event
        $(this).mouseover(function (e) {
            var country_id = $(this).attr('id').replace('area_', '');
            $('#' + country_id).css('display', 'block');
        });

        // Assigning an action to the mouseout event
        $(this).mouseout(function (e) {
            var country_id = $(this).attr('id').replace('area_', '');
            $('#' + country_id).css('display', 'none');
        });

    });


    //if anchor tags contain text learn more, see or watch add that class to it
    /*$("a:contains('learn')").addClass('learn_more');
    $("a:contains('LEARN')").addClass('learn_more');
    $("a:contains('see')").addClass('learn_more');
    $("a:contains('SEE')").addClass('learn_more');
    $("a:contains('watch')").addClass('learn_more');
    $("a:contains('WATCH')").addClass('learn_more');
    $("a:contains('Tennessee')").removeClass('learn_more');
	$("a:contains('seen')").removeClass('learn_more'); */
    $('div.slideshow_pics').each(function (i, element) {
        $(this).find('a').eq(1).addClass('learn_more').css({ display: 'block', 'margin-top': '5px' });
    });

    //	$('div.slideshow_pics a:gt(0)')


    //clearing some stuff on the actual old slideshow pages
    var sectionalheader = $('#articleLeft .sectional .sectionalHeader');
    if ($(sectionalheader).length > 0) {
        $('div.sectionalHeader h3').css('text-transform', 'capitalize');
    }
    else {
        var features_media_block = $('div.left_wrapper #articleLeft div.sectional')
        $(features_media_block).find(":nth-child(3n+1)").css('clear', 'both');
        $(features_media_block).find(":eq(0)").css('clear', 'none');
    }

    if ($('#regions_header').length) {
        $('#landingContent').css('background-color', 'white');
    }

    // removing background gifs on some of the old pages integrating into new regions styling
    if ($('#regions_main_content').length) {
        $('#articleContent').css('background-image', 'none');
        $('#maincont').css('background-image', 'none');
        $('#landingContent').css('background-image', 'none');
    }


    // for newsletter sign up


    $('.addthis_button_print img').remove();
   // $('.addthis_button img').remove();
   
   var removeImage = function () {
	$('a.addthis_button').each(function () {
			$(this).children('img').remove();
		});  
   }
	setTimeout(removeImage, 3000);




    // 12/14/2011 New functionality view more for global events calendar
    var eventDetails = $('td.event_details p').find('span.show')
    $('<span> ... </span>').insertAfter(eventDetails);  //elipses afterwards really? yes really!
    $('table tr td span.view_more').css({ 'display': 'block', 'cursor': 'pointer' }).toggle(function () {
        $(this).prev().slideDown('slow');
        $(this).text('View Less');
        $(this).prev().prev().hide();
        $(this).parent().parent().next().find('span.hide').show();

    }, function () {
        $(this).prev().slideUp('fast');
        $(this).text('View More');
        $(this).prev().prev().show();
        $(this).parent().parent().next().find('span.hide').hide();

    });

    // this is to bold any for more information within span tags... yes really
    function boldThisYo($el) {
        $el.contents().each(function () {

            if (this.nodeType == 3) { // Text only
                $(this).replaceWith($(this).text().replace(/(For more information)/gi, '<strong>For more information</strong>'));
            }
        });
    }
	
	function seeMore($el) {
        $el.each(function () {
               var see_more_string = $(this).text();
			   var patt= /(see|watch|learn) more/gi;
			   var result=patt.test(see_more_string);
			   if (result == true) {
					$(this).addClass('learn_more');
			   }
        });
    }
	
	seeMore($('a'));
    boldThisYo($("span"));


    if ($('#holidayModal').css('display') == 'none' || $('div.modal_regions').css('display') == 'none') {
        $('#splash').css('display', 'none')
    }

    // Readspeaker support adding classes to preserve content
    $('div.regions_slideshow_wrapper, div.related_slideshows, div#ctl00_ContentPlaceHolder1_uiPnlFlowPlayer, div#gallery, div.three_column_list').addClass('rs_preserve')

    //for resources only
    href_location = window.location.href;
    resources_index = href_location.indexOf("r");
    if (resources_index == 7 || resources_index == 15) {
        $('#language_bar ul.lang').hide();
    }
	
	// this is js for Simple stories integrated in program locations page - simplestories.aspx
	var amount_of_events_to_show = 3  // always show this many events program locator page example New York page
	if ($('#global_calendar_table_wrapper > table tbody tr').length > amount_of_events_to_show) {		  
		var always_show = $('#global_calendar_table_wrapper table tbody tr').eq(amount_of_events_to_show - 1);
		$(always_show).prevAll().andSelf().addClass('always_show');
		$(always_show).nextAll().hide();
		//$('<tr><td colspan="3" class="date_details event_details"><p><a id="show_all_events" class="learn_more">More Events</a></p></td></tr>').insertAfter('#global_calendar_table_wrapper table tbody .always_show:last')
		$('<tr><td colspan="3" class="date_details event_details" style="padding:10px;text-align:center"><button type="button" class="btn-view-more">View More Events</button></td></tr>').insertAfter('#global_calendar_table_wrapper table tbody .always_show:last')
	}
	
	$('.btn-view-more').click( function() {
		$('#global_calendar_table_wrapper > table tbody').children().fadeIn();
		$(this).parents('tr').hide();
	});
	/*
	if ($('#show_all_events').is(':visible')) {
	$('#show_all_events').toggle(function() {
		$(this).parents().eq(2).nextAll().fadeIn();
		$(this).parents().eq(2).appendTo('#global_calendar_table_wrapper table tbody')
		$(this).text('view less');
	}, function () {
		$(this).parents().eq(2).prevAll('tr').not('tr.always_show').fadeOut(200);
		$(this).parents().eq(2).insertAfter('#global_calendar_table_wrapper table tbody tr:eq(2)')
		$(this).text('More Events');
	});
	}
	*/
	
	// simple stories content 
	$('div.global_wrappers').each(function() {
	$(this).find('div.simple_content > p:first').css('margin-bottom', '0px');
	});	
	$('div#global_wrapper_container div.global_wrappers:last').css({borderBottom: 'none', marginBottom: '0px'});
	var simpleStoryDetails = $('div.simple_content p span.show').children('a')
	//$('<span class="elipses">...</span>').insertBefore(simpleStoryDetails);
	
	
	$('div.global_wrappers div.simple_content p a.learn_more').click(function() {
		$(this).hide().parent().hide();
		$(this).parent().next('span').fadeIn(500);
		var image_stored = $(this).parents('div.simple_content').find('img');
		if ($(image_stored).length && $(image_stored).hasClass('scaled_horizontal')) { 
		var increased_image_height = '200px' 
		var increased_image_width = '300px'
		} else {
		var increased_image_height = '300px' 
		var increased_image_width = '230px'		
		}
		$(image_stored).animate({height:increased_image_height, width:increased_image_width}, 500).next('p').width(increased_image_width)
		$(this).parents('div.simple_content').find('.hide').fadeIn(500);
		$(this).parents('p').css('margin-bottom', '25px');
		return false;	
	});
	
	
	$('div.global_wrappers div.simple_content a.hide').click(function() {
		$(this).parent().parent().find('.hide').fadeOut('fast');
		$(this).parent().parent().find('span.show').toggle().find('a.learn_more').show();
		$(this).parent().parent().find('img.scaled_horizontal').animate({height:'85px', width:'125px'}, 200)
		$(this).parent().parent().find('img.scaled_vertical').animate({height:'125px', width:'85px'}, 200)
		$(this).hide()
		$(this).parent().find('p:first').css('margin-bottom', '0px');
		
		return false;
		
	});
	
	$('div.global_wrappers div.simple_content p:last').css('margin-bottom', '15px');
	

	
	// end simple stories JS
	
	
	$('div.button_holder a.program_pound_jump').each(function () {
	var getTheId = $(this).attr('href');
	if ( $(getTheId).length == 0 && $(this).attr('id') !== 'jump_to_stories') {
		$(this).hide();	
	}
	});
	
	//Program locator page pound jumps animation style
	$('div.button_holder a.program_pound_jump').click(function(e) {
	var getTheId = $(this).attr('href');
	if ($(getTheId).length == 0) { 
	var sureTop = $('.share_your_story_button').offset().top
	$('html, body').animate({scrollTop:sureTop - 20},1500);
	} else {
	var sureTop = $(getTheId).offset().top
	$('html, body').animate({scrollTop:sureTop},2000);
	}
	e.preventDefault();
	});
	
	
	//Program locator page 
	$('a.toggle_location').toggle(function(e) {
		$(this).next().slideUp('fast');
		$(this).html('View Office Locations <span>&#9660;</span>')
		e.preventDefault();
	}, function() {
		$(this).next().slideDown('slow');
		$(this).html('Hide Office Locations <span>&#9650</span>')
		e.preventDefault();	
	});
	
	
	//css changes for calendar and pagination James Daly 09/12 just adding a class to table wrappers that include pagination
	if ($('#cal_upcoming_events').is(':visible')) {
		$('#global_calendar_table_wrapper').addClass('pagination_included');
	
	}
	

  $('#uiTxtEmailAddress').focus(function(){
    
    if (this.value == this.defaultValue)
    {
      this.value = '';
    }
    this.style.color='#000';
  });
  $('#uiTxtEmailAddress').blur(function(){
    if (this.value == '')
    {
      this.value = this.defaultValue;
      this.style.color='#999';
    }
  });
	
	
	});
var colCount = 0;
var colWidth = 0;
var margin = 10;
var windowWidth = 0;
var blocks = [];
var mobile = 600;
var tallestColHeight=0;
var HOMEGRID=$('.home-grid');

$(function(){
	$(window).resize(setupBlocks);
});


function setupBlocks() {

    windowWidth = HOMEGRID.outerWidth();

        if(windowWidth < mobile){
            $('.block').each(function(){
                $(this).removeAttr( "style" );
            });
            return;
        }

    colWidth = $('.block').outerWidth();
    blocks = [];
    colCount = Math.floor(windowWidth/(colWidth+margin));
    for(var i=0; i < colCount; i++) {
        blocks.push(margin);
    }
    positionBlocks();
}

function positionBlocks() {
    $('.block').each(function(){
		$(this).css({
			'height':'auto'
        });
        var min = Array.min(blocks);
        var index = $.inArray(min, blocks);
        var leftPos = margin+(index*(colWidth+margin));
		var max_height = $(this).outerHeight();
        $(this).css({
            'left':leftPos+'px',
            'top':min+'px',
            'position':'absolute',
			'height':max_height
        });
		var newColHeight=min+max_height+margin+parseInt($(this).css("margin-top"))+parseInt($(this).css("margin-bottom"));
		if(newColHeight > tallestColHeight){
			tallestColHeight=newColHeight;
			HOMEGRID.css({'height':tallestColHeight+'px'});
		}
        blocks[index] = newColHeight ;

		if($(this).outerWidth()>colWidth){
			blocks[index+1] = min+max_height+margin+parseInt($(this).css("margin-top"))+parseInt($(this).css("margin-bottom"));
		}
    });
}

function resetToMobileView(){
    $('.block').each(function(){
        $(this).css({
            'width':'100%',
            'height':'170px',
            'left':'0',
            'top':'1.3em',
            'position':'relative'
        });
    });
}
// Function to get the Min value in Array
Array.min = function(array) {
    return Math.min.apply(Math, array);
};

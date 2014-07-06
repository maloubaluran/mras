/* 
Title: Photo Tagging
Author: Neill Horsman
URL: http://www.neillh.com.au
Credits: jQuery, imgAreaSelect 
*/

$(window).ready(function() {

  //Set up imgAreaSelect
	$('.start-tagging').click(function(){
		$('.start-tagging').addClass("hide");
		$('.finish-tagging').removeClass("hide");
		//load imgAreaSelect   
		//$('img#imageid').imgAreaSelect({ handles: true, onSelectChange: selectChange, keys: { arrows: 15, shift: 5 }, aspectRatio: '4:3', maxWidth: 150, maxHeight: 100 });
		$('img#imageid').imgAreaSelect({
			disable: false,
			handles: true,
			keys: { arrows: 15, shift: 5 },
			aspectRatio: '4:3',
			maxWidth: 120,
			maxHeight: 70,
			fadeSpeed: 200,
			onSelectEnd: function(img, selection){
				$('input#x1').val(selection.x1);
				$('input#y1').val(selection.y1);
				$('input#x2').val(selection.x2);
				$('input#y2').val(selection.y2);
				$('input#w').val(selection.width);
				$('input#h').val(selection.height);
				$('#title_container').css('left', selection.x1);
				$('#title_container').css('top', selection.y2);
				$('#title_container').removeClass("hide");
				if (selection.width == 0 && selection.height == 0) { $('#title_container').addClass("hide"); }				
		   },
		   onSelectStart: function(img, selection){
				$('#title_container').addClass("hide");
		   },
		});
	});
	$('.finish-tagging').click(function(){
		$('.start-tagging').removeClass("hide");
		$('.finish-tagging').addClass("hide");
		$('#title_container').addClass("hide");
		$('img#imageid').imgAreaSelect({ disable: true, hide: true });
	});

  //Tag list hovers
  $('#titles a.title').hover(function() {
    $('.map li').find('a.' + $(this).attr('id')).addClass('hover');
    $('.map li').find('a.' + $(this).attr('id')).find('span').show().addClass('selected');
  }, function() {
    $('.map li').find('a.' + $(this).attr('id')).removeClass('hover');
    $('.map li').find('a.' + $(this).attr('id')).find('span').hide().removeClass('selected');
  });

  $('.map li a').hover(function() {
    $(this).find('span').show();
  }, function() {
    $(this).find('span').hide();  
  });

	//Close the error box for form pages
	$('a#error-link').click(function() {
		$('#error-box').slideUp('slow');
		return false;
	});
	$('a#warning-link').click(function() {
		$('#warning-box').slideUp('slow');
		return false;
	});
});

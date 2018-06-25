sr.reveal('.reel-controller, .reel-container', {
	distance: '2px',
	delay: 300
});

sr.reveal('.headul', {
	origin: 'left',
	distance: '100px',
});

sr.reveal('.img-fluid', {
	scale: 1,
	origin: 'left',
	easing: 'ease',
	distance: '100px',
	delay: 300
});

sr.reveal('.about', {
	delay: 500,
	distance: '2px'
});

sr.reveal('.owl-carousel', {
	delay: 500,
	distance: '2px'
});

$(document).ready(function() {
	$(document).on("click", ".video-pause-play", function() {
		if ($(this).find('i').hasClass('fa-pause')) {
			$(this).find('i').removeClass('fa-pause').addClass('fa-play');
			$('#myVideo').get(0).pause();
		} else {
			$(this).find('i').removeClass('fa-play').addClass('fa-pause');
			$('#myVideo').get(0).play();
		}
	});

	$(document).on("click", ".video-volume", function() {
		if ($(this).find('i').hasClass('fa-volume-off')) {
			$(this).find('i').removeClass('fa-volume-off').addClass('fa-volume-up');
			$("#myVideo").prop('muted', false);
		} else {
			$(this).find('i').removeClass('fa-volume-up').addClass('fa-volume-off');
			$("#myVideo").prop('muted', true);
		}
	});

  $(document).on('click','.show_more',function(){
       var id = $(this).data('id');
       $('.li-show-more').html('<i class="fas fa-spinner fa-pulse"></i>');
       $('.li-show-more').fadeOut(300);
       $.ajax({
           url : '/audio/more',
           method : 'POST',
           data : {
	           	id:id,
	           	_token:$('#token').val()
           },
           dataType: "json",
           success : function (data)
           {
              if(data != '') 
              {
                  $('#btn-more').remove();
                  $('.demo-reels').append(data.output);
                  $('.div-show-more').html(data.btn_show_more);
              }
              else
              {
                  $('.div-show-more').hide();
              }
           },
           error: function(xhr, error, ajaxOptions, thrownError) {
                $('.div-show-more').hide();
           }
       });
  });

    function update() {
		var player = document.getElementById('audio-preview');
		var progressBar = document.getElementById('progress-bar');

		if (!player.ended) {
			var size = parseInt((player.currentTime + .25) / player.duration * 100);
			progressBar.style.width = size + '%';
		} else {
			progressBar.style.width = '0%';
			$('.fa-forward').click();
		}
	}

    var id = $('.audio-list').data('id');
    var audio_file = $('.audio-list').data('audio-file');
    var title = $('.audio-list').data('title');
    var audio_duration = $('.audio-list').data('audio-duration');
    $('.audio-title').html(title);
	$('.audio-duration').html('( 0:00 / ' + audio_duration + ' )');
	$("#add-audio-prewiew").find('#audio-preview').attr('src', audio_file);
    $('#hdn-audio-duration').val(audio_duration);
    $('#audio-play').addClass('audio-play'+id);
    $('#hdn-audio-list-id').val(id);
    $('.audio-list-id'+id).addClass('active');
    
    $(document).on('click','.audio-list',function(){
       var id = $(this).data('id');
       var title = $(this).data('title');
       var audio_duration = $(this).data('audio-duration');
       var audio_file = $(this).data('audio-file');
       $('.audio-title').html(title);
	   $('.audio-duration').html(audio_duration);
	   if ($(this).find('i').hasClass('fa-play-circle')) {
	   		$("#add-audio-prewiew").find('#audio-preview').attr('src', audio_file);
	   }
	   $('.audio-control').find('.fa-pause').removeClass('fa-pause').addClass('fa-play');
	   $('#hdn-audio-duration').val(audio_duration);
	   $('#hdn-audio-list-id').val(id);
	   $('#audio-play').addClass('audio-play'+id);

	   $('.demo-reels li.active').removeClass('active');
       $(this).addClass('active');

	   	if ($(this).find('i').hasClass('fa-pause-circle')) {
			$(this).find('i').removeClass('fa-pause-circle').addClass('fa-play-circle');
			$('#audio-preview').get(0).pause();
			window.clearInterval(updateTime);
		} else if ($(this).find('i').hasClass('fa-play-circle')) {
			$('.demo-reels li').not('.active').find('i').removeClass('fa-pause-circle').addClass('fa-play-circle');
			$('#audio-play').removeClass('fa-play').addClass('fa-pause');
			$(this).find('i').removeClass('fa-play-circle').addClass('fa-pause-circle');
			$('#audio-preview').get(0).play();
			updateTime = setInterval(update,500);
		}

		var player = document.getElementById('audio-preview');

		player.addEventListener("timeupdate", function() {
			var s = parseInt(player.currentTime % 60);
			var m = parseInt((player.currentTime / 60) % 60);
			if (s < 10) {
				$('.audio-duration').html('( ' + m + ':0' + s + ' / ' + audio_duration + ' )');
			} else {
				$('.audio-duration').html('( ' + m + ':' + s + ' / ' + audio_duration + ' )');
			}
		}, false);

   	});

	

   	$(document).on("click", "#audio-play", function() {

   		var id = $('#hdn-audio-list-id').val();

		if ($(this).hasClass('fa-pause')) {
			$(this).removeClass('fa-pause').addClass('fa-play');
			$('.demo-reels li.active').find('i').removeClass('fa-pause-circle').addClass('fa-play-circle');
			$('#audio-preview').get(0).pause();
			window.clearInterval(updateTime);
		} else if ($(this).hasClass('fa-play')) {
			$(this).removeClass('fa-play').addClass('fa-pause');
			$('.demo-reels li.active').find('i').removeClass('fa-play-circle').addClass('fa-pause-circle');
			$('#audio-preview').get(0).play();
			updateTime = setInterval(update,500);

			var audio_duration = $('#hdn-audio-duration').val();
			var player = document.getElementById('audio-preview');


			player.addEventListener("timeupdate", function() {
				var s = parseInt(player.currentTime % 60);
				var m = parseInt((player.currentTime / 60) % 60);
				if (s < 10) {
					$('.audio-duration').html('( ' + m + ':0' + s + ' / ' + audio_duration + ' )');
				} else {
					$('.audio-duration').html('( ' + m + ':' + s + ' / ' + audio_duration + ' )');
				}
			}, false);

		}
	});

	$('.fa-forward').click(function() {
		var cur = $('.demo-reels li.active');
		next = cur.next('li');
		if (next.length === 0) {
			next = $('.demo-reels li:first');
		}
		cur.removeClass('active');
		next.addClass('active');

		var id = $('#hdn-audio-list-id').val();
		var audio_file = $('.demo-reels li.active').data('audio-file');
		var title = $('.demo-reels li.active').data('title');
	    var audio_duration = $('.demo-reels li.active').data('audio-duration');
		$("#add-audio-prewiew").find('#audio-preview').attr('src', audio_file);
		$('.audio-title').html(title);
     	$('.audio-duration').html('( 0:00 / ' + audio_duration + ' )');

     	if ($('.demo-reels li.active').find('i').hasClass('fa-pause-circle')) {
			$('.demo-reels li.active').find('i').removeClass('fa-pause-circle').addClass('fa-play-circle');
			$('#audio-preview').get(0).pause();
			window.clearInterval(updateTime);
		} else if ($('.demo-reels li.active').find('i').hasClass('fa-play-circle')) {
			$('.demo-reels li').not('.active').find('i').removeClass('fa-pause-circle').addClass('fa-play-circle');
			$('#audio-play').removeClass('fa-play').addClass('fa-pause');
			$('.demo-reels li.active').find('i').removeClass('fa-play-circle').addClass('fa-pause-circle');
			$('#audio-preview').get(0).play();
			updateTime = setInterval(update,500);
		}

		var player = document.getElementById('audio-preview');

		player.addEventListener("timeupdate", function() {
			var s = parseInt(player.currentTime % 60);
			var m = parseInt((player.currentTime / 60) % 60);
			if (s < 10) {
				$('.audio-duration').html('( ' + m + ':0' + s + ' / ' + audio_duration + ' )');
			} else {
				$('.audio-duration').html('( ' + m + ':' + s + ' / ' + audio_duration + ' )');
			}
		}, false);

	});

	$('.fa-backward').click(function() {
		var cur = $('.demo-reels li.active');
		next = cur.prev('li');
		if (next.length === 0) {
			next = $('.demo-reels li:last');
		}
		cur.removeClass('active');
		next.addClass('active');

		var id = $('#hdn-audio-list-id').val();
		var audio_file = $('.demo-reels li.active').data('audio-file');
		var title = $('.demo-reels li.active').data('title');
	    var audio_duration = $('.demo-reels li.active').data('audio-duration');
		$("#add-audio-prewiew").find('#audio-preview').attr('src', audio_file);
		$('.audio-title').html(title);
     	$('.audio-duration').html('( 0:00 / ' + audio_duration + ' )');

     	if ($('.demo-reels li.active').find('i').hasClass('fa-pause-circle')) {
			$('.demo-reels li.active').find('i').removeClass('fa-pause-circle').addClass('fa-play-circle');
			$('#audio-preview').get(0).pause();
			window.clearInterval(updateTime);
		} else if ($('.demo-reels li.active').find('i').hasClass('fa-play-circle')) {
			$('.demo-reels li').not('.active').find('i').removeClass('fa-pause-circle').addClass('fa-play-circle');
			$('#audio-play').removeClass('fa-play').addClass('fa-pause');
			$('.demo-reels li.active').find('i').removeClass('fa-play-circle').addClass('fa-pause-circle');
			$('#audio-preview').get(0).play();
			updateTime = setInterval(update,500);
		}

		var player = document.getElementById('audio-preview');

		player.addEventListener("timeupdate", function() {
			var s = parseInt(player.currentTime % 60);
			var m = parseInt((player.currentTime / 60) % 60);
			if (s < 10) {
				$('.audio-duration').html('( ' + m + ':0' + s + ' / ' + audio_duration + ' )');
			} else {
				$('.audio-duration').html('( ' + m + ':' + s + ' / ' + audio_duration + ' )');
			}
		}, false);
	});

});
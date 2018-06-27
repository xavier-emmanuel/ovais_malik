sr.reveal('.reel-controller, .reel-container', {
	distance: '2px',
	delay: 300
});

sr.reveal('.headul', {
	origin: 'left',
	distance: '3vw',
});

sr.reveal('.img-fluid', {
	scale: 1,
	origin: 'left',
	easing: 'ease',
	distance: '3vw',
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

	function clickedBar(e) {
		var player = document.getElementById('audio-preview');
		var progressBar = document.getElementById('progress-bar');
		var bar = document.getElementById('progress');

		if (!player.ended) {
			var mouseX = e.pageX - bar.offsetLeft;
			var newtime = mouseX * player.duration / 100;
			player.currentTime = newtime;
			progressBar.style.width = mouseX + '%';
		}
	}

    var id = $('.audio-list').data('id');
    var audio_file = $('.audio-list').data('audio-file');
    var title = $('.audio-list').data('title');
    var audio_duration = $('.audio-list').data('audio-duration');
    var bar = document.getElementById('progress');
    $('.audio-title').html(title);
	$('.audio-duration').html('( 0:00 / ' + audio_duration + ' )');
	$('#audio-preview').attr('src', audio_file);
    $('#hdn-audio-duration').val(audio_duration);
    $('#audio-play').addClass('audio-play'+id);
    $('#hdn-audio-list-id').val(id);
    $('.audio-list-id'+id).addClass('active');
    bar.addEventListener('click',clickedBar,false);
    
    $(document).on('click','.audio-list',function(){
       var id = $(this).data('id');
       var title = $(this).data('title');
       var audio_duration = $(this).data('audio-duration');
       var audio_file = $(this).data('audio-file');
       $('.audio-title').html(title);
	   $('.audio-duration').html(audio_duration);
	   $('#audio-preview').attr('src', audio_file);
	   $('.audio-control').find('.fa-pause').removeClass('fa-pause').addClass('fa-play');
	   $('#hdn-audio-duration').val(audio_duration);
	   $('#hdn-audio-list-id').val(id);
	   $('#audio-play').addClass('audio-play'+id);

	   $('.demo-reels li.active').removeClass('active');
       $(this).addClass('active');

	   $('.demo-reels li').not('.active').find('i').removeClass('faa-pulse animated faa-fast');
	   $('#audio-play').removeClass('fa-play').addClass('fa-pause');
	   $(this).find('i').addClass('faa-pulse animated faa-fast');
	   $('#audio-preview').get(0).play();
	   updateTime = setInterval(update,500);
		

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
			$('.demo-reels li.active').find('i').removeClass('faa-pulse animated faa-fast');
			$('#audio-preview').get(0).pause();
			window.clearInterval(updateTime);
		} else if ($(this).hasClass('fa-play')) {
			$(this).removeClass('fa-play').addClass('fa-pause');
			$('.demo-reels li.active').find('i').addClass('faa-pulse animated faa-fast');
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
		$('#audio-preview').attr('src', audio_file);
		$('.audio-title').html(title);
     	$('.audio-duration').html('( 0:00 / ' + audio_duration + ' )');

     	if ($('.demo-reels li.active').find('i').hasClass('faa-pulse animated faa-fast')) {
			$('.demo-reels li.active').find('i').removeClass('faa-pulse animated faa-fast');
			$('#audio-preview').get(0).pause();
			window.clearInterval(updateTime);
		} else if ($('.demo-reels li.active').find('i').not('.faa-pulse animated faa-fast')) {
			$('.demo-reels li').not('.active').find('i').removeClass('faa-pulse animated faa-fast');
			$('#audio-play').removeClass('fa-play').addClass('fa-pause');
			$('.demo-reels li.active').find('i').addClass('faa-pulse animated faa-fast');
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
		$('#audio-preview').attr('src', audio_file);
		$('.audio-title').html(title);
     	$('.audio-duration').html('( 0:00 / ' + audio_duration + ' )');

     	if ($('.demo-reels li.active').find('i').hasClass('faa-pulse animated faa-fast')) {
			$('.demo-reels li.active').find('i').removeClass('faa-pulse animated faa-fast');
			$('#audio-preview').get(0).pause();
			window.clearInterval(updateTime);
		} else if ($('.demo-reels li.active').find('i').not('.faa-pulse animated faa-fast')) {
			$('.demo-reels li').not('.active').find('i').removeClass('faa-pulse animated faa-fast');
			$('#audio-play').removeClass('fa-play').addClass('fa-pause');
			$('.demo-reels li.active').find('i').addClass('faa-pulse animated faa-fast');
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
$(document).ready(function() {
	$(document).on("click", ".video-control", function() {
		if ($(this).find('i').hasClass('fa-pause-circle')) {
			$(this).find('i').removeClass('fa-pause-circle').addClass('fa-play-circle');
			$('#myVideo').get(0).pause();
		} else {
			$(this).find('i').removeClass('fa-play-circle').addClass('fa-pause-circle');
			$('#myVideo').get(0).play();
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
           dataType: 'text',
           success : function (data)
           {
              if(data != '') 
              {
                  $('#btn-more').remove();
                  $('.demo-reels').append(data);
              }
              else
              {
                  $('.show_more').hide();
              }
           },
           error: function(xhr, error, ajaxOptions, thrownError) {
                alert(xhr.responseText);
           }
       });
   });  

    var id = $('.audio-list').data('id');
    var audio_file = $('.audio-list').data('audio-file');
    var title = $('.audio-list').data('title');
    var audio_duration = $('.audio-list').data('audio-duration');
    $('.audio-title').html(title);
	$('.audio-duration').html(audio_duration);
	$("#add-audio-prewiew").find('#audio-preview').attr('src', audio_file);
    $('#hdn-audio-duration').val(audio_duration);
    $('#audio-play').addClass('audio-play'+id);
    $('#hdn-audio-list-id').val(id);
    
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
		} else if ($(this).find('i').hasClass('fa-play-circle')) {
			$('.demo-reels li').not('.active').find('i').removeClass('fa-pause-circle').addClass('fa-play-circle');
			$('#audio-play').removeClass('fa-play').addClass('fa-pause');
			$(this).find('i').removeClass('fa-play-circle').addClass('fa-pause-circle');
			$('#audio-preview').get(0).play();
		}

		var player = document.getElementById('audio-preview');
		player.addEventListener("timeupdate", function() {
			var currentTime = player.currentTime;
			var duration = player.duration;
			$('.progress-bar').stop(true, true).animate({
				'width': (currentTime + .25) / duration * 100 + '%'
			}, 250, 'linear');
		});

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
			$('.audio-list').find('i').removeClass('fa-pause-circle').addClass('fa-play-circle');
			$('#audio-preview').get(0).pause();
		} else if ($(this).hasClass('fa-play')) {
			$(this).removeClass('fa-play').addClass('fa-pause');
			$('.audio-list-id'+id).find('i').removeClass('fa-play-circle').addClass('fa-pause-circle');
			$('#audio-preview').get(0).play();

			var audio_duration = $('#hdn-audio-duration').val();

			var player = document.getElementById('audio-preview');
			player.addEventListener("timeupdate", function() {
				var currentTime = player.currentTime;
				var duration = player.duration;
				$('.progress-bar').stop(true, true).animate({
					'width': (currentTime + .25) / duration * 100 + '%'
				}, 250, 'linear');
			});

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

});
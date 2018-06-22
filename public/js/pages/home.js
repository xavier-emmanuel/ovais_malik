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

    $(document).on('click','#btn-more',function(){
       var id = $(this).data('id');
       $("#btn-more").html("Loading...");
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
                  $('#btn-more').html("");
              }
           },
           error: function(xhr, error, ajaxOptions, thrownError) {
                alert(xhr.responseText);
           }
       });
   });  

    var audio_file = $('.audio-list').data('audio-file');
    var title = $('.audio-list').data('title');
    var audio_duration = $('.audio-list').data('audio-duration');
    $('.audio-title').html(title);
	$('.audio-duration').html(audio_duration);
	$("#add-audio-prewiew").find('#audio-preview').attr('src', audio_file);
    $('#hdn-audio-duration').val(audio_duration);
    
    $(document).on('click','.audio-list',function(){
       var title = $(this).data('title');
       var audio_duration = $(this).data('audio-duration');
       var audio_file = $(this).data('audio-file');
       $('.audio-title').html(title);
	   $('.audio-duration').html(audio_duration);
	   $("#add-audio-prewiew").find('#audio-preview').attr('src', audio_file);
	   $('.audio-control').find('.fa-pause').removeClass('fa-pause').addClass('fa-play');
	   $('#hdn-audio-duration').val(audio_duration);

		var player = document.getElementById('audio-preview');
		var currentTime = player.currentTime;
		var duration = player.duration;
		$('.progress-bar').stop(true, true).animate({
			'width': 0 + '%'
		});

		player.addEventListener("timeupdate", function() {
			var s = parseInt(player.currentTime % 60);
			var m = parseInt((player.currentTime / 60) % 60);
			if (s < 10) {
				$('.audio-duration').html('( ' + m + '0:00:0' + s + ' / ' + audio_duration + ' )');
			} else {
				$('.audio-duration').html('( ' + m + '0:00:' + s + ' / ' + audio_duration + ' )');
			}
		}, false);

   	});

   	$(document).on("click", "#audio-play", function() {
		if ($(this).hasClass('fa-pause')) {
			$(this).removeClass('fa-pause').addClass('fa-play');
			$('#audio-preview').get(0).pause();
		} else if ($(this).hasClass('fa-play')) {
			$(this).removeClass('fa-play').addClass('fa-pause');
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
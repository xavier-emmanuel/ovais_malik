$(document).ready(function() {
	$(document).on("click", ".video-control", function() {
		if ($('.video-control').find('i').hasClass('fa-pause-circle')) {
			$('.video-control').find('i').removeClass('fa-pause-circle').addClass('fa-play-circle');
			$('#myVideo').get(0).pause();
		} else {
			$('.video-control').find('i').removeClass('fa-play-circle').addClass('fa-pause-circle');
			$('#myVideo').get(0).play();
		}
	});
});
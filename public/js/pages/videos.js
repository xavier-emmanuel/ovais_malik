$(document).ready(function () {
	displayVideos();
})

function displayVideos() {
	$.ajax({
		url: '/videos-show/display',
		method: 'GET',
		dataType: "json",
		success: function (data) {
			for (var i = 0, len = data.length; i < len; i++) {
				$('#video-section').append('<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 mb-3">'
				  + '<div class="embed-responsive embed-responsive-16by9">'
					+ '<iframe class="embed-responsive-item" src="https://www.youtube.com/embed/' + data[i].link + '" encrypted-media" allowfullscreen></iframe>'
					+ '</div>'
					+ '</div>');
			}
		}
	})
}
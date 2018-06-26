$(document).ready(function(){
	var page_title = $('#page-name').val();
	if(page_title == "Dashboard"){
		$('#li-dashboard').addClass('active');
	} else if(page_title == "Blog") {
		$('#li-blog').addClass('active');
	} else if(page_title == "Videos") {
		$('#li-video').addClass('active');
	} else if(page_title == "Images") {
		$('#li-images').addClass('active');
	} else if(page_title == "Audio") {
		$('#li-audio').addClass('active');
	} else if(page_title == "Category") {
		$('#li-category').addClass('active');
	}
});
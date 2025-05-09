(function ($) {
	"use strict";

	// Education Add More

	$(".education-info").on('click','.trash', function () {
		$(this).closest('.education-cont').remove();
		return false;
	});
	
	$(".experience-info").on('click','.trash', function () {
		$(this).closest('.experience-cont').remove();
		return false;
	});

	// Education Add More
	$(".add-education").on("click", function () {
		var index = $(".education-info .education-cont").length; 
		var educationcontent =
			'<div class="row form-row education-cont">' +
			'<input type="hidden" name="education[' + index + '][id]" value="">' +
			'<div class="col-12 col-md-10 col-lg-11">' +
			'<div class="row form-row">' +
			'<div class="col-12 col-md-6 col-lg-4">' +
			'<div class="form-group">' +
			'<label>Degree</label>' +
			'<input type="text" name="education[' + index + '][degree]" class="form-control">' +
			"</div>" +
			"</div>" +
			'<div class="col-12 col-md-6 col-lg-4">' +
			'<div class="form-group">' +
			'<label>From</label>' +
			'<input type="number" name="education[' + index + '][from]" class="form-control">' +
			"</div>" +
			"</div>" +
			'<div class="col-12 col-md-6 col-lg-4">' +
			'<div class="form-group">' +
			'<label>To</label>' +
			'<input type="number" name="education[' + index + '][to]" class="form-control">' +
			"</div>" +
			"</div>" +
			'<div class="col-12 col-md-6 col-lg-12">' +
			'<div class="form-group">' +
			'<label>Description</label>' +
			'<input type="text" name="education[' + index + '][description]" class="form-control">' +
			"</div>" +
			"</div>" +
			"</div>" +
			"</div>" +
			'<div class="col-12 col-md-2 col-lg-1"><label class="d-md-block d-sm-none d-none">&nbsp;</label><a href="#" class="btn btn-danger trash"><i class="far fa-trash-alt"></i></a></div>' +
			"</div>";

		$(".education-info").append(educationcontent);
		return false;
	});

	// Experience Add More
	$(".add-experience").on("click", function () {
		var index = $(".experience-info .experience-cont").length; 
		var experiencecontent =
			'<div class="row form-row experience-cont">' +
			'<input type="hidden" name="experience[' + index + '][id]" value="">' +
			'<div class="col-12 col-md-10 col-lg-11">' +
			'<div class="row form-row">' +
			'<div class="col-12 col-md-6 col-lg-4">' +
			'<div class="form-group">' +
			'<label>Position</label>' +
			'<input type="text" name="experience[' + index + '][degree]" class="form-control">' +
			"</div>" +
			"</div>" +
			'<div class="col-12 col-md-6 col-lg-4">' +
			'<div class="form-group">' +
			'<label>From</label>' +
			'<input type="number" name="experience[' + index + '][from]" class="form-control">' +
			"</div>" +
			"</div>" +
			'<div class="col-12 col-md-6 col-lg-4">' +
			'<div class="form-group">' +
			'<label>To</label>' +
			'<input type="number" name="experience[' + index + '][to]" class="form-control">' +
			"</div>" +
			"</div>" +
			'<div class="col-12 col-md-6 col-lg-12">' +
			'<div class="form-group">' +
			'<label>Description</label>' +
			'<input type="text" name="experience[' + index + '][description]" class="form-control">' +
			"</div>" +
			"</div>" +
			"</div>" +
			"</div>" +
			'<div class="col-12 col-md-2 col-lg-1"><label class="d-md-block d-sm-none d-none">&nbsp;</label><a href="#" class="btn btn-danger trash"><i class="far fa-trash-alt"></i></a></div>' +
			"</div>";

		$(".experience-info").append(experiencecontent);
		return false;
	});
	

})(jQuery);
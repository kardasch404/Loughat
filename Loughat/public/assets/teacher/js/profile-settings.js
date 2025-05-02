(function ($) {
	"use strict";

	// Pricing Options Show

	$('#pricing_select input[name="rating_option"]').on('click', function () {
		if ($(this).val() == 'price_free') {
			$('#custom_price_cont').hide();
		}
		if ($(this).val() == 'custom_price') {
			$('#custom_price_cont').show();
		}
		else {
		}
	});

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
		var index = $(".education-info .education-cont").length; // Get the current number of education entries
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
		var index = $(".experience-info .experience-cont").length; // Get the current number of experience entries
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
	

	// Awards Add More

	$(".awards-info").on('click', '.trash', function () {
		$(this).closest('.awards-cont').remove();
		return false;
	});

	$(".add-award").on('click', function () {

		var regcontent = '<div class="row form-row awards-cont">' +
			'<div class="col-12 col-md-5">' +
			'<div class="form-group">' +
			'<label>Awards</label>' +
			'<input type="text" class="form-control">' +
			'</div>' +
			'</div>' +
			'<div class="col-12 col-md-5">' +
			'<div class="form-group">' +
			'<label>Year</label>' +
			'<input type="text" class="form-control">' +
			'</div>' +
			'</div>' +
			'<div class="col-12 col-md-2">' +
			'<label class="d-md-block d-sm-none d-none">&nbsp;</label>' +
			'<a href="#" class="btn btn-danger trash"><i class="far fa-trash-alt"></i></a>' +
			'</div>' +
			'</div>';

		$(".awards-info").append(regcontent);
		return false;
	});

	// Membership Add More

	$(".membership-info").on('click', '.trash', function () {
		$(this).closest('.membership-cont').remove();
		return false;
	});

	$(".add-membership").on('click', function () {

		var membershipcontent = '<div class="row form-row membership-cont">' +
			'<div class="col-12 col-md-10 col-lg-5">' +
			'<div class="form-group">' +
			'<label>Memberships</label>' +
			'<input type="text" class="form-control">' +
			'</div>' +
			'</div>' +
			'<div class="col-12 col-md-2 col-lg-2">' +
			'<label class="d-md-block d-sm-none d-none">&nbsp;</label>' +
			'<a href="#" class="btn btn-danger trash"><i class="far fa-trash-alt"></i></a>' +
			'</div>' +
			'</div>';

		$(".membership-info").append(membershipcontent);
		return false;
	});

	// Registration Add More

	$(".registrations-info").on('click', '.trash', function () {
		$(this).closest('.reg-cont').remove();
		return false;
	});

	$(".add-reg").on('click', function () {

		var regcontent = '<div class="row form-row reg-cont">' +
			'<div class="col-12 col-md-5">' +
			'<div class="form-group">' +
			'<label>Registrations</label>' +
			'<input type="text" class="form-control">' +
			'</div>' +
			'</div>' +
			'<div class="col-12 col-md-5">' +
			'<div class="form-group">' +
			'<label>Year</label>' +
			'<input type="text" class="form-control">' +
			'</div>' +
			'</div>' +
			'<div class="col-12 col-md-2">' +
			'<label class="d-md-block d-sm-none d-none">&nbsp;</label>' +
			'<a href="#" class="btn btn-danger trash"><i class="far fa-trash-alt"></i></a>' +
			'</div>' +
			'</div>';

		$(".registrations-info").append(regcontent);
		return false;
	});

})(jQuery);
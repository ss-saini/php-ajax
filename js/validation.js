$(function () {
	$("form[name = 'sform']").validate({
		rules : {
			name: {
				required: true
			},
			class: {
				required: true
			},
			phone: {
				required : true,
                minlength: 10,
                phoneUS: true,
                digits: true,
			},
			marks: {
				required: true,
                digits: true

			},
		},
	});
});
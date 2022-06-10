jQuery('#frm').validate({
	rules: {
		username: "required",
		// email:{
		// 	required:true,
		// 	email:true
		// },
		Password: {
			required: true,
			minlength: 5
		},
	},
	messages: {
		Username: "Please enter your name",
		// email:{
		// 	required:"Please enter email",
		// 	email:"Please enter valid email",
		// },
		Password: {
			required: "Please enter your password",
			minlength: "Password must be 5 char long"
		},
	},
	submitHandler: function (form) {
		form.submit();
	}
});
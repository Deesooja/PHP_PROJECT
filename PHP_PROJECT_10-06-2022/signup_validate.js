jQuery('#signup_form').validate({
	rules:{
		name:{
            required:true,
            minlength:3
        },
        mobile:{
            required:true,
            minlength:10,
            maxlength:10,

        },
		email:{
			required:true,
			email:true
		},
        username:{
            required:true,
            minlength:5
        },
		Password:{
			required:true,
			minlength:5
		},
        conform_password:{
			required:true,
			minlength:5,
            equalTo:"#Password"
		}
	},
    messages:{
        name:{
            required:"Please enter your name",
            minlength:"Password must be 3 char long"
        },
        mobile:{
            required:"Please enter your mobilr number",
            minlength:"Password must be 10 char long",
            maxlength:"Password must be 10 char long",

        },
		Username:"Please enter your name",
		email:{
			required:"Please enter email",
			email:"Please enter valid email",
		},
        username:{
            required:"Please enter your username",
            minlength:"Password must be 5 char long"
        },
		Password:{
			required:"Please enter your password",
			minlength:"Password must be 5 char long"
		},
        conform_password:{
			required:"Please RE-enter your password",
			minlength:"Password must be 5 char long",
            equalTo:"Password must be 5 char long"
		}
	},
	submitHandler:function(form){
		form.submit();
	}
});
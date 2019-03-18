(function ($) {
	"use strict";
	var csrf_token = $('#csrf_token').val();
	
	var male_img = "assets/images/male.svg";
	// user image change   
	$(function(){

		
		var female_img = "assets/images/female.svg";

		 $(".img_sex").attr("src", male_img);

	    $(document).on('change','#input_sex',function() {
	    	gender_change();
		});

		function gender_change(){
			var sex = $("#input_sex").val();
		    if (sex == 1) {
		        // male
		        $(".img_sex").attr("src", male_img);
		    } else {
		        // female
		        $(".img_sex").attr("src", female_img);
		    }
		}

	});




// ajax form submit after click button
$(function(){ 
	$(document).on('click','#form-submit',function(e){
			
		if(!check_empty_field() || !validateEmail($('#email').val()))
		{
			submitMSG(false, "The form is not fill up properly. Please Check the RED marked field.");
		}else{
		    var url = $('#contactForm').attr('action'); // get action url from form action 
		    $.ajax({
		        url: url,
		        type: 'POST',
		        dataType: "JSON",
		        data:$('#contactForm').serialize(),
		        success: function(data,error){
		        	if(data.st==1){
		        		submitMSG(true, "Information Submit Successfully");
		        		$(".img_sex").attr("src", male_img);
		        		$('#contactForm')[0].reset();
		        		$('#input_view').slideUp();
		        		$('#view_data').addClass('ci_loader').html(`
							<tr>
								<td colspan="6">
									<div class="loading_icon">
										<i class="fa fa-spinner fa-spin"></i>
									</div>
								</td>
							</tr>
							`);
						$('#load_view').slideDown();
		        		setTimeout(function(){ 
		        			view_data();
		        			$('#view_data').removeClass('ci_loader');
		        			$('.add_new_btn').show();
		        		},2000);

		        		
		        	}else{
		        		$('#msgSubmit').html(error);
		        	}
		            
		            
		        }
		    }); //ajax end
		}
	   
	});

});

// image upload script
$('.imgInp').on('change', function() {
    var file_data = $("#image").prop("files")[0]; 
    var form_data = new FormData();  
     form_data.append('token', csrf_token);
     form_data.append('file_data', file_data);  
    $.ajax({
        url: "php_files/upload_image.php", // point to server-side PHP script
        enctype: 'multipart/form-data',                          
        type: 'post',
        dataType: 'json',
        data: form_data,
        contentType: false,
        processData: false,
        success: function(data,error){
        	$('#uploaded_img').val(data.url);
        	$('#up_img').attr('src',data.url);
        	$('.p_img_text').hide();
	        $(".p_image").addClass("before_none");
        }
     });

});


// show user Information after click load button
$(document).on('click', '.load', function(event) {
	$('#input_view').slideUp();
	$('#view_data').addClass('ci_loader').html(`
			<tr>
				<td colspan="6">
					<div class="loading_icon">
						<i class="fa fa-spinner fa-spin"></i>
					</div>
				</td>
			</tr>
		`);
	$('#load_view').slideDown();
	setTimeout(function(){ 
		view_data();
		$('#view_data').removeClass('ci_loader');
		$('.add_new_btn').show();
	},2000);
});



// view input field after click add_new_btn
$(document).on('click', '.add_new_btn', function(event) {
	$('#input_view').slideDown();
	$('#load_view').hide();
	$('#contactForm')[0].reset();
	$(".img_sex").attr("src", male_img);
	
});

// fetch data from database
function view_data()
{	
	var url = 'php_files/view_data.php';
	$.ajax({
        url: url,
        type: 'get',
        data:{'token': csrf_token},
        success: function(data){
        	$('#view_data').html(data);
        },
        error: function (error) {
	        alert(" Can't do because: " + error);
	    },
	}); //ajax end
}




// check email validation
$(document).on('input','#email',function(){
	var valid = true;
	var email = $(this).val();
	if(!validateEmail(email)){
		submitMSG(false, "Sorry Your Email is not in correct format");
		$(this).addClass('invalid');
		valid = false;
	}else{
		submitMSG(false, "");
		$("#msgSubmit").removeClass();
		$(this).removeClass('invalid');

	}
	return valid;
});


// check empty fields
function check_empty_field(){
	var valid = true;
	$('input, select, textarea').each(function(){
	   if($(this).val()=="" && $(this).prop('required')){
	   		$(this).addClass('invalid');
	   		if($(this).attr('id')=="uploaded_img"){
	   			$('.up_user_img').addClass('invalid');
	   		}
	      	valid = false;
	    }
	});

	return valid;
}


function validateEmail($email) {
  var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
  return emailReg.test( $email );
}



// default msg function
function submitMSG(valid, msg){
    if(valid){
        var alertClasses = "h3 text-center fadeInDown animated text-success";
    } else {
        var alertClasses = "h3 text-center fadeInUp animated text-danger";
    }
    $("#msgSubmit").removeClass().addClass(alertClasses).text(msg);
}




}(jQuery));	

 
$(function(){


$('#send_post').on('click', function() {
	var textValue =$('input[name=pass]').val();
	//alert(textValue);
	//$.post('./application/scripts/sign.php',{pass: textValue});

    var file_data = $('#keypic').prop('files')[0];
    var form_data = new FormData();
    form_data.append('skey', file_data);
    form_data.append('pass', $('input[name=pass]').val());
    $.ajax({
                url: './application/scripts/sign.php',
                dataType: 'text',
                cache: false,
                contentType: false,
                processData: false,
                data: form_data,
                type: 'post',
                success: function(php_script_response){
                    if (php_script_response=="true") {
						 window.location.href='admin';
					}else{
						$("#output").addClass("alert alert-danger animated fadeInUp").html(php_script_response);
					}
                }
     });
});



	/*
var textfield = $("input[name=user]");
			$('button[type="submit"]').click(function(e) {
				e.preventDefault();
				//little validation just to check username
				
				alert("lol");

				function onAjaxSuccess(data){
					if (data=="true") {
						 window.location.href='admin';
					}else{
						$("#output").addClass("alert alert-danger animated fadeInUp").html(data);
					}
				}					
				

			});*/
});

$(function(){

	
	
	$('#sign_out').click(function(){
		$.post("./application/scripts/sign.php",{
				sign_out: 1
			},
				onAjaxSuccess
		);

		function onAjaxSuccess(data){
			window.location.href='sign_in';
		}
	});


	$( "#timer_send" ).click(function() {
		

		$.post( "./application/scripts/lamps.php", { timer_start: $("#timerto").text(), timer_finish: $("#timerdo").text() })
  			.done(function( data ) {
    		//alert( "Data Loaded: " + data );
    		$("#timer_send").hide();
  		});
	});
});

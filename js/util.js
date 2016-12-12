
(function ($) {

	function downloadSelected() {
		var documents=Array();
		var v=0;

		$(".view-list-view .form-checkbox").each(function () {
			if ($(this).is(':checked'))
			{
				var val = $(this).val();
				if(val.length != 0){
					documents[v] = val;
				}
			}

			v++;
		});

		if(valid() == true){
			$.ajax({
				url: "/dr_photolib/sites/default/themes/nzta/ajax-request.php?documents="+documents,
				success: function (data)
				{
					window.location = data;
				}
			});
		}else {
			alert('Please accept terms and conditions');
		}
	}


/* Adding dialog form */
	var form;
	// From http://www.whatwg.org/specs/web-apps/current-work/multipage/states-of-the-type-attribute.html#e-mail-state-%28type=email%29			
			
	var allFields = $( [] ).add( name );
	var tips = $( ".validateTips" );

	function updateTips( t ) {
		tips
			.text( t )
			.addClass( "ui-state-highlight" );
		setTimeout(function() {
			tips.removeClass( "ui-state-highlight", 1500 );
		}, 500 );
	}

	function valid() {
		var valid = false;

		console.log($('#check_tandc').is(':checked'));
		valid = $('#check_tandc').is(':checked');

		return valid;
	}


	$(document).ready(function() {
		$( "#documentSelected" ).click(function(event){
			event.preventDefault();
			
			$("#dialog-form").dialog({
				height: 400,
				width: 350,
				modal: true,
				buttons: {
					"Download File": function(){
						downloadSelected();
					},
					close: function(){
						$("#dialog-form").dialog("close");
					}
				}
			});
		});
	});


})(jQuery);

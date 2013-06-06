function getdetails(val_id){
	$.ajax({
		type: "POST",
		url: "details.php",
		data: {id:val_id}
	}).done(function( result ) {
		$("#msg" + val_id).html( result );
	});
}
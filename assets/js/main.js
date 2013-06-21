function getdetails(val_id){
	$.ajax({
		type: "POST",
		url: "lib/ajax.php",
		data: {id:val_id}
	}).done(function( result ) {
		$("#msg" + val_id).html( result );
	});
}
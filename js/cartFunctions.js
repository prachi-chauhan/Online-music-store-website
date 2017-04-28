function deleteFromCart(username,songId){
		
		
		$.ajax({
			type: "POST",
			url: "cart_DeleteSong.php",
			dataType: "json",    
			data: {
				songId: songId,
				username: username
			},
			success: function (data) {
				//console.log(data);
			   
			},
			error: function(data) {
				//console.log(data);
			}
		});
	   window.location= "Cart.php";

	}
function checkOut(username){
	var song_ids = [];
	
	$(".checkout-row").each(function(i) {		
			 var movie_id = this.id;
			 song_ids.push(movie_id);
	});
    
	var jsonSongIDs = JSON.stringify(song_ids);
	
	$.ajax({
		type: "POST",
		url: "cart_AddCheckOut.php",
		dataType: "json",    
		data: {
			username: username,
			song_ids: jsonSongIDs
		},
		success: function (data) {
			console.log(data);
		   
		},
		error: function(data) {
			console.log(data);
		}
	});
   window.location= "order_History.php";
}
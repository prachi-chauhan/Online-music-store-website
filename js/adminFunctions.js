
	function deleteSong(songId){
		
		$.ajax({
			type: "POST",
			url: "php/admin_DeleteSong.php",
			dataType: "json",    
			data: {
				songId: songId
			},
			success: function (data) {
			    window.location= "/php/adminpage.php";
			},
			error: function(data) {
			}
		});
	    window.location= "adminpage.php";

	}
	function editSong(songId){

	
		window.location= "php/admin_EditSong.php?songId="+songId;
	}



$(document).ready(function() {

$.ajax({
	url: "/~ew7wc/final/php/getTasks.php",
	data: {taskStatus: "pending", userID: localStorage.getItem('userID')},
	success: function(data){
		$('#pending').html(data);
	}
})


$.ajax({
	url: "/~ew7wc/final/php/getTasks.php",
	data: {taskStatus: "active", userID: localStorage.getItem('userID')},
	success: function(data){
		$('#active').html(data);
	}
})

$.ajax({
	url: "/~ew7wc/final/php/getTasks.php",
	data: {taskStatus: "completed", userID: localStorage.getItem('userID')},
	success: function(data){
		$('#completed').html(data);
	}
})
	$(function() {
		$("#pending").sortable({
			connectWith: "#active, #completed",
			receive: function(event, ui) {
				$.ajax({
					url: "/~ew7wc/final/php/updateDatabase.php",
					data: {dragIntoWhatColumn: this.id,
						taskID: $(ui.item).attr("id")
					},
					success: function(data){
						//alert(data); 	
						$.ajax({
							url: "/~ew7wc/final/php/getAmountCompleted.php",
							data: {userID: localStorage.getItem('userID')},
							success: function(data){
								$( "#progressbar").progressbar({
									value: parseFloat(data)

								});
								$("span#progressText").text(parseFloat(data).toFixed(2) + ' %');

							}
						});
					}

				});
			}
		}).disableSelection();

		$("#active").sortable({
			connectWith: "#pending, #completed",
			receive: function(event, ui) {
				$.ajax({
					url: "/~ew7wc/final/php/updateDatabase.php",
					data: {dragIntoWhatColumn: this.id,
						taskID: $(ui.item).attr("id")
					},
					success: function(data){
						//alert(data); 	
						$.ajax({
							url: "/~ew7wc/final/php/getAmountCompleted.php",
							data: {userID: localStorage.getItem('userID')},
							success: function(data){
								$( "#progressbar").progressbar({
									value: parseFloat(data)

								});
								$("span#progressText").text(parseFloat(data).toFixed(2) + ' %');

							}
						});
					}

				});
			}
		}).disableSelection();

		$("#completed").sortable({
			connectWith: "#pending, #active",
			receive: function(event, ui) {
				$.ajax({
					url: "/~ew7wc/final/php/updateDatabase.php",
					data: {dragIntoWhatColumn: this.id,
						taskID: $(ui.item).attr("id")
					},
					success: function(data){
						//alert(data); 	
						$.ajax({
							url: "/~ew7wc/final/php/getAmountCompleted.php",
							data: {userID: localStorage.getItem('userID')},
							success: function(data){
								$( "#progressbar").progressbar({
									value: parseFloat(data)

								});
								$("span#progressText").text(parseFloat(data).toFixed(2) + ' %');

							}
						});
					}

				});
			}
		}).disableSelection();
	}); 


	

});
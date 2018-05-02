
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

$(document).ready(function(){
	$('.update-button').on('click', function(event){
		event.preventDefault();
		let form = $(this).parent();
		let urlAction = form.attr('action');
		var datastring = form.serialize();
		let task_id = $(this).attr("data-id");
		$.ajax({
		    type: "PATCH",
		    url: urlAction,
		    data: datastring,
		    dataType: "json",
		    success: function(data) {
		        $('#task_'+task_id).html(data.title);
		        $('#task_body_'+task_id).html(data.body);
		    },
		    error: function() {
		        alert("Update fields can't be blank and must have at least 6 characters!!. Please check the fields");
		    }
		});
	});
});









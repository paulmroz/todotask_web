
$.ajaxSetup({
	headers: {
		'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	}
});

$(document).ready(function(){
	$('.updateButton').on('click', function(event){
		event.preventDefault();
		let formUpdate = $(this).parent();
		let urlAction = formUpdate.attr('action');
		var dataString = formUpdate.serialize();
		let task_id = $(this).attr("data-id");
		$.ajax({
			type: "PATCH",
			url: urlAction,
			data: dataString,
			dataType: "json",
			success: function(data){
				$('#task_title_'+task_id).html(data.title);
				$('#task_desc_'+task_id).html(data.body);
			},
			error: function(){
				alert("Update fields can't be blank and must have at least 6 characters!!. Please check the fields");
			}
		});
		$('.edit_button_'+task_id).css("display","block");
		$('.form_number_'+task_id).css("display", "none");	
		$('.single_task_'+task_id).css("display", "block");	
	
	});

	$('.toggle_edit_form').on('click', function(){
		$(this).css("display","none");
		let task_id = $(this).attr("data-id");
		$('.form_number_'+task_id).css("display", "block");	
		$('.single_task_'+task_id).css("display", "none");
	});

	/*$('.deleteButton').on('click', function(event){
		event.preventDefault();
		let formDelete = $(this).parent();
		let urlAction = formDelete.attr('action');
		var dataString = formDelete.serialize();
		let order_id = $(this).attr("data-id");
		console.log(formDelete);
		console.log(urlAction);
		console.log(dataString);
		$.ajax({
			type: "DELETE",
			url: urlAction,
			data: dataString,
			dataType: "json",
			success: function(data){
				$('#order_title_'+order_id).html("<strike>"+data.title+"</strike>");
				$('#order_desc_'+order_id).html("<strike>"+data.description+"</strike>");
			},
			error: function(){
				alert("Deleteing order failed");
			}
		})

	});*/

	const triggers = document.querySelectorAll('.cool > li');
	const background = document.querySelector('.dropdownBackground');
	const nav = document.querySelector('.top');

	function handleEnter() 
	{
		this.classList.add('trigger-enter');
		setTimeout(()=>{
			if(this.classList.contains('trigger-enter')){
				this.classList.add('trigger-enter-active')
			}  
		}, 150)
		background.classList.add('open');

		const dropdown = this.querySelector('.dropdown');
		const dropdownCoords = dropdown.getBoundingClientRect();
		const navCoords = nav.getBoundingClientRect();

		const coords = {
			height: dropdownCoords.height,
			width: dropdownCoords.width,
			top: dropdownCoords.top - navCoords.top - 20,
			left: dropdownCoords.left - navCoords.left - 20,
		};

		background.style.setProperty('width', `${coords.width}px`);
		background.style.setProperty('height', `${coords.height}px`);
		background.style.setProperty('transform', `translate(${coords.left}px, ${coords.top}px)`);
	}

	function handleLeave()
	{
		this.classList.remove('trigger-enter-active');
		this.classList.remove('trigger-enter');
		background.classList.remove('open');
	}

	triggers.forEach(trigger => trigger.addEventListener('mouseenter', handleEnter));
	triggers.forEach(trigger => trigger.addEventListener('mouseleave', handleLeave));
});












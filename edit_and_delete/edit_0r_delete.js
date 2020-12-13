

function callCrudAction(action,id) {
	
	var queryString;
	switch(action) {
		
		
		case "delete":
			queryString = 'action='+action+'&row-id='+ id;
		break;
	}	 
	jQuery.ajax({
	url: "crud_action.php",
	data:queryString,
	type: "POST",
	success:function(data){
		switch(action) {
			
			
			case "delete":
				$('#row_.'+id).fadeOut();
			break;
		}
		
	},
	error:function (){}
    });
    
}

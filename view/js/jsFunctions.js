
$(document).ready(function(){
	
	$.ajax({
       	type:"GET",
       	url: "controller/cContacts.php", 
    	dataType: "json",  //type of the result
       	
    	success: function(result){  
       		
    		console.log(result);
    		
       		$("#cmbContacts").empty(); // removes all the previous content
       		
  			var newRow ="";
			
  		//mostrar la info que aparece en el comboBox
  			
			$.each(result,function(index,info) { 
				
				newRow += "<option value='"+info.idContact+"'>"+info.surname+" , "+info.name+"</option>";	
			});
       		
       		$("#cmbContacts").append(newRow); // add the new rowr
		},
       	error : function(xhr) {
   			alert("An error occured: " + xhr.status + " " + xhr.statusText);
   		}
	});
	
	
	$("#cmbContacts").change(function(){	
		var idContact=$("#cmbContacts").val();
		
		$.ajax({
	       	type:"GET",
	       	data:{'idContact':idContact},
	       	url: "controller/cContactInfo.php", 
	    	dataType: "json",  
	       	
	    	success: function(result){  
	       		
	    		console.log(result);
	    		var contact=result; 
	    		
	    		$("#contactInfo").empty(); // removes all the previous content in the container
	       		
	    		var newRow = "<h4>Information of this contact</h4>";
	       		newRow +="<fieldset > ";

	       		//mostrar la info que aparece en el enunciado
	       		
	       		newRow += "<label>idContact : </label> <input type='text' value='" +contact.idContact+"'/><br/>";
				newRow += "<label>Name : </label> <input type='text' value='" +contact.name+"'/><br/>";
				newRow += "<label>Surname : </label> <input type='text' value='" +contact.surname+"'/><br/>";
				newRow += "<label>Telephone : </label> <input type='text' value='" +contact.tel+"'/><br/>";
				for(let i=0; i<contact.emailsList.length;i++)
				{
				newRow += "<label>Email "+(i+1)+" : </label> <input type='text' value='" +contact.emailsList[i].e_mail+"'/><br/>";
				}
				
				newRow += "<input type='checkbox'/> <label>Lagunak</label><br/>";
				newRow += "<input type='checkbox'/> <label>Familia</label><br/>";
				newRow += "<input type='checkbox'/> <label>Lana</label><br/>";
				
				newRow +="</fieldset>";   

	       		$("#contactInfo").append(newRow); // add the table to the container
			},
	       	error : function(xhr) {
	   			alert("An error occured: " + xhr.status + " " + xhr.statusText);
	   		}
		});
	});
	$(document).on('click', '#btnUpdate', function () {
	    
		var idcontact= $(this).val();
		
		alert("ID CONTACT"+ idcontact);
		
		
	});

});
/* createTask.js */
/* created: 10/23/17 -AH */

// main function for input of new project
function createTask() {
    
    var sPriority = document.getElementById("priority").value;
    var sTask = document.getElementById("task").value;
    var sAssigned = document.getElementById("assigned").value;
    var sCompleation = document.getElementById("completion").value;
    var sScrum1 = document.getElementById("scrum1").value;
    var sScrum2 = document.getElementById("scrum2").value;
    
    if(checkInput()) {
	//submit query and wait for responce 
	if(submitForm()) {
	    confirmInput();
	    }
	}
    else {// alert that form submit failed
	}
    
    //---------------------- functions createProject() ---------------------------------
    // check input for invalid inputs 
    // current dummy with out back end restrictions 
    function checkInput() {
	
	if(sTask == "") {
	    alert("Invalid Task.");
	    return false;
	    }
	
	if(sAssigned == "") {
	    alert("Invalid assigned members.");
	    return false;
	    }
	
	if(sCompleation == "") {
	    alert("Invalid completion date.");
	    return false;
	    }
	
	if(sScrum1 == "") {
	    alert("Invalid Scrum entry 1.");
	    return false;
	    }
	
	if(sScrum2 == "") {
	    alert("Invalid Scrum entry 2.");
	    return false;
	    }
	
	return true;
	}
    
    // submit form to DB 
    // currently dumby 
    function submitForm() {
	return true;
	}
    
    // confirmation of submission of information
    function confirmInput() {
	alert("Your input is: \n Priority level:" + sPriority + 
	      "\n Task Name:" + sTask +
	      "\n Assigned members:" + sAssigned + 
	      "\n Completion date: " + sCompleation +
	      "\n Scrum 1:" + sScrum1 + 
	      "\n Scrum 2:" + sScrum2);
	}
    
}

function clearProject() {
    document.getElementById("myForm").reset();
}

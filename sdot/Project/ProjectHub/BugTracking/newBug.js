/* newBug.js */
/* created: 10/23/17 -AH */

// main function for input of new project
function createBug() {
    
    var sReporter = document.getElementById("reporter").value;
    var sAssigned = document.getElementById("assigned").value;
    var sSource = document.getElementById("source").value;
    var sLocation = document.getElementById("location").value;
    var sDescription = document.getElementById("description").value;
    
    if(checkInput()) {
	//submit query and wait for response 
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
	
	if(sReporter == "") {
	    alert("Invalid reporting member.");
	    return false;
	    }
	
	if(sAssigned == "") {
	    alert("Invalid assigned members.");
	    return false;
	    }
	
	if(sSource == "") {
	    alert("Invalid source.");
	    return false;
	    }
	
	if(sLocation == "") {
	    alert("Invalid location description.");
	    return false;
	    }
	
	if(sDescription == "") {
	    alert("Invalid description entry.");
	    return false;
	    }
	
	return true;
	}
    
    // submit form to DB 
    // currently not finished
    function submitForm() {
	return true;
	}
    
    // confirmation of submission of information
    function confirmInput() {
	alert("Your input is: \n Reporting Member level:" + sReporter + 
	      "\n Assigned members:" + sAssigned +
	      "\n Source File:" + sSource + 
	      "\n Method Location: " + sLocation +
	      "\n Description:" + sDescription);
	}
    
}

function clearProject() {
    document.getElementById("myForm").reset();
}

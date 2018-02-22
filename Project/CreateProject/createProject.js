/* NewProject.js */
/* created: 10/23/17 -AH */

// main function for input of new project
function createProject() {
	
	var sProjectName = document.getElementById("projectName").value;
	var sCollaborators = document.getElementById("collaborators").value;
	var sSummary = document.getElementById("summary").value;
	
	if(checkInput()) {
			//submit query and wait for responce 
		if(submitForm()) {
			confirmInput();
		}
	}
	else {// alert that form submit failed
		}
	
	//submit query and wait for repsonce
	
	//---------------------- functions createProject() ---------------------------------
	// check input for invalid inputs 
	// current dummy with out back end restrictions 
	function checkInput() {
		if(sProjectName == "") {
			alert("Invalid Project Name.");
			return false;
		}
		
		if(sCollaborators == "") {
			alert("Invalid Collaborators.");
			return false;
		}
		
		if(sSummary == "") {
			alert("Invalid Summery input.");
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
		alert("Your input is: \n Project name:" + sProjectName + 
		"\n Collaborators:" + sCollaborators + "\n Summary: " + sSummary);
	}
	
}


// CLEAR FORM FUNC
function clearProject() {
	document.getElementById("myForm").reset();
}
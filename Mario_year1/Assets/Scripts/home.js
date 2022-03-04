function validate(){
	//check if firstname is not blank
	if (document.regForm.firstname.value==""){
		document.getElementById("firstname").innerHTML=("(Firstname can not be blank!!!)");
		return false;
	}
	if (document.regForm.lastname.value==""){
		document.getElementById("lastname").innerHTML=("(Lastname can not be blank!!!)");
		return false;
	}
	
	return true;
}
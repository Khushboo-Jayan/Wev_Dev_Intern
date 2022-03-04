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
	
	if (document.regForm.age.value=="adults"){
		if(document.regForm.age_category.value=="")
		{
		document.getElementById("age_category").innerHTML=("(Please specify your age!!!)");
		return false;
		}
		return false;
	}
	if (document.regForm.Sugget.value==""){
		document.getElementById("Suggest").innerHTML=("(Suggestion can not be blank!!!)");
		return false;
	}
	if (document.regForm.game.value=="") && (document.regForm.game1.value=="") && (document.regForm.game2.value==""){
		document.getElementById("recommend").innerHTML=("(Select at least one!!!)");
		return false;
	}
	
	return true;
}
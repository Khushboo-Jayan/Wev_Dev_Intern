function message(){
	if (document.regForm.NAME.value==""){
		document.getElementById("NameMessage").innerHTML=("(Name can not be blank!!!)");
		return false;
	}
	if (document.regForm.EMAIL.value==""){
		document.getElementById("EmailMessage").innerHTML=("(EMAIL can not be blank!!!)");
		return false;
	}
	if (document.regForm.MESSAGE.value==""){
		document.getElementById("MessageMessage").innerHTML=("(MESSAGE can not be blank!!!)");
		return false;
	}
	
	return true;
}
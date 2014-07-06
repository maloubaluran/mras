	function validator(){
	var valid1 = true;
	var valid2 = true;
	var valid3 = true;
	var valid4 = true;
	var valid5 = true;
	var valid6 = true;
	var valid7 = true;
	var valid8 = true;
	
	
	if(document.getElementById("fname").value == ""){
		document.getElementById("fname").style.backgroundColor="#FBAAA8";
		valid1 = false;
	}else{
		document.getElementById("fname").style.backgroundColor="";
		}
	
	if(document.getElementById("mname").value == ""){
		document.getElementById("mname").style.backgroundColor="#FBAAA8";
		valid2 = false;
	}else{
		document.getElementById("mname").style.backgroundColor="";
		}
	
	if(document.getElementById("lname").value == ""){
		document.getElementById("lname").style.backgroundColor="#FBAAA8";
		valid3 = false;
	}else{
		document.getElementById("lname").style.backgroundColor="";
		}
	
	if(document.getElementById("homeaddress").value == ""){
		document.getElementById("homeaddress").style.backgroundColor="#FBAAA8";
		valid4 = false;
	}else{
		document.getElementById("homeaddress").style.backgroundColor="";
		}
		
	if(document.getElementById("occupation").value==""){
		document.getElementById("occupation").style.backgroundColor="#FBAAA8";
		valid5 = false;
	}else{
		document.getElementById("occupation").style.backgroundColor="";
	}

	if(document.getElementById("history").value==""){
		document.getElementById("history").style.backgroundColor="#FBAAA8";
		valid6 = false;
	}else{
		document.getElementById("history").style.backgroundColor="";
	}
	
	if(document.getElementById("height").value==""){
		document.getElementById("height").style.backgroundColor="#FBAAA8";
		valid7 = false;
	}else{
		document.getElementById("height").style.backgroundColor="";
	}
	
	if(document.getElementById("weight").value==""){
		document.getElementById("weight").style.backgroundColor="#FBAAA8";
		valid8 = false;
	}else{
		document.getElementById("weight").style.backgroundColor="";
	}
	
	if(document.getElementById("age").value==""){
		document.getElementById("age").style.backgroundColor="#FBAAA8";
		valid9 = false;
	}else{
		document.getElementById("age").style.backgroundColor="";
	}
	
	
	if(valid1 & valid2 & valid3 & valid4 & valid5 & valid6 & valid7 & valid8 & valid9){
		return true;
	}else{
		document.getElementById("notification").innerHTML="Please fill-up the required fields";
		return false;
	}
}

	function numbersonly(e, decimal) {
		var key;
		var keychar;

		if (window.event) {
			key = window.event.keyCode;
		}
		else if (e) {
			key = e.which;
		}
		else {
			return true;
		}	
		keychar = String.fromCharCode(key);

		if ((key==null) || (key==0) || (key==8) ||  (key==9) || (key==13) || (key==27) ) {
			return true;
		}
		else if ((("0123456789").indexOf(keychar) > -1)) {
			return true;
		}
		else if (decimal && (keychar == ".")) { 
			return true;
		}
		else
			return false;
	}
		
	function radioButtonChecked(){
		if(document.form.where[1].checked){
		  document.form.where[1].checked;
		  document.getElementById("deptLabelContainer").innerHTML = "<font id='label'>Department:</font>";
		  document.getElementById("deptFieldContainer").innerHTML = "<select name='dept' id='deptContainer' style='width:100%'></select>";
			}else if(document.form.where[0].checked){
				document.form.where[0].checked;
				document.getElementById("deptLabelContainer").innerHTML = "";
				document.getElementById("deptFieldContainer").innerHTML = "";
				}
		}
		
	function setAjax(){
	try{
		Req = new ActiceXObject("Msxml2.XMLHTTP");
		}catch(e){
			try{
				Req = new ActiveXObject("Microsoft.XMLHTTP");
				}catch(E){
					Req = false;
					}
			
			}
			
			if(!Req && typeof XMLHttpRequest != 'undefined'){
				Req = new XMLHttpRequest();
				
				}
				return Req;

	}

	function handleSearch() {
		
		if (searchReq.readyState == 4) {
			
			var str = searchReq.responseText;
			if(str=="false"){
				document.getElementById("valid_uname").innerHTML = "";
				}else{
					document.getElementById("valid_uname").innerHTML = "<img src='../Pictures/cross.jpg'/>";
					}
		}
	}

	function capitalizeMe(obj) {
			val = obj.value;
			newVal = '';
			val = val.split(' ');
			for(var c=0; c < val.length; c++) {
					newVal += val[c].substring(0,1).toUpperCase() +val[c].substring(1,val[c].length) + ' ';
			}
			obj.value = newVal;
	}

	function findStaff(value){
		if(value.length==0){
			$('#staffNames').fadeOut();
		}else{
		$.post('../Controllers/StaffController.php',{staffName:value},function(data){
				if(data.length>0){
					$('#staffNames').fadeIn();
					$('#staffNames').html(data);
				}else{
					$('#staffNames').fadeOut();
				}
				
			});
		}
		}

	function fillData(name, no){
		$('#staffName').val(name);
		$('#staffno').val(no);
		$('#staffNames').fadeOut();
		}
		
	function displayStaffNames(){
		$('#staffNames').fadeOut();
		name = document.getElementById('staffName').value;
		$.post('../Controllers/StaffController.php',{staffName1:name},function(data){
			if(data.length>0){
				document.getElementById('resultsContainer').innerHTML = data;
			}
			});
		}
		
	function editStaffPopup(num,input){
		location.href = "../Controllers/StaffController.php?staff_no="+num+"&input="+input
		}
		
	function viewStaff(num,input){
		location.href = "../Controllers/StaffController.php?staff_no_view="+num+"&input="+input
		}
		
	function createStaff(){
		location.href = "../Controllers/StaffController.php?staff=create"
		}
		
	function editStaffUnameAndPword(){
		location.href = "../Controllers/StaffController.php?editInfo";
		}
		
	function gotoInfo(){
		location.href = "../Controllers/StaffController.php?view_staff_info";
		}
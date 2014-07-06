function search_patient(option){
	parent = window.open("search_patient.php",'Search Patient','top=300px,left=600px,resize=no,scrollbar=true,height=300,width=350');
}
function search_doctor(option){
	parent = window.open("search_doctor.php",'Search Doctor','top=300px,left=600px,resize=no,scrollbar=true,height=300,width=350');
}
function child_to_parent_patient(id,name){
	opener.document.parent.patientId.value = id;
	opener.document.parent.patientName.value = name;
	self.close();
}

function child_to_parent_doctor(id,name){
	opener.document.parent.doctorId.value = id;
	opener.document.parent.doctorName.value = name;
	self.close();
}

/*
	verification
*/

function del_confirm(src){
	resp = confirm("Are you sure you want to delete this?")
	if(resp) window.location = src
	return false		
}

function check(formid){
	form = document.getElementById(formid)
	response = true
	
	for(i=0;i<form.length;i++){
		if(form.elements[i].type!="submit")
			if(form.elements[i].value == ""){
				alert(form.elements[i].title+" has no value")
				return false
			}
				
	}
	response = load_image('file')
	
	return response
}

function load_image(id)
{    
    var imgpath = document.getElementById(id).value;    
    if(imgpath != "")
    {
        var arr1 = new Array;
        arr1 = imgpath.split("\\");
        var len = arr1.length;
        var img1 = arr1[len-1];
        var filext = img1.substring(img1.lastIndexOf(".")+1);
       
        if(filext != "jpg" || filext != "jpeg" || filext != "gif" 
			|| filext != "png" || fileext !="bmp" )
        {
            alert("Invalid Image File Format Selected "+ext);
            document.getElementById(id).value = "";
            return false;
        }
    }
}
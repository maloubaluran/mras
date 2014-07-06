function search_patient(option){
	parent = window.open("search_patient.php",'Search Patient','top=300px,left=600px,resize=no,scrollbar=true,height=300,width=350');
}
function search_doctor(option){
	parent = window.open("search_doctor.php",'Search Doctor','top=300px,left=600px,resize=no,scrollbar=true,height=300,width=350');
}
function child_to_parent_patient(id,name){
	opener.document.parent.patientId.value = id;
	opener.document.parent.patientName.value = name;
	this.self.close();
}

function child_to_parent_doctor(id,name){
	opener.document.parent.doctorId.value = id;
	opener.document.parent.doctorName.value = name;
	self.close();
}
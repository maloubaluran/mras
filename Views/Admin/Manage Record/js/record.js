function search_patient(pid,pname){
	parent = window.open("search_patient.php?id="+pid+"&name="+pname,'Search Patient','top=300px,left=600px,resize=no,scrollbar=true,height=300,width=350');
}
function search_doctor(did,dname){
	parent = window.open("search_doctor.php?id="+did+"&name="+dname,'Search Doctor','top=300px,left=600px,resize=no,scrollbar=true,height=300,width=350');
}
function child_to_parent_patient(id,name){
	opener.document.parent.patientId.value = id;
	opener.document.parent.patientName.value = name;
	self.close();
}

function child_to_parent(pid,pname,id,name){
	window.opener.document.getElementById(pid).value = id;
	window.opener.document.getElementById(pname).value = name;
	self.close();
}

/*
	multiple uploads
*/
var i = 0;
		
function createUploadDiv(tbl){
	i++
	var table = document.getElementById(tbl)
	lastrow = table.rows.length;
					
	/*
		text nodes
	*/
	fileName = document.createTextNode("File "+i+" : ")
	pName = document.createTextNode("Patient Name : ")
	dName = document.createTextNode("Doctor Name : ")
	dateName = document.createTextNode("Date Stored: ");
	/*
		input fields type text
	*/
	// patient name 
	pNameInput = document.createElement("input")
	pNameInput.type = "text"
	pNameInput.name = "patientName"+i
	pNameInput.id = pNameInput.name
	pNameInput.disabled = true
	pNameInput.title = "Patient Name"+i
	//doctor name
	dNameInput = document.createElement("input")
	dNameInput.type = "text"
	dNameInput.name = "accountName"+i
	dNameInput.id = dNameInput.name
	dNameInput.disabled = true
	//date stored
	dateInput = document.createElement("input")
	dateInput.type = "text"
	dateInput.name = "dateStored"+i
	dateInput.id  = "dataStored"+i
	/*
		input fields type hidden
	*/
	//file upload
	fileInput = document.createElement("input")
	fileInput.type = "file"
	fileInput.name = "image"+i
	//patient id
	pId = document.createElement("input")
	pId.type = "hidden"
	pId.name = "patientId"+i
	pId.id = pId.name
	//doctor id
	dId = document.createElement("input")
	dId.type = "hidden"
	dId.name = "accountId"+i
	dId.id = dId.name
	/*
		search buttons
	*/
	// patient search
	psearch = document.createElement("input")
	psearch.type = "button"
	psearch.value = "Search"
	psearch.onclick =  function(){search_patient("patientId"+i,"patientName"+i)}
	//doctor search
	dsearch = document.createElement("input")
	dsearch.type = "button"
	dsearch.onclick = function(){search_doctor("accountId"+i,"accountName"+i)}
	dsearch.value = "Search"
	/*
		create rows
	*/
	rowFile = table.insertRow(lastrow);
	rowP = table.insertRow(lastrow+1)
	rowD = table.insertRow(lastrow+2)
	rowDa = table.insertRow(lastrow+3)
	
	/*
		create cells
	*/
	celFile0 = rowFile.insertCell(0)
	celFile1 = rowFile.insertCell(1)
	cellPlabel = rowP.insertCell(0)
	cellPinput = rowP.insertCell(1)
	cellDlabel = rowD.insertCell(0)
	cellDinput = rowD.insertCell(1)
	cellDalabel = rowDa.insertCell(0)
	cellDainput = rowDa.insertCell(1)
				
	/*
		insert inputs, texts and searches
	*/
	celFile0.appendChild(fileName)
	celFile1.appendChild(fileInput)
	cellPlabel.appendChild(pName)
	cellDlabel.appendChild(dName)
	cellPinput.appendChild(pNameInput)
	cellPinput.appendChild(pId)
	cellPinput.appendChild(psearch)
	cellDinput.appendChild(dNameInput)
	cellDinput.appendChild(dId)
	cellDinput.appendChild(dsearch)
	cellDalabel.appendChild(dateName)
	cellDainput.appendChild(dateInput)
	
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
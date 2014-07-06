		function addRow(id) {
		
		
		
		var i = document.getElementById(id).rows.length;
		var tbody = document.getElementById
		(id).getElementsByTagName('TBODY')[0];
		var row = document.createElement('TR')
		
		var td1 = document.createElement('TD')
		td1.innerHTML = '<input type="checkbox"/>';
			
		var td2 = document.createElement('TD')
		td2.innerHTML = "<input onClick=\"ds_sh(this);\" name=\"tdate"+i+"\" size=\"14\" readonly=\"readonly\" style=\"cursor: text\" />";
		
		var td3 = document.createElement('TD')
		td3.innerHTML = "<input type=\"text\" size=\"22\" name=\"tdiag"+i+"\"/>";
			
		var td4 = document.createElement('TD')
		td4.innerHTML = "<input type=\"text\" size=\"22\" name=\"tprog"+i+"\"/>";
			
		var td5 = document.createElement('TD')
		td5.innerHTML = "<input type=\"text\" size=\"22\" name=\"ttreat"+i+"\"/>";
			
			
			row.appendChild(td1);
			row.appendChild(td2);
			row.appendChild(td3);
			row.appendChild(td4);
			row.appendChild(td5);
			tbody.appendChild(row);
			
			document.getElementById('numrows').value = i;
			i++;		
	 
	        }
	 
	        function deleteRow(tableID) {
	            try {
	            var table = document.getElementById(tableID);
	            var rowCount = table.rows.length;
	 
	            for(var i=1; i<rowCount; i++) {
	                var row = table.rows[i];
	                var chkbox = row.cells[0].childNodes[0];
	                if(null != chkbox && true == chkbox.checked) {
	                    table.deleteRow(i);
	                    rowCount--;
	                    i--;
	                }
	 
	            }
	            }catch(e) {
	                alert(e);
	            }
	        }

		function addRow2(tableID) {
	 
	            var table = document.getElementById(tableID);
	 
	            var rowCount = table.rows.length;
	            var row = table.insertRow(rowCount);
	 
	            var cell1 = row.insertCell(0);
	            var element1 = document.createElement("input");
	            element1.type = "checkbox";
		    element1.name = "chkbox";
	            cell1.appendChild(element1);
	 
	           	var cell2 = row.insertCell(1);
	            var element2 = document.createElement("td");
				element2.innerHTML = "<input onClick=\"ds_sh(this);\" name=\"date\" size=\"8\" readonly=\"readonly\" style=\"cursor: text\" />";
				cell2.appendChild(element2);
				
				var cell3 = row.insertCell(2);
	            var element3 = document.createElement("td");
				element3.innerHTML = "<input onClick=\"ds_sh(this);\" name=\"date\" size=\"8\" readonly=\"readonly\" style=\"cursor: text\" />";
				cell3.appendChild(element3);
	 
	            var cell4 = row.insertCell(3);
	            var element4 = document.createElement("input");
	            element4.type = "text";
				element4.size = "30";
	            cell4.appendChild(element4);

	           
		
	            var cell5 = row.insertCell(4);
	            var element5 = document.createElement("input");
	            element5.type = "text";
				element5.size = "40";
	            cell5.appendChild(element5);

	            var cell6 = row.insertCell(5);
	            var element6 = document.createElement("input");
	            element6.type = "text";
				element6.size = "9";
	            cell6.appendChild(element6);

	            var cell7 = row.insertCell(6);
	            var element7 = document.createElement("input");
	            element7.type = "text";
				element7.size = "9";
	            cell7.appendChild(element7);

	            var cell8 = row.insertCell(7);
	            var element8 = document.createElement("input");
	            element8.type = "text";
				element8.size = "15";
	            cell8.appendChild(element8);

	            var cell7 = row.insertCell(8);
	            var element9 = document.createElement("input");
	            element9.type = "text";
				element9.size = "3";
		        cell7.appendChild(element9);		
	        }
	
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd"> 
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US"> 
<head> 
    <meta http-equiv='Content-Type' content='text/html; charset=utf-8'/> 
    <title>STUDENT REGISTRATION PORTAL</title> 
    <link rel="STYLESHEET" type="text/css" href="style/fg_membersite.css" /> 
    <script type='text/javascript' src='scripts/gen_validatorv31.js'></script> 
    <link rel="STYLESHEET" type="text/css" href="style/pwdwidget.css" /> 
    <script src="scripts/pwdwidget.js" type="text/javascript"></script>    

    <SCRIPT language="javascript">
    	
    	// var tech = ['Java'];

    	// function ret()
    	// {
    	// 	return tech;
    	// }

		function addRow(tableID) {

			var table = document.getElementById(tableID);

			var rowCount = table.rows.length;
			var row = table.insertRow(rowCount);

			var colCount = table.rows[0].cells.length;

			for(var i=0; i<colCount; i++) {

				var newcell	= row.insertCell(i);

				newcell.innerHTML = table.rows[0].cells[i].innerHTML;
				switch(newcell.childNodes[0].type) {
					case "text":
							newcell.childNodes[0].value = "";
							break;
					case "checkbox":
							newcell.childNodes[0].checked = false;
							break;
					case "select-one":
							newcell.childNodes[0].selectedIndex = 0;
							break;
				}
			}
		}

		function saveRows(tableID) {

			tech = [];

			var table = document.getElementById(tableID);

			var rowCount = table.rows.length;
			
			var colCount = table.rows[0].cells.length;
			for(var j=0; j<rowCount; j++) {

				tech[j]=table.rows[j].cells[1].innerHTML;
							
			}
		}


	// function addRow(tableID) {

	// 		var table = document.getElementById(tableID);

	// 		var rowCount = table.rows.length;
	// 		var row = table.insertRow(rowCount);

	// 		var colCount = table.rows[0].cells.length;

	// 		for(var i=0; i<colCount; i++) {

	// 			var newcell	= row.insertCell(i);

	// 			newcell.innerHTML = table.rows[0].cells[i].innerHTML;
	// 			//alert(newcell.childNodes);
	// 			switch(newcell.childNodes[0].type) {
	// 				case "text":
	// 						newcell.childNodes[0].value = "";
	// 						break;
	// 				case "checkbox":
	// 						newcell.childNodes[0].checked = false;
	// 						break;
	// 				case "select-one":
	// 						newcell.childNodes[0].selectedIndex = 0;
	// 						break;
	// 			}
	// 		}
	// 	}

		function deleteRow(tableID) {
			try {
			var table = document.getElementById(tableID);
			var rowCount = table.rows.length;

			for(var i=0; i<rowCount; i++) {
				var row = table.rows[i];
				var chkbox = row.cells[0].childNodes[0];
				if(null != chkbox && true == chkbox.checked) {
					if(rowCount <= 1) {
						alert("Cannot delete all the rows.");
						break;
					}
					table.deleteRow(i);
					rowCount--;
					i--;
				}


			}
			}catch(e) {
				alert(e);
			}
		}




	</SCRIPT>


</head> 
<body> 
 
<div id='fg_membersite'> 


<form id='register' action='<?php echo $fgmembersite->GetSelfScript(); ?>' method='post' accept-charset='UTF-8'> 
<fieldset > 
<legend>STUDENT REGISTRATION PORTAL</legend> 
 
<input type='hidden' name='submitted' id='submitted' value='1'/> 
 
<div class='short_explanation'>* required fields</div> 
<input type='text'  class='spmhidip' name='<?php echo $fgmembersite->GetSpamTrapInputName(); ?>' /> 
 
<div><span class='error'><?php echo $fgmembersite->GetErrorMessage(); ?></span></div> 
<div class='container'> 
    <label for='name' >NAME * : </label><br/> 
    <input type='text1' name='name' id='name' value='<?php echo $fgmembersite->SafeDisplay('name') ?>' maxlength="70" /><br/> 
    <span id='register_name_errorloc' class='error'></span> 
</div> 


<div class='container'> 
    <label for='sem' >SEMESTER * :</label><br/> 
    <input type='text1' name='sem' id='sem' value='<?php echo $fgmembersite->SafeDisplay('sem') ?>' maxlength="1" /><br/> 
    <span id='register_sem_errorloc' class='error'></span> 
</div> 
<div class='container'> 
    <label for='id' >ID No. * :</label><br/> 
    <input type='text' name='id' id='id' value='<?php echo $fgmembersite->SafeDisplay('id') ?>' maxlength="8" /><br/> 
    <span id='register_id_errorloc' class='error'></span> 
</div> 
<div class='container'> 
    <label for='branch' >BRANCH * :</label><br/> 
    <input type='text' name='branch' id='branch' value='<?php echo $fgmembersite->SafeDisplay('branch') ?>' maxlength="50" /><br/> 
    <span id='register_branch_errorloc' class='error'></span> 
</div> 
<div class='container'> 
    <label for='email' >E-MAIL *:</label><br/> 
    <input type='text' name='email' id='email' value='<?php echo $fgmembersite->SafeDisplay('email') ?>' maxlength="50" /><br/> 
    <span id='register_email_errorloc' class='error'></span> 
</div> 
<div class='container'> 
    <label for='age' >AGE *:</label><br/> 
    <input type='text' name='age' id='age' value='<?php echo $fgmembersite->SafeDisplay('age') ?>' maxlength="2" /><br/> 
    <span id='register_age_errorloc' class='error'></span> 
</div> 
<div class='container'> 
    <label for='cont1' >CONTACT - 1 *:</label><br/> 
    <input type='text' name='cont1' id='cont1' value='<?php echo $fgmembersite->SafeDisplay('cont1') ?>' maxlength="10" /><br/> 
    <span id='register_cont1_errorloc' class='error'></span> 
</div> 
<div class='container'> 
    <label for='cont2' >CONTACT - 2 *:</label><br/> 
    <input type='text' name='cont2' id='cont2' value='<?php echo $fgmembersite->SafeDisplay('cont2') ?>' maxlength="10" /><br/> 
    <span id='register_cont2_errorloc' class='error'></span> 
</div> 

<div class='container', style="position:relative;width:200px;height:45px;border:0;padding:0;margin:0;">
	<label for='prog' >PROGRAM * :</label><br/>
  <select style="position:absolute;top:18px;left:0px;width:200px; height:25.6px;line-height:18px;margin:0;padding:0;"
          onchange="document.getElementById('prog').value=this.options[this.selectedIndex].text; document.getElementById('idValue').value=this.options[this.selectedIndex].value;">
    <option></option>
    <option value="one">B.TECH</option>
    <option value="two">M.TECH</option>
    <option value="three">Ph.D.</option>
  </select>
  <input type="text" name="prog" id="prog" value='<?php echo $fgmembersite->SafeDisplay('prog') ?>'
         placeholder="add/select a value" onfocus="this.select()"
         style="position:absolute;top:18px;left:0px;width:173px;width:180px\9;#width:180px;height:18px; height:18px\9;#height:18px;border:1px solid #556;"  >
  <input name="idValue" id="idValue" type="hidden">
</div>


<div class='container'> 
    <label for='inst1' >INSTITUTE NAME *:</label><br/> 
    <input type='text' name='inst1' id='inst1' value='<?php echo $fgmembersite->SafeDisplay('inst1') ?>' maxlength="50" /><br/> 
    <span id='register_inst1_errorloc' class='error'></span> 
</div> 
<div class='container'> 
    <label for='cgpa1' >CGPA *:</label><br/> 
    <input type='text' name='cgpa1' id='cgpa1' value='<?php echo $fgmembersite->SafeDisplay('cgpa1') ?>' maxlength="5" /><br/> 
    <span id='register_cgpa1_errorloc' class='error'></span> 
</div> 
<div class='container'> 
    <label for='inst2' >CLASS XII INSTITUTE NAME *:</label><br/> 
    <input type='text' name='inst2' id='inst2' value='<?php echo $fgmembersite->SafeDisplay('inst2') ?>' maxlength="50" /><br/> 
    <span id='register_inst2_errorloc' class='error'></span> 
</div> 
<div class='container'> 
    <label for='cgpa2' >CLASS XII CGPA *:</label><br/> 
    <input type='text' name='cgpa2' id='cgpa2' value='<?php echo $fgmembersite->SafeDisplay('cgpa2') ?>' maxlength="5" /><br/> 
    <span id='register_cgpa2_errorloc' class='error'></span> 
</div> 
<div class='container'> 
    <label for='inst3' >CLASS X INSTITUTE NAME *:</label><br/> 
    <input type='text' name='inst3' id='inst3' value='<?php echo $fgmembersite->SafeDisplay('inst3') ?>' maxlength="50" /><br/> 
    <span id='register_inst3_errorloc' class='error'></span> 
</div> 
<div class='container'> 
    <label for='cgpa3' >CLASS X CGPA 			*:</label><br/> 
    <input type='text' name='cgpa3' id='cgpa3' value='<?php echo $fgmembersite->SafeDisplay('cgpa3') ?>' maxlength="5" /><br/> 
    <span id='register_cgpa3_errorloc' class='error'></span> 
</div>



<!-- <div class='container'> 
    <label for='techsk' >TECHNICAL SKILLS *:</label><br/> 
    <input type='text' name='techsk1' id='techsk' value='<?php echo $fgmembersite1->SafeDisplay('techsk') ?>' maxlength="100" /><br/> 
    <span id='register_techsk_errorloc' class='error'></span> 
</div> -->

<!-- <div class='container'> 
    <label for='intrn' >INTERNSHIP(S) *:</label><br/> 
    <input type='text' name='intrn' id='intrn' value='<?php echo $fgmembersite->SafeDisplay('intrn') ?>' maxlength="100" /><br/> 
    <span id='register_intrn_errorloc' class='error'></span> 
</div> -->


<div class='container'>
<label for='schach' >SCHOLASTIC ACHIEVEMENTS *:</label><br/>


	<INPUT type="button" value="ADD ROW" onclick="addRow('dataTable1')" style = "position:relative; left:190px; "/>

	<INPUT type="button" value="DELETE ROW" onclick="deleteRow('dataTable1')" style = "position:relative; left:205px; "/>

	<TABLE id="dataTable1" width="350px" border="1" style = "position:relative; top:4px;">


		<TR>
			<TD><INPUT type="checkbox" name="chk"/></TD>
			<TD>
				<INPUT type="text" name="txt" onkeypress="this.style.minWidth = ((this.value.length ) * 7) + 'px';" /></TD>
		</TR>
	</TABLE> 
</div>

<div class='container'>
<label for='techsk' >TECHNICAL SKILLS *:</label><br/>


	<INPUT type="button" value="ADD ROW" onclick="addRow('dataTable2')" style = "position:relative; left:190px; "/>

	<INPUT type="button" value="DELETE ROW" onclick="deleteRow('dataTable2')" style = "position:relative; left:205px; "/>

	<TABLE id="dataTable2" width="350px" border="1" style = "position:relative; top:4px;">


		<TR>
			<TD><INPUT type="checkbox" name="chk"/></TD>
			<TD>
				<INPUT type="text" name="txt" onkeypress="this.style.minWidth = ((this.value.length ) * 7) + 'px';" /></TD>
		</TR>
	</TABLE> 
</div>

<div class='container'>
<label for='por' >POSITION(S) OF RESPONSIBILITY *:</label><br/>


	<INPUT type="button" value="ADD ROW" onclick="addRow('dataTable3')" style = "position:relative; left:190px; "/>

	<INPUT type="button" value="DELETE ROW" onclick="deleteRow('dataTable3')" style = "position:relative; left:205px; "/>

	<TABLE id="dataTable3" width="350px" border="1" style = "position:relative; top:4px;">


		<TR>
			<TD><INPUT type="checkbox" name="chk"/></TD>
			<TD>
				<INPUT type="text" name="txt" onkeypress="this.style.minWidth = ((this.value.length ) * 7) + 'px';" /></TD>
		</TR>
	</TABLE>
</div>

<div class='container'>
<label for='intrn' >INTERNSHIP(S) *:</label><br/>


	<INPUT type="button" value="ADD ROW" onclick="addRow('dataTable4')" style = "position:relative; left:190px; "/>

	<INPUT type="button" value="DELETE ROW" onclick="deleteRow('dataTable4')" style = "position:relative; left:205px; "/>

	<TABLE id="dataTable4" width="350px" border="1" style = "position:relative; top:4px;">


		<TR>
			<TD><INPUT type="checkbox" name="chk"/></TD>
			<TD>
				<INPUT type="text" name="txt" onkeypress="this.style.minWidth = ((this.value.length ) * 7) + 'px';" /></TD>
		</TR>
	</TABLE>
</div>

<div class='container'>
<label for='workex' >WORK EXPERIENCE *:</label><br/>


	<INPUT type="button" value="ADD ROW" onclick="addRow('dataTable5')" style = "position:relative; left:190px; "/>

	<INPUT type="button" value="DELETE ROW" onclick="deleteRow('dataTable5')" style = "position:relative; left:205px; "/>

	<TABLE id="dataTable5" width="350px" border="1" style = "position:relative; top:4px;">


		<TR>
			<TD><INPUT type="checkbox" name="chk"/></TD>
			<TD>
				<INPUT type="text" name="txt" onkeypress="this.style.minWidth = ((this.value.length ) * 7) + 'px';" /></TD>
		</TR>
	</TABLE>
</div>

<div class='container'>
<label for='proj' >PROJECTS *:</label><br/>


	<INPUT type="button" value="ADD ROW" onclick="addRow('dataTable6')" style = "position:relative; left:190px; "/>

	<INPUT type="button" value="DELETE ROW" onclick="deleteRow('dataTable6')" style = "position:relative; left:205px; "/>

	<TABLE id="dataTable6" width="350px" border="1" style = "position:relative; top:4px;">


		<TR>
			<TD><INPUT type="checkbox" name="chk"/></TD>
			<TD>
				<INPUT type="text" name="txt" onkeypress="this.style.minWidth = ((this.value.length ) * 7) + 'px';" /></TD>
		</TR>
	</TABLE>
</div>

<div class='container'>
<label for='eca' >EXTRA-CURRICULAR ACTIVITIES *:</label><br/>


	<INPUT type="button" value="ADD ROW" onclick="addRow('dataTable7')" style = "position:relative; left:190px; "/>

	<INPUT type="button" value="DELETE ROW" onclick="deleteRow('dataTable7')" style = "position:relative; left:205px; "/>

	<TABLE id="dataTable7" width="350px" border="1" style = "position:relative; top:4px;">


		<TR>
			<TD><INPUT type="checkbox" name="chk"/></TD>
			<TD>
				<INPUT type="text" name="txt" onkeypress="this.style.minWidth = ((this.value.length ) * 7) + 'px';" /></TD>
		</TR>
	</TABLE>
</div>



<br/>
<div class='container'> 
    <input type='submit' name='SAVE' value='SAVE' style = "width:120px; height:35px; position:relative; left:5px; " /> 
<!-- </div>  -->

<!-- <div class='container'>  -->
    <input type='submit' name='SUBMIT' value='SUBMIT' style = "width:120px; height:35px; position:relative; left:140px; "/> 
</div> 
 
</fieldset> 
</form> 

</body> 
</html>
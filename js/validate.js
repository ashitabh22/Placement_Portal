function checkForm()
{
   var usr_name = document.forms["studReg"]["usr_name"];
   var usr_roll = document.forms["studReg"]["usr_roll"];
   var usr_dob = document.forms["studReg"]["usr_dob"];
   var usr_degree = document.forms["studReg"]["usr_degree"];
   var usr_branch = document.forms["studReg"]["usr_branch"];
   var usr_semester = document.forms["studReg"]["usr_semester"];
   var usr_email = document.forms["studReg"]["usr_email"];
   var usr_phno = document.forms["studReg"]["usr_phno"];
   
   if (usr_name.value.trim() == "")                                  
   { 
      window.alert("Please enter your name."); 
      usr_name.focus(); 
      return false; 
   }
   if (usr_roll.value.trim() == "") {
      window.alert("Please enter your roll number");
      usr_roll.focus();
      return false;
   }
   if (usr_dob.value.trim() == "")                                  
   { 
      window.alert("Please enter date of birth"); 
      usr_dob.focus(); 
      return false; 
   }
   if (usr_degree.value.trim() == "")                                  
   { 
      window.alert("Please enter your degree."); 
      usr_degree.focus(); 
      return false; 
   }
   if (usr_branch.value.trim() == "")                                  
   { 
      window.alert("Please select your branch."); 
      usr_branch.focus(); 
      return false; 
   }
   if (usr_semester.value.trim() == "")                                  
   { 
      window.alert("Please select your semester."); 
      usr_semester.focus(); 
      return false; 
   }
   if (usr_email.value.trim() == "")                                  
   { 
      window.alert("Please enter email ID."); 
      usr_email.focus(); 
      return false; 
   }
   if (usr_phno.value.trim() == "")                                  
   { 
      window.alert("Please enter your phone number."); 
      usr_phno.focus(); 
      return false; 
   }
   else{
      return false;
   }
}
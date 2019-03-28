		<script type="text/javascript" src="<?php echo BASE_URL; ?>js/jquery.min.js"></script>
		<script type="text/javascript" src="<?php echo BASE_URL; ?>js/bootstrap.min.js"></script>
		<script type="text/javascript" src="<?php echo BASE_URL; ?>js/bootstrap-datepicker.min.js"></script>
		<script>
		  $(document).ready(function(){
		    var date_input=$('input[name="usr_dob"]'); //our date input has the name "date"
		    var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
		    date_input.datepicker({
		      format: 'yyyy-mm-dd',
		      container: container,
		      todayHighlight: true,
		      autoclose: true,
		    })
		  })
		</script>
		<script type="text/javascript">
                       function addRow2(DOC_ID, ARR_METHOD, ARR_METHOD1, TEXT_ID, COUNT){
				var countval = (COUNT + 1);
				var cntTr = $("#" + DOC_ID + "tr").length;
        		var tdStr = '<tr>';

        		tdStr += '<td><input  type="text" name="' + ARR_METHOD + '[]" id="' + TEXT_ID + countval + '" class="form-control"> </td><input type="hidden" name="' + ARR_METHOD1 + '[]" id="' + TEXT_ID + countval + '" value=""><td><input type="button" class="btn btn-danger" style="cursor: pointer;" value="Delete" onclick="removeRow1(this, \'' + DOC_ID + '\')" style="cursor:pointer;" /></td>';
        		tdStr += '</tr>';
		        $("#" + DOC_ID + "").each(
		                function ()
		           {
		            var $table = $(this);
			             if ($('tbody', this).length > 0)
			             {
			                $('tbody', this).append(tdStr);
			              } else
			            	{
				           $(this).append(tdStr);
				          }
		   			}
		    );

			}
    function addRow(DOC_ID, ARR_METHOD, ARR_METHOD1, ARR_METHOD2, TEXT_ID, COUNT){
				var countval = (COUNT + 1);
				var cntTr = $("#" + DOC_ID + "tr").length;
        		var tdStr = '<tr>';

        		tdStr += '<input  type="hidden" name="' + ARR_METHOD + '[]" id="' + TEXT_ID + countval + '" value=""><td><input type="text" name="' + ARR_METHOD1 + '[]" id="' + TEXT_ID + countval + '" class="form-control"> </td><td><input type="text" name="' + ARR_METHOD2 + '[]" id="' + TEXT_ID + countval + '" class="form-control"> </td><td><input type="button" class="btn btn-danger" style="cursor: pointer;" value="Delete" onclick="removeRow1(this, \'' + DOC_ID + '\')" style="cursor:pointer;" /></td>';
        		tdStr += '</tr>';
		        $("#" + DOC_ID + "").each(
		                function ()
		           {
		            var $table = $(this);
			             if ($('tbody', this).length > 0)
			             {
			                $('tbody', this).append(tdStr);
			              } else
			            	{
				           $(this).append(tdStr);
				          }
		   			}
		    );

			}
		 function removeRow1(Ref, rowid)
		 {
		    var cntTr = $("#" + rowid + " tr").length;
		    if (cntTr > 0)
		  {
		        $("#" + rowid + " tr td:last-child img").remove();
		       $(Ref).parent().parent().remove();
		       $("#" + rowid + "tr:last-child td:last-child").html('<td><input type="button" class="btn btn-danger" style="cursor: pointer;" value="Add row" onclick="addRow(\'' + rowid + '\', \'' + "speciality" + '\')" style="cursor:pointer;" /></td>');
		 } else
		   {
		       alert('Last row can\'t be deleted');
		     }
		  }


		  function addRow1(DOC_ID, ARR_METHOD, TEXT_ID, COUNT){
				var countval = (COUNT + 1);
				var cntTr = $("#" + DOC_ID + "tr").length;
        		var tdStr = '<tr>';

        		tdStr += '<td><input  type="text" name="' + ARR_METHOD + '[]" id="' + TEXT_ID + countval + '" class="form-control"> </td><td><input type="button" class="btn btn-danger" style="cursor: pointer;" value="Delete" onclick="removeRow2(this, \'' + DOC_ID + '\')" style="cursor:pointer;" /></td>';
        		tdStr += '</tr>';
		        $("#" + DOC_ID + "").each(
		                function ()
		           {
		            var $table = $(this);
			             if ($('tbody', this).length > 0)
			             {
			                $('tbody', this).append(tdStr);
			              } else
			            	{
				           $(this).append(tdStr);
				          }
		   			}
		    );

			}
		 function removeRow2(Ref, rowid)
		 {
		    var cntTr = $("#" + rowid + " tr").length;
		    if (cntTr > 0)
		  {
		        $("#" + rowid + " tr td:last-child img").remove();
		       $(Ref).parent().parent().remove();
		       $("#" + rowid + "tr:last-child td:last-child").html('<td><input type="button" class="btn btn-danger" style="cursor: pointer;" value="Add row" onclick="addRow1(\'' + rowid + '\', \'' + "speciality" + '\')" style="cursor:pointer;" /></td>');
		 } else
		   {
		       alert('Last row can\'t be deleted');
		     }
		  }
		</script>
   </body>
</html>
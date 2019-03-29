	  
// $(document).ready(function () {
// 	$("#search").on("keyup", function () {
// 		var value = $(this).val().toLowerCase();
// 		$("#myTable tr").filter(function () {
// 			$(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
// 		});
// 	});
// });
	function SearchSite() {
        document.forms['search_form'].action = 'index.php?pid=search&cx=002503337570983062401:y-x0lh4xq70&ie=UTF-8&q=' + document.getElementById('q').value + '&sa=Search';       
        document.forms['search_form'].submit();
    }

  	function customizeFont(size) {
  	    document.getElementById("content").style.fontSize = size;
  	}  


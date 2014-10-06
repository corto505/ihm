

<div id="footer">
  
	 <script type="text/javascript">
	 	$(document).ready(function(){
	 		
	 		setInterval(function(){
	 			/*location.reload(true);
	 			$(".test_date").addClass('text-info');
	 			*/

	 			$.ajax({
	 				url: "welcome/reload_page",
	 				cache : false,
	 				success: function(html){
	 					$(".refreshme").html(html);
	 				}
	 			})

	 			}

	 			,1200000); //1800000 = 3mn

	 		//code avec plugin Timer
	 		/*
	 		$('.refreshme').everyTime(10000,function(i){
	 			$.ajax({
	 				url: "refreshme.php",
	 				cache : false,
	 				success: function(html){
	 					$(".refreshme").html(html);
	 				}
	 			})
	 		});*/

	 	})
	 </script>
</div>
</body>

</html>

<?php
//get username
$user = $_GET['u'];
?>
<html>
<head>
    <title>Chatter</title>
    <link rel = 'stylesheet' type='text/css' href="css/deg.css"/>
    <script src="//code.jquery.com/jquery-1.11.0.min.js"></script>
    <script>
		function myFuct(){
			var na = "Admin";
			var data = "Hi " + "<?php echo ucwords ($user); ?>" + ", tôi có thể giúp gì cho bạn."
			var a = document.createElement("LI");
			a.className = 'ad';
			a.innerHTML = na + ": " + data;
			setTimeout(function(){
				document.getElementsByClassName("chatMessages")[0].appendChild(a);
			},1200);		
		};
		
		var first_click = true;
		
		$(document).on('submit','#chatForm',function(){
			var text = $.trim($("#text").val());
			var name = $.trim($("#name").val());
			var n = text.length;
			if(first_click){
				if(text != "" && name != ""){
					
					var a = document.createElement("LI");
					a.className = 'user_notlog';
					a.innerHTML = name+": "+text;
					document.getElementsByClassName("chatMessages")[0].appendChild(a);
					
					$( '#chatForm' ).each(function(){
						this.reset();
					});
					
					var na = "Admin";
					var data = "Hãy để lại email hoặc số ĐT để được tư vấn trực tiếp."
					var a = document.createElement("LI");
					a.className = 'ad';
					a.innerHTML = na + ": " + data;
					setTimeout(function(){
						document.getElementsByClassName("chatMessages")[0].appendChild(a);
					},1200);	
				}
				
				else{
					alert("Data missing!");
				}
				first_click = false;
			}
			else{
				if(n != 10)
					first_click = true;
				else{
					if(text != "" && name != ""){
						$.post('postMessage.php',{text: text, name: name}, function(data){
							$(".chatMessages").append(data);
							$( '#chatForm' ).each(function(){
								this.reset();
							});
						});
						
						var na = "Admin";
						var data = "Cảm ơn <?php echo ucwords ($user); ?>, bộ phận hỗ trợ sẽ gọi anh nhé."
						
						var a = document.createElement("LI");
						a.className = 'ad';
						a.innerHTML = na + ": " + data;
						setTimeout(function(){
							document.getElementsByClassName("chatMessages")[0].appendChild(a);
						},1200);
						
						
					}
					else{
						alert("Data missing!");
					}
				}
			}
		});
	</script>
</head>
<body onload="myFuct()">
<div class="button_a">
	<input type="button" id="btn1" value="message"/>
	<script language="javascript">
		document.getElementById("btn1").onclick = function () {
            if(document.getElementById("cs").style.display == 'none')
				document.getElementById("cs").style.display = 'block';
            else
                document.getElementById("cs").style.display = 'none'
        };

	</script>
</div>
<div class="chatContainer" style="width: 320px; height: 420px; right: 20px; display: block; bottom: 50px; position: fixed;" id="cs">
	<div class="chatHeader">
		<h3>Support </h3>
	</div>
	<div class="chatMessages">	
	</div>
	<div class="chatBottom">
		<form action="#" onSubmit="return false" id="chatForm" method="post">
			<input type="hidden" id="name" value="<?php echo ucwords ($user);?>"/>
			<input type="text" name="text" id="text" value="" placeholder="type your chat message"/>
			<input type="submit" name="submit" value="Send"/>
		</form>
	</div>
</div>
</body>
</html>

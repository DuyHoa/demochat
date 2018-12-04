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
		var url_img = 'https://static.thenounproject.com/png/214280-200.png'; //Image chat icon
		var url_link = '#';	//link
		var time_delay = 0; //delay time show mess welcome
		var content_welcome = 'Hello there'	//fake AI
		
	</script>
	
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

			
			var chat_wel = document.getElementsByClassName("mess_content");
			var wc = document.createElement("LI");
			wc.className = 'content_wel';
			wc.innerHTML = content_welcome;
			
			setTimeout(function(){
				chat_wel[0].appendChild(wc);
			},time_delay);
			
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
<body onload = "myFuct()">
<div class="chattag" id="cs">
    <div class="chatContainer">
        <div class="chatHeader">
            <h3>Support</h3>
        </div>
        <div class="chatMessages"></div>
        <div class="chatBottom">
            <form action="#" onSubmit="return false" id="chatForm" method="POST">
                <input type="hidden" name="name" id="name" value="<?php echo $user;?>"/>
                <input type="text" name="text" id="text" value="" placeholder="type your chat message"/>
                <input type="submit" name="submit" value=""/>
            </form>
        </div>
    </div>
</div>

<div class="notifi">
	<div class= "bell-button" onclick="notifyMe()">
		<svg viewbox="0 0 100 100"  width="100%">
			<circle class="background" cx="49.9" cy="49.9" r="49.9" fill="#e54b4d"/>
			<path class="foreground" d="M50.1 66.2H27.7s-2-.2-2-2.1c0-1.9 1.7-2 1.7-2s6.7-3.2 6.7-5.5S33 52.7 33 43.3s6-16.6 13.2-16.6c0 0 1-2.4 3.9-2.4 2.8 0 3.8 2.4 3.8 2.4 7.2 0 13.2 7.2 13.2 16.6s-1 11-1 13.3c0 2.3 6.7 5.5 6.7 5.5s1.7.1 1.7 2c0 1.8-2.1 2.1-2.1 2.1H50.1zm-7.2 2.3h14.5s-1 6.3-7.2 6.3-7.3-6.3-7.3-6.3z" stroke="white" fill="white"/>
			<ellipse class="stroke" cx="49.9" cy="49.9" rx="37.4" ry="36.9" fill="none" stroke="#fff" stroke-width="3"/>
		</svg>
		<script type="application/javascript">
			// request permission on page load
			
			function notifyMe() {
				if (Notification.permission !== "granted"){
					Notification.requestPermission();
				}
			}			
		</script>
	</div>
	<div class="bell_mess">
		<div class="message_body">Press to receive Notification</div>
	</div>
	<div class="bell_mess2">
		<div class="message_block">You've blocked Notification</div>
	</div>
</div>
<div class="mess" id="mb">
	<div class = "mess_content"></div>
	<div class= "mess_button" >
		<svg viewbox="0 0 100 100"  width="100%" id="svg_tag">
			<a class = "ske_a" >
				<image class = "ske_img"/>
			</a>
			<circle class="background" cx="49.9" cy="49.9" r="49.9" fill="none" stroke-width = "1"/>
			<span class ="notification-num">1</span>
		</svg>
	</div>
	<script>
		document.getElementById("mb").onclick = function () {
			if(document.getElementById("cs").style.display == 'none')
				document.getElementById("cs").style.display = 'block';
			else
				document.getElementById("cs").style.display = 'none'
		};
	</script>
</div>
</body>
</html>
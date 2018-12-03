var url_img = 'https://static.thenounproject.com/png/214280-200.png';
var url_chat = '';
var message_box = 'Welcome to mypage';
var show_ads = '';
var pos = '';
var bottom_pos = '';
var right_pos = '';
var left_pos = '';
var top_pos = '';
var width = 'auto';
var height = 'auto';

window.addEventListener("load", function(){
	//insert image_pop bottom;
	/*
	var img = document.getElementsByClassName("mess_button");
	img.style.display = 'block';
	img.style.background-image = url_img;
	img.style.position = pos;
	img.style.top = top_pos;
	img.style.bottom = bottom_pos;
	img.style.right = right_pos;
	img.style.left = left_pos;
	*/
	
	var = image_icon = document.createElement("image");
	image_icon.href = url_img;
	image_icon.style.width = width;
	image_icon.style.height = height;
	
	//add linked message
	var a = document.createElement("a")
	a.href = url_chat;
	a.style.background-image=url_img;
	
	document.getElementById("svg_tag").appendChild(a);
	
	
	//add text_pop reload()
	var text_welcome = document.createElement("a");
	text_welcome.className = "message_welcome";
	text_welcome.innerHTML =  message_box;
	text_welcome.style.display = 'block';
	text_welcome.
	
	document.getElementById("mb")[0].appendChild(text_welcome);
		
});
		


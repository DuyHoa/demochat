function loadSketonPlugin(){
	var a = document.createElement("script");
	a.src = "content/AddElement.js";
	a.language = "JavaScript";
	a.type = "text/javascript";
	a.charset = "utf-8";
	var head = document.getElementsByTagName("head")[0];
	head.appendChild(a);
}

if(!document.head){
	window.addEventListener("load", loadSketonPlugin);
}
else{
	loadSketonPlugin();
}
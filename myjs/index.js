var checklogin = <%=login%>;
if(checklogin==1){
	alert("Logged in successfully");
	checklogin=0;
}
var button=document.querySelector("#browse");
var sidebar=document.querySelector(".sidebar");
var gallery=document.querySelector(".gallery");
var body=document.querySelector("body");
sidebar.classList.remove("rmvsidebar");
button.addEventListener("click",function(){
	sidebar.classList.toggle("rmvsidebar");
	gallery.classList.toggle("laa");

	/*if(i==0){
		sidebar.style.width=0;
		i=1;	
	}
	else{
		sidebar.style.width=200px;
		i=0;
	}*/
});
/*window.onscroll = function(){alert("hello!!");};
window.addEventListener("scroll", myScript(){
	alert("hello!");
});
html.onscroll = function() {myFunction()};

function myFunction() {
    if (document.body.scrollTop > 10 || document.documentElement.scrollTop > 10) {
        alert("jshd");
    }
}*/


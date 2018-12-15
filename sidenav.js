
document.getElementById("main").addEventListener("click", toggleNav);

function toggleNav(width) {
	navSize = document.getElementById("sidenav").style.width;
	if (navSize == '22%' || navSize == '70%' || navSize == '55%') {
		return close();
	} else if (window.matchMedia("(min-width: 768px)").matches) {
		return open("22%");
	}
	else if (window.matchMedia("(min-width: 600px)").matches) {
		return open("55%");
	} else {
		return open("70%");
	}

}

function open(size) {
	document.getElementById("sidenav").style.width = size;
	document.getElementById("main").style.marginLeft = size;
	document.getElementById("sidenav").classList.remove("slide-out-left");
	document.getElementById("sidenav").classList.add("slide-in-left");
}

function close() {
	document.getElementById("sidenav").style.width = "0%";
	document.getElementById("main").style.marginLeft = "0%";
	document.getElementById("sidenav").classList.add("slide-out-left");
	document.getElementById("sidenav").classList.remove("slide-in-left");
}
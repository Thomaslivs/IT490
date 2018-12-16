function hide() {
    var x = document.getElementById("comment");
    if (x.style.display === "none") {
        x.style.display = "block";
    } else {
        x.style.display = "none";
    }
}

function hidetopic() {
    var x = document.getElementById("topic");
    if (x.style.display === "none") {
        x.style.display = "block";
    } else {
        x.style.display = "none";
    }
}

function comment_topic() {
    //debugger;
    var xhr = new XMLHttpRequest();
    var url = "RMQComment1.php";
    var topic = document.getElementById("topic01").value;
    var data = "topic=" + topic;
    xhr.open("POST", url, true);
    xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    xhr.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            response = this.responseText;
            endresult = JSON.parse(response);
            var selectoptions = "";
            for (var i = 0; i < endresult.length; i++) {
                var br = document.createElement('br'); //create link
                document.getElementById("output1").appendChild(br);
                document.getElementById("output1").innerHTML += endresult[i]; //add to body
                postid = endresult[i].split(" ");
                selectoptions += "<option value = " + postid[2] + ">" + postid.join(' ') + "</option>";
            }
            document.getElementById("listofids").innerHTML += selectoptions;
        }
    };
    xhr.send(data);

}

function comment_post() {
    //debugger;
    var xhr = new XMLHttpRequest();
    var url = "RMQComment2.php";
    var ID = document.getElementById("ids").value;
    var comment = encodeURIComponent(document.getElementById("comment2").value);
    var data = "ID=" + ID + "&comment=" + comment;
    xhr.open("POST", url, true);
    xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    xhr.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            response = this.responseText;
            endresult = JSON.parse(response);
            document.getElementById("output2").innerHTML = "Comment Made: " + decodeURIComponent(comment);
        }
    };
    xhr.send(data);

}

function hidethreads() {
    var x = document.getElementById("threads");
    if (x.style.display === "none") {
        x.style.display = "block";
    } else {
        x.style.display = "none";
    }
}

function key_threads() {
    //debugger;
    document.getElementById("output").innerHTML = "Loading.....";
    var xhr = new XMLHttpRequest();
    var url = "RMQKey_threads.php";
    var keyword = document.getElementById("keyword").value;
    var limit = document.getElementById("limit").value;
    var data = "keyword=" + keyword + "&limit=" + limit;
    xhr.open("POST", url, true);
    xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    xhr.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            response = this.responseText;
            endresult = JSON.parse(response);
	    var img = document.createElement("img");
       	   img.src = endresult[(endresult.length) -1];
           img.width = 800;
           img.height = 600;
           img.alt = "Graph of Key Threads";
           document.getElementById("output2").appendChild(img);
            var bmlink = '<a href= "';
            var emlink = '">';
            var a = document.createElement('a');
            if (document.getElementById("output").innerHTML == "Loading.....") {
                document.getElementById("output").innerHTML = "";
                document.getElementById("output").innerHTML += "New Search";
                document.getElementById("output").innerHTML += "\n";
                for (var i = 0; i < endresult.length; i++) {
                    var link = document.createElement('a'); //create link
                    var br = document.createElement('br'); //create link
                    link.setAttribute('href', endresult[i]); //set href
                    link.innerHTML = 'Link#' + (i + 1); //set text to be seen
                    document.getElementById("output").appendChild(br);
                    document.getElementById("output").appendChild(link); //add to body
                    document.getElementById("output").innerHTML += ": ";
                    document.getElementById("output").innerHTML += endresult[i]; //add to body
                    document.getElementById("output").appendChild(br);
                }
            } else {
                document.getElementById("output").innerHTML == "Loading.....";
            }

        }
    };
    xhr.send(data);
}

function hideplayers() {
    var x = document.getElementById("players");
    if (x.style.display === "none") {
        x.style.display = "block";
    } else {
        x.style.display = "none";
    }
}

function key_users() {
    //debugger;
    var xhr = new XMLHttpRequest();
    var url = "RMQKey_players.php";
    var keyword = document.getElementById("keyword").value;
    var limit = document.getElementById("limit").value;
    var data = "keyword=" + keyword + "&limit=" + limit;
    xhr.open("POST", url, true);
    xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    xhr.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            response = this.responseText;
            endresult = JSON.parse(response);
		 var img = document.createElement("img");
       	   img.src = endresult[(endresult.length) -1];
           img.width = 800;
           img.height = 600;
           img.alt = "Graph of Key Players";
           document.getElementById("output2").appendChild(img);
            if (document.getElementById("output").innerHTML == "Loading....") {
                document.getElementById("output").innerHTML = "";
                for (var i = 0; i < (endresult.length)-1; i++) {
                    var br = document.createElement('br'); //create link
                    document.getElementById("output").appendChild(br);
                    document.getElementById("output").innerHTML += endresult[i]; //add to body
                }
            } else {
                document.getElementById("output").innerHTML = "Loading....";
            }
        }
    };
    document.getElementById("output").innerHTML = "Loading....";
    xhr.send(data);

}

function send_info() {
    //debugger;
    var xhr = new XMLHttpRequest();
    var url = "RMQUserInfoClient.php";
    var user = document.getElementById("username").value;
    var data = "user=" + user;
    var response;
    var endresult;
    var txt = "";
    //alert(data);
    xhr.datatype = "json";
    xhr.open("POST", url, true);
    xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    xhr.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            response = this.responseText;
            endresult = JSON.parse(response);
            document.getElementById("output1").innerHTML = "UserName: " + endresult[0];
            document.getElementById("output2").innerHTML = "User ID: " + endresult[1];
            document.getElementById("output3").innerHTML = "Reddit creation date: " + endresult[2];
            document.getElementById("output4").innerHTML = "Verify Email: " + endresult[3];
        }
    };
    xhr.send(data);
    xhr.timeout = 20000;
    document.getElementById("output").innerHTML = "processing.....";
}

function start_campaign() {
    //debugger;
    var xhr = new XMLHttpRequest();
    var url = "RMQCampaign.php";
    var user = user1;
    var subredditname = document.getElementById("subredditname").value;
    var title = document.getElementById("title").value;
    var post = document.getElementById("post").value;
    var delay = document.getElementById("delay").value;
    var data = "subredditname=" + subredditname + "&title=" + title + "&post=" + post + "&delay=" + delay + "&user=" + user;
    xhr.open("POST", url, true);
    xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    xhr.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            response = this.responseText;
            endresult = JSON.parse(response);
        }
    };
    xhr.send(data);
    document.getElementById("output").innerHTML = "Campaign started" + " on " + subredditname + " called " + title +
        " with post " + post + ".";

}

function send_email(){
	//debugger;
	var xhr = new XMLHttpRequest();
	var url = "RMQEmailNotif.php";
	var email = document.getElementById("email").value;
	var yn = document.getElementById("yn").value;
	var user = user1;
	var data = "user="+user+"&email="+email+"&yn="+yn;
	//document.getElementById("output3").innerHTML = "Email added: " + email + " to " + user + " as " + yn;
	xhr.open("POST",url, true);
	xhr.setRequestHeader('Content-type','application/x-www-form-urlencoded');
		xhr.onreadystatechange = function () {
		if(this.readyState == 4 && this.status == 200){
			response = this.responseText;
			endresult = JSON.parse(response);
			document.getElementById("output3").innerHTML = "Email added: " + email + " to " + user + " as " + yn;
		}
};
	xhr.send(data);
	
}

/*cookie*/
function setCookie(cname, cvalue, sec) {
  var d = new Date();
  d.setTime(d.getTime() + (sec*1000));
  var expires = "expires="+ d.toUTCString();
  document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
}

function getCookie(cname) {
  var name = cname + "=";
  var decodedCookie = decodeURIComponent(document.cookie);
  var ca = decodedCookie.split(';');
  for(var i = 0; i <ca.length; i++) {
    var c = ca[i];
    while (c.charAt(0) == ' ') {
      c = c.substring(1);
    }
    if (c.indexOf(name) == 0) {
      return c.substring(name.length, c.length);
    }
  }
  return "";
}



/*----------------------------------------------*/

var input = document.getElementById("login");
if(input){
  input.addEventListener("keyup", function(event) {
    if (event.keyCode === 13) {
      event.preventDefault();
      document.getElementById("btnLogin").click();
    }
  });
}


function checkLogin(){
    var app_key = document.getElementById("app_key").value;
    var email = document.getElementById("tbEmail").value;
    var password = document.getElementById("tbPassword").value;

    if(email!="" && password!=""){
      var params = "app_key="+app_key+"&tbEmail="+email+"&tbPassword="+password;
      var xhr = new XMLHttpRequest();
      xhr.open("POST","login_service.php",true);
      xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
      xhr.onreadystatechange = function(){
        if(xhr.readyState == 4 && xhr.status == 200) {
          if(xhr.responseText==1){
              console.log("aaa");
            document.getElementById("login-error").style.display = "none";
            window.location.href = "http://localhost/e-vacation/";
          }else{
            document.getElementById("login-error").style.display = "block";
          }
        }
      };
  
      xhr.send(params);
    }else{
        document.getElementById('login-error').style.display = "block";
    }
  }

function logout(){
  setCookie("login",0,86400);
  setCookie("id",-1,-1000);
  setCookie("userType","",-1000);

  window.location.href = "http://localhost/e-vacation/";
}
  

function confirmDate(numDaysOff){
    var fromDate = document.getElementById("fromDate").value;
    var toDate = document.getElementById("toDate").value;

    if(fromDate!="" && toDate!="" && numDaysOff){
      document.getElementById('employee-msg').style.display = "none";
    }else{
      document.getElementById('employee-msg').style.display = "block";
    }
}
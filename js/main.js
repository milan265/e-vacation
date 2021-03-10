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

/*LOGIN */

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
  setCookie("select",0,-1000);
  window.location.href = "http://localhost/e-vacation/";
}
  
/*----------------------------------------------*/

/*EMPLOYEE */
function confirmDate(userId,numDaysOffOld,numDaysOff){
    var fromDate = document.getElementById("fromDate").value;
    var toDate = document.getElementById("toDate").value;
    var comment = document.getElementById("taComment").value;

    if(fromDate!="" && toDate!="" && (numDaysOffOld + numDaysOff)){
      var params = "userId="+userId+"&fromDate="+fromDate+"&toDate="+toDate+"&comment="+comment;
      var xhr = new XMLHttpRequest();
      xhr.open("POST","employee_service.php",true);
      xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
      xhr.onreadystatechange = function(){
        if(xhr.readyState == 4 && xhr.status == 200) {
          console.log(xhr.responseText);
          if(xhr.responseText==1){
            document.getElementById('employee-msg').style.display = "none";
            window.location.href = "http://localhost/e-vacation/";
          }else{
            document.getElementById('employee-msg').style.display = "block";
          }
        }
      };
  
      xhr.send(params);
    }else{
      document.getElementById('employee-msg').style.display = "block";
    }
}



/*----------------------------------------------*/

/*ADMIN */
function confirmChoice(){
  var selected = document.getElementById("admin-select").value;
  setCookie('select',selected,86400);
  window.location.href = "http://localhost/e-vacation/";
}

function accept($id){
  var params = "id="+$id+"&request=accept";
  
  var xhr = new XMLHttpRequest();
  xhr.open("POST","admin_service.php",true);
  xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
  xhr.onreadystatechange = function(){
    if(xhr.readyState == 4 && xhr.status == 200) {
      console.log(xhr.responseText);
      //window.location.href = "http://localhost/e-vacation/";
      /*
        doesn't work because database is not used
      */ 
    }
  }; 

  xhr.send(params);
}

function reject($id){
  var params = "id="+$id+"&request=reject";
  
  var xhr = new XMLHttpRequest();
  xhr.open("POST","admin_service.php",true);
  xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
  xhr.onreadystatechange = function(){
    if(xhr.readyState == 4 && xhr.status == 200) {
      console.log(xhr.responseText);
      //window.location.href = "http://localhost/e-vacation/";
      /*
        doesn't work because database is not used
      */ 
    }
  };

  xhr.send(params);
}
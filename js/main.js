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
  
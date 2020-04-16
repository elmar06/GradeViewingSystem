<!DOCTYPE html>
<html>
<head>
	<title>Log in</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="assets/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="assets/fontawesome/css/all.css">
</head>
<body>
<div class="row">
    <div class="col-md-2" style="background-color: black; height: 100%; position: fixed;"></div> 
    <!-- LOGIN FORM START-->
       <div class="col-lg-11" style="background-color: white;height: 100%;position:fixed; margin-left: 17%;">
          <div class="float-left" style="margin-top:2%">
            <form style="border: none;">
              <!-- IMAGE OF CCC -->
              <img src="images/CCC.png"><br><br>
                <!--USERNAME-->
                  <div class="row">
                    <div class="col-md-7">
                      <div class="form-group">
                        <!-- USERNAME -->
                        <label >User Name/ I.D</label>
                        <input type="text" id="username" class="form-control" placeholder="Username" required>
                          <!-- PASSWORD -->
                          <label>Password</label>
                          <input type="password" id="password" class="form-control" placeholder="Password" required>
                          <input type="text" name="action" id="action" class="form-control" value="2" hidden>
                       </div>
                       <p id="errorMessage" style="color:red"></p>
                      </div>
                    </div>
                    <!--BUTTON SUBMIT-->  
                    <div class="row">
                      <div class="col-md-2">
                        <button id="login" class="btn btn-success">Login</button>                        
                      </div>
                      <div class="col-md-5">
                        <a href="faculty-login.php" style="float: right"><i class="fa fa-briefcase"></i> LogIn as Faculty</a>
                      </div>
                    </div>
            </form>
          </div>
        </div> 
  </div>
<script type="text/javascript" src="assets/bootstrap/jquery/jquery.min.js"></script>
<script type="text/javascript" src="assets/bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="assets/bootstrap/popper/popper.min.js"></script>

<script>
//login function
$('#login').on('click', function(e){
  e.preventDefault();

  var username = $('#username').val();
  var password = $('#password').val();
  var action = $('#action').val();
  var myData = 'username=' + username + '&password=' + password + '&action=' + action;

  $.ajax({
    type: 'POST',
    url: 'control/login.php',
    data: myData,
    success:function(response)
    {
      if(response > 0)
      {
        window.location = 'control/check_access.php';
      }else{
        $('#errorMessage').html('Username or Password is Incorrect. Please try again.');
        setTimeout(function(){
            $('#errorMessage').fadeOut();
        }, 1500)
      }            
    }
  })
})
</script>
</body>
</html>
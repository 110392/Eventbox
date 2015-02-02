<?php
include "connectdb.php";
$con=connectdb();
$query=mysqli_query($con,"SELECT `User_Email` FROM `user`");
$v=0;
while($data=mysqli_fetch_array($query))                           // stores all the currently registered emails
{
    $values[$v]=$data['User_Email'];
    $v++;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
	<!--[if lt IE 9]>
  	<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
  	<![endif]-->
	<title>Eventbox</title>
    <meta charset="utf-8"> 
    <link rel="stylesheet" type="txt/css" href="../../bootstrap/css/bootstrap.min.css">   
    <link rel="stylesheet" type="txt/css" href="../../css/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <script src="../js/function.js"></script>
</head>
<script>
var email='<?php echo json_encode($values); ?>';
function checkmail(mail)                                        //  checks whether the email is already in use 
{
    json=JSON.parse(email);
    for(var i=0;i<json.length;i++)
    {
        if(mail==json[i])
        {
            alert("This E-mail is already Registered!!");
            return false;
        }
    }
}
function confirmpassword()                                     //  assurance of the password inputed 
{   
    var mail = document.forms["register"]["email"].value;
    var password = document.forms["register"]["password"].value;
    var password2 = document.forms["register"]["password_confirmation"].value;
    if(checkmail(mail)==false)
    {
        return false;
    }
    if(password != password2)
    {
        alert("Password Does not match!");
        return false;
    }
}
</script>
<body>
    
    
    <nav class="navbar navbar-inverse navbar-fixed-top" style="height:100px;" role="navigation">
     <div class="navbar-inner">
            <div class="nav-center navbar-fixed-bottom">
                <a href="search.php"><img src="../../images/eventbox-logo.png"  width="210px;"/></a>
            </div>
        </div>
    </nav>
    

    <section id="login">
        <div class="container">
            <div class="form-wrap">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <h1>Sign Up</h1>
			                    <hr>
                                    <form name="register" role="form" action="registration.php" method="post" onsubmit="return confirmpassword()">
                                        <div class="row">
                                            <div class="col-xs-12 col-sm-6 col-md-6">
                                                <div class="form-group">
                                                    <input type="text" name="first_name" id="first_name" class="form-control" placeholder="First Name" tabindex="1" required>
                                                </div>
                                            </div>
                                            <div class="col-xs-12 col-sm-6 col-md-6">
                                                <div class="form-group">
                                                    <input type="text" name="last_name" id="last_name" class="form-control" placeholder="Last Name" tabindex="2" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-xs-12 col-sm-8 col-md-8">
                                                <div class="form-group">
                                                    <input type="text" name="country" id="address" class="form-control" placeholder="Country" tabindex="3" required>
                                                </div>
                                            </div>
                                            <div class="col-xs-12 col-sm-4 col-md-4">
                                                <div class="form-group">
                                                    <input type="text" name="Address" id="address" class="form-control" placeholder="City" tabindex="3" required>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="form-group">
                                            <input type="email" name="email" id="email" class="form-control" placeholder="Email Address" tabindex="4" required>
                                        </div>
                                        <div class="row">
                                            <div class="col-xs-12 col-sm-6 col-md-6">
                                                <div class="form-group">
                                                    <input type="password" name="password" id="password" class="form-control" placeholder="Password" tabindex="5" required>
                                                </div>
                                            </div>
                                            <div class="col-xs-12 col-sm-6 col-md-6">
                                                <div class="form-group">
                                                    <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" placeholder="Confirm Password" tabindex="6" required>
                                                </div>
                                            </div>
                                        </div>

                                        <hr>
                                        <div class="row" >
                                            <div class="col-xs-12 col-md-6 col-md-6">
                                                <input type="submit" value="Register" style="margin-bottom:10px" class="btn btn-primary btn-block" tabindex="7">
                                            </div>
                                            <div class="col-xs-12 col-md-6 col-md-6">
                                                <a href="login_form.php" class="btn btn-custom btn-block">Sign In</a>
                                            </div>
                                        </div>
                                    </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- /.container -->
</section>
        <!-- test later 
    <footer id="footer" class="navbar-fixed-bottom">
        <hr>
        <div class="container">
            <div class="row">
                <div class="col-xs-8">
                    <p>Copyright © Ateneo de Zamboanga University. All Right Reserve.</p>
                </div>
                <div class="col-xs-4">
                    <p> Home . Privacy . About Us . Company. License . Contact Us</p>
                </div>
            </div>
        </div>
    </footer>
      -->  
        
</body>
</html>

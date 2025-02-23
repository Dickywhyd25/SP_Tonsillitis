<!-- <!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title>Dempster Shafer|Tonsillitis</title>
<link href="../Image/icon.png" rel='shortcut icon'>
<link rel="stylesheet" type="text/css" href="../style.css">
<script type="text/javascript" src="../jquery.js"></script>
<script type="text/javascript">
$(document).ready(function(){
	$("#username").focus();
	})
	function validasi(form){
		if(form.username.value==""){
			alert("Masukkan Username..!");
			form.username.focus();
			return false;
			}else if(form.password.value==""){
				alert("Masukkan Password Anda..!");
				form.password.focus();
				return false;
				}
			form.submit();
		}
</script>

</head>

<body>
 
<table width="600" border="0" align="center">
    <tr>
      <td height="90" style="background-image:url(../images/header.jpg);"><h1 class="art-logo-name"><a href="./index.html">Sistem Pakar Penyakit Tonsillitis</a></h1>
                  <h2 class="art-logo-text">Menggunakan Forward Chaining dan Metode Dempster Shafer</h2></td>
    </tr>
    <tr>
    <td width="310" height="220">
	<form name="form1" method="post" onSubmit="return validasi(this)" action="cekpswd.php" >
<table width="251" border="0" align="center" cellpadding="3" cellspacing="0">
  <tr>
    <td colspan="3"><div align="center"><strong>Login Admin</strong></div></td>
    </tr>
  <tr>
    <td width="86">Username</td>
    <td width="5">:</td>
    <td width="146">
      <input name="username" type="text" id="username">
    </td>
  </tr>
  <tr>
    <td>Password</td>
    <td>:</td>
    <td>
      <input name="password" type="password" id="password">
    </td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td><input type="submit" name="Submit" value="Login">&nbsp;&nbsp;&nbsp;&nbsp;
      <a href="../index.php"> Kembali</a></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td align="right"><a href="../index.php"></a></td>
	</tr>
</table>
    </form>
	</td>
  </tr>
    <tr>
      <td><p style="background-image:url(../images/nav.png); height:50px; text-align:center; padding:5px;"> All Rights Reserved. </p></td>
    </tr>
</table>
</body>
</html> -->


<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Admin - Login</title>

    <!--====== Favicon Icon ======-->
	  <link rel="shortcut icon" href="assets/dashboard/assets/images/favicon.svg" type="image/svg" />
	  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    <!-- Custom fonts for this template-->
    <link href="../assets/admin/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../assets/admin/css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h4 class=" text-gray-900 mb-4">Sistem Pakar Penyakit Tonsillitis</h4>
                                        <h5 class=" text-gray-900 mb-4">Login Admin</h5>
                                    </div>
                                    <form class="user" method="post" onSubmit="return validasi(this)" action="cekpswd.php">
                                        <div class="form-group">
                                            <input type="username" class="form-control form-control-user"
                                                aria-describedby="emailHelp"  name="username" type="text" id="username"
                                                placeholder="Username">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user" name="password" type="password" id="password"
                                                placeholder="Password">
                                        </div>
                                        
                                        <input class="btn btn-primary " type="submit" name="Submit" value="Login">
                                       
                                    </form>
                                    <hr>
                                    <div class="text-center">
                                        <a class="small" href="../index.php">Kembali ke Dashboard</a>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>


    <script type="text/javascript" src="../jquery.js"></script>
    <script type="text/javascript">
    $(document).ready(function(){
      $("#username").focus();
      })
      function validasi(form){
        if(form.username.value==""){
          alert("Masukkan Username..!");
          form.username.focus();
          return false;
          }else if(form.password.value==""){
            alert("Masukkan Password Anda..!");
            form.password.focus();
            return false;
            }
          form.submit();
        }
    </script>


    <!-- Bootstrap core JavaScript-->
    <script src="../assets/admin/vendor/jquery/jquery.min.js"></script>
    <script src="../assets/admin/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="../assets/admin/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="../assets/admin/js/sb-admin-2.min.js"></script>

</body>

</html>
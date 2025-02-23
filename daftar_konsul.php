<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Daftar Konsul</title>

    <!--====== Favicon Icon ======-->
	  <link rel="shortcut icon" href="assets/dashboard/assets/images/favicon.svg" type="image/svg" />
	  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <!-- Custom fonts for this template-->
    <link href="assets/admin/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="assets/admin/css/sb-admin-2.min.css" rel="stylesheet">

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
                            <div class="col-lg-12">
                                <div class="p-5">
                                    <div class="text-center">
                                    <h2 class="art-postheader">Registrasi Pengguna</h2> <br>
                                    </div>
                                    <form onSubmit="return validasi(this)" method="post" name="form1" target="_self" action="pasienaddsim.php">
                                    <table class="tab" width="415" style="border:0px;"  border="0" align="center">
                                        <tr> 
                                        <td colspan="2"><div align="center"></div></td>
                                        </tr>
                                        <tr> 
                                        <td>Nama</td>
                                        <td> 
                                        <input name="TxtNama" id="TxtNama" type="text" size="35" maxlength="30"></td>
                                        </tr>
                                        <tr> 
                                        <td>Kelamin</td>
                                        <td> 
                                        <select name="cbojk" id="cbojk">
                                        <option value="0" selected="selected">- Jenis Kelamin -</option>
                                        <option value="Laki-laki">Laki-laki</option>
                                        <option value="Wanita">Wanita</option>
                                        </select>
                                        </td>
                                        </tr>
                                        <tr> 
                                        <td>Umur</td>
                                        <td> 
                                        <input name="TxtUmur" id="TxtUmur" type="text" size="2" maxlength="3"></td>
                                        </tr>
                                        <tr> 
                                        <td width="76">Alamat</td>
                                        <td width="312"> 
                                        <input name="TxtAlamat" id="TxtAlamat" type="text" size="35" maxlength="60"></td>
                                        </tr>
                                        <tr>
                                        <td>Email</td>
                                        <td><input type="text" name="textemail" id="textemail" size="25" maxlength="25"></td>
                                        </tr>
                                        <tr> 
                                        <td>&nbsp;</td>
                                        <td>&nbsp;</td>
                                        </tr>
                                        <tr>
                                        <td>&nbsp;</td>
                                        <td><input type="submit" name="Submit" value="Daftar">
                                            <input type="reset" name="Submit2" value="Reset" /></td>
                                        </tr>
                                    </table>
                                    </form>
                                    <hr>
                                    <div class="text-center">
                                        <a class="small" href="index.php">Kembali ke Dashboard</a>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>


    <script type="text/javascript" src="jquery.js"></script>
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
    <script src="assets/admin/vendor/jquery/jquery.min.js"></script>
    <script src="assets/admin/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="assets/admin/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="assets/admin/js/sb-admin-2.min.js"></script>

</body>

</html>
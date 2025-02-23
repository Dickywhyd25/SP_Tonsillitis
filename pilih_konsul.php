<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Konsultasi</title>

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

	<link rel="stylesheet" href="style.css" type="text/css" media="screen" />
    <!--[if IE 6]><link rel="stylesheet" href="style.ie6.css" type="text/css" media="screen" /><![endif]-->
    <!--[if IE 7]><link rel="stylesheet" href="style.ie7.css" type="text/css" media="screen" /><![endif]-->

    <script type="text/javascript" src="jquery.js"></script>
    <script type="text/javascript" src="script.js"></script>
    <script type="text/javascript">
    function direct_link(){
		//window.location.href="index.php?top=home.php";
		return false;
		}
    </script>

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
                                    


								<?php include "koneksi2.php"; ?>
								<table width="750" border="1" align="center">
								<tr>
									<td width="786"><h3>PROSES DIAGNOSA PENYAKIT TONSILITIS</h3><strong>Pilihlah Gejala Yang Anda Alami..!</strong></td>
								</tr>
								<tr>
									<td>
								<form method="post" >
								<?php
								//-- menampilkan daftar gejala
								$arrKDGejala=array();
								$arrKDGejalaSelect=array();
								$sql="SELECT * FROM tb_gejala ORDER BY id ASC ";
								$result=$db->query($sql);
								while($row=$result->fetch_object()){
									echo "<input type='checkbox' name='evidence[]' value='{$row->id}'> {$row->kdgejala} | {$row->gejala}<br>";
									$arrKDGejala[]=$row->gejala; //$arrKDGejalaSelect[]=$row->id;
								}
								?><br>
								<center><input type="submit" value="Proses Diagnosa Penyakit"></center>
								</form>
								<p style="font-weight:bold; text-align:center; background:#06F;"><strong>Menentukan Nilai Belief (m) Awal</strong></p>
								<?php
								if(isset($_POST['evidence'])){
									if(count($_POST['evidence'])<2){
										echo "Pilih minimal 2 gejala";
									}else{
										//-----Forward Chaining-------
										echo "<div class='form'><p>Gejala Yang dipilih :</p>"; 
										$arrKDGejalaSelect=$_POST['evidence'];
										foreach($arrKDGejalaSelect as $kdGSelect){ 
											$panggil = "SELECT * FROM tb_gejala WHERE id='$kdGSelect'";
											$queryG=mysqli_query($db,$panggil); 
											while($dataG= mysqli_fetch_array($queryG) ){
												echo $dataG['gejala']."<br>";
												}							
											}
										echo "</div>";
										$sql = "SELECT GROUP_CONCAT(b.kdpenyakit), a.cf, a.id_evidence
											FROM tb_rules a
											JOIN tb_penyakit b ON a.id_problem=b.id
											WHERE a.id_evidence IN(".implode(',',$_POST['evidence']).") 
											GROUP BY a.id_evidence ORDER BY a.id_evidence ASC ";
										$result=$db->query($sql);
										$evidence=array();
										$gejalaSelect=array();
										while($row=$result->fetch_row()){
											//print_r($row[2]);
											$evidence[]=$row;
											//$gejalaSelect[]=$row[0];
										} $no=0;
										//----Selesai Forward Chaining-----
										echo "<br>";
										echo "<div class='form'><p>Belief (m) Awal<p>";
										echo "<table border='1' width='100%'>";
										echo "<tr><td colspan='5'><center>Tabel 1 Belief (m) Awal</center</td></tr>";
										echo "<tr>";
										echo "<td><strong>No</strong></td>";
										echo "<td><strong>Gejala</strong></td>";
										echo "<td><strong>Penyakit</strong></td>";
										echo "<td><strong>Belief</strong></td>";
										echo "<td><strong>Plausability</strong></td>";
										echo "</tr>";
										foreach($evidence as $kdgejala){
											echo "<tr>"; $no=$no+1;
											echo "<td>$no</td>";
											echo "<td>"; 
											$panggil2 = "SELECT * FROM tb_gejala WHERE id='$kdgejala[2]'";
											$queryG=mysqli_query($db, $panggil2); 
											while( $dataG=mysqli_fetch_array($queryG)){
												echo $dataG['gejala']."<br>";
												echo"</td>";
												echo "<td>"; print_r($kdgejala[0]); echo "</td>";
												echo "<td>"; print_r($kdgejala[1]); echo"</td>";
												echo "<td>"; print_r(1-$kdgejala[1]); echo"</td>"; echo "</tr>";
											}
										
											
											}unset($kdgejala);
										echo "</table>";
										echo "</div>";
										?>
										<p style="font-weight:bold; text-align:center; background:#06F;"><strong>Hasil perhitungan Dempster's Rule of Combination</strong></p>
										<?php
										//---- Mulai Dempster Shafer----
										//--- menentukan environement
										$sql="SELECT GROUP_CONCAT(kdpenyakit) FROM tb_penyakit ";
										$result=$db->query($sql);
										$row=$result->fetch_row();
										$fod=$row[0];
										//--- menentukan nilai densitas
										$densitas_baru=array(); echo "<br>";
										//menghitung nilai densitas (m) baru
										while(!empty($evidence)){
											// mengambil elemen pertama pada gejala 
											$densitas1[0]=array_shift($evidence); 
										// mengambil semua penyakit semesta dan mengambil nilai tidak percaya dengan rumus Pls = 1 - Bel
											$densitas1[1]=array($fod,1-$densitas1[0][1]); 
											// array untuk menyimpan mass function
											$densitas2=array();
											if(empty($densitas_baru)){
												// jika himpunan baru kosong maka ambil dari gejala ke 2
												$densitas2[0]=array_shift($evidence);
											}else{
												// array untuk himpunan baru dari gejala-gejala yang tersedia
												foreach($densitas_baru as $k=>$r){
													if($k!="&theta;"){
														//jika $k tidak sama dengan theta maka nilai $k dan $r akan dimasukkan ke dalam array $densitas2
														$densitas2[]=array($k,$r); 
													}
												}
											}
											//----Dempster Rule Of Combination---
											$theta=1;
											// pada setiap himpunan densitas2, kurangi nilai theta dengan nilai pada densitas2[1]/nilai belief densitas2
											foreach($densitas2 as $d) $theta-=$d[1]; 
											// tambahkan himpunan baru yang diperoleh dari informasi tentang hipotesis tentang hipotesis penyakit yang sedang dipertimbangkan ($fod)
											// ke dalam array $densitas2, dengan nilai massa hipotesis sebesar $theta
											$densitas2[]=array($fod,$theta); 
											//hitung jumlah hipotesis penyakit yang sudah ada dalam array $densitas2 dan simpan ke dalam variabel $m
											$m=count($densitas2);
											// array $densitas_baru, yang akan diisi dengan himpunan baru
											// dari hipotesis-hipotesis penyakit setelah dilakukan penambahan informasi dari himpunan hipotesis yang baru 
											$densitas_baru=array();
											for($y=0;$y<$m;$y++){
												for($x=0;$x<2;$x++){
													if(!($y==$m-1 && $x==1)){
														// $v dan $w menyimpan nilai probabilitas dari setiap himpunan pada objek kejadian pertama dan kedua
														$v=explode(',',$densitas1[$x][0]);
														$w=explode(',',$densitas2[$y][0]);
														//nilai probabilitas pada array $v dan $w akan diurutkan dari nilai yang terkecil hingga terbesar
														sort($v); 
														sort($w);
														// mencari himpunan yang sama antara himpunan pada objek kejadian pertama dan kedua 
														$vw=array_intersect($v,$w);  //mencari nilai irisan	
														if(empty($vw)){
															$k="&theta;";  
														}else{
															// menyimpan penyakit dengan string agar menjadi P01, P02 (sesuai dengan himpunan yang sama) dan disimpan pada $k
															$k=implode(',',$vw); 
														}
														if(!isset($densitas_baru[$k])){
															// jika hipotesis belum ada di dalam array $densitas_baru
															// maka nilai kepastian hipotesis tersebut dikalikan
															// nilai probabilitas himpunan pada objek kejadian pertama dan kedua
															$densitas_baru[$k]=$densitas1[$x][1]*$densitas2[$y][1];
															$k=implode(',',$vw); //echo $k. "<br>"; 
														}else{
															$densitas_baru[$k]+=$densitas1[$x][1]*$densitas2[$y][1];
														}
													}
												} 
											}
											//-----Fungsi Normalisasi-----	
											foreach($densitas_baru as $k=>$d){
												echo "- [",$d."]  [".$k."] <br>";
												if($k!="&theta;"){
													// melakukan normalisasi perhitungan
													// jika tidak terdapat himpunan kosong maka nilai densitas/1-0
													// namun, jika terdapat himpunan kosong pada theta maka nilai densitas/1-nilai theta
													$densitas_baru[$k]=$d/(1-(isset($densitas_baru["&theta;"])?$densitas_baru["&theta;"]:0));
										// --- Selesai Dempster Shafer---
												}
											}
											
											
										} //## end --menghitung nilai densitas (m) baru
								
										//--- perangkingan
										unset($densitas_baru["&theta;"]);
										arsort($densitas_baru);
										//echo "<p>Densitas Baru : ";
									?>
									<p style="font-weight:bold; text-align:center; background:#06F;"><strong>Hasil Perangkingan</strong></p>	
								<?php	
								$arrPenyakit=array(); 
								$queryPasien=mysqli_query($db,"SELECT * FROM tbpasien ORDER BY idpasien DESC"); 
								$dataPasien=mysqli_fetch_array($queryPasien);
								$queryP=mysqli_query($db,"SELECT * FROM tb_penyakit"); 
								while($dataP=mysqli_fetch_array($queryP)){ 
									$arrPenyakit["$dataP[kdpenyakit]"]=$dataP['nama_penyakit']; 
										}	
										echo "<p style='font-weight:bold; border:none;'>Dari hasil perhitungan yang terakhir tersebut kemudian diurutkan nilainya dari yang terbesar ke yang terkecil sebagai berikut :</p>";
										//print_r($densitas_baru);echo "<hr>"; //$dataSama=array();
										$dataSama=array_intersect_key($arrPenyakit,$densitas_baru);
										//print_r($dataSama); echo "<hr>";
										foreach($dataSama as $k=>$a){ 
											foreach($densitas_baru as $kdpenyakit=>$ranking){
											//echo "m<sub>$m</sub>("; print_r($kdpenyakit); echo ") = "; print_r($ranking); echo "<br>";
											//echo "m<sub>$m</sub>( $kdpenyakit | "; print_r($arrPenyakit["$kdpenyakit"]); echo ") = "; 
											//echo " dengan nilai kepercayaan sebesar ".round($densitas_baru[$kdpenyakit]*100,2)."%<br>";
											if($k==$kdpenyakit){ 
											//mengambil solusi penyakit
											$strS=mysqli_query($db,"SELECT * FROM tb_penyakit WHERE kdpenyakit='$k' ");
											$dataS=mysqli_fetch_array($strS); 
												echo "<strong>m<sub>$m</sub>( $kdpenyakit | "; print_r($arrPenyakit["$kdpenyakit"]); echo ") = "; 
												echo " dengan nilai kepercayaan sebesar ".round($densitas_baru[$kdpenyakit]*100,2)."%<br></strong>";
												echo "Solusi Penanganan : <p style='max-height:70px;overflow:auto; border:1px solid #99ccff; color:#999999;'>".$dataS['solusi']."</p><hr>";
												$persen=round($densitas_baru[$kdpenyakit]*100,2);
												//menyimpan data pasien
												$idPasien=$dataPasien['idpasien'];
												$querySimpanP=mysqli_query($db," INSERT INTO tb_hasil (idpasien,kdpenyakit,persentase,tanggal) VALUES ('$idPasien','$k','$persen', NOW() ) ");
											}
											}
										}
										//print_r($arrPenyakit);

										//echo "</p>";
										//--- menampilkan hasil akhir
										//$codes=array_keys($densitas_baru);
										//echo "<p>implode codes</p>";
										//print_r(implode("','",$codes)."'");
										//echo "<hr>";
										//$sql="SELECT GROUP_CONCAT(nama_penyakit) FROM tb_penyakit WHERE kdpenyakit IN('".implode("','",$codes)."')"; 
										//$result=$db->query($sql);
										//$row=$result->fetch_row();
										//echo "Terdeteksi penyakit <b>{$row[0]}</b> dengan derajat kepercayaan ".round($densitas_baru[$codes[0]]*100,2)."%";
									}
								}
								?></td>
								</tr>
								<tr  >
									<td>&nbsp;</td>
								</tr>
								</table>





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



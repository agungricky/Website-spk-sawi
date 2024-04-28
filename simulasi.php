<?php
require_once 'autoload.php';

$obj = new Bayes();

$jumTrue = $obj->sumTrue();
$jumFalse = $obj->sumFalse();
$jumData = $obj->sumData();

$a1 = $_POST['ukuranA'];
$a2 = $_POST['warnaA'];
$a3 = $_POST['teksturA'];
$a4 = $_POST['ukuranB'];
$a5 = $_POST['warnaB'];
$a6 = $_POST['teksturB'];
$a7 = $_POST['ukuranD'];
$a8 = $_POST['warnaD'];

//TRUE
$ua = $obj->probUkuranAkar($a1,1);
$wa = $obj->probWarnaAkar($a2,1);
$ta = $obj->probTeksturAkar($a3,1);
$ub = $obj->probUkuranBatang($a4,1);
$wb = $obj->probWarnaBatang($a5,1);
$tb = $obj->probTeksturBatang($a6,1);
$ud = $obj->probUkuranDaun($a7,1);
$wd = $obj->probWarnaDaun($a8,1);

//FALSE
$ua2 = $obj->probUkuranAkar($a1,0);
$wa2 = $obj->probWarnaAkar($a2,0);
$ta2 = $obj->probTeksturAkar($a3,0);
$ub2 = $obj->probUkuranBatang($a4,0);
$wb2 = $obj->probWarnaBatang($a5,0);
$tb2 = $obj->probTeksturBatang($a6,0);
$ud2 = $obj->probUkuranDaun($a7,0);
$wd2 = $obj->probWarnaDaun($a8,0);

//result
$paT = $obj->hasilTrue($jumTrue,$jumData,$ua,$wa,$ta,$ub,$wb,$tb,$ud,$wd);
$paF = $obj->hasilFalse($jumTrue,$jumData,$ua2,$wa2,$ta2,$ub2,$wb2,$tb2,$ud2,$wd2);

echo "
<div class='jumbotron jumbotron-fluid' id='hslPrekdiksinya'>
  <div class='container'>
    <h1 class='display-4 tebal'>Hasil Prediksi</h1>
    <p class='lead'>Berikut ini adalah hasil prediksi berdasarkan karakteristik sawi menggunakan metode naive bayes.</p>
  </div>
</div>
";

echo "
<div class='card' style='width: 25rem;'>
  <div class='card-header' style='background-color:#466338;color:#fff'>
    <b>Informasi Sawi</b>
  </div>
  <ul class='list-group list-group-flush'>
    <li class='list-group-item'>ukuran akar : &nbsp;&nbsp;<b>$a1</b></li>
    <li class='list-group-item'>warna akar : &nbsp;&nbsp;<b>$a2</b></li>
    <li class='list-group-item'>tekstur akar : &nbsp;&nbsp;<b>$a3</b></li>
    <li class='list-group-item'>ukuran batang : &nbsp;&nbsp;<b>$a4</b></li>
    <li class='list-group-item'>warna batang : &nbsp;&nbsp;<b>$a5</b></li>
	<li class='list-group-item'>tekstur batang : &nbsp;&nbsp;<b>$a6</b></li>
	<li class='list-group-item'>ukuran daun : &nbsp;&nbsp;<b>$a7</b></li>
	<li class='list-group-item'>warna daun : &nbsp;&nbsp;<b>$a8</b></li>
  </ul>
</div><br>
<hr>
";

echo "<br>
<table class='table table-bordered' style='font-size:18px;text-align:center'>
  <tr style='background-color:#466338;color:#fff'>
    <th>Jumlah True</th>
    <th>Jumlah False</th>
    <th>Jumlah Total Data</th>
  </tr>
  <tr>
    <td>$jumTrue</td>
    <td>$jumFalse</td>
    <td>$jumData</td>
  </tr>
</table>
";

echo "<br>
<table class='table table-bordered' style='font-size:18px;text-align:center'>
  <tr style='background-color:#466338;color:#fff'>
    <th></th>
    <th>True</th>
    <th>False</th>
  </tr>
  <tr>
    <td>pA</td>
    <td>$jumTrue / $jumData</td>
    <td>$jumFalse / $jumData</td>
  </tr>
  <tr>
    <td>Ukuran Akar</td>
    <td>$ua / $jumTrue</td>
    <td>$ua2 / $jumFalse</td>
  </tr>
  <tr>
    <td>Warna Akar</td>
    <td>$wa / $jumTrue</td>
    <td>$wa2 / $jumFalse</td>
  </tr>
  <tr>
    <td>Tekstur Akar</td>
    <td>$ta / $jumTrue</td>
    <td>$ta2 / $jumFalse</td>
  </tr>
  <tr>
    <td>Ukuran Batang</td>
    <td>$ub / $jumTrue</td>
    <td>$ub2 / $jumFalse</td>
  </tr>
  <tr>
    <td>Warna Batang</td>
    <td>$wb / $jumTrue</td>
    <td>$wb2 / $jumFalse</td>
  </tr>
  <tr>
    <td>Tekstur Batang</td>
    <td>$tb / $jumTrue</td>
    <td>$tb2 / $jumFalse</td>
  </tr>
  <tr>
    <td>Ukuran Daun</td>
    <td>$ud / $jumTrue</td>
    <td>$ud2 / $jumFalse</td>
  </tr>
  <tr>
    <td>Warna Daun</td>
    <td>$wd / $jumTrue</td>
    <td>$wd2 / $jumFalse</td>
  </tr>
  
</table>
";

echo "<br>
  <table class='table table-bordered' style='font-size:18px;text-align:center;'>
    <tr style='background-color:#466338;color:#fff'>
      <th>Persentase Sehat</th>
      <th>Persentase Tidak Sehat</th>
    </tr>
    <tr>
      <td>$paT</td>
      <td>$paF</td>
    </tr>
  </table>
";

$result = $obj->perbandingan($paT,$paF);

if($paT > $paF){
  echo "<br>
  <h3 class='tebal'>PERSENTASE <span class='badge badge-success' style='padding:10px'><b>SEHAT</b></span> LEBIH BESAR DARI PADA PERSENTASE SEHAT</h3><br>";
  echo "<h4><br>Persentase sehat sebanyak : <b>".round($result[1],2)." %</b> <br>Presentasi tidak sehat sebanyak : <b>".round($result[2],2)." % </b></h4>";
}else if($paF > $paT){
  echo "<br>
  <h3 class='tebal'>PERSENTASE <span class='badge badge-danger' style='padding:10px'><b>TIDAK SEHAT</b></span> LEBIH BESAR DARI PADA PERSENTASE TIDAK SEHAT</h3><br>";
  echo "<h4><br>Persentase tidak sehat sebanyak : <b>".round($result[1],2)." %</b> <br>Persentase sehat sebanyak : <b>".round($result[2],2)." % </b></h4>";
}


if($result[0] == "SEHAT"){
  echo "
  <div class='alert alert-success mt-5' role='aler'>
    <h4 class='alert-heading'>Kesimpulan : $result[0] </h4>
    <p>Berdasarkan hasil prediksi , tanaman sawi dinyatakan <b>sehat</b></p>";
  echo "</div>";
  
}else{
  echo"
  <div class='alert alert-danger mt-5' role='aler'>
  <h4 class='alert-heading'>Kesimpulan : $result[0] </h4>
  <p>Berdasarkan hasil prediksi , tanaman sawi dinyatakan <b>tidak sehat</p>
  </div>";
  include 'koneksi.php';
		$data = mysqli_query($koneksi,"SELECT * FROM tb_penyakit WHERE bagian = 'ukuran_akar' AND masalah = '$a1'");
		while($d = mysqli_fetch_array($data)){
			echo "<b>Permasalahan pada ukuran akar sawi : </b><br>";
			echo $d['penyakit'];
			echo "<br>";
		}
		$data = mysqli_query($koneksi,"SELECT * FROM tb_penyakit WHERE bagian = 'warna_akar' AND masalah = '$a2'");
		while($d = mysqli_fetch_array($data)){
			echo "<b>Permasalahan pada warna akar sawi  : </b><br>";
			echo $d['penyakit'];
			echo "<br>";
		}
		$data = mysqli_query($koneksi,"SELECT * FROM tb_penyakit WHERE bagian = 'tekstur_akar' AND masalah = '$a3'");
		while($d = mysqli_fetch_array($data)){
			echo "<b>Permasalahan pada tekstur akar sawi  : </b><br>";
			echo $d['penyakit'];
			echo "<br>";
		}
		$data = mysqli_query($koneksi,"SELECT * FROM tb_penyakit WHERE bagian = 'ukuran_batang' AND masalah = '$a4'");
		while($d = mysqli_fetch_array($data)){
			echo "<b>Permasalahan pada ukuran batang sawi : </b><br>";
			echo $d['penyakit'];
			echo "<br>";
		}
		$data = mysqli_query($koneksi,"SELECT * FROM tb_penyakit WHERE bagian = 'warna_batang' AND masalah = '$a5'");
		while($d = mysqli_fetch_array($data)){
			echo "<b>Permasalahan pada warna batang sawi : </b><br>";
			echo $d['penyakit'];
			echo "<br>";
		}
		$data = mysqli_query($koneksi,"SELECT * FROM tb_penyakit WHERE bagian = 'tekstur_batang' AND masalah = '$a6'");
		while($d = mysqli_fetch_array($data)){
			echo "<b>Permasalahan pada tekstur batang sawi : </b><br>";
			echo $d['penyakit'];
			echo "<br>";
		}
		$data = mysqli_query($koneksi,"SELECT * FROM tb_penyakit WHERE bagian = 'ukuran_daun' AND masalah = '$a7'");
		while($d = mysqli_fetch_array($data)){
			echo "<b>Permasalahan pada ukuran daun sawi : </b><br>";
			echo $d['penyakit'];
			echo "<br>";
		}
		$data = mysqli_query($koneksi,"SELECT * FROM tb_penyakit WHERE bagian = 'warna_daun' AND masalah = '$a8'");
		while($d = mysqli_fetch_array($data)){
			echo "<b>Permasalahan pada warna daun sawi : </b><br>";
			echo $d['penyakit'];
			echo "<br>";
		}
};

 ?>
 

<?php
require_once 'autoload.php';

$obj = new Bayes();

$jumTrue = $obj->sumTrue();
$jumFalse = $obj->sumFalse();
$jumData = $obj->sumData();

$a1 = "proposional";
$a2 = "hitam";
$a3 = "kaku";
$a4 = "proposional";
$a5 = "kekuningan";
$a6 = "kaku";
$a7 = "proposional";
$a8 = "kekuningan";

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
======================================<br>
Ukuran akar : $a1<br>
Warna akar : $a2<br>
Tekstur akar : $a3<br>
Ukuran batang : $a4<br>
Warna Batang : $a5<br>
Tekstur Batang : $a6<br>
Ukuran Daun : $a7<br>
Warna Daun : $a8<br>
=======================================<br><br>
";

echo "
======================================<br>
kemungkinan true : <br>
jumlah true : $jumTrue <br>
jumlah data : $jumData <br>
=======================================<br><br>
";

echo "
======================================<br>
kemungkinan false : <br>
jumlah false : $jumFalse <br>
jumlah data : $jumData <br>
=======================================<br><br>
";

echo "
======================================<br>
pATrue : $jumTrue / $jumData<br>
Ukuran akar (true) : $ua / $jumTrue <br>
Warna akar (true) : $wa / $jumTrue <br>
Tekstur akar (true) : $ta / $jumTrue <br>
Warna batang (true) : $wb / $jumTrue <br>
Ukuran batang (true) : $ub / $jumTrue <br><br>
Tekstur batang (true) : $tb / $jumTrue <br><br>
Ukuran daun (true) : $ud / $jumTrue <br><br>
Warna daun (true) : $wd / $jumTrue <br><br>
=======================================<br><br>
";

echo "
======================================<br>
pAFalse : $jumFalse / $jumData<br>
Ukuran akar (false) : $ua2 / $jumTrue <br>
Warna akar (false) : $wa2 / $jumTrue <br>
Tekstur akar (false) : $ta2 / $jumTrue <br>
Warna batang (false) : $wb2 / $jumTrue <br>
Ukuran batang (false) : $ub2 / $jumTrue <br><br>
Tekstur batang (false) : $tb2 / $jumTrue <br><br>
Ukuran daun (false) : $ud2 / $jumTrue <br><br>
Warna daun (false) : $wd2 / $jumTrue <br><br>
=======================================<br><br>
";

echo "
======================================<br>
presentasi yes (t) : $paT<br>
presentasi no (f) : $paF<br>
=======================================<br><br>
";

if($paT > $paF){
  echo "
  ======================================<br>
  PERSENTASE YES LEBIH BESAR DARI PADA PERSENTASE NO<br>
  =======================================
  <br><br>";
}else if($paF > $paT){
  echo "
  ======================================<br>
  PERSENTASE NO LEBIH BESAR DARI PADA PERSENTASE YES<br>
  =======================================
  <br><br>";
}

// echo $obj->hasilTrue($jumTrue,$jumData,$umur,$tinggi,$bb,$kesehatan,$pendidikan)."<br>";
// echo $obj->hasilFalse($jumTrue,$jumData,$umur2,$tinggi2,$bb2,$kesehatan2,$pendidikan2)."<br><br>";

$result = $obj->perbandingan($paT,$paF);
//echo " Kesimpulan : $result[0] <br>Persentase SEHAT sebanyak : ".round($result[1],2)." % <br>Persentase TIDAK SEHAT sebanyak : ".round($result[2],2)." % ";
echo " Status : $result[0] <br>Presentasi diterima sebanyak : ".round($result[1],2)." % <br>Presentasi diolak sebanyak : ".round($result[2],2)." % ";
 ?>

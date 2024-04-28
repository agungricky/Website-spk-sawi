<?php
class Bayes
{
   private $sawi = "data.json";
   private $jumTrue = 0;
   private $jumFalse = 0;
   private $jumData = 0;

  function __construct()
  {

  }

  /*Menjumlahakan true dan false*/
  function sumTrue()
  {
    $data = file_get_contents($this->sawi);
    $hasil = json_decode($data,true);

    $t = 0;
    foreach($hasil as $hasil)
    {
      if($hasil['kesimpulan'] == 1){
        $t += 1;
      }
    }

    return $t;
  }

  function sumFalse()
  {
    $data = file_get_contents($this->sawi);
    $hasil = json_decode($data,true);

    $t = 0;
    foreach($hasil as $hasil)
    {
      if($hasil['kesimpulan'] == 0){
        $t += 1;
      }
    }
    return $t;
  }

  function sumData()
  {
    $data = file_get_contents($this->sawi);
    $hasil = json_decode($data,true);
    return count($hasil);
  }

  /*Fungsi probabilitas*/
  function probUkuranAkar($ua,$kesimpulan)
  {
    $data = file_get_contents($this->sawi);
    $hasil = json_decode($data,true);

    $t = 0;
    foreach ($hasil as $hasil) {
      if($hasil['ukuran_akar'] == $ua && $hasil['kesimpulan'] == $kesimpulan){
        $t += 1;
      }else if($hasil['ukuran_akar'] == $ua && $hasil['kesimpulan'] == $kesimpulan){
        $t +=1;
      }
    }
    return $t;
  }

  function probWarnaAkar($wa,$kesimpulan)
  {
    $data = file_get_contents($this->sawi);
    $hasil = json_decode($data,true);

    $t = 0;
    foreach ($hasil as $hasil) {
      if($hasil['warna_akar'] == $wa && $hasil['kesimpulan'] == $kesimpulan){
        $t += 1;
      }else if($hasil['warna_akar'] == $wa && $hasil['kesimpulan'] == $kesimpulan){
        $t +=1;
      }
    }
    return $t;
  }

  function probTeksturAkar($ta,$kesimpulan)
  {
    $data = file_get_contents($this->sawi);
    $hasil = json_decode($data,true);

    $t = 0;
    foreach ($hasil as $hasil) {
      if($hasil['tekstur_akar'] == $ta && $hasil['kesimpulan'] == $kesimpulan){
        $t += 1;
      }else if($hasil['tekstur_akar'] == $ta && $hasil['kesimpulan'] == $kesimpulan){
        $t +=1;
      }
    }
    return $t;
  }

  function probUkuranBatang($ub,$kesimpulan)
  {
    $data = file_get_contents($this->sawi);
    $hasil = json_decode($data,true);

    $t = 0;
    foreach ($hasil as $hasil) {
      if($hasil['ukuran_batang'] == $ub && $hasil['kesimpulan'] == $kesimpulan){
        $t += 1;
      }else if($hasil['ukuran_batang'] == $ub && $hasil['kesimpulan'] == $kesimpulan){
        $t +=1;
      }
    }
    return $t;
  }

  function probWarnaBatang($wb,$kesimpulan)
  {
    $data = file_get_contents($this->sawi);
    $hasil = json_decode($data,true);

    $t = 0;
    foreach ($hasil as $hasil) {
      if($hasil['warna_batang'] == $wb && $hasil['kesimpulan'] == $kesimpulan){
        $t += 1;
      }else if($hasil['warna_batang'] == $wb && $hasil['kesimpulan'] == $kesimpulan){
        $t +=1;
      }
    }
    return $t;
  }
  
  function probTeksturBatang($tb,$kesimpulan)
  {
    $data = file_get_contents($this->sawi);
    $hasil = json_decode($data,true);

    $t = 0;
    foreach ($hasil as $hasil) {
      if($hasil['tekstur_batang'] == $tb && $hasil['kesimpulan'] == $kesimpulan){
        $t += 1;
      }else if($hasil['tekstur_batang'] == $tb && $hasil['kesimpulan'] == $kesimpulan){
        $t +=1;
      }
    }
    return $t;
  }
  
  function probUkuranDaun($ud,$kesimpulan)
  {
    $data = file_get_contents($this->sawi);
    $hasil = json_decode($data,true);

    $t = 0;
    foreach ($hasil as $hasil) {
      if($hasil['ukuran_daun'] == $ud && $hasil['kesimpulan'] == $kesimpulan){
        $t += 1;
      }else if($hasil['ukuran_daun'] == $ud && $hasil['kesimpulan'] == $kesimpulan){
        $t +=1;
      }
    }
    return $t;
  }
  
  function probWarnaDaun($wd,$kesimpulan)
  {
    $data = file_get_contents($this->sawi);
    $hasil = json_decode($data,true);

    $t = 0;
    foreach ($hasil as $hasil) {
      if($hasil['warna_daun'] == $wd && $hasil['kesimpulan'] == $kesimpulan){
        $t += 1;
      }else if($hasil['warna_daun'] == $wd && $hasil['kesimpulan'] == $kesimpulan){
        $t +=1;
      }
    }
    return $t;
  }
  
  //=================================================================

  /*=================================================================
  MARI BERHITUNG
  keterangan parameter :
  $sT   : jumlah data yang bernilai true ( sumTrue )
  $sF   : jumlah data yang bernilai false ( sumFalse )
  $sD   : jumlah data pada data train ( sumData )
  $pUA   : jumlah probabilitas ukuran akar ( probUkuranAkar )
  $pWA   : jumlah probabilitas warna akar ( probWarnaAkar )
  $pTA : jumlah probabilitas tekstur akar ( probTeksturAkar )
  $pUB   : jumlah probabilitas ukuran batang ( probUkuranBatang )
  $pWB   : jumlah probabilitas warna batang (probWarnaBatang )
  $pTB   : jumlah probabilitas tekstur batang (probTeksturBatang )
  $pUD   : jumlah probabilitas ukuran daun  (probUkuranDaun )
  $pWD   : jumlah probabilitas warna daun (probWarnaDaun )
  ==================================================================*/

  function hasilTrue($sT = 0 , $sD = 0 , $pUA = 0 ,$pWA = 0, $pTA = 0,$pUB = 0, $pWB = 0, $pTB = 0, $pUD = 0, $pWD = 0)
  {
    $paTrue = $sT / $sD;
    $p1 = $pUA / $sT;
    $p2 = $pWA / $sT;
    $p3 = $pTA / $sT;
    $p4 = $pUB / $sT;
    $p5 = $pWB / $sT;
	$p6 = $pTB / $sT;
	$p7 = $pUD / $sT;
	$p8 = $pWD / $sT;
    $hsl = $paTrue * $p1 * $p2 * $p3 * $p4 * $p5 * $p6 * $p7 * $p8;
    return $hsl;
	echo "pUA : $pUA";
  }

  function hasilFalse($sF = 0 , $sD = 0 , $pUA = 0 ,$pWA = 0, $pTA = 0,$pUB = 0, $pWB = 0, $pTB = 0, $pUD = 0, $pWD = 0)
  {
    $paFalse = $sF / $sD;
    $p1 = $pUA / $sF;
    $p2 = $pWA / $sF;
    $p3 = $pTA / $sF;
    $p4 = $pUB / $sF;
    $p5 = $pWB / $sF;
	$p6 = $pTB / $sF;
	$p7 = $pUD / $sF;
	$p8 = $pWD / $sF;
    $hsl = $paFalse * $p1 * $p2 * $p3 * $p4 * $p5 * $p6 * $p7 * $p8;
    return $hsl;
  }

 function perbandingan($pATrue,$pAFalse)
  {
    if($pATrue > $pAFalse){
      $kesimpulan = "SEHAT";
      $hitung = ($pATrue / ($pATrue + $pAFalse)) * 100;
      $kondisi = 100 - $hitung;
    }elseif($pAFalse > $pATrue)
    {
      $kesimpulan = "TIDAK SEHAT";
      $hitung = ($pAFalse / ($pAFalse + $pATrue)) * 100;
      $kondisi= 100 - $hitung;
    }

    $hsl = array($kesimpulan,$hitung,$kondisi);
    return $hsl;
  }
  //=================================================================
}

?>

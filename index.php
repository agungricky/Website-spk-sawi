<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="icon" type="image/x-icon" href="img/sawi.png" />

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="css/bootstrap.min.css" />

  <!-- font awsome -->
  <link rel="stylesheet" href="css/fontawesome.css" />
  <link rel="stylesheet" href="css/brands.css" />
  <link rel="stylesheet" href="css/solid.css" />

  <link rel="stylesheet" href="css/gaya.css">

  <!-- google font -->
  <link href="https://fonts.googleapis.com/css?family=Lato:400,700&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,700&display=swap" rel="stylesheet">

  <title>Naïve Bayes</title>
</head>
<body>

  <nav class="navbar navbar-expand-lg fixed-top navbar-light static-top" style="background-color : #c4e2ba">
    <div class="container">
      <a class="navbar-brand" href="index.php">
            <img src="img/sawi.png" alt="" width=50 height=50>
          </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item active">
            <a class="nav-link" href="index.php">Analisis Penyakit
                  <span class="sr-only">(current)</span>
                </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="data_simulasi.php">Data Latih</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

    <div class="container" style='margin-top:90px'>
      <div class="row" style='margin-left:250px'>
		<img src="img/sawii.jpg" alt="" align="center">
      </div>

    <div class="row">
      <div class="col-12 mt-4">
        <h3 class="tebal" style="color : #274e13; ">Analisis Penyakit pada Sawi</h3>
      </div>

      <div class="col-6">
          <form method="POST" class="mt-3">

          <div class="form-group">
            <label for="ua">Ukuran Akar :</label>
            <select name="ua" id="ua" class="form-control selBox" required="required">
                <option value="" disabled selected>-- pilih ukuran akar--</option>
                <option value="terlalu_kecil">Terlalu Kecil</option>
                <option value="proposional">Proposional</option>
                <option value="membengkak">Membengkak</option>
            </select>
          </div>

          <div class="form-group">
            <label for="wa">Warna Akar :</label>
            <select name="wa" id="wa" class="form-control selBox" required="required">
                <option value="" disabled selected>-- pilih warna akar--</option>
                <option value="krem">Krem</option>
                <option value="hitam">Hitam</option>
            </select>
          </div>

          <div class="form-group">
            <label for="ta">Tekstur Akar :</label>
            <select name="ta" id="ta" class="form-control selBox" required="required">
                      <option value="" disabled selected>-- pilih ukuran akar--</option>
                      <option value="kaku">Kaku</option>
                      <option value="lembek">Lembek</option>
                  </select>
          </div>

          <div class="form-group">
            <label for="ub">Ukuran Batang :</label>
            <select name="ub" id="ub" class="form-control selBox" required="required">
                      <option value="" disabled selected>-- pilih ukuran batang--</option>
                      <option value="proposional">Proposional</option>
                      <option value="terlalu_kecil">Terlalu Kecil</option>
                  </select>
          </div>

          <div class="form-group">
            <label for="wb">Warna Batang :</label>
            <select name="wb" id="wb" class="form-control selBox" required="required">
                      <option value="" disabled selected>-- pilih warna batang--</option>
                      <option value="hijau_muda">Hijau Muda</option>
                      <option value="kekuningan">Kekuningan</option>
                  </select>
          </div>
		  
		  <div class="form-group">
            <label for="tb">Tekstur Batang :</label>
            <select name="tb" id="tb" class="form-control selBox" required="required">
                      <option value="" disabled selected>-- pilih tekstur batang--</option>
                      <option value="kaku">Kaku</option>
                      <option value="lembek">Lembek</option>
                  </select>
          </div>
		  
		  <div class="form-group">
            <label for="ud">Ukuran Daun :</label>
            <select name="ud" id="ud" class="form-control selBox" required="required">
                      <option value="" disabled selected>-- pilih ukuran daun--</option>
                      <option value="proposional">Proposional</option>
                      <option value="terlalu_kecil">Terlalu Kecil</option>
                  </select>
          </div>
		  
		  <div class="form-group">
            <label for="wd">Warna Daun :</label>
            <select name="wd" id="wd" class="form-control selBox" required="required">
                      <option value="" disabled selected>-- pilih warna daun--</option>
                      <option value="hijau">Hijau</option>
                      <option value="kekuningan">Kekuningan</option>
                  </select>
          </div>

          <div class="form-group">
            <input type="submit" value="Submit" class="btn btn-primary mt-3" id="dor" onclick="return simulasi()"/>
          </div>

          </form>
      </div>
    </div>
        
    <div class="row">
      <div class="col-12 mt-5 mb-5">
          <div id="hasilSIM" style="margin-bottom:30px;">

          </div>
      </div>
    </div>

    </div>

<!-- Footer -->
<footer class="page-footer font-small abu1">
  <div class="footer-copyright text-center py-3 abu2">
    <a>Rinaska</a>
</footer>


<script src="js/jquery.js"></script>
<script src="jspopper.min.js"></script>
<script src="js/bootstrap.min.js"></script>

<!-- validasi -->
<script>
  $(document).ready(function(){
    $('.toggle').click(function(){
      $('ul').toggleClass('active');
    });
  });
</script>

<script>
  function simulasi()
  {
    var ukuranA = $("#ua").val();
    var warnaA = $("#wa").val();
    var teksturA = $("#ta").val();
    var ukuranB = $("#ub").val();
    var warnaB = $("#wb").val();
	var teksturB = $("#tb").val();
    var ukuranD = $("#ud").val();
    var warnaD = $("#wd").val();

    //validasi
    var uAkar = document.getElementById("ua");
    var wAkar = document.getElementById("wa");
    var tAkar = document.getElementById("ta");
    var uBatang = document.getElementById("ub");
    var wBatang = document.getElementById("wb");
	var tBatang = document.getElementById("tb");
	var uDaun = document.getElementById("ud");
	var wDaun = document.getElementById("wd");

    if(uAkar.selectedIndex == 0){
      alert("Ukuran akar Tidak Boleh Kosong");
      return false;
    }

    if(wAkar.selectedIndex == 0){
      alert("Warna akar Tidak Boleh Kosong");
      return false;
    }

    if(tAkar.selectedIndex == 0){
      alert("Tekstur akar Tidak Boleh Kosong");
      return false;
    }

    if(ub.selectedIndex == 0){
      alert("Ukuran batang Tidak Boleh Kosong");
      return false;
    }

    if(wBatang.selectedIndex == 0){
      alert("Warna batang Tidak Boleh Kosong");
      return false;
    }
	
	if(tBatang.selectedIndex == 0){
      alert("Tekstur batang Tidak Boleh Kosong");
      return false;
    }
	
	if(uDaun.selectedIndex == 0){
      alert("Ukuran daun Tidak Boleh Kosong");
      return false;
    }
	if(wDaun.selectedIndex == 0){
      alert("Warna daun Tidak Boleh Kosong");
      return false;
    }

    //batas validasi

      $.ajax({
        url :'simulasi.php',
        type : 'POST',
        dataType : 'html',
        data : {ukuranA : ukuranA , warnaA : warnaA , teksturA : teksturA , ukuranB : ukuranB , warnaB : warnaB , teksturB : teksturB , ukuranD : ukuranD , warnaD : warnaD },
        success : function(data){
          document.getElementById("hasilSIM").innerHTML = data;
        },
      });

      return false;

  }
</script>

<script>
$(document).ready(function(){
  $('#dor').click(function(){
    $('html, body').animate({
        scrollTop: $("#hasilSIM").offset().top
    }, 500);
  });
});
</script>

</body>
</html>

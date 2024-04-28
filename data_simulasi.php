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

  <link rel="stylesheet" href="css/datatables.css">

  <title>DATA SIMULASI</title>
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
          <li class="nav-item">
            <a class="nav-link" href="index.php">Analisis Penyakit</a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="data_simulasi.php">Data Latih <span class="sr-only">(current)</span></a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <div class="container" style='margin-top:90px'>
    <div class="row">
      <div class="col-12 mt-5">
        <h2 class="tebal" style="color : #274e13; ">List Data Latih</h2><br>
        <p class="desc">Berikut ini adalah data latih yang digunakan dalam membuat SPK Analisis Penyakit pada Tanaman Sawi menggunakan metode naive bayes. Data ini dikumpulkan melalui studi literatur yang bersumber dari artikel jurnal dan internet.</p><br>

        <table id="dataLatih" class="display pt-3 mb-3">
          <thead>
            <tr>
              <th>No</th>
              <th>Ukuran Akar</th>
              <th>Warna Akar</th>
              <th>Tekstur Akar</th>
              <th>Ukuran Batang</th>
              <th>Warna Batang</th>
              <th>Tekstur</th>
              <th>Ukuran Daun</th>
              <th>Warna Daun</th>
              <th>Kesimpulan</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $data = 'data.json';
            $json = file_get_contents($data);
            $hasil = json_decode($json, true);

            if (isset($hasil)) {
              $no = 1;
              foreach ($hasil as $hasil) {

                if ($hasil['kesimpulan'] == 1) {
                  $kesimpulan = "sehat";
                } else {
                  $kesimpulan = "tidak sehat";
                }
                if ($hasil['ukuran_akar'] == "proposional") {
                  $ua = "proposional";
                } else if ($hasil['ukuran_akar'] == "membengkak") {
                  $ua = "membengkak";
                } else if ($hasil['ukuran_akar'] == "terlalu_kecil") {
                  $ua = "terlalu kecil";
                }

                if ($hasil['warna_akar'] == "krem") {
                  $wa = "krem";
                } else if ($hasil['warna_akar'] == "hitam") {
                  $wa = "hitam";
                }

                if ($hasil['tekstur_akar'] == "kaku") {
                  $ta = "kaku";
                } else if ($hasil['tekstur_akar'] == "lembek") {
                  $ta = "lembek";
                }

                if ($hasil['ukuran_batang'] == "proposional") {
                  $ub = "proposional";
                } else if ($hasil['ukuran_batang'] == "terlalu_kecil") {
                  $ub = "terlalu_kecil";
                }

                if ($hasil['warna_batang'] == "hijau_muda") {
                  $wb = "hijau_muda";
                } else if ($hasil['warna_batang'] == "kekuningan") {
                  $wb = "terlalu_kecil";
                }

                if ($hasil['tekstur_batang'] == "kaku") {
                  $tb = "kaku";
                } else if ($hasil['tekstur_batang'] == "lembek") {
                  $tb = "lembek";
                }

                if ($hasil['ukuran_daun'] == "proposional") {
                  $ud = "proposional";
                } else if ($hasil['ukuran_daun'] == "terlalu_kecil") {
                  $ud = "terlalu_kecil";
                }


            ?>

                <tr>
                  <td><?php echo $no; ?></td>
                  <td><?php echo $hasil['ukuran_akar']; ?></td>
                  <td><?php echo $hasil['warna_akar']; ?></td>
                  <td><?php echo $hasil['tekstur_akar']; ?></td>
                  <td><?php echo $hasil['ukuran_batang']; ?></td>
                  <td><?php echo $hasil['warna_batang']; ?></td>
                  <td><?php echo $hasil['tekstur_batang']; ?></td>
                  <td><?php echo $hasil['ukuran_daun']; ?></td>
                  <td><?php echo $hasil['warna_daun']; ?></td>
                  <td><?php
                      if ($kesimpulan == "sehat") {
                        echo "<span class='badge badge-success' style='padding:10px'>sehat</span>";
                      } else {
                        echo "<span class='badge badge-danger' style='padding:10px'>tidak sehat</span>";
                      }
                      ?></td>
                </tr>

            <?php
                $no++;
              }
            }
            ?>
          </tbody>
        </table>
      </div>
    </div>

  </div>

  <!-- Footer -->
  <footer class="page-footer font-small abu1">
    <div class="footer-copyright text-center py-3 abu2">
      <a>Rinaska</a>
  </footer>
  <!-- Footer -->


  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="js/jquery.js"></script>
  <script src="jspopper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>

  <script type="text/javascript" src="js/datatables.js"></script>

  <!-- validasi -->
  <script>
    $(document).ready(function() {
      $('.toggle').click(function() {
        $('ul').toggleClass('active');
      });
    });
  </script>

  <script>
    $(document).ready(function() {
      $('#dataLatih').dataTable({
        "pageLength": 50
      });
    });
  </script>

</body>

</html>
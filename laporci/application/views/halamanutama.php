<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <link rel="stylesheet" href="halamanutama.css">
    <meta charset="utf-8">
    <title>Buat Laporan</title>
  </head>

  <body>
    <div class="judul">
      <h1>SIMPLE LAPOR!</h1>
    </div>
  <br>
  <br>
    <div class="pencarian">
        <form method="POST" action="" enctype="multipart/form-data">
          <textarea name="search" rows="3" cols="132"></textarea>
          <button type="submitSearch" name="tombol" class="searchButton" rows="3" cols="7"> Cari </button>
        </form>
    </div>
  <br>
    <div class="buatlaporan">
      <form method="post" action="buatlaporan.php">
      <button type="createLapor" class="lapor">Buat laporan/komentar <i class="fa fa-plus"></i>
      </button>
    </form>

    </div>
  <br>
  <br>
    <div class="tampilandata">
      <p>Laporan/Komentar Terakhir</p>
    </div>

    <?php foreach($posts as $post) : ?>
	<!-- Isi -->
	<div class="wrap">
		<div class="konten">
			<h1> Laporan Tentang <?php echo $post['laporan']; ?></h1>
			<hr>
			<p>
				<?php echo word_limiter($post['aspek'], 60); ?>
			</p>
			<p>
				Lampiran : <?php echo $post['upload']; ?>
			</p>
			<form>
				<label>Waktu: <?php echo $post['tanggal']; ?></label>
				<a href="selengkapnya.php <?php echo $post['id']; ?>" class="next">Selengkapnya →</a>
			</form>
		</div>
	</div>
	<!-- Akhir Isi -->
	<?php endforeach; ?>

  </body>
  </html>

<?php
use yii\helpers\Html;
use app\models\Artikel;
use app\models\ArtikelKategori;
use app\components\Helper;
use app\models\Slide;

$this->title = "Sistem Informasi Revisi Anggaran";
?>

<div id="home">
    <section class="bgimage">
			<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
				<ol class="carousel-indicators">
					<?php $slide = 1; ?>
					<?php for ($j=0; $j < Slide::getCountSlide() ; $j++) { ?>
						<?php if ($slide == 1) {
							$class = 'active';
						} else { 
							$class = '';
						} ?>
						<li data-target="#carousel-example-generic" data-slide-to="$j" class="$class"></li>
					<?php $slide++; ?>
					<?php } ?>
				</ol>
				<div class="carousel-inner">
					<?php $i = 1 ?>
					<?php foreach (Slide::find()->all() as $slide) { ?>
						<?php if ($i == 1) { ?>
							<div class="item active">
						<?php } else { ?> 
							<div class="item">
						<?php } ?>
								<?= $slide->getGambar(['class' => 'img-responsive']) ?>
								<div class="carousel-caption" style="color: #171515">
									<span style="font-weight: bold; font-size: 145%"><?= $slide->judul ?></span>
									<p><?= $slide->konten ?></p>
								</div>
							</div>
					<?php $i++; } ?>
				</div>
					<a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
							<span class="fa fa-angle-left"></span>
					</a>
					<a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
						<span class="fa fa-angle-right"></span>
					</a>
			</div>
    </section>
</div>

<?php /*
<div>&nbsp;</div>

<div class="container">
    <div class="section-news-area section-title-area container">
        <h5 class="section-sub-title">LINK TAUTAN</h5>
    </div>
</div>

<div class="link-tautan">
    <div class="container">
        <div class="row">
            <div class="col-sm-3">
                <?= Html::a(Html::img("@web/images/logo-sirup.png",['style' => 'height:45px']), 'https://sirup.lkpp.go.id/sirup/home/rekapKldi?idKldi=L34') ?>
            </div>

            <div class="col-sm-3">
                <?= Html::img("@web/images/logo-sirup.png",['style' => 'height:45px']) ?>
            </div>

            <div class="col-sm-3">
                <?= Html::img("@web/images/logo-sirup.png",['style' => 'height:45px']) ?>
            </div>

            <div class="col-sm-3">
                <?= Html::img("@web/images/logo-sirup.png",['style' => 'height:45px']) ?>
            </div>
        </div>
    </div>
</div>
 */ ?>

<div>&nbsp;</div>
<div>&nbsp;</div>

<div class="container">
	<div class="section-news-area section-title-area container">
		<h5 class="section-sub-title">LATEST NEWS</h5>
		<h2 class="section-title">BERITA TERBARU</h2>
		<div class="section-desc-news">

			<div>&nbsp;</div>

			<div class="row">
				<div class="col-md-4 col-sm-4 col-xs-12">
					<h4 class="title-news">PENGUMUMAN</h4>

					<?php foreach (Artikel::findArtikelByKategori(ArtikelKategori::PENGUMUMAN) as $pengumuman) { ?>
						<?= $this->render('list-artikel',[
							'model' => $pengumuman
						]) ?>
					<?php } ?>
				</div>

				<div class="col-md-4 col-sm-4 col-xs-12">
					<h4 class="title-news">PUBLIKASI</h4>

					<?php foreach (Artikel::findArtikelByKategori(ArtikelKategori::PUBLIKASI) as $publikasi) { ?>
						<?= $this->render('list-artikel',[
							'model' => $publikasi
						]) ?>
					<?php } ?>
				</div>

				<div class="col-md-4 col-sm-4 col-xs-12">
					<h4 class="title-news">INFORMASI</h4>

					<?php foreach (Artikel::findArtikelByKategori(ArtikelKategori::INFORMASI) as $info) { ?>
						<?= $this->render('list-artikel',[
							'model' => $info
						]) ?>
					<?php } ?>
				</div>
			</div>
		</div>
	</div>
</div>

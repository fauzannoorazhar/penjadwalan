<?php 
use yii\helpers\Html;
?>

<footer class="layout-footer">
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-sm-6 col-xs-12">
                <div class="row">
                    <div class="col-md-6 title-icon-footer">
                        <?= Html::img("@web/images/integritas.png", ['option' => 'value']); ?>
                        Integritas
                    </div>

                    <div class="col-md-6 title-icon-footer">
                        <?= Html::img("@web/images/profesional.png", ['option' => 'value']); ?>
                        Profesional
                    </div>

                    <div class="col-md-6 title-icon-footer">
                        <?= Html::img("@web/images/inovatif.png", ['option' => 'value']); ?>
                        Inovatif
                    </div>

                    <div class="col-md-6 title-icon-footer">
                        <?= Html::img("@web/images/peduli.png", ['option' => 'value']); ?>
                        Peduli
                    </div>
                </div>
            </div>

            <div class="col-md-8 col-sm-6 col-xs-12 text-right">
                <h3 class="footer-text">Kontak Kami</h3>

                <p>
                    Pusat Informasi Pengadaan - Lembaga Administrasi Negara (SIP - LAN)<br>
                    Tel: (021) 3455021 - 5 ext. 127, ext. 128, ext. 130
                    <br>
                    Email: p2ipk@lan.go.id, p2ipk.inovasi@gmail.com 
                    <br>
                    <br>
                    Alamat: Jalan Veteran No.10 Jakarta Pusat, Indonesia
                </p>
            </div>
        </div>
    </div>
</footer>

<footer class="page-footer">
    <div class="container">
        <div class="footer-copyright text-left">
            © <?= date('Y') ?> Sistem Informasi Pengadaan - Lembaga Administrasi Negara
        </div>
    </div>
</footer>
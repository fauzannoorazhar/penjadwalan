<?php 
use yii\bootstrap\NavBar;
use yii\bootstrap\Nav;
use app\models\ArtikelKategori;
?>

<header id="masthead" class="site-header">

    <?php
    NavBar::begin([
        'brandLabel' => '<img src="images/header-navbar-logo.PNG" class="img-brand-navbar img-responsive"/>',
        'brandUrl' => ['site/index'],
        'options' => ['class' => 'navbar navbar-inverse'],
    ]);
    echo Nav::widget([
        'items' => \app\models\Menu::getMenuItemById(1),
        'options' => ['class' => 'navbar-nav pull-right'],
    ]); ?>
</header>

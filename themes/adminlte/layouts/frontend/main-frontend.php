
<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\Breadcrumbs;
use yii\web\View;
use app\assets\FrontendAsset;
use app\assets\AppAsset;
use app\widgets\Alert;
use app\models\User;
use yii\bootstrap\NavBar;
use yii\bootstrap\Nav;

FrontendAsset::register($this);
dmstr\web\AdminLteAsset::register($this);

?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <link rel='stylesheet prefetch' href='http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css'>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div id="header-section">
   <?= $this->render('navbar-frontend') ?>
</div>

<div class="content">

    <?= $content ?>
</div>

<?= $this->render('footer-frontend') ?>

<?php $this->endBody() ?>
</body>


</html>
<?php $this->endPage() ?>

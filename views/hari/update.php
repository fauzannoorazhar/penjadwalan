<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Hari */

$this->title = "Sunting Hari";
$this->params['breadcrumbs'][] = ['label' => 'Haris', 'url' => ['index']];
$this->params['breadcrumbs'][] = 'Sunting';
?>
<div class="hari-update">

    <?= $this->render('_form', [
        'model' => $model,
        'referrer'=> $referrer
    ]) ?>

</div>

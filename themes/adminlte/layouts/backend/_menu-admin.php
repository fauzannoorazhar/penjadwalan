<?php 

use app\models\User;
use app\models\UserRole;

?>

<?= dmstr\widgets\Menu::widget(
    [
        'options' => ['class' => 'sidebar-menu', 'data-widget' => 'tree'],
        'items' => [
            ['label' => 'MENU UTAMA','options' => ['class' => 'header']],
            ['label' => 'Dashboard', 'icon' => 'dashboard', 'url' => ['admin/']],
            ['label' => 'Kelas', 'icon' => 'circle-o', 'url' => ['kelas/']],

            ['label' => 'REFERENSI','options' => ['class' => 'header']],
            ['label' => 'Guru', 'icon' => 'circle-o', 'url' => ['guru/']],
            ['label' => 'Jurusan Angkatan', 'icon' => 'circle-o', 'url' => ['jurusan-angkatan/']],
            ['label' => 'Mata Pelajaran', 'icon' => 'circle-o', 'url' => ['mata-pelajaran/']],
            ['label' => 'Kelas Hari', 'icon' => 'circle-o', 'url' => ['kelas-hari/']],
            /*[
                'label' => 'Data Referensi',
                'icon' => 'list',
                'url' => '#',
                'items' => [
                    ['label' => 'Referensi', 'icon' => 'circle-o', 'url' => '#'],
                ]
            ],*/

            ['label' => 'SISTEM','options' => ['class' => 'header']],
            [
                'label' => 'User',
                'icon' => 'user',
                'url' => '#',
                'items' => [
                    ['label' => 'Admin', 'icon' => 'circle-o', 'url' => ['user/index','id_user_role' => UserRole::ADMIN],],
                ]
            ],                    

            ['label' => 'Logout','icon' => 'lock', 'url' => ['site/logout'], 'template' => '<a href="{url}" data-method="post">{icon} {label}</a>' , 'visible' => !Yii::$app->user->isGuest],
        ]
    ]
) ?>   

<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <?php
    NavBar::begin([
        'brandLabel' => 'Gestión de Minimarket "San Cristóbal"',
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);
    if(Yii::$app->user->isGuest){
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => [
            ['label' => 'Inicio', 'url' => ['/site/index']],
            ['label' => 'Acceder', 'url' => ['/site/login']]
            ],
    ]);
     }else{
        if(Yii::$app->user->identity->authkey == "admin"){
            echo Nav::widget([
                'options' => ['class' => 'navbar-nav navbar-right'],
                'items' => [
                    ['label' => 'Inicio', 'url' => ['/site/index']],
                    ['label' => 'Registro', 'url' => ['/site/register']],
                    ['label' => 'Productos', 'url' => ['/producto'], 'items' => [
                        ['label' => 'Ingresar Producto', 'url' => ['producto/create']],
                        ['label' => 'Administrar Productos', 'url' => ['producto/index']],
                        ['label' => 'Reporte de Productos', 'url' => ['producto/generarpdf']],
                        ['label' => 'Gráfico Circular', 'url' => ['producto/generargrafico']],
                        ['label' => 'Gráfico de Barras', 'url' => ['producto/generargraficocolumna']],
                        ]
                    ],
                    ['label' => 'Vendedores', 'url' => ['/vendedor'], 'items' => [
                        ['label' => 'Ingresar Vendedor', 'url' => ['vendedor/create']],
                        ['label' => 'Administrar Vendedores', 'url' => ['vendedor/index']],
                        ['label' => 'Reporte de Vendedores', 'url' => ['vendedor/generarpdf']],
                        ]
                    ],
                    ['label' => 'Ventas', 'url' => ['/venta'], 'items' => [
                        ['label' => 'Ingresar Venta', 'url' => ['venta/create']],
                        ['label' => 'Administrar Ventas', 'url' => ['venta/index']],
                        ['label' => 'Ventas diarias', 'url' => ['venta/resumen']],
                        ['label' => 'Reporte de Ventas', 'url' => ['venta/generarpdf']],
                        
                        
                        ]
                    ],
                    ['label' => 'Compras', 'url' => ['/compra'], 'items' => [
                        ['label' => 'Ingresar Compra', 'url' => ['compra/create']],
                        ['label' => 'Administrar Compras', 'url' => ['compra/index']],
                      
                        ['label' => 'Reporte de Compras', 'url' => ['compra/generarpdf']],
                    

                        ]
                    ],

                        '<li>'
                        . Html::beginForm(['/site/logout'], 'post')
                        . Html::submitButton(
                            'Logout (' . Yii::$app->user->identity->username . ')',
                            ['class' => 'btn btn-link logout']
                        )
                        . Html::endForm()
                        . '</li>'

                ],
            ]);
            
        }else{
            echo Nav::widget([
                'options' => ['class' => 'navbar-nav navbar-right'],
                'items' => [
                    ['label' => 'Inicio', 'url' => ['/site/index']],
                    ['label' => 'Ventas', 'url' => ['/venta'], 'items' => [
                        ['label' => 'Ingresar Venta', 'url' => ['venta/create']],
                        ['label' => 'Administrar Ventas', 'url' => ['venta/index']],
                        ]
                    ],
                    ['label' => 'Compras', 'url' => ['/compra'], 'items' => [
                        ['label' => 'Ingresar Compra', 'url' => ['compra/create']],
                        ['label' => 'Administrar Compras', 'url' => ['compra/index']],

                        ]
                    ],

                        '<li>'
                        . Html::beginForm(['/site/logout'], 'post')
                        . Html::submitButton(
                            'Logout (' . Yii::$app->user->identity->username . ')',
                            ['class' => 'btn btn-link logout']
                        )
                        . Html::endForm()
                        . '</li>'

                ],
            ]);
        }
    }
    NavBar::end();
    ?>

    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= $content ?>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; QWERTY Company <?= date('Y') ?></p>

        <p class="pull-right"><?= Yii::powered() ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>

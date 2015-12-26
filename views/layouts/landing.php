<?php

/** @var $this \yii\web\View */
/** @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

\app\assets\MainLayout\Asset::register($this);

?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">


<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <link rel="shortcut icon" href="/images/icon32.png">
    <title><?= Html::encode($this->title) ?> :: Авиалинии БогДан</title>
    <?= Html::csrfMetaTags() ?>
    <?php $this->head() ?>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body id="page-top" data-spy="scroll" data-target=".navbar-fixed-top">

<!-- Navigation -->
<nav class="navbar navbar-custom navbar-fixed-top" role="navigation" style="background-color: #0042ae;">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-main-collapse">
                <i class="fa fa-bars"></i>
            </button>
            <a class="navbar-brand page-scroll" href="#page-top" style="padding: 0px;  margin: 0px 10px 0px 10px;">
                <img src="/images/logo3.png" height="50">
            </a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse navbar-right navbar-main-collapse">
            <ul class="nav navbar-nav">
                <!-- Hidden li included to remove active class from about link when scrolled up past about section -->
                <li class="hidden">
                    <a href="#page-top"></a>
                </li>
                <li>
                    <a class="page-scroll" href="/#about">О проекте</a>
                </li>
                <li>
                    <a class="page-scroll" href="/#download">Попробовать</a>
                </li>
                <li>
                    <a class="page-scroll" href="/#contact">Контакты</a>
                </li>
                <li>
                    <a class="page-scroll" href="/about">О нас</a>
                </li>
            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container -->
</nav>

<?= $content ?>

<!-- Footer -->
<footer>
    <div class="container text-center">
        <p>&copy; bog-dan.com 2016<br><span style="font-size: 80%">При участии богов <a href="https://ru.wikipedia.org/wiki/%D0%A0%D0%B0">РА</a>, <a href="https://ru.wikipedia.org/wiki/%D0%A1%D1%83%D1%80%D1%8C%D1%8F">Сурья</a>, <a href="https://ru.wikipedia.org/wiki/%D0%9D%D0%B0%D1%80%D0%B0%D1%8F%D0%BD%D0%B0">Нараяна</a>, <a href="https://ru.wikipedia.org/wiki/%D0%9F%D0%B5%D1%80%D1%83%D0%BD">Перун</a></span></p>
        <p><a href="http://www.galaxysss.ru/" style="font-size: 80%">Галактичский Союз Сил Света</a></p>
    </div>
</footer>


<?php $this->endBody() ?>
</body>

</html>
<?php $this->endPage() ?>

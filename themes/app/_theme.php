<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <?= $head ?>

    <link rel="stylesheet" href="<?= url("/shared/styles/boot.css"); ?>">
    <link rel="stylesheet" href="<?= url("/shared/styles/styles.css"); ?>">
    <link rel="stylesheet" href="<?= theme("/assets/css/style.css", CONF_VIEW_APP); ?>">

    <link rel="stylesheet" href="<?= url("/shared/app/css/datatables.bundle.css"); ?>">
    <link rel="stylesheet" href="<?= url("/shared/app/css/vis-timeline.bundle.css"); ?>">
    <link rel="stylesheet" href="<?= url("/shared/app/css/plugins.bundle.css"); ?>">
    <link rel="stylesheet" href="<?= url("/shared/app/css/style.bundle.css"); ?>">

  <?= $v->section("css"); ?>
</head>
<body id="kt_body" class="header-extended header-fixed header-tablet-and-mobile-fixed">

<div class="ajax_load" style="z-index: 999999999999999999999;">
    <div class="ajax_load_box">
        <div class="ajax_load_box_circle"></div>
        <p class="ajax_load_box_title">Aguarde, carregando...</p>
    </div>
</div>

<div class="ajax_response"><?= flash(); ?></div>

<div class="d-flex flex-column flex-root">
    <div class="page d-flex flex-row flex-column-fluid">
        <div class="wrapper d-flex flex-column flex-row-fluid" id="kt_wrapper">

          <?php $v->insert("views/menu.php"); ?>



            <div id="kt_content_container" class="d-flex flex-column-fluid align-items-start container-xxl">

                <div class="content flex-row-fluid" id="kt_content">

                    <div class="row gy-5 g-xl-12">

                      <?= $v->section("content"); ?>


                    </div>

                </div>
            </div>
            <div class="footer py-4 d-flex flex-lg-column" id="kt_footer">
                <div class="container-xxl d-flex flex-column flex-md-row align-items-center justify-content-between">
                    <div class="text-dark order-2 order-md-1">
                        <span class="text-muted fw-bold me-1">2022©</span>
                        <a href="https://keenthemes.com/" target="_blank" class="text-gray-800 text-hover-primary">Keenthemes</a>
                    </div>
                    <ul class="menu menu-gray-600 menu-hover-primary fw-bold order-1">
                        <li class="menu-item">
                            <a href="https://keenthemes.com/" target="_blank" class="menu-link px-2">About</a>
                        </li>
                        <li class="menu-item">
                            <a href="https://devs.keenthemes.com/" target="_blank" class="menu-link px-2">Support</a>
                        </li>
                        <li class="menu-item">
                            <a href="https://1.envato.market/EA4JP" target="_blank" class="menu-link px-2">Purchase</a>
                        </li>
                    </ul>
                </div>
            </div>

        </div>
    </div>
</div>

<!--<script src="--><? //= url("/shared/scripts/jquery.min.js"); ?><!--"></script>-->

<script src="<?= url("/shared/scripts/jquery.min.js"); ?>"></script>
<script src="<?= url("/shared/scripts/jquery-ui.js"); ?>"></script>
<script src="<?= url("/shared/scripts/jquery.form.js"); ?>"></script>
<script src="<?= url("/shared/scripts/jquery.mask.js"); ?>"></script>
<script src="<?= url("/shared/jquery/js/jquery.validate.js"); ?>"></script>
<script src="<?= url("/shared/jquery/js/messages_pt_BR.js"); ?>"></script>
<script src="<?= url("/shared/jquery/js/additional-methods.js"); ?>"></script>

<script src="<?= theme("/assets/js/scripts.js", CONF_VIEW_APP); ?>"></script>

<script src="<?= url("/shared/app/js/plugins.bundle.js"); ?>"></script>
<script src="<?= url("/shared/app/js/scripts.bundle.js"); ?>"></script>
<script src="<?= url("/shared/app/js/datatables.bundle.js"); ?>"></script>
<script src="<?= url("/shared/app/js/vis-timeline.bundle.js"); ?>"></script>
<script src="<?= url("/shared/app/js/index.js"); ?>"></script>
<script src="<?= url("/shared/app/js/xy.js"); ?>"></script>
<script src="<?= url("/shared/app/js/percent.js"); ?>"></script>
<script src="<?= url("/shared/app/js/radar.js"); ?>"></script>
<script src="<?= url("/shared/app/js/animated.js"); ?>"></script>
<script src="<?= url("/shared/app/js/widgets.bundle.js"); ?>"></script>
<script src="<?= url("/shared/app/js/widgets.js"); ?>"></script>
<script src="<?= url("/shared/app/js/chat.js"); ?>"></script>
<script src="<?= url("/shared/app/js/intro.js"); ?>"></script>
<script src="<?= url("/shared/app/js/create-campaign.js"); ?>"></script>
<script src="<?= url("/shared/app/js/create-app.js"); ?>"></script>
<script src="<?= url("/shared/app/js/users-search.js"); ?>"></script>


<?= $v->section("scripts"); ?>

</body>
</html>
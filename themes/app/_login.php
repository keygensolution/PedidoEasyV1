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

    <link rel="stylesheet" href="<?= url("/shared/app/dist/vendors/bootstrap/css/bootstrap.min.css"); ?>">
    <link rel="stylesheet" href="<?= url("/shared/app/dist/vendors/jquery-ui/jquery-ui.min.css"); ?>">
    <link rel="stylesheet" href="<?= url("/shared/app/dist/vendors/jquery-ui/jquery-ui.theme.min.css"); ?>">
    <link rel="stylesheet" href="<?= url("/shared/app/dist/vendors/simple-line-icons/css/simple-line-icons.css"); ?>">
    <link rel="stylesheet" href="<?= url("/shared/app/dist/vendors/flags-icon/css/flag-icon.min.css"); ?>">
    <link rel="stylesheet" href="<?= url("/shared/app/dist/vendors/social-button/bootstrap-social.css"); ?>">
    <link rel="stylesheet" href="<?= url("/shared/app/dist/css/main.css"); ?>">

    <style>
        .error {
            color: red;
        }
    </style>

</head>
<body id="main-container" class="default">

<div class="ajax_load" style="z-index: 999999999999999999999;">
    <div class="ajax_load_box">
        <div class="ajax_load_box_circle"></div>
        <p class="ajax_load_box_title">Aguarde, carregando...</p>
    </div>
</div>

<div class="ajax_response"><?= flash(); ?></div>

<?= $v->section("content"); ?>

<script src="<?= url("/shared/scripts/jquery.min.js"); ?>"></script>
<script src="<?= url("/shared/scripts/jquery-ui.js"); ?>"></script>
<script src="<?= url("/shared/scripts/jquery.form.js"); ?>"></script>
<script src="<?= url("/shared/scripts/jquery.mask.js"); ?>"></script>
<script src="<?= url("/shared/jquery/js/jquery.validate.js"); ?>"></script>
<script src="<?= url("/shared/jquery/js/messages_pt_BR.js"); ?>"></script>
<script src="<?= url("/shared/jquery/js/additional-methods.js"); ?>"></script>
<script src="<?= url("/shared/app/dist/vendors/moment/moment.js"); ?>"></script>
<script src="<?= url("/shared/app/dist/vendors/bootstrap/js/bootstrap.bundle.min.js"); ?>"></script>
<script src="<?= url("/shared/app/dist/vendors/slimscroll/jquery.slimscroll.min.js"); ?>"></script>

<script src="<?= theme("/assets/js/scripts.js", CONF_VIEW_APP); ?>"></script>

<?= $v->section("scripts"); ?>

</body>
</html>
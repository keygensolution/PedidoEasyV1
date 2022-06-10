<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <?= $head ?>

    <link rel="stylesheet" href="<?= url("/shared/app/css/datatables.bundle.css"); ?>">
    <link rel="stylesheet" href="<?= url("/shared/app/css/vis-timeline.bundle.css"); ?>">
    <link rel="stylesheet" href="<?= url("/shared/app/css/plugins.bundle.css"); ?>">
    <link rel="stylesheet" href="<?= url("/shared/app/css/style.bundle.css"); ?>">

  <?= $v->section("styles"); ?>
</head>
<body>

<?= $v->section("content"); ?>



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
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

    <link rel="stylesheet" href="<?= url("/shared/fontawesome/css/all.css"); ?>">
    <link rel="stylesheet" href="<?= url("/shared/fontawesome/css/brands.css"); ?>">
    <link rel="stylesheet" href="<?= url("/shared/fontawesome/css/fontawesome.css"); ?>">
    <link rel="stylesheet" href="<?= url("/shared/fontawesome/css/regular.css"); ?>">
    <link rel="stylesheet" href="<?= url("/shared/fontawesome/css/solid.css"); ?>">

    <link rel="stylesheet" href="<?= url("/shared/app/css/datatables.bundle.css"); ?>">
    <link rel="stylesheet" href="<?= url("/shared/app/css/vis-timeline.bundle.css"); ?>">
    <link rel="stylesheet" href="<?= url("/shared/app/css/plugins.bundle.css"); ?>">
    <link rel="stylesheet" href="<?= url("/shared/app/css/style.bundle.css"); ?>">

    <!--    <link rel="stylesheet" href="--><? //= theme("/assets/style.css", CONF_VIEW_APP); ?><!--">-->

    <style>
        .btn {
            background: #0c2f64;
        }
    </style>

    <style>
        ::-webkit-scrollbar {
            display: none;
        }
    </style>

</head>
<body class="header-extended header-fixed header-tablet-and-mobile-fixed">

<div class="ajax_load" style="z-index: 999999999999999999999;">
    <div class="ajax_load_box">
        <div class="ajax_load_box_circle"></div>
        <p class="ajax_load_box_title">Aguarde, carregando...</p>
    </div>
</div>

<div class="ajax_response" style="position: absolute;
    top: 95%;
    left: 50%;
    transform: translate(-50%, -50%);"><?= flash(); ?></div>

<div class="d-flex flex-column flex-root">
    <div class="page d-flex flex-row flex-column-fluid">
        <div class="wrapper d-flex flex-column flex-row-fluid" id="kt_wrapper">

          <?php $v->insert("views/menu.php"); ?>


            <div class=" flex-column-fluid align-items-start container-xxl">


              <?= $v->section("content"); ?>


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


<div id="kt_drawer_chat" class="bg-body" data-kt-drawer="true" data-kt-drawer-name="chat" data-kt-drawer-activate="true"
     data-kt-drawer-overlay="true" data-kt-drawer-width="{default:'300px', 'md': '500px'}"
     data-kt-drawer-direction="end" data-kt-drawer-toggle="#kt_drawer_chat_toggle"
     data-kt-drawer-close="#kt_drawer_chat_close">
    <div class="card w-100 rounded-0 border-0">
        <div class="card-header pe-5">
            <div class="card-title">
                <div class="d-flex justify-content-center flex-column me-3">
                    <a href="#" class="fs-4 fw-bolder text-gray-900 text-hover-primary me-1 mb-2 lh-1">Brian Cox</a>
                    <div class="mb-0 lh-1">
                        <span class="badge badge-success badge-circle w-10px h-10px me-1"></span>
                        <span class="fs-7 fw-bold text-muted">Active</span>
                    </div>
                </div>
            </div>
            <div class="card-toolbar">
                <div class="btn btn-sm btn-icon btn-active-light-primary" id="kt_drawer_chat_close">
                    <span class="svg-icon svg-icon-2">
								<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                     fill="none">
									<rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1"
                                          transform="rotate(-45 6 17.3137)" fill="currentColor"/>
									<rect x="7.41422" y="6" width="16" height="2" rx="1"
                                          transform="rotate(45 7.41422 6)" fill="currentColor"/>
								</svg>
                    </span>
                </div>
            </div>
        </div>

        <!--        <div class="card-body" id="kt_drawer_chat_messenger_body">-->
        <!---->
        <!---->
        <!--        </div>-->

    </div>
</div>

<script src="<?= url("/shared/scripts/jquery.min.js"); ?>"></script>
<script src="<?= url("/shared/scripts/jquery-ui.js"); ?>"></script>
<script src="<?= url("/shared/scripts/jquery.form.js"); ?>"></script>
<script src="<?= url("/shared/scripts/jquery.mask.js"); ?>"></script>

<script src="<?= theme("/assets/js/scripts.js", CONF_VIEW_APP); ?>"></script>

<!--<script src="--><?//= url("/shared/app/js/plugins.bundle.js"); ?><!--"></script>-->
<!--<script src="--><?//= url("/shared/app/js/scripts.bundle.js"); ?><!--"></script>-->
<!--<script src="--><?//= url("/shared/app/js/fullcalendar.bundle.js"); ?><!--"></script>-->
<!--<script src="--><?//= url("/shared/app/js/datatables.bundle.js"); ?><!--"></script>-->
<!--<script src="--><?//= url("/shared/app/js/widgets.bundle.js"); ?><!--"></script>-->
<!--<script src="--><?//= url("/shared/app/js/widgets.js"); ?><!--"></script>-->
<!--<script src="--><?//= url("/shared/app/js/chat.js"); ?><!--"></script>-->
<!--<script src="--><?//= url("/shared/app/js/intro.js"); ?><!--"></script>-->
<!--<script src="--><?//= url("/shared/app/js/create-app.js"); ?><!--"></script>-->
<!--<script src="--><?//= url("/shared/app/js/users-search.js"); ?><!--"></script>-->
<!---->
<!--<script src="--><?//= url("/shared/app/js/categories.js"); ?><!--"></script>-->
<!---->
<!--<script src="--><?//= url("/shared/app/js/formrepeater.bundle.js"); ?><!--"></script>-->


<script src="<?= url("/shared/app/assets/plugins/global/plugins.bundle.js") ?>"></script>
<script src="<?= url("/shared/app/assets/js/scripts.bundle.js") ?>"></script>
<script src="<?= url("/shared/app/assets/plugins/custom/fullcalendar/fullcalendar.bundle.js") ?>"></script>
<script src="<?= url("/shared/app/assets/plugins/custom/datatables/datatables.bundle.js") ?>"></script>
<script src="<?= url("/shared/app/assets/js/widgets.bundle.js") ?>"></script>
<script src="<?= url("/shared/app/assets/js/custom/widgets.js") ?>"></script>
<script src="<?= url("/shared/app/assets/js/custom/apps/chat/chat.js") ?>"></script>
<script src="<?= url("/shared/app/assets/js/custom/intro.js") ?>"></script>
<script src="<?= url("/shared/app/assets/js/custom/utilities/modals/upgrade-plan.js") ?>"></script>
<script src="<?= url("/shared/app/assets/js/custom/utilities/modals/create-campaign.js") ?>"></script>
<script src="<?= url("/shared/app/assets/js/custom/utilities/modals/create-app.js") ?>"></script>
<script src="<?= url("/shared/app/assets/js/custom/utilities/modals/users-search.js") ?>"></script>
<script src="<?= url("/shared/app/assets/plugins/custom/formrepeater/formrepeater.bundle.js") ?>"></script>
<script src="<?= url("/shared/app/assets/js/custom/apps/ecommerce/catalog/save-category.js") ?>"></script>
<script src="<?= url("/shared/app/assets/js/custom/apps/ecommerce/catalog/categories.js") ?>"></script>


<script src="<?= url("/shared/fontawesome/js/all.js"); ?>"></script>
<script src="<?= url("/shared/fontawesome/js/brands.js"); ?>"></script>
<script src="<?= url("/shared/fontawesome/js/fontawesome.js"); ?>"></script>
<script src="<?= url("/shared/fontawesome/js/regular.js"); ?>"></script>
<script src="<?= url("/shared/fontawesome/js/solid.js"); ?>"></script>

<script>

    function changeCompany() {
        var company = $("#company option:selected").val();

        var load = $(".ajax_load");
        load.fadeIn(200).css("display", "flex");

        $.ajax({
            type: "POST",
            url: "<?= urlAJAX("app/changeCompany"); ?>",
            data: {company_id: company},
            success: function (data) {
                let response = JSON.parse(data);

                //reload
                if (response.reload) {
                    window.location.reload();
                }

                load.fadeOut(200);
            },
            error: function () {
                ajaxMessage(ajaxResponseRequestError, 5);
                load.fadeOut();
            }
        });
    }

</script>

<?= $v->section("scripts"); ?>

</body>
</html>
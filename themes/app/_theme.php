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

            <div class="toolbar mb-n1 pt-3 mb-lg-n3 pt-lg-6" id="kt_toolbar">

                <div id="kt_toolbar_container" class="container-xxl d-flex flex-stack flex-wrap gap-2">

                    <div class="page-title d-flex flex-column align-items-start me-3 py-2 py-lg-0 gap-2">

                    </div>

                    <div class="d-flex align-items-center">

                        <a href="#"
                           class="btn btn-icon btn-color-primary bg-body w-35px h-35px w-lg-40px h-lg-40px me-3"
                           data-bs-toggle="modal" data-bs-target="#kt_modal_upgrade_plan">

                            <span class="svg-icon svg-icon-2 svg-icon-md-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                         fill="none">
                                        <path opacity="0.3"
                                              d="M19 22H5C4.4 22 4 21.6 4 21V3C4 2.4 4.4 2 5 2H14L20 8V21C20 21.6 19.6 22 19 22ZM11.7 17.7L16 14C16.4 13.6 16.4 12.9 16 12.5C15.6 12.1 15.4 12.6 15 13L11 16L9 15C8.6 14.6 8.4 14.1 8 14.5C7.6 14.9 8.1 15.6 8.5 16L10.3 17.7C10.5 17.9 10.8 18 11 18C11.2 18 11.5 17.9 11.7 17.7Z"
                                              fill="currentColor"/>
                                        <path
                                                d="M10.4343 15.4343L9.25 14.25C8.83579 13.8358 8.16421 13.8358 7.75 14.25C7.33579 14.6642 7.33579 15.3358 7.75 15.75L10.2929 18.2929C10.6834 18.6834 11.3166 18.6834 11.7071 18.2929L16.25 13.75C16.6642 13.3358 16.6642 12.6642 16.25 12.25C15.8358 11.8358 15.1642 11.8358 14.75 12.25L11.5657 15.4343C11.2533 15.7467 10.7467 15.7467 10.4343 15.4343Z"
                                                fill="currentColor"/>
                                        <path d="M15 8H20L14 2V7C14 7.6 14.4 8 15 8Z" fill="currentColor"/>
                                    </svg>
                                </span>

                        </a>

                        <a href="#"
                           class="btn btn-icon btn-color-success bg-body w-35px h-35px w-lg-40px h-lg-40px me-3"
                           data-bs-toggle="modal" data-bs-target="#kt_modal_create_campaign">

                            <span class="svg-icon svg-icon-2 svg-icon-md-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                         fill="none">
                                        <path opacity="0.3"
                                              d="M19 22H5C4.4 22 4 21.6 4 21V3C4 2.4 4.4 2 5 2H14L20 8V21C20 21.6 19.6 22 19 22ZM16 13.5L12.5 13V10C12.5 9.4 12.6 9.5 12 9.5C11.4 9.5 11.5 9.4 11.5 10L11 13L8 13.5C7.4 13.5 7 13.4 7 14C7 14.6 7.4 14.5 8 14.5H11V18C11 18.6 11.4 19 12 19C12.6 19 12.5 18.6 12.5 18V14.5L16 14C16.6 14 17 14.6 17 14C17 13.4 16.6 13.5 16 13.5Z"
                                              fill="currentColor"/>
                                        <rect x="11" y="19" width="10" height="2" rx="1" transform="rotate(-90 11 19)"
                                              fill="currentColor"/>
                                        <rect x="7" y="13" width="10" height="2" rx="1" fill="currentColor"/>
                                        <path d="M15 8H20L14 2V7C14 7.6 14.4 8 15 8Z" fill="currentColor"/>
                                    </svg>
                                </span>

                        </a>

                        <a href="#"
                           class="btn btn-icon btn-color-warning bg-body w-35px h-35px w-lg-40px h-lg-40px me-3"
                           data-bs-toggle="modal" data-bs-target="#kt_modal_create_app">

                            <span class="svg-icon svg-icon-2 svg-icon-md-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                         fill="none">
                                        <path opacity="0.3"
                                              d="M19 22H5C4.4 22 4 21.6 4 21V3C4 2.4 4.4 2 5 2H14L20 8V21C20 21.6 19.6 22 19 22ZM12.5 18C12.5 17.4 12.6 17.5 12 17.5H8.5C7.9 17.5 8 17.4 8 18C8 18.6 7.9 18.5 8.5 18.5L12 18C12.6 18 12.5 18.6 12.5 18ZM16.5 13C16.5 12.4 16.6 12.5 16 12.5H8.5C7.9 12.5 8 12.4 8 13C8 13.6 7.9 13.5 8.5 13.5H15.5C16.1 13.5 16.5 13.6 16.5 13ZM12.5 8C12.5 7.4 12.6 7.5 12 7.5H8C7.4 7.5 7.5 7.4 7.5 8C7.5 8.6 7.4 8.5 8 8.5H12C12.6 8.5 12.5 8.6 12.5 8Z"
                                              fill="currentColor"/>
                                        <rect x="7" y="17" width="6" height="2" rx="1" fill="currentColor"/>
                                        <rect x="7" y="12" width="10" height="2" rx="1" fill="currentColor"/>
                                        <rect x="7" y="7" width="6" height="2" rx="1" fill="currentColor"/>
                                        <path d="M15 8H20L14 2V7C14 7.6 14.4 8 15 8Z" fill="currentColor"/>
                                    </svg>
                                </span>

                        </a>

                        <a href="#" class="btn btn-flex bg-body h-35px h-lg-40px px-5" id="kt_dashboard_daterangepicker"
                           data-bs-toggle="tooltip" data-bs-dismiss="click" data-bs-trigger="hover"
                           title="Select dashboard daterange">
                                <span class="me-4">
                                    <span class="text-muted fw-bold me-1"
                                          id="kt_dashboard_daterangepicker_title">Today</span>
                                <span class="text-primary fw-bolder" id="kt_dashboard_daterangepicker_date">Apr
                                        7</span>
                                </span>

                            <span class="svg-icon svg-icon-4 m-0">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                         fill="none">
                                        <path
                                                d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z"
                                                fill="currentColor"/>
                                    </svg>
                                </span>

                        </a>

                    </div>

                </div>

            </div>

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

<!--<script src="--><?//= url("/shared/scripts/jquery.min.js"); ?><!--"></script>-->



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
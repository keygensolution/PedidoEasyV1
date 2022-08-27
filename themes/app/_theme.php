<?php

use Source\Models\views\VW001ListOfCompany;
use \Source\Models\Auth;

$company_id = Auth::company();
$user = Auth::user();

$companies = (new VW001ListOfCompany())
  ->find("user_id = :a", "a={$user->id}",
    "company_id, company_name")
  ->fetch(true);
?>


<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

  <?= $head ?>

    <link rel="stylesheet" href="<?= url("/shared/styles/boot.css"); ?>">
    <!--    <link rel="stylesheet" href="--><? //= url("/shared/styles/styles.css"); ?><!--">-->
    <link rel="stylesheet" href="<?= theme("/assets/css/style.css", CONF_VIEW_APP); ?>">

    <link rel="stylesheet" href="<?= url("/shared/app/dist/vendors/bootstrap/css/bootstrap.min.css"); ?>">
    <link rel="stylesheet" href="<?= url("/shared/app/dist/vendors/jquery-ui/jquery-ui.min.css"); ?>">
    <link rel="stylesheet" href="<?= url("/shared/app/dist/vendors/jquery-ui/jquery-ui.theme.min.css"); ?>">
    <link rel="stylesheet" href="<?= url("/shared/app/dist/vendors/simple-line-icons/css/simple-line-icons.css"); ?>">
    <link rel="stylesheet" href="<?= url("/shared/app/dist/vendors/flags-icon/css/flag-icon.min.css"); ?>">
    <link rel="stylesheet" href="<?= url("/shared/app/dist/vendors/chartjs/Chart.min.css"); ?>">
    <link rel="stylesheet" href="<?= url("/shared/app/dist/vendors/morris/morris.css"); ?>">
    <link rel="stylesheet" href="<?= url("/shared/app/dist/vendors/weather-icons/css/pe-icon-set-weather.min.css"); ?>">
    <link rel="stylesheet" href="<?= url("/shared/app/dist/vendors/chartjs/Chart.min.css"); ?>">
    <link rel="stylesheet" href="<?= url("/shared/app/dist/vendors/starrr/starrr.css"); ?>">
    <link rel="stylesheet" href="<?= url("/shared/app/dist/vendors/fontawesome/css/all.min.css"); ?>">
    <link rel="stylesheet" href="<?= url("/shared/app/dist/vendors/ionicons/css/ionicons.min.css"); ?>">
    <link rel="stylesheet" href="<?= url("/shared/app/dist/vendors/jquery-jvectormap/jquery-jvectormap-2.0.3.css"); ?>">

    <link rel="stylesheet" href="<?= url("/shared/app/dist/vendors/sweetalert/sweetalert.css"); ?>">

    <link rel="stylesheet" href="<?= url("/shared/app/dist/vendors/datatable/css/dataTables.bootstrap4.min.css"); ?>">
    <link rel="stylesheet"
          href="<?= url("/shared/app/dist/vendors/datatable/buttons/css/buttons.bootstrap4.min.css"); ?>">

    <link href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.1.1/css/fontawesome.min.css">

    <link rel="stylesheet" href="<?= url("/shared/app/dist/css/main.css"); ?>">


    <style>
        ::-webkit-scrollbar {
            display: none;
        }

        .error {
            color: red;
        }

        footer {
            position: fixed;
            bottom: 0;
            left: 0;
            margin-top: 10px;
        }
    </style>

</head>
<body id="main-container" class="default semi-dark horizontal-menu">

<div class="ajax_load" style="z-index: 999999999999999999999;">
    <div class="ajax_load_box">
        <div class="ajax_load_box_circle"></div>
        <p class="ajax_load_box_title">Aguarde, carregando...</p>
    </div>
</div>

<div class="ajax_response"><?= flash(); ?></div>

<div id="header-fix" class="header fixed-top">
    <div class="site-width">
        <nav class="navbar navbar-expand-lg  p-0">
            <div class="navbar-header  h-100 h4 mb-0 align-self-center logo-bar text-left">
                <a href="index.html" class="horizontal-logo text-left">
                    <svg height="20pt" preserveAspectRatio="xMidYMid meet" viewBox="0 0 512 512" width="20pt"
                         xmlns="http://www.w3.org/2000/svg">
                        <g transform="matrix(.1 0 0 -.1 0 512)" fill="#1e3d73">
                            <path
                                    d="m1450 4481-1105-638v-1283-1283l1106-638c1033-597 1139-654 1139-619 0 4-385 674-855 1489-470 814-855 1484-855 1488 0 8 1303 763 1418 822 175 89 413 166 585 190 114 16 299 13 408-5 100-17 231-60 314-102 310-156 569-509 651-887 23-105 23-331 0-432-53-240-177-460-366-651-174-175-277-247-738-512-177-102-322-189-322-193s104-188 231-407l231-400 46 28c26 15 360 207 742 428l695 402v1282 1282l-1105 639c-608 351-1107 638-1110 638s-502-287-1110-638z"/>
                            <path
                                    d="m2833 3300c-82-12-190-48-282-95-73-36-637-358-648-369-3-3 580-1022 592-1034 5-5 596 338 673 391 100 69 220 197 260 280 82 167 76 324-19 507-95 184-233 291-411 320-70 11-89 11-165 0z"/>
                        </g>
                    </svg>
                    <span class="h4 font-weight-bold align-self-center mb-0 ml-auto">PICK</span>
                </a>
            </div>
            <div class="navbar-header h4 mb-0 text-center h-100 collapse-menu-bar">
                <a href="#" class="sidebarCollapse" id="collapse"><i class="icon-menu"></i></a>
            </div>


            <div class="navbar-right ml-auto h-100">
                <ul class="ml-auto p-0 m-0 list-unstyled d-flex top-icon h-100">
                    <li class="d-inline-block">
                        <div class="form-group col-md-12">
                            <select id="company" name="company" class="form-control"
                                    style="background-color: #FFFFFF;" onchange="changeCompany()">
                              <?php foreach ($companies as $a): ?>
                                  <option <?= $a->company_id == $company_id->id ? "selected" : "" ?>
                                          value="<?= $a->company_id ?>"><?= $a->company_name ?></option>
                              <?php endforeach; ?>
                            </select>
                        </div>
                    </li>



                    <li class="dropdown user-profile align-self-center d-inline-block">
                        <a href="#" class="nav-link py-0" data-toggle="dropdown" aria-expanded="false">
                            <div class="media">
                                <img src="<?= url("/shared/app/dist/images/author.jpg"); ?>" alt=""
                                     class="d-flex img-fluid rounded-circle"
                                     width="29">
                            </div>
                        </a>

                        <div class="dropdown-menu border dropdown-menu-right p-0">
                            <a href="#" class="dropdown-item px-2 align-self-center d-flex">
                                <span class="icon-pencil mr-2 h6 mb-0"></span> Edit Profile</a>
                            <a href="#" class="dropdown-item px-2 align-self-center d-flex">
                                <span class="icon-user mr-2 h6 mb-0"></span> View Profile</a>
                            <div class="dropdown-divider"></div>
                            <a href="#" class="dropdown-item px-2 align-self-center d-flex">
                                <span class="icon-support mr-2 h6  mb-0"></span> Help Center</a>
                            <a href="#" class="dropdown-item px-2 align-self-center d-flex">
                                <span class="icon-globe mr-2 h6 mb-0"></span> Forum</a>
                            <a href="#" class="dropdown-item px-2 align-self-center d-flex">
                                <span class="icon-settings mr-2 h6 mb-0"></span> Account Settings</a>
                            <div class="dropdown-divider"></div>
                            <a href="#" class="dropdown-item px-2 text-danger align-self-center d-flex">
                                <span class="icon-logout mr-2 h6  mb-0"></span> Sign Out</a>
                        </div>

                    </li>

                </ul>
            </div>
        </nav>
    </div>
</div>

<div class="sidebar">
    <div class="site-width">

        <!-- START: Menu-->
        <ul id="side-menu" class="sidebar-menu">
            <li class="dropdown"><a href="#"><i class="icon-home mr-1"></i> Geral </a>
                <ul>
                    <li><a href="<?= url("/app/categories"); ?>"><i class="fas fa-tags"></i> Categorias</a></li>
                    <li><a href="index-account.html"><i class="icon-layers"></i> Account</a></li>
                    <li><a href="index-analytic.html"><i class="icon-grid"></i> Analytic</a></li>
                    <li><a href="index-covid.html"><i class="icon-earphones"></i> COVID</a></li>
                    <li><a href="index-crypto.html"><i class="icon-support"></i> Crypto</a></li>
                    <li><a href="index-ecommerce.html"><i class="icon-briefcase"></i> Ecommerce</a></li>
                </ul>
            </li>
            <li class="dropdown"><a href="#"><i class="icon-organization mr-1"></i> Layout</a>
                <ul>
                    <li class="dropdown active"><a href="#"><i class="icon-options"></i>Horizontal</a>
                        <ul class="sub-menu">
                            <li><a href="layout-horizontal.html"><i class="icon-energy"></i> Light</a></li>
                            <li class="active"><a href="layout-horizontal-semidark.html"><i class="icon-disc"></i>
                                    Semi Dark</a></li>
                            <li><a href="layout-horizontal-dark.html"><i class="icon-frame"></i> Dark</a></li>
                        </ul>
                    </li>
                    <li class="dropdown"><a href="#"><i class="icon-options-vertical"></i>Vertical</a>
                        <ul class="sub-menu">
                            <li><a href="layout-vertical.html"><i class="icon-energy"></i> Light</a></li>
                            <li><a href="layout-vertical-semidark.html"><i class="icon-disc"></i> Semi Dark</a></li>
                            <li><a href="layout-vertical-dark.html"><i class="icon-frame"></i> Dark</a></li>
                        </ul>
                    </li>
                    <li class="dropdown"><a href="#"><i class="icon-grid"></i>Compact Menu</a>
                        <ul class="sub-menu">
                            <li><a href="layout-compact.html"><i class="icon-energy"></i> Light</a></li>
                            <li><a href="layout-compact-semidark.html"><i class="icon-disc"></i> Semi Dark</a></li>
                            <li><a href="layout-compact-dark.html"><i class="icon-frame"></i> Dark</a></li>
                        </ul>
                    </li>

                </ul>
            </li>
            <li class="dropdown"><a href="#"><i class="icon-layers mr-1"></i> Web Apps</a>
                <ul>
                    <li><a href="app-calendar.html"><i class="icon-calendar"></i> Calendar</a></li>
                    <li><a href="app-chat.html"><i class="icon-speech"></i> Chats</a></li>
                    <li><a href="app-to-do.html"><i class="icon-support"></i> Todo</a></li>
                    <li><a href="app-mail.html"><i class="icon-envelope"></i>Mailapp</a></li>
                    <li><a href="app-filemanager.html"><i class="icon-folder"></i> File Manager</a></li>
                    <li><a href="app-contactlist.html"><i class="icon-people"></i> Contact List</a></li>
                    <li><a href="app-taskboard.html"><i class="icon-event"></i> Task Board</a></li>
                    <li><a href="app-notes.html"><i class="icon-tag"></i> Notes</a></li>
                    <li><a href="app-invoicelist.html"><i class="icon-book-open"></i> Invoices</a></li>
                </ul>
            </li>

            <li class="dropdown"><a href="#"><i class="icon-cursor mr-1"></i> Elements</a>
                <ul>
                    <li class="dropdown"><a href="#"><i class="icon-chart"></i>Charts</a>
                        <ul class="sub-menu">
                            <li><a href="chart-morris.html"><i class="icon-energy"></i> Morris Chart</a></li>
                            <li><a href="chart-chartist.html"><i class="icon-disc"></i> Chartist js</a></li>
                            <li><a href="chart-echart.html"><i class="icon-frame"></i> eCharts</a></li>
                            <li><a href="chart-flot.html"><i class="icon-fire"></i> Flot Chart</a></li>
                            <li><a href="chart-knob.html"><i class="icon-shuffle"></i> Knob Chart</a></li>
                            <li class="dropdown"><a href="#" class="d-flex align-items-center"><i
                                            class="icon-control-pause"></i> Charts js</a>
                                <ul class="sub-menu">
                                    <li><a href="chartjs-bar.html"><i class="icon-energy"></i> Bar charts</a></li>
                                    <li><a href="chartjs-line.html"><i class="icon-disc"></i> Line charts</a></li>
                                    <li><a href="chartjs-area.html"><i class="icon-frame"></i> Area charts</a></li>
                                    <li><a href="chartjs-other.html"><i class="icon-fire"></i> Doughnut, Pie, Polar
                                            charts</a></li>
                                    <li><a href="chartjs-linear.html"><i class="icon-shuffle"></i> Linear scale</a>
                                    </li>
                                </ul>
                            </li>
                            <li><a href="chart-sparkline.html"><i class="icon-graph"></i> Sparkline Chart</a></li>
                            <li><a href="chart-peity.html"><i class="icon-pie-chart"></i> Peity Chart</a></li>
                            <li><a href="chart-google.html"><i class="icon-drawer"></i> Google Charts</a></li>
                            <li><a href="chart-apex.html"><i class="icon-magnet"></i> Apex Charts</a></li>
                            <li><a href="chart-c3.html"><i class="icon-hourglass"></i> C3 Charts</a></li>
                        </ul>
                    </li>
                    <li class="dropdown"><a href="#"><i class="icon-film"></i>Form</a>
                        <ul class="sub-menu">
                            <li><a href="form-basic.html"><i class="icon-disc"></i> Basic Form</a></li>
                            <li><a href="form-layout.html"><i class="icon-cursor-move"></i> Form Layout</a></li>
                            <li><a href="form-validation.html"><i class="icon-star"></i> Form Validation</a></li>
                            <li class="dropdown"><a href="#" class="d-flex align-items-center"><i
                                            class="icon-film"></i> Form Elements</a>
                                <ul class="sub-menu">
                                    <li><a href="form-elements-switch.html"><i class="icon-energy"></i> Switch</a>
                                    </li>
                                    <li><a href="form-elements-checkbox.html"><i class="icon-disc"></i> Checkbox</a>
                                    </li>
                                    <li><a href="form-elements-radiobutton.html"><i class="icon-frame"></i>
                                            Radio</a></li>
                                    <li><a href="form-elements-input.html"><i class="icon-fire"></i> Input</a></li>
                                </ul>
                            </li>
                            <li><a href="form-float-input.html"><i class="icon-symbol-male"></i> Float Input</a>
                            </li>
                            <li><a href="form-wizard.html"><i class="icon-loop"></i> Form Wizards</a></li>
                            <li><a href="form-upload.html"><i class="icon-pin"></i> Form Uploads</a></li>
                            <li><a href="form-mask.html"><i class="icon-check"></i> Form Mask</a></li>
                            <li><a href="form-dropzone.html"><i class="icon-present"></i> Form Dropzone</a></li>
                            <li><a href="form-icheck.html"><i class="icon-briefcase"></i> Icheck Controls</a></li>
                            <li><a href="form-cropper.html"><i class="icon-hourglass"></i> Image Cropper</a></li>
                            <li><a href="form-htmleditor.html"><i class="icon-graduation"></i> HTML5 Editor</a></li>
                            <li><a href="form-typehead.html"><i class="icon-puzzle"></i> Form Typehead</a></li>
                            <li><a href="form-xeditable.html"><i class="icon-cloud-upload"></i> Xeditable</a></li>
                            <li><a href="form-summernote.html"><i class="icon-ghost"></i> Summernote</a></li>
                        </ul>
                    </li>
                    <li class="dropdown"><a href="#"><i class="icon-menu"></i>Tables</a>
                        <ul class="sub-menu">
                            <li><a href="table-basic.html"><i class="icon-grid"></i> Table Basic</a></li>
                            <li><a href="table-layout.html"><i class="icon-layers"></i> Table Layout</a></li>
                            <li><a href="table-datatable.html"><i class="icon-docs"></i> Datatable</a></li>
                            <li><a href="table-footable.html"><i class="icon-wallet"></i> Footable</a></li>
                            <li><a href="table-jsgrid.html"><i class="icon-folder"></i> Jsgrid</a></li>
                            <li><a href="table-responsive.html"><i class="icon-control-pause"></i> Table
                                    Responsive</a></li>
                            <li><a href="table-editable.html"><i class="icon-pencil"></i> Editable Table</a></li>
                        </ul>
                    </li>
                </ul>
            </li>
            <li class="dropdown"><a href="#"><i class="icon-magnet mr-1"></i> UI Component</a>
                <ul>
                    <li class="dropdown"><a href="#"><i class="icon-screen-desktop"></i>UI Elements</a>
                        <ul class="sub-menu">
                            <li><a href="ui-alert.html"><i class="icon-bell"></i> Alerts</a></li>
                            <li><a href="ui-badges.html"><i class="icon-badge"></i> Badges</a></li>
                            <li><a href="ui-buttons.html"><i class="icon-control-play"></i> Buttons</a></li>
                            <li><a href="ui-cards.html"><i class="icon-layers"></i> Cards</a></li>
                            <li><a href="ui-carousel.html"><i class="icon-picture"></i> Carousel</a></li>
                            <li><a href="ui-collapse.html"><i class="icon-arrow-up"></i> Collapse</a></li>
                            <li><a href="ui-dropdowns.html"><i class="icon-arrow-down"></i> Dropdowns</a></li>
                            <li><a href="ui-jumbotron.html"><i class="icon-screen-desktop"></i> Jumbotron</a></li>
                            <li><a href="ui-modals.html"><i class="icon-frame"></i> Modal</a></li>
                            <li><a href="ui-pagination.html"><i class="icon-docs"></i> Pagination</a></li>
                            <li><a href="ui-popoverandtooltip.html"><i class="icon-pin"></i> Popover &amp;
                                    Tooltip</a></li>
                            <li><a href="ui-progress.html"><i class="icon-graph"></i> Progress</a></li>
                            <li><a href="ui-scrollspy.html"><i class="icon-shuffle"></i> Scrollspy</a></li>
                            <li><a href="ui-select2.html"><i class="icon-wallet"></i> Select2</a></li>
                            <li><a href="ui-sweetalert.html"><i class="icon-fire"></i> Sweet Alert</a></li>
                            <li><a href="ui-timeline.html"><i class="icon-graduation"></i> Timeline</a></li>
                            <li><a href="ui-toastr.html"><i class="icon-layers"></i> Toastr</a></li>
                        </ul>
                    </li>
                    <li class="dropdown"><a href="#"><i class="icon-badge"></i>Icons</a>
                        <ul class="sub-menu">
                            <li><a href="icon-materialdesign.html"><i class="icon-star"></i> Material Icon</a></li>
                            <li><a href="icon-font-awesome.html"><i class="icon-screen-tablet"></i> Font-awesome</a>
                            </li>
                            <li><a href="icon-themify.html"><i class="icon-plane"></i> Themify Icon</a></li>
                            <li><a href="icon-weather.html"><i class="icon-drawer"></i> Weather Icon</a></li>
                            <li><a href="icon-simple-line.html"><i class="icon-map"></i> Simple Line Icon</a></li>
                            <li><a href="icon-flag.html"><i class="icon-flag"></i> Flag Icon</a></li>
                            <li><a href="icon-ionicons.html"><i class="icon-rocket"></i> Ionicons Icon</a></li>
                            <li><a href="icon-icofont.html"><i class="icon-fire"></i> Icofont Icon</a></li>
                            <li><a href="icon-linearicons.html"><i class="icon-list"></i> Linear</a></li>
                            <li><a href="icon-crypto.html"><i class="icon-diamond"></i> Crypto</a></li>
                        </ul>
                    </li>
                </ul>
            </li>
            <li class="dropdown"><a href="#"><i class="icon-doc mr-1"></i> Pages</a>
                <ul>
                    <li class="dropdown"><a href="#"><i class="icon-book-open"></i>Other Pages</a>
                        <ul class="sub-menu">
                            <li><a href="page-lockscreen.html"><i class="icon-lock"></i> Lockscreen</a></li>
                            <li><a href="page-login.html"><i class="icon-login"></i> login</a></li>
                            <li><a href="page-register.html"><i class="icon-direction"></i> Register</a></li>
                            <li><a href="page-404.html"><i class="icon-crop"></i> 404 Page</a></li>
                            <li><a href="page-404-menu.html"><i class="icon-layers"></i> 404 Page With Menu</a></li>
                            <li><a href="page-blank.html"><i class="icon-frame"></i> Blank Page</a></li>
                            <li><a href="page-gallery.html"><i class="icon-layers"></i> Gallery</a></li>
                            <li><a href="page-pricing.html"><i class="icon-wallet"></i> Pricing</a></li>
                            <li><a href="page-contact-us.html"><i class="icon-wrench"></i> Contact us</a></li>
                        </ul>
                    </li>
                    <li><a href="user-profile.html"><i class="icon-user"></i>Profile Pages</a></li>
                </ul>
            </li>
            <li class="dropdown"><a href="#"><i class="icon-support mr-1"></i> Extras</a>
                <ul>
                    <li class="dropdown"><a href="#"><i class="icon-map"></i>Map</a>
                        <ul class="sub-menu">
                            <li><a href="map-google.html"><i class="icon-map"></i> Google Map</a></li>
                            <li><a href="map-vector.html"><i class="icon-vector"></i> Vector Map</a></li>

                        </ul>
                    </li>
                    <li class="dropdown"><a href="#"><i class="icon-pencil"></i>Blog</a>
                        <ul class="sub-menu">
                            <li><a href="blog-list.html"><i class="icon-plus"></i> Blog List</a></li>
                            <li><a href="blog-single.html"><i class="icon-tag"></i> Blog Post</a></li>
                        </ul>
                    </li>
                    <li class="dropdown"><a href="#"><i class="icon-bag"></i>Ecommerce</a>
                        <ul class="sub-menu">
                            <li><a href="ecommerce-product-list.html"><i class="icon-grid"></i> Products List</a>
                            </li>
                            <li><a href="ecommerce-product-detail.html"><i class="icon-plus"></i> Product Detail</a>
                            </li>
                            <li><a href="ecommerce-cart.html"><i class="icon-badge"></i> Cart</a></li>
                            <li><a href="ecommerce-checkout.html"><i class="icon-plus"></i> Checkout</a></li>
                            <li><a href="ecommerce-orders.html"><i class="icon-basket"></i> Orders</a></li>
                            <li><a href="ecommerce-order-view.html"><i class="icon-equalizer"></i> Order View</a>
                            </li>

                        </ul>
                    </li>
                </ul>
            </li>
        </ul>
        <!-- END: Menu-->
        <ol class="breadcrumb bg-transparent align-self-center m-0 p-0 ml-auto">
            <li class="breadcrumb-item"><a href="#">Application</a></li>
            <li class="breadcrumb-item active">Dashboard</li>
        </ol>
    </div>
</div>

<div style="margin-bottom: 50px">
  <?= $v->section("content"); ?>
</div>

<footer class="site-footer footer navbar-fixed-bottom" style="z-index: 9999999">
    2020 © PICK
</footer>

<a href="#" class="scrollup text-center">
    <i class="icon-arrow-up"></i>
</a>

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
<script src="<?= url("/shared/app/dist/js/app.js"); ?>"></script>
<script src="<?= url("/shared/app/dist/vendors/raphael/raphael.min.js"); ?>"></script>
<script src="<?= url("/shared/app/dist/vendors/morris/morris.min.js"); ?>"></script>
<script src="<?= url("/shared/app/dist/vendors/chartjs/Chart.min.js"); ?>"></script>
<script src="<?= url("/shared/app/dist/vendors/starrr/starrr.js"); ?>"></script>
<script src="<?= url("/shared/app/dist/vendors/jquery-flot/jquery.canvaswrapper.js"); ?>"></script>
<script src="<?= url("/shared/app/dist/vendors/jquery-flot/jquery.colorhelpers.js"); ?>"></script>
<script src="<?= url("/shared/app/dist/vendors/jquery-flot/jquery.flot.js"); ?>"></script>
<script src="<?= url("/shared/app/dist/vendors/jquery-flot/jquery.flot.saturated.js"); ?>"></script>
<script src="<?= url("/shared/app/dist/vendors/jquery-flot/jquery.flot.browser.js"); ?>"></script>
<script src="<?= url("/shared/app/dist/vendors/jquery-flot/jquery.flot.drawSeries.js"); ?>"></script>
<script src="<?= url("/shared/app/dist/vendors/jquery-flot/jquery.flot.uiConstants.js"); ?>"></script>
<script src="<?= url("/shared/app/dist/vendors/jquery-flot/jquery.flot.legend.js"); ?>"></script>
<script src="<?= url("/shared/app/dist/vendors/jquery-flot/jquery.flot.pie.js"); ?>"></script>
<script src="<?= url("/shared/app/dist/vendors/chartjs/Chart.min.js"); ?>"></script>
<script src="<?= url("/shared/app/dist/vendors/jquery-jvectormap/jquery-jvectormap-2.0.3.min.js"); ?>"></script>
<script src="<?= url("/shared/app/dist/vendors/jquery-jvectormap/jquery-jvectormap-world-mill.js"); ?>"></script>
<script src="<?= url("/shared/app/dist/vendors/jquery-jvectormap/jquery-jvectormap-de-merc.js"); ?>"></script>
<script src="<?= url("/shared/app/dist/vendors/jquery-jvectormap/jquery-jvectormap-us-aea.js"); ?>"></script>
<script src="<?= url("/shared/app/dist/vendors/apexcharts/apexcharts.min.js"); ?>"></script>
<script src="<?= url("/shared/app/dist/js/home.script.js"); ?>"></script>

<script src="<?= url("/shared/app/dist/vendors/datatable/js/jquery.dataTables.min.js"); ?>"></script>
<script src="<?= url("/shared/app/dist/vendors/datatable/js/dataTables.bootstrap4.min.js"); ?>"></script>
<script src="<?= url("/shared/app/dist/vendors/datatable/jszip/jszip.min.js"); ?>"></script>
<script src="<?= url("/shared/app/dist/vendors/datatable/pdfmake/pdfmake.min.js"); ?>"></script>
<script src="<?= url("/shared/app/dist/vendors/datatable/pdfmake/vfs_fonts.js"); ?>"></script>
<script src="<?= url("/shared/app/dist/vendors/datatable/buttons/js/dataTables.buttons.min.js"); ?>"></script>
<script src="<?= url("/shared/app/dist/vendors/datatable/buttons/js/buttons.bootstrap4.min.js"); ?>"></script>
<script src="<?= url("/shared/app/dist/vendors/datatable/buttons/js/buttons.colVis.min.js"); ?>"></script>
<script src="<?= url("/shared/app/dist/vendors/datatable/buttons/js/buttons.flash.min.js"); ?>"></script>
<script src="<?= url("/shared/app/dist/vendors/datatable/buttons/js/buttons.html5.min.js"); ?>"></script>
<script src="<?= url("/shared/app/dist/vendors/datatable/buttons/js/buttons.print.min.js"); ?>"></script>
<script src="<?= url("/shared/app/dist/js/datatable.script.js"); ?>"></script>

<script src="<?= url("/shared/app/dist/vendors/sweetalert/sweetalert.min.js"); ?>"></script>
<script src="<?= url("/shared/scripts/alerts.js"); ?>"></script>
<script src="<?= url("/shared/scripts/actions.js"); ?>"></script>

<script src="<?= theme("/assets/js/scripts.js", CONF_VIEW_APP); ?>"></script>

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
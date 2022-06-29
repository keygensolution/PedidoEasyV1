<?php $v->layout("_theme"); ?>

<div class="toolbar mb-n1 pt-3 mb-lg-n3 pt-lg-6" id="kt_toolbar">
    <div class="page-title d-flex flex-column align-items-start me-3 py-2 py-lg-0 gap-2">
        <h1 class="d-flex text-dark fw-bolder m-0 fs-3">Categories</h1>
        <ul class="breadcrumb breadcrumb-dot fw-bold text-gray-600 fs-7">
            <li class="breadcrumb-item text-gray-600">
                <a href="<?= url("/app"); ?>" class="text-gray-600 text-hover-primary">Home</a>
            </li>
            <li class="breadcrumb-item text-gray-500">Categorias</li>
        </ul>
    </div>
</div>


<div class="mt-5">
    <div class=" flex-row-fluid" id="kt_content">
        <div class="card card-flush">
            <div class="card-header align-items-center py-5 gap-2 gap-md-5">
                <div class="card-title">
                    <div class="d-flex align-items-center position-relative my-1">
                        <span class="svg-icon svg-icon-1 position-absolute ms-4">
						<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                             viewBox="0 0 24 24" fill="none">
                            <rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546" height="2"
                                  rx="1" transform="rotate(45 17.0365 15.1223)"
                                  fill="currentColor"/>
                            <path
                                    d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z"
                                    fill="currentColor"/>
						</svg>
						</span>
                        <input type="text" data-kt-ecommerce-category-filter="search"
                               class="form-control form-control-solid w-250px ps-14" placeholder="Pesquisar Categoria"/>
                    </div>
                </div>
                <div class="card-toolbar">
                    <a href="#" class="btn btn-primary">Adicionar Categoria</a>
                </div>
            </div>
            <div class="card-body pt-0">
                <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_ecommerce_category_table">
                    <thead>
                    <tr class="text-start text-gray-400 fw-bolder fs-7 text-uppercase gs-0">

                        <th class="min-w-250px">Category</th>
                        <th class="min-w-150px">Category Type</th>
                        <th class="text-end min-w-70px">Actions</th>
                        <th>

                        </th>
                    </tr>
                    </thead>
                    <tbody class="fw-bold text-gray-600">
                    <tr>

                        <td>
                            <div class="d-flex">
                                <a href="edit-category.html" class="symbol symbol-50px">
                                    <span class="symbol-label"
                                          style="background-image:url(<?= url("/shared/images/user.jpg"); ?>);"></span>
                                </a>
                                <div class="ms-5">
                                    <a href="edit-category.html"
                                       class="text-gray-800 text-hover-primary fs-5 fw-bolder mb-1"
                                       data-kt-ecommerce-category-filter="category_name">Computers</a>
                                    <div class="text-muted fs-7 fw-bolder">Our computers and tablets include all the big
                                        brands.
                                    </div>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="badge badge-light-success">Automated</div>
                        </td>
                        <td class="text-end">
                            <a href="#" class="btn btn-sm btn-light btn-active-light-primary"
                               data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Actions
                                <span class="svg-icon svg-icon-5 m-0">
								<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                     fill="none">
								    <path d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z"
                                          fill="currentColor"/>
								</svg>
                                </span>
                            </a>

                            <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-bold fs-7 w-125px py-4"
                                 data-kt-menu="true">
                                <div class="menu-item px-3">
                                    <a href="add-category.html" class="menu-link px-3">Edit</a>
                                </div>
                                <div class="menu-item px-3">
                                    <a href="#" class="menu-link px-3" data-kt-ecommerce-category-filter="delete_row">Delete</a>
                                </div>
                            </div>
                        </td>
                        <td>

                        </td>
                    </tr>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

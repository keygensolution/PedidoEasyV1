<?php $v->layout("_theme"); ?>

    <div class="toolbar mb-n1 pt-3 mb-lg-n3 pt-lg-6" id="kt_toolbar">
        <div class="page-title d-flex flex-column align-items-start me-3 py-2 py-lg-0 gap-2">
            <h1 class="d-flex text-dark fw-bolder m-0 fs-3">Cadastrar Categoria</h1>
            <ul class="breadcrumb breadcrumb-dot fw-bold text-gray-600 fs-7">
                <li class="breadcrumb-item text-gray-600">
                    <a href="<?= url("/app"); ?>" class="text-gray-600 text-hover-primary">Home</a>
                </li>
                <li class="breadcrumb-item text-gray-600">
                    <a href="<?= url("/app/categories"); ?>" class="text-gray-600 text-hover-primary">Categorias</a>
                </li>
                <li class="breadcrumb-item text-gray-500">Cadastrar</li>
            </ul>
        </div>
    </div>

    <div class="mt-5">
        <div class="flex-row-fluid">
            <form class="form d-flex flex-column flex-lg-row" id="ajax_form">
                <div class="d-flex flex-column gap-7 gap-lg-10 w-100 w-lg-300px mb-7 me-lg-10">
                    <div class="card card-flush py-4">
                        <div class="card-header">
                            <div class="card-title">
                                <h2>Imagem</h2>
                            </div>
                        </div>
                        <div class="card-body text-center pt-0">
                            <div class="image-input image-input-empty image-input-outline mb-3"
                                 data-kt-image-input="true"
                                 style="background-image: url(<?= url("/shared/app/images/blank-image.svg"); ?>)">
                                <div class="image-input-wrapper w-150px h-150px"></div>
                                <label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                       data-kt-image-input-action="change" data-bs-toggle="tooltip"
                                       for="photo">
                                    <i class="fa-solid fa-pencil" style="color: #0b0e18"></i>
                                    <input type="file" name="photo" id="photo" accept=".png, .jpg, .jpeg"/>
                                    <input type="hidden" name="avatar_remove"/>
                                </label>
                                <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                      data-kt-image-input-action="cancel" data-bs-toggle="tooltip">
													<i class="fa-solid fa-close" style="color: #0b0e18"></i>
												</span>
                                <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                      data-kt-image-input-action="remove" data-bs-toggle="tooltip"
                                      title="Remove avatar">
													<i class="bi bi-x fs-2"></i>
												</span>
                            </div>
                        </div>
                    </div>


                </div>
                <div class="d-flex flex-column flex-row-fluid gap-7 gap-lg-10">
                    <div class="card card-flush py-4">

                        <div class="card-body pt-0">
                            <div class="mb-3 fv-row">
                                <label for="category_name" class="required form-label">Nome da Categoria</label>
                                <input type="text" name="category_name" id="category_name" class="form-control mb-2"
                                       autocomplete="off" autofocus/>
                            </div>
                            <div class="mb-3 fv-row">
                                <label for="description" class="required form-label">Descrição</label>
                                <textarea class="form-control form-control-solid" name="description" id="description"
                                          rows="5"></textarea>
                            </div>
                            <div>
                                <label for="status" class="required form-label">Status</label>
                                <select class="form-select mb-2" data-control="select2" data-hide-search="true"
                                        id="status"
                                        name="status">
                                    <option value="1">Ativado</option>
                                    <option value="0">Desativado</option>
                                </select>
                            </div>

                        </div>
                    </div>

                    <div class="d-flex justify-content-end">
                        <a href="<?= url("/app/categories"); ?>"
                           class="btn btn-primary me-5">Cancelar</a>
                        <button type="submit" class="btn btn-success">
                            <span class="indicator-label">Cadastrar</span>
                        </button>
                    </div>

                </div>
            </form>
        </div>
    </div>

<?php $v->start("scripts"); ?>

    <script>

        // Define form element
        const form = document.getElementById('ajax_form');

        // Init form validation rules. For more info check the FormValidation plugin's official documentation:https://formvalidation.io/
        var validator = FormValidation.formValidation(
            form,
            {
                fields: {
                    'category_name': {
                        validators: {
                            notEmpty: {
                                message: 'O campo Nome da Categoria não pode ser vazio!'
                            }
                        }
                    },
                    'description': {
                        validators: {
                            notEmpty: {
                                message: 'Você deve selecionar uma imagem!'
                            }
                        }
                    },
                },

                plugins: {
                    trigger: new FormValidation.plugins.Trigger(),
                    bootstrap: new FormValidation.plugins.Bootstrap5({
                        rowSelector: '.fv-row',
                        eleInvalidClass: '',
                        eleValidClass: ''
                    })
                }
            }
        );

        form.addEventListener('submit', function (e) {
            e.preventDefault();
            if (validator) {
                validator.validate().then(function (status) {
                    if (status === 'Valid') {

                        var dados = $(form).serialize();
                        var image = new FormData();
                        image.append('file', $('#photo'));

                        var load = $(".ajax_load");
                        load.fadeIn(200).css("display", "flex");

                        $.ajax({
                            type: "POST",
                            url: "<?= urlAJAX("app/categories/create"); ?>",
                            data: {dados, image},
                            success: function (data) {
                                let response = JSON.parse(data);

                                //redirect
                                if (response.redirect) {
                                    window.location.href = response.redirect;
                                }

                                //reload
                                if (response.reload) {
                                    window.location.reload();
                                }

                                //message
                                if (response.message) {
                                    ajaxMessage(response.message, ajaxResponseBaseTime);
                                }

                                load.fadeOut(200);
                            },
                            error: function () {
                                ajaxMessage(ajaxResponseRequestError, 5);
                                load.fadeOut();
                            }
                        });

                    }
                });
            }
        });

    </script>

<?php $v->end(); ?>
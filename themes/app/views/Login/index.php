<?php $v->layout("_login"); ?>

    <div class="d-flex flex-column flex-root">

        <div class="d-flex flex-column flex-column-fluid bgi-position-y-bottom position-x-center bgi-no-repeat bgi-size-contain bgi-attachment-fixed">
            <div class="d-flex flex-center flex-column flex-column-fluid p-10 pb-lg-20">
                <a href="<?= url("/app/login"); ?>" class="mb-12">
                    <img alt="Logo" src="<?= url("/shared/images/logo-atualizado.png"); ?>" class="h-60px"/>
                </a>
                <div class="w-lg-500px bg-body rounded shadow-sm p-10 p-lg-15 mx-auto">
                    <form class="form w-100" id="ajax_form">

                      <?= csrf_input(); ?>

                        <div class="text-center mb-10">
                            <h1 class="text-dark mb-3">Acessar Pedido Easy</h1>
                        </div>
                        <div class="fv-row mb-10">
                            <label for="email" class="form-label fs-6 fw-bolder text-dark">Email</label>
                            <input class="form-control form-control-lg form-control-solid" type="text" id="email"
                                   name="email"
                                   autocomplete="off" autofocus
                            value="lucasfrancisco1318@gmail.com"/>
                        </div>
                        <div class="fv-row mb-10">
                            <div class="d-flex flex-stack mb-2">
                                <label for="password" class="form-label fw-bolder text-dark fs-6 mb-0">Senha</label>
                                <a href="password-reset.html" class="link-primary fs-6 fw-bolder">Esqueceu sua
                                    senha?</a>
                            </div>
                            <input class="form-control form-control-lg form-control-solid" type="password" id="password"
                                   name="password"
                                   autocomplete="off"
                            value="aluno12345"/>
                        </div>
                        <div class="text-center">

                            <button type="submit" class="btn btn-lg w-100 mb-5"
                                    style="background-color: #0ec244; color: #FFFFFF">
                                <span class="indicator-label">Acessar</span>
                            </button>

                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>

<?php $v->start("scripts"); ?>

    <script>

        $(document).ready(function () {
            $('#ajax_form').validate({
                rules: {
                    email: {required: true, email: true},
                    password: {required: true, minlength: 8},
                },
                submitHandler: function (form) {
                    var dados = $(form).serialize();

                    var load = $(".ajax_load");
                    load.fadeIn(200).css("display", "flex");

                    $.ajax({
                        type: "POST",
                        url: "<?= urlAJAX("app/validateLogin"); ?>",
                        data: dados,
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

                    return false;
                }
            });
        });

    </script>

<?php $v->end(); ?>
<?php $v->layout("_login"); ?>

    <div class="container">
        <div class="row vh-100 justify-content-between align-items-center">
            <div class="col-12">
                <form id="ajax_form" class="row row-eq-height lockscreen  mt-5 mb-5">

                  <?= csrf_input(); ?>

                    <div class="lock-image col-12 col-sm-5"></div>
                    <div class="login-form col-12 col-sm-7">
                        <div class="form-group mb-3">
                            <label for="email">E-mail</label>
                            <input class="form-control" type="email" id="email" name="email"
                                   placeholder="Digite seu e-mail" value="lucasfrancisco1318@gmail.com">
                        </div>

                        <div class="form-group mb-3">
                            <label for="password">Senha</label>
                            <input class="form-control" type="password" id="password" name="password"
                                   placeholder="Digite sua senha" value="aluno12345">
                        </div>

                        <div class="form-group mb-3">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input"
                                       id="save" <?= (!empty($cookie) ? "checked" : ""); ?> name="save">
                                <label class="custom-control-label" for="save">Lembrar de mim</label>
                            </div>
                        </div>

                        <div class="form-group mb-0">
                            <button class="btn" type="submit" style="background-color: #00C333; color: #FFFFFF"> Acessar</button>
                        </div>

                    </div>
                </form>
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
<?php $v->layout("_theme"); ?>
    <style>

        .avatar-upload {
            position: relative;
            max-width: 205px;
            margin: 50px auto;
        }

        .avatar-upload .avatar-edit {
            position: absolute;
            right: 12px;
            z-index: 1;
            top: 10px;
        }

        .avatar-upload .avatar-edit input {
            display: none;
        }

        .avatar-upload .avatar-edit input + label {
            display: inline-block;
            width: 34px;
            height: 34px;
            margin-bottom: 0;
            border-radius: 100%;
            background: #FFFFFF;
            border: 1px solid transparent;
            box-shadow: 0px 2px 4px 0px rgba(0, 0, 0, 0.12);
            cursor: pointer;
            font-weight: normal;
            transition: all 0.2s ease-in-out;
        }

        .avatar-upload .avatar-edit input + label:hover {
            background: #f1f1f1;
            border-color: #d6d6d6;
        }

        .avatar-upload .avatar-edit input + label:after {
            color: #757575;
            position: absolute;
            top: 10px;
            left: 0;
            right: 0;
            text-align: center;
            margin: auto;
        }

        .avatar-upload .avatar-preview {
            width: 170px;
            height: 170px;
            position: relative;
            border-radius: 100%;
            border: 6px solid #F8F8F8;
            box-shadow: 0px 2px 4px 0px rgba(0, 0, 0, 0.1);
        }

        .avatar-upload .avatar-preview > div {
            width: 100%;
            height: 100%;
            border-radius: 100%;
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center;
        }

    </style>

    <main>
        <div class="container-fluid site-width">
            <!-- START: Breadcrumbs-->
            <div class="row ">
                <div class="col-12  align-self-center">
                    <div class="sub-header mt-3 py-3 align-self-center d-sm-flex w-100 rounded">
                        <div class="w-sm-100 mr-auto">
                            <h4 class="mb-0">Cadastrar Categoria <?= \Source\Models\Auth::company()->id ?></h4>
                        </div>

                        <ol class="breadcrumb bg-transparent align-self-center m-0 p-0">
                            <li class="breadcrumb-item"><a href="<?= url("/app"); ?>">Home</a></li>
                            <li class="breadcrumb-item"><a href="<?= url("/app/categories"); ?>">Categories</a></li>
                            <li class="breadcrumb-item active">Cadastrar</li>
                        </ol>
                    </div>
                </div>
            </div>
            <!-- END: Breadcrumbs-->

            <!-- START: Card Data-->
            <div class="row">
                <div class="col-12 mt-4">
                    <div class="card">

                        <div class="card-content">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12" style="margin-top: -50px">
                                        <form id="ajax_form">

                                            <div class="form-group">

                                                <div class="avatar-upload">

                                                    <div class="avatar-edit">
                                                        <input type='file' id="imageUpload"
                                                               accept=".png, .jpg, .jpeg" onchange="readURL(this)"/>
                                                        <label for="imageUpload">
                                                            <i class="fas fa-pen fa-lg"
                                                               style="margin-left: 8px; margin-top: 10px"></i>
                                                        </label>
                                                    </div>
                                                    <div class="avatar-preview">

                                                        <div id="imagePreview"
                                                             style="background-image: url(<?= url("/shared/app/images/blank-image.svg"); ?>);">
                                                        </div>
                                                    </div>

                                                    <label style="margin-left: 30%; margin-top: 10px">Imagem</label>

                                                </div>

                                            </div>

                                            <div class="form-row" style="margin-top: -50px">
                                                <div class="form-group col-md-6">
                                                    <label for="category_name">Nome da Categoria</label>
                                                    <input type="text" class="form-control rounded" id="category_name"
                                                           name="category_name">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="status">Status</label>
                                                    <select id="status" name="status" class="form-control">
                                                        <option value="Ativo">Ativo</option>
                                                        <option value="Inativo">Inativo</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label for="description">Descrição</label>
                                                <textarea type="text" class="form-control" id="description"
                                                          name="description"
                                                          rows="2"></textarea>
                                            </div>

                                            <button type="submit" class="btn btn-success">Cadastrar</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

<?php $v->start("scripts"); ?>
    <script>

        $(document).ready(function () {
            $('#ajax_form').validate({
                rules: {
                    category_name: {required: true},
                    description: {required: true},
                },
                submitHandler: function (form) {
                    // var dados = $(form).serialize();

                    var formData = new FormData(document.getElementById("ajax_form"));
                    var files = $('#imageUpload')[0].files;

                    if (files.length > 0) {
                        formData.append('photo', files[0]);
                    }

                    var load = $(".ajax_load");
                    load.fadeIn(200).css("display", "flex");

                    $.ajax({
                        type: "POST",
                        url: "<?= urlAJAX("app/categories/create"); ?>",
                        data: formData,
                        contentType: false,
                        processData: false,
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


        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('#imagePreview').css('background-image', 'url(' + e.target.result + ')');
                    $('#imagePreview').hide();
                    $('#imagePreview').fadeIn(650);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }


    </script>

<?php $v->end(); ?>
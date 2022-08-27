<?php $v->layout("_theme"); ?>
<main>
    <div class="container-fluid site-width">
        <!-- START: Breadcrumbs-->
        <div class="row ">
            <div class="col-12  align-self-center">
                <div class="sub-header mt-3 py-3 align-self-center d-sm-flex w-100 rounded">
                    <div class="w-sm-100 mr-auto">
                        <h4 class="mb-0">Categorias</h4>
                    </div>

                    <ol class="breadcrumb bg-transparent align-self-center m-0 p-0">
                        <li class="breadcrumb-item"><a href="<?= url("/app"); ?>">Home</a></li>
                        <li class="breadcrumb-item active">Categorias</li>
                    </ol>
                </div>
            </div>
        </div>


        <a class="btn btn-success col-12" href="<?= url("/app/categories/create"); ?>" style="color: #FFFFFF">
            <i class="fas fa-plus"></i> Cadastrar</a>

      <?php if (!empty($ListCategories)): ?>

          <div class="row">
              <div class="col-12 mt-3">
                  <div class="card">


                      <div class="card-body">
                          <div class="table-responsive">
                              <table id="example" class="display table dataTable table-striped table-bordered">
                                  <thead>
                                  <tr>
                                      <th>Imagem</th>
                                      <th>Nome Categoria</th>
                                      <th>Descrição</th>
                                      <th>status</th>
                                      <th>Ações</th>
                                  </tr>
                                  </thead>
                                  <tbody>

                                  <?php foreach ($ListCategories as $item): ?>
                                      <tr>
                                          <td>
                                            <?php if (empty($item->photo)): ?>
                                                <img src="<?= url("/shared/app/images/blank-image.svg"); ?>" width="55"
                                                     class="rounded-circle ml-auto">
                                            <?php else: ?>
                                                <img src="<?= urlSource($item->photo) ?>" width="55"
                                                     class="rounded-circle ml-auto">
                                            <?php endif; ?>
                                          </td>
                                          <td style="padding-top: 30px"><?= $item->category_name ?></td>
                                          <td style="padding-top: 30px"><?= $item->description ?></td>
                                          <td style="padding-top: 30px"><?= $item->status ?></td>
                                          <td style="padding-top: 25px">
                                            <?php if (!empty($item->company_id)): ?>
                                                <a class="btn btn-primary" style="color: #FFFFFF"
                                                   href="<?= url("/app/categories/update/{$item->id}"); ?>">
                                                    <i class="fas fa-edit"></i> Editar </a>
                                                <a class="btn btn-danger delete" style="color: #FFFFFF"
                                                   data-id="<?= $item->id ?>"
                                                   onclick="DeleteObject(<?= $item->id ?>, 'deleteCategory', 'Categoria deletada com sucesso!', '<?= urlAJAX("app/categories/delete"); ?>')">
                                                    <i class="fas fa-times"></i> Excluir </a>
                                            <?php endif; ?>

                                          </td>
                                      </tr>
                                  <?php endforeach; ?>

                                  </tbody>

                              </table>
                          </div>
                      </div>
                  </div>

              </div>
          </div>
      <?php else: ?>
          <div class="alert alert-primary mt-3" role="alert">
              Não existem categorias cadastradas.
          </div>
      <?php endif; ?>

    </div>
</main>

<?php $v->start("scripts"); ?>

<script>
    function deleteCategory(idCategory) {
        $.ajax({
            type: "POST",
            url: "<?= urlAJAX("app/categories/delete"); ?>",
            data: {"id": idCategory},
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
</script>

<?php $v->end(); ?>

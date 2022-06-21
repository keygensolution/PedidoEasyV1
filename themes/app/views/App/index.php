<?php $v->layout("_theme"); ?>

<div class="toolbar">

    <div id="kt_toolbar_container" class="container-xxl d-flex flex-stack flex-wrap gap-2">

        <div>
        </div>

        <div class="d-flex align-items-center">

            <select class="form-select" data-control="select2" id="company" name="company"
                    data-placeholder="Selecione uma empresa" onchange="changeCompany()">
              <?php foreach ($companies as $a): ?>
                  <option <?= $a->company_id == $company_id ? "selected" : "" ?>
                          value="<?= $a->company_id ?>"><?= $a->company_name ?></option>
              <?php endforeach; ?>
            </select>

        </div>

    </div>

</div>

<h1>Olá Mundo!😊 - APP</h1>


<?php $v->start("scripts"); ?>

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

<?php $v->end(); ?>

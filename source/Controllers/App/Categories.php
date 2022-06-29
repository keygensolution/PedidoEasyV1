<?php

namespace Source\Controllers\App;

use Source\Models\Auth;
use Source\Models\tables\T005Categories;
use Source\Support\Upload;

class Categories extends App
{
  public function __construct()
  {
    parent::__construct();
  }

  public function index(): void
  {
    $head = $this->seo->render(
      "Categorias - " . CONF_SITE_NAME . " - " . CONF_SITE_TITLE,
      CONF_SITE_DESC,
      url(),
      theme("/assets/images/share.jpg")
    );

    echo $this->view->render("views/Categories/index", [
      "head" => $head
    ]);
  }

  public function registerCategory(): void
  {
    $head = $this->seo->render(
      "Categorias - " . CONF_SITE_NAME . " - " . CONF_SITE_TITLE,
      CONF_SITE_DESC,
      url(),
      theme("/assets/images/share.jpg")
    );

    echo $this->view->render("views/Categories/register_category", [
      "head" => $head
    ]);
  }

  public function create(?array $data)
  {
    $data = filter_var_array($data, FILTER_SANITIZE_STRIPPED);

    $t005_categories_create = new T005Categories();

    $t005_categories_create->category_name = $data["category_name"];
    $t005_categories_create->description = $data["description"];
    $t005_categories_create->status = $data["status"] == 1 ? true : false;
//    $t005_categories_create->company_id = Auth::company()->id;

    if (!empty($_FILES["photo"])) {
      $file = $_FILES["photo"];
      $upload = new Upload();
      $image = $upload->image($file, generate_code($data["category_name"]), 600);

      if (!$image) {
        $json["message"] = $upload->message()->render();
        echo json_encode($json);
        return;
      }

      $t005_categories_create->photo = $image;
    }

    $t005_categories_create->save();
    $this->message->success("Categoria cadastrado com sucesso...")->flash();
    $json["redirect"] = url("/app/categories");

    echo json_encode($json);
    return;
  }


}
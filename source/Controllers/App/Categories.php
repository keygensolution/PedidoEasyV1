<?php

namespace Source\Controllers\App;

use Source\Models\Auth;
use Source\Models\tables\T005Categories;
use Source\Services\CategoriesService;
use Source\Support\Upload;

class Categories extends App
{
  public function __construct()
  {
    parent::__construct();
  }


  public function index(): void
  {
    $categoryService = new CategoriesService();

    $ListCategories = $categoryService->ListAll();

    $head = $this->seo->render(
      "Categorias - " . CONF_SITE_NAME . " - " . CONF_SITE_TITLE,
      CONF_SITE_DESC,
      url(),
      theme("/assets/images/share.jpg")
    );

    echo $this->view->render("views/Categories/index", [
      "head" => $head,
      "ListCategories" => $ListCategories
    ]);
  }

  public function registerCategory(): void
  {
    $head = $this->seo->render(
      "Cadastrar Categoria - " . CONF_SITE_NAME . " - " . CONF_SITE_TITLE,
      CONF_SITE_DESC,
      url(),
      theme("/assets/images/share.jpg")
    );

    echo $this->view->render("views/Categories/register_category", [
      "head" => $head
    ]);
  }

  public function changeCategory(array $data): void
  {
    $categoryService = new CategoriesService();

    $categoryService->ValidateCompanyCategory($data["id"]);

    if (!$categoryService->ValidateCompanyCategory($data["id"])) {
      $this->message->warning("Você tentou acessar uma categoria que não está vinculada a sua empresa!")->flash();
      redirect("/app/categories");
    }

    $category = $categoryService->ListOne($data["id"]);

    $head = $this->seo->render(
      "Alterar Categoria - " . CONF_SITE_NAME . " - " . CONF_SITE_TITLE,
      CONF_SITE_DESC,
      url(),
      theme("/assets/images/share.jpg")
    );

    echo $this->view->render("views/Categories/change_category", [
      "head" => $head,
      "category" => $category
    ]);
  }

  public function create(?array $data): void
  {
    $categoryService = new CategoriesService();

    $categoryService->CreateCategory($data);

    $this->message->success("Categoria cadastrada com sucesso.")->flash();
    $json["redirect"] = url("/app/categories");

    echo json_encode($json);
    return;
  }

  public function update(?array $data): void
  {
    $categoryService = new CategoriesService();

    if (!$categoryService->ValidateCompanyCategory($data["id"])) {
      $this->message->warning("Você tentou atualizar uma categoria que não está vinculada a sua empresa!")->flash();
      $json["reload"] = url("/app/categories");
      echo json_encode($json);
      return;
    }

    $categoryService->UpdateCategory($data);

    $this->message->success("Categoria alterada com sucesso.")->flash();
    $json["redirect"] = url("/app/categories/update/{$data["id"]}");
    echo json_encode($json);
    return;
  }

  public function delete(?array $data): void
  {
    $categoryService = new CategoriesService();

    if (!$categoryService->ValidateCompanyCategory($data["id"])) {
      $this->message->warning("Você tentou deletar uma categoria que não está vinculada a sua empresa!")->flash();
      $json["reload"] = url("/app/categories");
      echo json_encode($json);
      return;
    }

    $categoryService->DeleteCategory($data["id"]);

    $this->message->success("Categoria deletada com sucesso.")->flash();
    echo json_encode(["reload" => true]);
    return;
  }

}
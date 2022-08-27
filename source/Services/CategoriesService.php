<?php

namespace Source\Services;

use Source\Models\Auth;
use Source\Models\tables\T005Categories;
use Source\Support\Thumb;
use Source\Support\Upload;

class CategoriesService
{

  public function ListAll()
  {
    $company = Auth::company();

    $categories = (new T005Categories())->find("company_id = :company_id or company_id is null", "company_id={$company->id}")->order("category_name")->fetch(true);
    return $categories;
  }

  public function ListOne(int $id)
  {
    $categories = (new T005Categories())->findById($id);

    return $categories;
  }

  public function CreateCategory(?array $data)
  {
    $data = filter_var_array($data, FILTER_SANITIZE_STRIPPED);

    $t005_categories_create = new T005Categories();

    $t005_categories_create->category_name = $data["category_name"];
    $t005_categories_create->description = $data["description"];
    $t005_categories_create->status = $data["status"];
    $t005_categories_create->company_id = Auth::company()->id;

    if (!empty($_FILES["photo"])) {
      $file = $_FILES["photo"];
      $upload = new Upload();
      $image = $upload->image($file, generate_code(10), 1000);

      if (!$image) {
        $json["message"] = $upload->message()->render();
        echo json_encode($json);
        return $json;
      }

      $t005_categories_create->photo = $image;
    }

    $t005_categories_create->save();

    return $t005_categories_create;
  }

  public function UpdateCategory(?array $data)
  {
    $data = filter_var_array($data, FILTER_SANITIZE_STRIPPED);

    $t005_categories_update = (new T005Categories())->findById($data["id"]);

    $t005_categories_update->category_name = $data["category_name"];
    $t005_categories_update->description = $data["description"];
    $t005_categories_update->status = $data["status"];

    if (!empty($_FILES["photo"])) {
      if ($t005_categories_update->photo && file_exists(__DIR__ . "/../../" . CONF_UPLOAD_DIR . "/{$t005_categories_update->photo}")) {
        unlink(__DIR__ . "/../../" . CONF_UPLOAD_DIR . "/{$t005_categories_update->photo}");
        (new Thumb())->flush($t005_categories_update->photo);
      }

      $files = $_FILES["photo"];
      $upload = new Upload();
      $image = $upload->image($files, generate_code(10), 600);

      if (!$image) {
        $json["message"] = $upload->message()->render();
        echo json_encode($json);
        return;
      }

      $t005_categories_update->photo = $image;
    }

    $t005_categories_update->save();

    return $t005_categories_update;
  }

  public function DeleteCategory(int $id)
  {
    $categoryDelete = (new T005Categories())->findById($id);

    if ($categoryDelete->photo && file_exists(__DIR__ . "/../../" . CONF_UPLOAD_DIR . "/{$categoryDelete->photo}")) {
      unlink(__DIR__ . "/../../" . CONF_UPLOAD_DIR . "/{$categoryDelete->photo}");
      (new Thumb())->flush($categoryDelete->photo);
    }
    $categoryDelete->destroy();

    return $categoryDelete;
  }

  public function ValidateCompanyCategory(int $id): bool
  {
    $category = (new T005Categories())->findById($id);

    if ($category->company_id != Auth::company()->id) {
      return false;
    } else {
      return true;
    }
  }

  public function SearchDuplicateCategory(string $category_name): bool
  {
    $company = Auth::company();
    $category = (new T005Categories())
      ->find("category_name = :category_name and company_id = :company_id", "category_name={$category_name}&company_id={$company->id}")
      ->fetch();

    if ($category) {
      return false;
    } else {
      return true;
    }
  }

  public function FetchDuplicateCategoryForUpdate(string $category_name, int $category_id)
  {
    $company = Auth::company();
    $category = (new T005Categories())
      ->find("category_name = :category_name and company_id = :company_id and id != :id", "category_name={$category_name}&company_id={$company->id}&id={$category_id}")
      ->fetch();

      if ($category) {
        return true;
      } else {
        return false;
      }
  }

}
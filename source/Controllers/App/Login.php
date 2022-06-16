<?php

namespace Source\Controllers\App;

use Source\Core\Controller;

class Login extends Controller
{
  public function __construct()
  {
    parent::__construct(__DIR__ . "/../../../themes/" . CONF_VIEW_APP . "/");
  }

  public function index()
  {
    $head = $this->seo->render(
      "Login App - " . CONF_SITE_NAME . " - " . CONF_SITE_TITLE,
      CONF_SITE_DESC,
      url(),
      theme("/assets/images/share.jpg")
    );

    echo $this->view->render("views/Login/index", [
      "head" => $head
    ]);
  }

  public function validadeLogin(?array $data): void
  {

    $this->message->success("Autenticado com sucesso!")->flash();
    echo json_encode(["reload" => true]);
    return;
//    $json["redirect"] = url("/app");
//
//    echo json_encode($json);
//    return;

  }

}
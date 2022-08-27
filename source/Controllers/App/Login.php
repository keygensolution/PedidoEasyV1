<?php

namespace Source\Controllers\App;

use Source\Core\Controller;
use Source\Models\Auth;

class Login extends Controller
{
  public function __construct()
  {
    parent::__construct(__DIR__ . "/../../../themes/" . CONF_VIEW_APP . "/");
  }

  public function index()
  {
    $user = Auth::user();

    if ($user && $user->acces_level_id != 3) {
      redirect("/app");
    }

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

    if (!empty($data['csrf'])) {
      if (!csrf_verify($data)) {!
        $json['message'] = $this->message->error("Erro ao enviar, favor use o formulário")->render();
        echo json_encode($json);
        return;
      }

      if (request_limit("weblogin", 3, 60 * 5)) {
        $json['message'] = $this
          ->message
          ->error("Você já efetuou 3 tentativas, esse é o limite. Por favor, 
          aguarde 5 minutos para tentar novamente!")->render();
        echo json_encode($json);
        return;
      }

      if (empty($data['email']) || empty($data['password'])) {
        $json['message'] = $this->message->warning("Informe seu email e senha para entrar")->render();
        echo json_encode($json);
        return;
      }

      $save = (!empty($data['save']) ? true : false);
      $auth = new Auth();
      $login = $auth->login($data['email'], $data['password'], $save);

      if ($login) {
        $this->message->success("Seja bem-vindo(a) de volta " . Auth::user()->name . "!")->flash();
        $json['redirect'] = url("/app");
      } else {
        $json['message'] = $auth->message()->before("Ooops! ")->render();
      }

      echo json_encode($json);
      return;
    }

  }

}
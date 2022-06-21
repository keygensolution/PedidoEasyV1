<?php

namespace Source\Controllers\App;

use Source\Core\Controller;
use Source\Core\Session;
use Source\Models\Auth;
use Source\Models\views\VW001ListOfCompany;

class App extends Controller
{
  public function __construct()
  {
    parent::__construct(__DIR__ . "/../../../themes/" . CONF_VIEW_APP . "/");

    if (!$this->user = Auth::user()) {
      $this->message->warning("Efetue login para acessar o APP.")->flash();
      redirect("/app/login");
    }

    $this->company = Auth::company();
  }

  public function index(): void
  {
    $companies = (new VW001ListOfCompany())->find("user_id = :a", "a={$this->user->id}", "company_id, company_name")->fetch(true);

    $head = $this->seo->render(
      "Home - " . CONF_SITE_NAME . " - " . CONF_SITE_TITLE,
      CONF_SITE_DESC,
      url(),
      theme("/assets/images/share.jpg")
    );

    echo $this->view->render("views/App/index", [
      "head" => $head,
      "companies" => $companies,
      "company_id" => $this->company->id
    ]);
  }

  public function changeCompany($data)
  {
    $session = new Session();

    $session->unset("company");
    $session->set("company", $data["company_id"]);

    $this->message->success("Empresa Selecionada")->flash();
    echo json_encode(["reload" => true]);
    return;
  }
}
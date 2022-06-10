<?php

namespace Source\Controllers\App;

use Source\Core\Controller;

class App extends Controller
{
  public function __construct()
  {
    parent::__construct(__DIR__ . "/../../../themes/" . CONF_VIEW_APP . "/");
  }

  public function index(): void
  {
    $head = $this->seo->render(
      "Home - " . CONF_SITE_NAME . " - " . CONF_SITE_TITLE,
      CONF_SITE_DESC,
      url(),
      theme("/assets/images/share.jpg")
    );

    echo $this->view->render("views/App/index", [
      "head" => $head
    ]);
  }
}
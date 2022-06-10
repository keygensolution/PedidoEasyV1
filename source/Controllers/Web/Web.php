<?php

namespace Source\Controllers\Web;

use Source\Core\Controller;

class Web extends Controller
{
    public function __construct()
    {
        parent::__construct(__DIR__ . "/../../../themes/" . CONF_VIEW_WEB . "/");
    }

    public function index(): void
    {
        $head = $this->seo->render(
            "Home - " . CONF_SITE_NAME . " - " . CONF_SITE_TITLE,
            CONF_SITE_DESC,
            url(),
            theme("/assets/images/share.jpg")
        );

        echo $this->view->render("views/Web/index", [
            "head" => $head
        ]);
    }
}
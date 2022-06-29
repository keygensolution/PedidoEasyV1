<?php

namespace Source\Models\tables;

use Source\Core\Model;

class T005Categories extends Model
{
  public function __construct()
  {
    parent::__construct("t005_categories", ["id"], ["category_name", "description", "status"]);
  }
}
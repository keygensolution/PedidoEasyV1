<?php

namespace Source\Models\tables;

use Source\Core\Model;

class T001AccessLevel extends Model
{
  public function __construct()
  {
    parent::__construct("t001_access_levels", ["id"], ["level"]);
  }
}
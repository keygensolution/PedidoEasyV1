<?php

namespace Source\Models\views;

use Source\Core\Model;

class VW001ListOfCompany extends Model
{
  public function __construct()
  {
    parent::__construct("vw001_list_of_companies", ["id"], ["user_id", "company_id", "name", "company_name"]);
  }
}
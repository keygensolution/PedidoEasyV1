<?php

namespace Source\Models\tables;

use Source\Core\Model;

class T003Company extends Model
{
public function __construct()
{
  parent::__construct("t003_companies", ["id"], ["company_name", "cnpj", "zip_code", "uf", "city", "district", "address"]);
}
}
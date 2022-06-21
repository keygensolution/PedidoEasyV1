<?php

namespace Source\Models\tables;

use Source\Core\Model;

class T002User extends Model
{
  public function __construct()
  {
    parent::__construct("t002_users", ["id"], ["name", "email", "password", "access_level_id", "phone", "birth_date", "cpf"]);
  }

  public function findByEmail(string $email, string $columns = "*"): ?T002User
  {
    $find = $this->find("email = :email", "email={$email}", $columns);
    return $find->fetch();
  }
}
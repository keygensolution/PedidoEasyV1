<?php

namespace Source\Models;

use Source\Core\Model;
use Source\Core\Session;
use Source\Core\View;
use Source\Models\tables\T002User;
use Source\Models\tables\T003Company;
use Source\Models\views\VW001ListOfCompany;
use Source\Support\Email;

class Auth extends Model
{

  public function __construct()
  {
    parent::__construct("users", ["id"], ["email", "password"]);
  }

  public static function user(): ?T002User
  {
    $session = new Session();
    if (!$session->has("authUser")) {
      return null;
    }

    return (new T002User())->findById($session->authUser);
  }

  public static function company(): ?T003Company
  {
    $session = new Session();
    if (!$session->has("company")) {
      return null;
    }

    return (new T003Company())->findById($session->company);
  }

  public static function logout(): void
  {
    $session = new Session();
    $session->unset("authUser");
  }

  public function register(T002User $user): bool
  {
    if (!$user->save()) {
      $this->message = $user->message;
      return false;
    }

    $view = new View(__DIR__ . "/../../shared/views/email");
    $message = $view->render("confirm", [
      "first_name" => $user->name,
      "confirm_link" => url("/thanks/" . base64_encode($user->email))
    ]);

    (new Email())->bootstrap(
      "Ative sua conta no " . CONF_SITE_NAME,
      $message,
      $user->email,
      "{$user->name}"
    )->send();

    return true;
  }

  public function attempt(string $email, string $password): ?T002User
  {
    if (!is_email($email)) {
      $this->message->warning("O e-mail informado não é válido");
      return null;
    }

    if (!is_passwd($password)) {
      $this->message->warning("A senha informada não é válida");
      return null;
    }

    $user = (new T002User())->findByEmail($email);

    if (!$user) {
      $this->message->error("O e-mail informado não está cadastrado");
      return null;
    }

    if (!passwd_verify($password, $user->password)) {
      $this->message->error("A senha informada não confere");
      return null;
    }

    if ($user->access_level_id == 3) {
      $this->message->error("Desculpe, mas você não tem permissão para logar-se aqui");
      return null;
    }

    if (passwd_rehash($user->password)) {
      $user->password = $password;
      $user->save();
    }

    return $user;
  }

  public function login(string $email, string $password, bool $save = false): bool
  {
    $user = $this->attempt($email, $password);
    if (!$user) {
      return false;
    }

    if ($save) {
      setcookie("authEmail", $email, time() + 604800, "/");
    } else {
      setcookie("authEmail", null, time() - 3600, "/");
    }

    $company = (new VW001ListOfCompany())->find("user_id = :a", "a={$user->id}", "company_id")->fetch();

    //COMPANY
    (new Session())->unset("company");
    (new Session())->set("company", $company->company_id);

    //LOGIN
    (new Session())->set("authUser", $user->id);
    return true;
  }

  public function forget(string $email): bool
  {
    $user = (new T002User())->findByEmail($email);

    if (!$user) {
      $this->message->warning("O e-mail informado não está cadastrado.");
      return false;
    }

    $user->forget = md5(uniqid(rand(), true));
    $user->save();

    $view = new View(__DIR__ . "/../../shared/views/email");
    $message = $view->render("forget", [
      "first_name" => $user->first_name,
      "forget_link" => url("/recover/{$user->email}|{$user->forget}")
    ]);

    (new Email())->bootstrap(
      "Recupere sua senha no " . CONF_SITE_NAME,
      $message,
      $user->email,
      "{$user->first_name} {$user->last_name}"
    )->send();

    return true;
  }

  public function reset(string $email, string $code, string $password, string $passwordRe): bool
  {
    $user = (new T002User())->findByEmail($email);

    if (!$user) {
      $this->message->warning("A conta para recuperação não foi encontrada.");
      return false;
    }

    if ($user->forget != $code) {
      $this->message->error("Desculpe, mas o código de verificação não é válido.");
      return false;
    }

    if (!is_passwd($password)) {
      $min = CONF_PASSWD_MIN_LEN;
      $max = CONF_PASSWD_MAX_LEN;
      $this->message->info("Sua senha deve ter entre {$min} e {$max} caracteres.");
      return false;
    }

    if ($password != $passwordRe) {
      $this->message->warning("Você informou duas senhas diferentes.");
      return false;
    }

    $user->password = $password;
    $user->forget = null;
    $user->save();
    return true;
  }

}
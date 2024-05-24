<?php

declare (strict_types=1);

function get_username(object $pdo, string $username)
{
  $query = "SELECT username FROM users WHERE username = :username;";
  $stmt = $pdo->prepare($query);
  $stmt -> bindParam(":username", $username);
  $stmt-> execute();

  $result = $stmt -> fetch (PDO::FETCH_ASSOC);
  return $result;
}

function get_email(object $pdo, string $email)
{
  $query = "SELECT username FROM users WHERE email = :email;";
  $stmt = $pdo->prepare($query);
  $stmt -> bindParam(":email", $email);
  $stmt-> execute();

  $result = $stmt -> fetch (PDO::FETCH_ASSOC);
  return $result;
}

function set_user(object $pdo, string $firstname, string $lastname, string $username, string $pwd, string $email)
{
  $query = "INSERT INTO users (firstname, lastname, username, pwd, email) VALUES (:firstname, :lastname, :username, :pwd, :email);";
  $stmt = $pdo->prepare($query);
  $stmt -> bindParam(":firstname", $firstname);
  $stmt -> bindParam(":lastname", $lastname);
  $stmt -> bindParam(":username", $username);
  $stmt -> bindParam(":pwd", $pwd);
  $stmt -> bindParam(":email", $email);
  $stmt-> execute();
}
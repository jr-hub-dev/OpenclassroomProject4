<?php
  function isAdminAccess() {
      $isAdmin = array_key_exists('userLogin', $_SESSION) && $_SESSION['userLevel'] == 'admin';
      return $isAdmin;
  }

  function getRole() {
      $role = "";

      if (array_key_exists('userLevel', $_SESSION)) {
          //Si l'utilisateur est bien administrateur
          if ($_SESSION['userLevel'] === "admin") {
              $role = "admin";
          } else if ($_SESSION['userLevel'] === "user") {
              $role = "user";
          }
      }

      return $role;
  }
?>
<?php

namespace App\Support;

use App\Pages\PagesModel;
use PDO;

class AuthService
{
    public function __construct(protected PDO $pdo)
    {
    }

    protected function ensureSession()
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
    }

    public function ensureLogin()
    {
        $this->ensureSession();
        if (isset($_SESSION['adminLogin'])) {
            $username = (string) $_SESSION['adminLogin'];

            $stmt = $this->pdo->prepare('SELECT * FROM `users` WHERE `username` = :username');
            $stmt->bindValue(':username', $username);
            $stmt->setFetchMode(PDO::FETCH_CLASS, AuthServiceUser::class);
            $stmt->execute();
            $user = $stmt->fetch();

            if (!empty($user)) {
                // Es gibt eine Session, und der Benutzerist noch in der Datenbank
                return;
            }
        }

        // Benutzer nicht eingeloggt
        header("Locatin: ./?route=admin/login");
        die();
    }


    public function handleLogin(string $username, string $password): bool
    {
        $stmt = $this->pdo->prepare('SELECT * FROM `users` WHERE `username` = :username');
        $stmt->bindValue(':username', $username);
        $stmt->setFetchMode(PDO::FETCH_CLASS, AuthServiceUser::class);
        $stmt->execute();
        $user = $stmt->fetch();

        $passwordOk = password_verify($password, $user->password);

        if ($passwordOk === true) {
            $this->ensureSession();
            session_regenerate_id();
            $_SESSION['adminLogin'] = $username;
            $_SESSION['adminLoginTimestamp'] = time();
            return true;
        } else {
            return false;
        }
    }


    public function logout()
    {
        $this->ensureSession();
        unset($_SESSION['adminLogin']);
        // session_destroy();
    }
}

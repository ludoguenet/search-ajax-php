<?php

namespace Src\Auth;

use Src\Database\DatabaseConnectorInteface;

class DatabaseAuth
{
    private $database;

    public function __construct(DatabaseConnectorInteface $database)
    {
        $this->database = $database;
    }

    public function login(string $username, string $password)
    {
        $req = $this->database->getConnector()->prepare('SELECT * FROM users WHERE username = ?');
        $req->execute([$username]);
        $user = $req->fetch();
        if ($user) {
            if (password_verify($password, $user->password)) {
                $this->setLoggedUser($user);
                return true;
            }
        }
        return false;
    }

    public function setLoggedUser($user)
    {
        $this->ensureStarted();
        $_SESSION['auth'] = $user;
    }

    public function isLogged()
    {
        $this->ensureStarted();
        return isset($_SESSION['auth']);
    }

    protected function ensureStarted()
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
    }
}

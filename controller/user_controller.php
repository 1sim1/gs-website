<?php
session_start();
require(__DIR__ . "/../db/db.php");
require(__DIR__ . "/../model/User_entity.php");
class UserController
{
    public function actionGetAllUsers()
    {
        try {
            $userModel = new UserEntity();
            $lista = $userModel->findAllUsers();

            $ret['cod'] = 0;
            $ret['dat'] = $lista;
            $ret['msg'] = '';
            if ($lista === []) {
                $ret['msg'] = 'Nessun utente registrato';
            }
        } catch (Exception $e) {
            $ret['cod'] = 1;
            $ret['dat'] = null;
            $ret['msg'] = 'Problemi nel caricamento lista utenti. ERRORE ' . $e->getMessage();
        }

        echo json_encode($ret);
    }
    public function actionPostLoginUser($user_name)
    {
        try {
            $userModel = new UserEntity();
            $user_found = $userModel->findUserByUsername($user_name);
            if ($user_found) {
                if (($user_found->username === $_POST['username']) && ($user_found->password === $_POST['password'])) {
                    $_SESSION['userLoggedIn'] = true;
                    $_SESSION['name'] = $user_found->name;
                    $_SESSION['surname'] = $user_found->surname;
                    $_SESSION['email'] = $user_found->email;
                    $_SESSION['username'] = $user_found->username;
                    $_SESSION['password'] = $user_found->password;
                    $ret['cod'] = 0;
                    $ret['dat'] = $user_found;
                    $ret['msg'] = "";
                } else {
                    $ret['cod'] = 1;
                    $ret['dat'] = null;
                    $ret['msg'] = 'Credenziali errate';
                }
            } else {
                $ret['cod'] = 1;
                $ret['dat'] = null;
                $ret['msg'] = 'Nessun utente trovato con l\'username fornito';
            }
        } catch (Exception $e) {
            $ret['cod'] = 1;
            $ret['dat'] = null;
            $ret['msg'] = $e->getMessage();
        }
        echo json_encode($ret);
    }
    public function actionPostAddUser()
    {
        $name = $_POST['name'];
        $surname = $_POST['surname'];
        $email = $_POST['email'];
        $user_name = $_POST['username'];
        $password = $_POST['password'];
        try {
            $userModel = new UserEntity();
            $user = $userModel->findUserByUsername($user_name);
            if ($user) {
                $ret['cod'] = 1;
                $ret['msg'] = 'Esiste già un utente con username uguale a quello inserito';
            } else {
                $email = strtolower($email);
                $userModel->addUser($name, $surname, $email, $user_name, $password);
                $ret['cod'] = 0;
                $ret['msg'] = 'Utente registrato con successo';
            }
        } catch (Exception $e) {
            $ret['cod'] = 1;
            $ret['msg'] = 'ERRORE: ' . $e->getMessage();
        }
        echo json_encode($ret);
    }
    public function actionPostLogoutUser()
    {
        try {
            $userModel = new UserEntity();
            $user_found = $userModel->findUserByUsername($_SESSION['username']);
            if ($user_found) {
                $ret['cod'] = 0;
                $ret['dat'] = $user_found;
                $ret['msg'] = 'Effettuo il logout dall\' utenza ' . $_SESSION['username'] . '...';
                $_SESSION['userLoggedIn'] = false;
            } else {
                $ret['cod'] = 1;
                $ret['dat'] = null;
                $ret['msg'] = 'Errore nel logout';
            }
        } catch (Exception $e) {
            $ret['cod'] = 1;
            $ret['dat'] = null;
            $ret['msg'] = $e->getMessage();
        }
        echo json_encode($ret);
    }
    public function actionPostUpdateUser()
    {
        if (isset($_SESSION['username'])) {
            $nameUpd = $_POST['name'];
            $surnameUpd = $_POST['surname'];
            $emailUpd = $_POST['email'];
            $user_nameUpd = $_POST['username'];
            $passwordUpd = $_POST['password'];
            try {
                $userModel = new UserEntity();
                $checkNewUsername = $userModel->findUserByUsername($user_nameUpd); {
                    if ($checkNewUsername) {
                        $ret['cod'] = 1;
                        $ret['dat'] = null;
                        $ret['msg'] = 'Esiste già un utente con l\'username inserito';
                    } else {
                        $userToUpdate = $userModel->findUserByUsername($_SESSION['username']);
                        if ($userToUpdate) {
                            $emailUpd = strtolower($emailUpd);
                            $userToUpdate = $userModel->updateUser($nameUpd, $surnameUpd, $emailUpd, $user_nameUpd, $passwordUpd, $_SESSION['username']);
                            $ret['cod'] = 0;
                            $ret['msg'] = 'Utente aggiornato con successo';
                            $_SESSION['name'] = $nameUpd;
                            $_SESSION['surname'] = $surnameUpd;
                            $_SESSION['email'] = $emailUpd;
                            $_SESSION['username'] = $user_nameUpd;
                            $_SESSION['password'] = $passwordUpd;
                        } else {
                            $ret['cod'] = 1;
                            $ret['dat'] = null;
                            $ret['msg'] = 'Aggiornamento utente non andato a buon fine';
                        }
                    }
                }
            } catch (Exception $e) {
                $ret['cod'] = 1;
                $ret['dat'] = null;
                $ret['msg'] = $e->getMessage();
            }
        }

        echo json_encode($ret);
    }
}

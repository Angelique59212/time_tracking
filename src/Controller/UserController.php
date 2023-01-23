<?php
namespace App\Controller;

use App\Controller\AbstractController;
use RedBeanPHP\R;
use RedBeanPHP\RedException\SQL;

class UserController extends AbstractController
{

    /**
     * Default method if no action provided in the Url.
     * @return void
     */
    public function index()
    {
        $this->render('user/register');
    }

    /**
     * @throws SQL
     */
    public function register()
    {
        self::render('user/register');

        if (isset($_POST['submit'])) {
            if (self::formIsset('email', 'firstname', 'lastname', 'password', 'password-repeat')) {
                $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
                $firstname = $this->dataClean($this->getFormField('firstname'));
                $lastname = $this->dataClean($this->getFormField('lastname'));
                $password = $this->dataClean($this->getFormField('password'));
                $passwordRepeat = $this->dataClean($this->getFormField('password-repeat'));

                if ($password !== $passwordRepeat) {
                    header('Location: /?c=user&a=register');
                    exit();
                }

                $user = R::findOne('user','firstname=?', [$firstname]);
                $user = R::findOne('user', 'lastname', [$lastname]);
                $user = R::findOne('user', 'email', [$email]);

                if (null === $user) {
                    $user = R::dispense('user');
                    $user->userFirstname = $firstname;
                    $user->userLastname = $lastname;
                    $email->userEmail = $email;
                    $user->userPassword = password_hash($password, PASSWORD_ARGON2I);

                    R::store($user);
                }else {
                    header('Location: /?c=user&a=register');
                    exit();
                }

                header('Location: /?c=user&a=login');
            }
        }
//        self::redirectIfConnected();
//
//        if($this->verifyFormSubmit()) {
//            $user = R::dispense('user');
//            $user->userMail = $this->dataClean($this->getFormField('email'));
//            $user->userFirstname = $this->dataClean($this->getFormField('firstname'));
//            $user->userLastname = $this->dataClean($this->getFormField('lastname'));
//            $user->userPassword = $_POST['password'];
//            $user->userPasswordRepeat = $_POST['password-repeat'];
//
//            $errors = [];
//            $mail = filter_var($user->userMail, FILTER_SANITIZE_EMAIL);
//            if(!filter_var($user->userMail, FILTER_VALIDATE_EMAIL)) {
//                $errors[] = "L'adresse mail n'est pas valide";
//            }
//
//            if($this->checkPassword($_POST['password'], $_POST['password-repeat'])) {
//                $password = password_hash($_POST['password'], PASSWORD_ARGON2I);
//                $insertId = R::store($user);
//            }
//            else {
//                $_SESSION['error'] = "Les password ne correspondent pas.";
//                header("Location: /?c=user");
//                exit();
//            }
//
//            if(count($errors) > 0) {
//                $_SESSION['errors'] = $errors;
//            }
//            $this->render('user/login');
//            exit();
//        }
//        $this->render('user/register');
    }

    /**
     * @return void
     */
    public function login()
    {
        if (isset($_POST['submit'])) {
            if (!$this->formIsset('email', 'password')) {
                $_SESSION['error'] = 'Un champ est manquant';
                header("Location: /?c=user&a=login");
                die();
            }
        }
        $this->render('user/login');
    }

    /**
     * Manage user logout.
     * @return void
     */
    public function disconnect(): void
    {
        // Keeping messages if any
        $error = $_SESSION['error'] ?? null;
        $success = $_SESSION['success'] ?? null;

        $_SESSION['user'] = null;
        session_unset();
        session_destroy();

        // Restart session to be able to use messages in session.
        session_start();

        // Setting again existing messages into the session.
        if($error) {
            $_SESSION['error'] = $error;
        }

        if($success) {
            $_SESSION['success'] = $success;
        }

        header("Location: /index.php");
    }
}

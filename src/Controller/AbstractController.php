<?php

namespace App\Controller;

abstract class AbstractController
{
    abstract public function index();

    /**
     * @param string $template
     * @param array $data
     * @return void
     */
    public function render(string $template, array $data = [])
    {
        ob_start();
        require __DIR__ . "/../../View/" . $template . ".html.php";
        $html = ob_get_clean();
        require __DIR__ . "/../../View/base.html.php";
        exit;
    }

    /**
     * @param ...$inputNames
     * @return bool
     */
    public function formIsset(...$inputNames): bool
    {
        foreach ($inputNames as $name) {
            if (!isset($_POST[$name])) {
                return false;
            }
        }
        return true;
    }

    /**
     *Return a form field value or default
     * @param string $field
     * @param $default
     * @return mixed|string
     */
    public function getFormField(string $field, $default = null)
    {
        if (!isset($_POST[$field])) {
            return (null === $default) ? '' : $default;
        }

        return $_POST[$field];
    }

    /**
     * @return bool
     */
    public static function verifyUserConnect(): bool
    {
        return isset($_SESSION['user']) && null !== ($_SESSION['user'])->getId();
    }

    /**
     * @return void
     */
    public function redirectIfConnected(): void
    {
        if (self::verifyUserConnect()) {
            $this->render('home/home');
        }
    }

    /**
     * @return void
     */
    public function redirectIfNotConnected(): void
    {
        if (self::verifyUserConnect()) {
            $this->render('user/login');
        }
    }

    /**
     * check if the form is submitted
     * @return bool
     */
    public function verifyFormSubmit(): bool
    {
        return isset($_POST['submit']);
    }

    /**
     * @param string $password
     * @param string $password_repeat
     * @return bool
     */
    public function checkPassword(string $password, string $password_repeat): bool
    {
        $same = $password === $password_repeat;
        $lenght = strlen($password) >= 7 && strlen($password) <= 150;

        return $same && $lenght;
    }

    /**
     * sanitize data
     * @param $data
     * @return string
     */
    public function dataClean($data): string
    {
        $data = trim(strip_tags($data));
        $data = stripslashes($data);
        return htmlspecialchars($data);
    }

    /**
     * sanitize data for html database inserts.
     * @param $data
     * @return string
     */
    public function dataCleanHtmlContent($data): string
    {
        $allowedTags = [
            'p', 'div', 'small', 'ul', 'ol', 'li', 'table', 'th', 'td', 'tr', 'tbody', 'thead', 'span', 'strong', 'em',
            'pre', 'blockquote', 'i', 'u', 'h1', 'h2', 'h3', 'h4', 'h5', 'h6', 'a'
        ];

        $data = html_entity_decode($data, ENT_QUOTES, 'utf8');
        $data = strip_tags($data, $allowedTags);

        // Replace JavaScript events on attributes (onclick, onClick, onkeyup, ......).
        preg_replace('/(<.+?)(?<=\s)on[a-z]+\s*=\s*(?:([\'"])(?!\2).+?\2|(?:\S+?\(.*?\)(?=[\s>])))(.*?>)/i', "$1 $3", $data);
        return htmlentities($data);
    }
}

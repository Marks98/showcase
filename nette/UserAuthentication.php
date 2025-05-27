<?php

namespace App\Front;

use Nette\Application\UI\Form;
use Nette\Security\AuthenticationException;
use Nette\Security\IAuthenticator;
use Nette\Security\Identity;
use Nette\Security\User;

/**
 * Třída pro zpracování přihlášení uživatele.
 * Počítá s tím, že User má nastaveného Authenticatora
 */

class UserAuthentication
{
    private $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function createLoginForm(): Form
    {
        // Vytvoření přihlašovací formuláře a validace vstupních hodnot
        $form = new Form;
        $form->addText("email", "Email")
            ->setHtmlAttribute('placeholder','var@email.cz')
            ->addRule(FORM::EMAIL, "Vyplňte prosím email ve správném tvaru")
            ->setRequired();
        $form->addPassword("password","Heslo")
            ->setRequired();
        $form->addCheckbox('remember', "Zapamatovat si přihlášení");
        $form->addSubmit("login","Přihlásit se");

        // Pro zabránění spamu přidána Recaptcha od Google
        $form->addReCaptcha('recaptcha',$label = 'Recaptcha', $required = TRUE, $message = 'Nejste člověk?');

        // Úspěšné odeslání formuláře zavolá metodu processLogin
        $form->onSuccess[] = array($this, 'processLogin');

        return $form;
    }

    public function processLogin(Form $form,\stdClass $values) : void
    {
        // Jestli uživatel zvolil, že chce zůstat přihlášen, nastavíme expiraci na 14 dní
        if($values->remember){
            $this->user->setExpiration('14 days');
        }else{
            $this->user->setExpiration('120 minutes');
        }

        try {
            $this->user->login($values->email, $values->password);

            // Ukázka rozlišení rolí uživatele
            if($this->user->isInRole('admin')){
                echo 'Přihlášen jako Admin';
                return;
            }

        } catch (AuthenticationException $e) {
            $form->addError($e->getMessage());
        }
    }
}
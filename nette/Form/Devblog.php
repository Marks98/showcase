<?php

namespace App\forms\Admin;

use Nette\Application\UI\Form;

/**
 * Továrna pro vytváření univerzálního formuláře
 * Univerzálně napsaná metoda pro vytváření formuláře, který podporuje editaci i přidávání nového článku
 */

class DevblogFormFactory
{
    public function CreateForm()
    {
        $form = new Form;
        // Přidání selectu s hodnotou 0 => Ne, 1 => Ano
        $form->addSelect('visible','Veřejný',[
           0 => 'Ne',
           1 => 'Ano'
        ]);
        $form->addText('slug','Slug')
            ->setRequired();
        $form->addText('img_url','Adresa obrázku');
        // Nastavím input textu, aby se choval jako date type
        $form->addText('published_at','Datum publikování')
            ->setType('date')
            ->setDefaultValue((new \DateTime)->format('Y-m-d'));
        // Pomocí container řeším CZ a EN verze, v presenteru je poté snažší zpracování
        $cs = $form->addContainer('cs');
        $cs->addText('title','Titulek')
            ->setRequired();
        $cs->addText('sub_title','Podtitulek');
        $cs->addTextArea('body','Tělo článku');

        $en = $form->addContainer('en');
        $en->addText('title','Titulek')
            ->setRequired();
        $en->addText('sub_title','Podtitulek');
        $en->addTextArea('body','Tělo článku');

        // Tlačítko k odeslání
        $form->addSubmit('submit','Přidat článek');

        return $form;
    }
}
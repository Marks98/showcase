<?php

namespace App\AdminModule\Presenters;

use App\Model\Admin\Devblog;
use Nette\Utils\Paginator;

/**
 * Ukázka administračního presenteru k vývojářským příspěvkům (DevBlog)
 * Presenter se stará o výpis, přidání, editaci a mazání příspěvků ve vývojářském blogu
 */

class DevblogPresenter extends BasePresenter
{
    private $database;

    /** @var \App\forms\Admin\Devblog @inject */
    public $devblogForm;

    public function __construct(Devblog $devblog) {
        // Předání reference na třídu, která se stará o komunikaci s databázi
        $this->database = $devblog;
    }

    public function renderIndex($page = 1) {
        // Výpis článků se stránkováním
        $paginator = new Paginator();
        $paginator->setItemsPerPage(10);
        $paginator->setPage($page);

        $this->template->articles = $this->database->getAllArticlesWithPaginator($paginator);
        $this->template->paginator = $paginator;
    }

    public function actionEdit($id) {
        // Načtení konkrétního článku přes třídu Devblog
        $article = $this->database->getArticleById($id);
        if ($article == null) $this->error();

        // Jelikož se jedná o vícejazyčný web, načtu všechny jazyky
        $cs = $this->database->getArticleLangById($id, 'cs');
        $en =$this->database->getArticleLangById($id, 'en');

        // Nastavím formuláři výchozí hodnoty
        $this['editForm']->setDefaults([
           'visible' => $article->visible,
           'slug' => $article->slug,
           'img_url' => $article->img_url,
           'published_at' => $article->published_at->format('Y-m-d'),
           'cs' => [
               'title' => $cs->title,
               'sub_title' => $cs->sub_title,
               'body' => $cs->body
           ],
            'en' => [
                'title' => $en->title,
                'sub_title' => $en->sub_title,
                'body' => $en->body
            ]
        ]);

        $this->template->article = $article;
        $this->template->id = $article->id;
    }

    //Formuláře

    protected function createComponentCreateForm() {
        // Vytváření formuláře a následné odchycení jeho zaslání
        $form = $this->devblogForm->CreateForm();
        $form->onSuccess[] = function ($form, $data){
            $this->database->insertArticle($data, $this->getUser()->id);
            $this->flashMessage('Devblog článek byl vložen úspěšně','bg-green-500');
            $form->getPresenter()->redirect(':Admin:Devblog:index');
        };

        return $form;
    }

    protected function createComponentEditForm() {
        // Vytvoření formuláře a jeho zpracování, tedy aktualizace článku
        $form = $this->devblogForm->CreateForm();
        $form->onSuccess[] = function ($form,$data){
            $id = $this->getParameter('id');
            $this->database->updateArticle($data, $id);
            $this->flashMessage('Devblog článek byl upraven úspěšně','bg-green-500');
            $form->getPresenter()->redirect(':Admin:Devblog:index');
        };

        return $form;
    }

    public function handleRemoveArticle($id) {
        // Akce mazání článku
        $this->database->deleteArticleById($id);
        $this->flashMessage('Devblog článek byl smazán úspěšně','bg-green-500');
        $this->redirect('Devblog:index');
    }

    public function handleChangeVisibility($id, $state) {
        // Akce na nastvení publikovaného / nepublikovaného článku
        $this->database->updateArticleVisibility($id, $state);
        $this->flashMessage('Viditelnost článku byla úspěšně aktualizována','bg-green-500');
        $this->redirect('Devblog:index');
    }
}
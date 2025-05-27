<?php

namespace App\Model\Admin;

use Nette;

/**
 * Třída Devblog k propojení s databází
 * Ukázka třídy, která je k dispozici pouze pro Administrativní části, aby z frontendu nešel provést například Update nebo Delete
 */

final class Devblog
{
    use Nette\SmartObject;

    private Nette\Database\Explorer $database;

    public function __construct(Nette\Database\Explorer $database) {
        // Injektování Nette\Database\Explorer pro práci s databází
        $this->database = $database;
    }

    // INSERT

    public function insertArticle($article, $user_id) {
        // Vkládání článků, nejdříve do tabulky devblogs, poté se řeší jazykové mutace
        $row = $this->database->table('devblogs')->insert([
            'visible' => $article->visible,
            'slug' => $article->slug,
            'user_id' => $user_id,
            'img_url' => $article->img_url,
            'published_at' => $article->published_at,
            'created_at' => (new \DateTime),
            'updated_at' => (new \DateTime)
        ]);

        $id = $row->id;
        $this->insertLangArticle($article['cs'],$id, 'cs');
        $this->insertLangArticle($article['en'],$id, 'en');
    }

    public function insertLangArticle($article,$id, $lang) {
        // Samotné vložení jazykové mutace, pouze CZ a EN
        $this->database->table('devblog_lang')->insert([
            'devblog_id' => $id,
            'lang' => $lang,
            'title' => $article->title,
            'sub_title' => $article->sub_title,
            'body' => $article->body
        ]);
    }

    // GET

    public function getAllArticlesWithPaginator($paginator) {
        // Vrátí všechny články rozdělené na stránky podle nastavení stránkovače
        return $this->database
            ->query('SELECT D.id, D.visible, DL.lang, DL.title, D.published_at, D.created_at, D.updated_at, DL.body, D.slug, D.img_url
                        FROM devblogs AS D JOIN devblog_lang AS DL ON D.id = DL.devblog_id GROUP BY D.id ORDER BY D.id desc LIMIT ? OFFSET ?',
                $paginator->getLength(), $paginator->getOffset())
            ->fetchAll();
    }

    public function getAllArticles() {
        // Vrátí všechny články bez omezení
        return $this->database
            ->query('SELECT D.id, D.visible, DL.lang, DL.title, D.published_at, D.created_at, D.updated_at, DL.body, D.img_url
                        FROM devblogs AS D JOIN devblog_lang AS DL ON D.id = DL.devblog_id GROUP BY D.id ORDER BY D.id desc')
            ->fetchAll();
    }

    public function getArticleById($id) {
        // Získá jeden konkrétní článek podle ID
        return $this->database
            ->query('SELECT D.id, D.slug, DL.lang, DL.title, D.published_at, D.created_at, D.updated_at, D.visible, D.img_url
                    FROM devblogs as D JOIN devblog_lang as DL on D.id = DL.devblog_id WHERE D.id = ?', $id)
            ->fetch();
    }

    public function getArticleLangById($id, $lang) {
        // Ke konkrétnímu článku načte i jazykovou mutaci podle požadované verze v proměnné lang
        return $this->database
            ->query('SELECT lang, title, sub_title, body FROM devblog_lang 
                        WHERE lang = ? AND devblog_id = ?', $lang, $id)
                ->fetch();
    }

    // UPDATE

    public function updateArticle($article, $id) {
        // Aktualizuje data v tabulce devblogs
        $this->database->query('UPDATE devblogs SET', [
            'visible' => $article->visible,
            'slug' => $article->slug,
            'img_url' => $article->img_url,
            'published_at' => $article->published_at,
            'updated_at' => (new \DateTime)
        ],'WHERE id = ?', $id);

        $this->updateLangArticle($article['cs'],$id, 'cs');
        $this->updateLangArticle($article['en'],$id, 'en');
    }

    public function updateLangArticle($article, $id, $lang) {
        // Aktualizuje data v jazykových mutacích
        $this->database->query('UPDATE devblog_lang SET', [
            'title' => $article->title,
            'sub_title' => $article->sub_title,
            'body' => $article->body
        ],'WHERE devblog_id = ? AND lang = ?',$id, $lang);
    }

    public function updateArticleVisibility($id, $state) {
        // Nastavení viditelnost článku podle zaslaného stavu
        $newState = $state == 1 ? 0 : 1;

        $this->database->query('UPDATE devblogs SET', [
            'visible' => $newState
        ], 'WHERE id = ?', $id);
    }

    // DELETE

    public function deleteArticleById($id) {
        // Smaže požadovaný článek, nejdříve jazykové verze a poté samotný článek z devblogs
        $this->database->query('DELETE FROM devblog_lang WHERE devblog_id = ?', $id);
        $this->database->query('DELETE FROM devblogs WHERE id = ?',$id);
    }
}
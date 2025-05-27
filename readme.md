# Showcase repozitář

Tento repozitář slouží jako ukázka mých dovedností v různých technologiích. Každá složka obsahuje konkrétní příklad projektu nebo části kódu.
Na svém github mám více projektů, které jsou ale neveřejné. V případě zájmu mě neváhejte kontaktovat – mohu vám udělit přístup.

# Seznam technologií

- [Laravel](https://github.com/Marks98/showcase/tree/master/laravel)
- [Nette](https://github.com/Marks98/showcase/tree/master/nette)

# Popis jednotlivých technologií

## Laravel

[Ukázka tohoto projektu](https://odvsehotrochu.cz/)

### PublishArticles

Volatelný cron příkaz, který po zavolání publikuje články, které jsou připraveny k publikování (mají vyplněné "published_at"). V případě, že je článek publikován, zašle se informace vyhledávačům přes technologii IndexNow.

### HomepageController

Controller pro hlavní stránku blogu. Pro zvýšení výkonu webu používám cache. Kód ukazuje použití Eloquentu, eager loadingu, řazení a základní optimalizační přístupy.

### KeywordsController

Controller pro správu klíčových slov v administraci. Kód ukazuje práci s validací,  resource routami (index, create, store, edit, update), přesměrováními a flash zprávami

## Nette

[Ukázka tohoto projektu](https://starboltgames.com/)

### DevblogPresenter

Presenter, který v administrativní části zajišťuje výpis, přidání, editaci a mazání článků (DevBlogu). Presenter také obsahuje továrny pro formuláře a akce pro mazání / úpravu viditelnosti článků.

### Devblog - Třída (admin – modelová vrstva)

Tato servisní třída zajišťuje CRUD operace pro DevBlog v administrační části systému. Třída používá `Nette\Database\Explorer` a je propojena pouze s `DevblogPresenterem` v administrační části.

### Devblog - Formulář

Jednoduchá továrna pro vytváření univerzálního formuláře pro správu článků v administrační části.

## PHP
(Obsah připravuji)

## Vue.js
(Obsah připravuji)

## jQuery
(Obsah připravuji)

## C#
(Obsah připravuji)

## C++
(Obsah připravuji)

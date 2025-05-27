# Showcase repozitář

Tento repozitář slouží jako ukázka mých dovedností v různých technologiích. Každá složka obsahuje konkrétní příklad projektu nebo části kódu.
Na svém github mám více projektů, které jsou ale neveřejné. V případě zájmu mě neváhejte kontaktovat – mohu vám udělit přístup.

# Seznam technologií

- [Laravel](https://github.com/Marks98/showcase/tree/master/laravel)
- [Nette](https://github.com/Marks98/showcase/tree/master/nette)
- [Vuejs](https://github.com/Marks98/showcase/tree/master/vuejs)

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

## Vue.js

### Komponenty

[Live demo ve Vue SFC Playground](https://play.vuejs.org/#eNqlV+9u2zYQf5WLMMzpENld1/aD5xbrnwzogG1FUxQDqn2gpbPNhiI1klLspHmEPUCRT32APsL2Jel77UiKkuykRbEGgS0d7368P7870mfJo6oaNzUm02Rmcs0r+zCTmZxMnkmecyb4KcsRXjIuTrgsnhwdQaUVlOrjv1IZC6q5uvj4DuXlB1jU8vjqbyflIFn18d3lh2PBCmgQXtUIRz8/geeCbZZa1bJwe+RKEoJtoY/85vAACpXXJUo7zjUyi4cC3dv+KHg3upXJbZOxQfvIWs3ntUVS0/noAEYraysznUzyQo6jfm7MOFelg+g2WSErxqyqkIJbcVHsb4Pf+rHNRlkpbaERzFgX7LEigSSADTyTVW0zyYOGf3sSV2GhVQmjMWVzKHYJH7XI8AKX3Fjt0nwDfCZx7YELXLBa2LNMAlAQYdlMwQtgZ18nOz9wnwWzbP9Wq6TR1lpGEwBcs7IS6G2nIGshwsq5t88k/c8mA1bMLJI+FYXenN5sL03h1eZYoxGeAzcEcABEBSwu3zuxxr9qrrFwJKoMQJpGpOv+hz/JSnyQJa2nKffJTvp1weYoSOEwKIT3oUKTlqrwKsNoe43owE6JSDybdOEmB4k1xNcFX47fGCWpW3wSs8SVggvUv1eWE5+zpKtIljAh1MkvXmZ1jb4e3maF+fEN8jdm7WRZ8pwSirrBLOnWLNNLJLfd8uHRb7im526RIqwFaX9m8QUaJWrnY1B7TE1Ibg/0vLeB51wuX5rDtUVpYlDO0Z5VWUIMdrn6VOi9uz+M70Y2URav94EbPFu0CqSKRPIFPyAaGLsRqmHy8h9ounlEHR05NCt4AzmZGSq1RoLjNHkWAtfACd+kOW2IGk7SBfEcVunre/er9Z9QpneyJJIg0KtlxtRuKsc999XzZdoy0n310p5lruEG2hRXjislCtS0uMPO6O5AKaVJIE3FtJseFZLDfl5ikYolVJv0zvgeVOv0Lixogpmpqq3gElNJ+YS50oSwG+HAmbhfNwAARsEoXWpG4Ldvt7itdC5qTO+RtOCGzQUW0/kyPVlRQkdT2EOtlW75M8SiBndGpOI1osL5wJOI5xIWHuPiJNYi5CoaLJTL33bSYzjcFVZ6P9nc05zmAC4sZcmqKr0DlfIqKTZuZoZk+Txzx9yUmA+WmiadM4MptTkRnw4mJ1EVy7ndELYvRjqslFmpEzl1O9A+Tvn197cdoz6lGHf4kgLByKv7qtz1qWzT1GexzRPA2VmYenDu57ZPHjFIEin5wjdDGLpZ0mXMg7dlIvZ/R1OeDLpR6OHim+urFslxG96+bcvaw6WlSO9DXmujKPKQ7K6pCKKKAIEy8O23/lwihJ9ywfNj72SpGnzqpQ//mE2qG6x3t92JYq+3mk3I6zAW2qfBMPcnWXeqbR+vYYI5mrkhuXMohVlJR/ZTXHC6HmE4xg5cMKqhwUSTgrjmrz4VK64ugIT5Sp3SHFupQirK3gTeoKGepS9vTfoNlzTVHLSH66Zo8KLrVTeGpnBEFx257Jou1rYf0HFER4PP27dhu2BdNiO3IoQfaq8YTYEvBhrcItpFz6avCaRf28F4rJRAJq87sWDC7IB48nwVQtuB/w+jPzuH/Ams2IRTrqZjDsUpQnl1IbltF2s4bW9L/ihvyxEKFS530Z/d251b3aoH3TijEyfM5qsukh53X+IJPXSYFOOKm7Fv/Afknlv0MIO0OCduNvsGS04397oiHZz2u9AFvTWIWL1nJR13Fos+LMrXc3VcF0CTs3HWZKtVIy/fX2uvq4sDuoLSb5PLDyWCmhu28pO5ph8VYeJ4RL6Afe9f7xHsUXSUqU8EvqN9g9doyYW+d8npX9GqgoWfS+w03H+9S3Vb7li1OPj6kHeyTn5t7UhXKXrfupkn5/8Biz2cdw==)

Jedná se o jednoduchou Vue ukázku používání vlastních komponent, která obsahuje dva ukázkové soubory. První soubor **App.vue** importuje univerzálně připravenou komponentu **InputComponent.vue**, do které lze zaslat jakékoliv dynamické údaje. Například **název pole**, **typ**, **jestli je pole povinné** a další údaje definové v props.  

## Tailwind
(Obsah připravuji)

## PHP
(Obsah připravuji)

## jQuery
(Obsah připravuji)

## C#
(Obsah připravuji)

## C++
(Obsah připravuji)

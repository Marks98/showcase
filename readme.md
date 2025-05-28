# Showcase repozitář

Tento repozitář slouží jako ukázka mých dovedností v různých technologiích. Každá složka obsahuje konkrétní příklad projektu nebo části kódu.
Na svém github mám více projektů, které jsou ale neveřejné. V případě zájmu mě neváhejte kontaktovat – mohu vám udělit přístup.

# Seznam technologií

- [Laravel](https://github.com/Marks98/showcase/tree/master/laravel)
- [Nette](https://github.com/Marks98/showcase/tree/master/nette)
- [Vuejs](https://github.com/Marks98/showcase/tree/master/vuejs)
- [Tailwind CSS](https://github.com/Marks98/showcase/tree/master/tailwind)

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

### UserAuthentication

Ukázka vlastního systému přihlašování. Třída obsahuje **vytvoření a validaci přihlašovacího formuláře**, podporu pro **zapamatování přihlášení** (*nastavení expirace*), ochranu proti spamu pomocí **Google reCAPTCHA** a základní **kontrolu uživatelských oprávnění** (*např. role admin*).

## Vue.js

### Komponenty

[Live demo ve Vue SFC Playground](https://play.vuejs.org/#eNqlV+9u2zYQf5WLMMzpENld1/aD5xbrnwzogG1FUxQDqn2gpbPNhiI1klLspHmEPUCRT32APsL2Jel77UiKkuykRbEGgS0d7368P7870mfJo6oaNzUm02Rmcs0r+zCTmZxMnkmecyb4KcsRXjIuTrgsnhwdQaUVlOrjv1IZC6q5uvj4DuXlB1jU8vjqbyflIFn18d3lh2PBCmgQXtUIRz8/geeCbZZa1bJwe+RKEoJtoY/85vAACpXXJUo7zjUyi4cC3dv+KHg3upXJbZOxQfvIWs3ntUVS0/noAEYraysznUzyQo6jfm7MOFelg+g2WSErxqyqkIJbcVHsb4Pf+rHNRlkpbaERzFgX7LEigSSADTyTVW0zyYOGf3sSV2GhVQmjMWVzKHYJH7XI8AKX3Fjt0nwDfCZx7YELXLBa2LNMAlAQYdlMwQtgZ18nOz9wnwWzbP9Wq6TR1lpGEwBcs7IS6G2nIGshwsq5t88k/c8mA1bMLJI+FYXenN5sL03h1eZYoxGeAzcEcABEBSwu3zuxxr9qrrFwJKoMQJpGpOv+hz/JSnyQJa2nKffJTvp1weYoSOEwKIT3oUKTlqrwKsNoe43owE6JSDybdOEmB4k1xNcFX47fGCWpW3wSs8SVggvUv1eWE5+zpKtIljAh1MkvXmZ1jb4e3maF+fEN8jdm7WRZ8pwSirrBLOnWLNNLJLfd8uHRb7im526RIqwFaX9m8QUaJWrnY1B7TE1Ibg/0vLeB51wuX5rDtUVpYlDO0Z5VWUIMdrn6VOi9uz+M70Y2URav94EbPFu0CqSKRPIFPyAaGLsRqmHy8h9ounlEHR05NCt4AzmZGSq1RoLjNHkWAtfACd+kOW2IGk7SBfEcVunre/er9Z9QpneyJJIg0KtlxtRuKsc999XzZdoy0n310p5lruEG2hRXjislCtS0uMPO6O5AKaVJIE3FtJseFZLDfl5ikYolVJv0zvgeVOv0Lixogpmpqq3gElNJ+YS50oSwG+HAmbhfNwAARsEoXWpG4Ldvt7itdC5qTO+RtOCGzQUW0/kyPVlRQkdT2EOtlW75M8SiBndGpOI1osL5wJOI5xIWHuPiJNYi5CoaLJTL33bSYzjcFVZ6P9nc05zmAC4sZcmqKr0DlfIqKTZuZoZk+Txzx9yUmA+WmiadM4MptTkRnw4mJ1EVy7ndELYvRjqslFmpEzl1O9A+Tvn197cdoz6lGHf4kgLByKv7qtz1qWzT1GexzRPA2VmYenDu57ZPHjFIEin5wjdDGLpZ0mXMg7dlIvZ/R1OeDLpR6OHim+urFslxG96+bcvaw6WlSO9DXmujKPKQ7K6pCKKKAIEy8O23/lwihJ9ywfNj72SpGnzqpQ//mE2qG6x3t92JYq+3mk3I6zAW2qfBMPcnWXeqbR+vYYI5mrkhuXMohVlJR/ZTXHC6HmE4xg5cMKqhwUSTgrjmrz4VK64ugIT5Sp3SHFupQirK3gTeoKGepS9vTfoNlzTVHLSH66Zo8KLrVTeGpnBEFx257Jou1rYf0HFER4PP27dhu2BdNiO3IoQfaq8YTYEvBhrcItpFz6avCaRf28F4rJRAJq87sWDC7IB48nwVQtuB/w+jPzuH/Ams2IRTrqZjDsUpQnl1IbltF2s4bW9L/ihvyxEKFS530Z/d251b3aoH3TijEyfM5qsukh53X+IJPXSYFOOKm7Fv/Afknlv0MIO0OCduNvsGS04397oiHZz2u9AFvTWIWL1nJR13Fos+LMrXc3VcF0CTs3HWZKtVIy/fX2uvq4sDuoLSb5PLDyWCmhu28pO5ph8VYeJ4RL6Afe9f7xHsUXSUqU8EvqN9g9doyYW+d8npX9GqgoWfS+w03H+9S3Vb7li1OPj6kHeyTn5t7UhXKXrfupkn5/8Biz2cdw==)

Jedná se o jednoduchou Vue ukázku používání vlastních komponent, která obsahuje dva ukázkové soubory. První soubor **App.vue** importuje univerzálně připravenou komponentu **InputComponent.vue**, do které lze zaslat jakékoliv dynamické údaje. Například **název pole**, **typ**, **jestli je pole povinné** a další údaje definové v props.

### Notifikace
[Live demo ve Vue SFC Playground](https://play.vuejs.org/#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)

Jednoduchá Vue ukázka vytvoření dynamických notifikací a jejich automatického zavírání po uplynutí zvoleného času. Ukázka využívá dva soubory – **App.vue** a **Notification.vue**. Komponenta **Notification.vue** přijímá zprávu, typ notifikace (*success*, *error*, *info*, *warning*) a volitelnou dobu zobrazení. **App.vue** slouží jako rodičovská komponenta, která tyto notifikace generuje a zobrazuje pomocí v-for. Notifikace lze manuálně zavřít, nebo se automaticky skryjí po nastaveném čase. Komponenta je univerzální a snadno přenositelná do jiných projektů.

## Tailwind CSS

### Objednávky

Stylování jednoduché administrativní části webu pomocí **Tailwind CSS**. Součástí je responzivní zobrazení přizpůsobené pro mobilní zařízení i počítače.

## PHP
(Obsah připravuji)

## jQuery
(Obsah připravuji)

## C#
(Obsah připravuji)

## C++
(Obsah připravuji)

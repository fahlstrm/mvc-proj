

[![Build Status](https://travis-ci.org/fahlstrm/mvc-proj.svg?branch=main)](https://travis-ci.org/fahlstrm/mvc-proj)


[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/fahlstrm/mvc-proj/badges/quality-score.png?b=main)](https://scrutinizer-ci.com/g/fahlstrm/mvc-proj/?branch=main) [![Build Status](https://scrutinizer-ci.com/g/fahlstrm/mvc-proj/badges/build.png?b=main)](https://scrutinizer-ci.com/g/fahlstrm/mvc-proj/build-status/main) [![Code Intelligence Status](https://scrutinizer-ci.com/g/fahlstrm/mvc-proj/badges/code-intelligence.svg?b=main)](https://scrutinizer-ci.com/code-intelligence)

# Bloggportalen
Bloggportalen är en samlingssida för textbloggar. För att skapa en blogg krävs en användare, vilken skapas via knappen "Skapa blogg" på första sidan. Man kan också läsa bloggar utan att vara inloggad, antingen genom att ange bloggens namn i url'en ('/{blog}) eller genom att besöka blogglistan, där olika bloggar listas beroende olika mätetal.

Bloggportalen är skriven i PHP. Ramverk Laravel. Kopplingar mot databas skriva med QueryBuilder, du ges möjlighet att välja fritt bland de databasleverantörer 
[Laravel](https://laravel.com/docs/8.x/database#introduction "Laravel Database") har täckning för. Applikationen använder Eloquent som ORM (object-relational mapper).


## Installation
Vid nedladnding av koden krävs att du som utvecklare skapar .env-filer för ditt projekt (se .env.example). Vid utveckling av koden har .env.testing där APP_ENV är testing, en .env.dbwebb där APP_ENV är satt till local för att möjliggöra olika databaskopplingar beroende på miljö. 

Eloquent ORM ger stöd för Models, i Bloggportalen finns två skapade Models - user och blog, som var och en representerar kolumner för respektive rad i tabellerna. 
När koppling mot databas är komplett finns migreringsfiler tillgängliga för att skapa tabellerna (se database/migrations).


## Coverage
Då featuretester gjorts mot testdatabas kan inte Scrutinizer generera kodtäckning.
Följande täckning gäller för controller i applikationen:

![Optional Text](/public/img/coverage.PNG)

För att köra tester krävs att en sqlite-databas skapas och filen adderas till mappen 'database'. Namngiven "database.slite".
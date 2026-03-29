# MVC PHP Task Manager Aplikacija

Ovaj projekat predstavlja web aplikaciju razvijenu korištenjem MVC arhitekture u PHP-u. Aplikacija omogućava upravljanje zadacima i kategorijama kroz jednostavan i funkcionalan korisnički interfejs.

## Korištene tehnologije
- PHP
- MySQL
- HTML
- CSS (Bootstrap)
- JavaScript

## Funkcionalnosti aplikacije
- Kreiranje, pregled, izmjena i brisanje zadataka (CRUD operacije)
- Kreiranje i upravljanje kategorijama
- Povezivanje zadataka i kategorija putem relacione baze podataka
- Pretraga zadataka korištenjem JavaScript-a
- Potvrda prije brisanja podataka
- Responzivan dizajn korištenjem Bootstrap-a

## Baza podataka
Aplikacija koristi MySQL bazu podataka koja se sastoji od dvije povezane tabele:
- categories
- tasks

Svaki zadatak pripada jednoj kategoriji putem foreign key veze.

## Struktura projekta
Projekat je organizovan prema MVC arhitekturi:
- models → rad sa bazom podataka
- views → prikaz korisničkog interfejsa
- controllers → logika aplikacije
- config → konekcija na bazu
- public → ulazna tačka aplikacije

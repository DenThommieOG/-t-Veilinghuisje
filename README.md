## Login beheerder

Email: beheerder@example.com
Wachtwoord: password

## Demo

Als u wat demo data wilt kan u onderstaand commando gebruiken:

php artisan db:seed AuctionSeeder

## Cron Job

In de demo data zit ook nog een veiling waarbij een winnaar moet geselecteerd worden, om dit te doen voer je onderstaand commando uit:

php artisan app:auction-lot-winner-command

## Login van demo gebruiker

$cijfer dit staat voor het cijfer van de gebruiker, demo01 heeft cijfer 01, demo02 cijfer 02... Hiervan zijn 5 gebruikers

Template login:
Email:demo$cijfer@example.com
Wachtwoord: demo$cijfer

Voorbeeld:
Email:demo01@example.com
Wachtwoord: demo01

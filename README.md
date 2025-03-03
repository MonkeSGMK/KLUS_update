# errors & inconveniences:
    - Bootstrap breekt de admin page, dus geen bootstrap gebruiken.
    - Op zowel de materialen pagina als de gereedschap pagina staan de namen op de afbeeldingen zelf. Bij bewerken van de naam moet er dus    een nieuwe afbeelding komen.
    - Op sommige plekken in de code staat greedschap ipv gereedschap. Dit komt doordat Anil niet kan spellen. Helaas is het op sommige plekken goed en sommige plekken fout gespeld, wat ervoor zorgt dat alles breekt als je de greedschap vervangt met de goede spelling van het woord.
    - Soms besluit het niet te werken. Accepteer je defeat en ga naar richup.io
    - De sign in achtergrond staat in de main map, als het goed is onder dit bestand. Ik was te lui. Als je dit veranderd, vergeet alsje-alsje-blieft niet de path te veranderen anders wordt je geflashbangt
    
# Specific errors:
An error has occured(real):

SQLSTATE[HY000] [2002] No connection could be made because the target machine actively refused it
Warning: Undefined variable $conn in C:\xampp\htdocs\technolab\KLUS\Code\index.php on line 18

Fatal error: Uncaught Error: Call to a member function prepare() on null in C:\xampp\htdocs\technolab\KLUS\Code\index.php:18 Stack trace: #0 {main} thrown in C:\xampp\htdocs\technolab\KLUS\Code\index.php on line 18

    Je database staat niet goed verbonden. als je XAMPP gebruikt, ten eerste ik voel je pijn, ten tweede check of mySQL aan staat, want die besluit soms spontaan uit te gaan. als deze aan staat, je hebt ctrl+shift+r gedaan en het doet het nog steeds niet, dan weet ik het ook niet maar het komt niet door ons


<h1>it brokey</h1>
<a href="https://www.youtube.com/watch?v=dQw4w9WgXcQ">probably a fix idk</a>
<a href="https://www.youtube.com/watch?v=b85h_ujZ_vg">HowToBasic video on a fix</a>

    Niet op de links klikken! Dit scherm hoor je niet te zien, check je apache en mySQL connectie.

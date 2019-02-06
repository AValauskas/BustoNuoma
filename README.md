Projektas kurį reikėjo įgyvendinti universitete individualiai

Kaip karkasas buvo nemažai funkcijų paimta iš universiteto duoto pavyzdžio.
Pateiksiu sąrašą failiukų kuriuos įgyvendinau pats:
Atsiliepimas.php-Šitam failiuke įterpia nusiūstą atsiliepimo formą(turinį) iš nuomojamo objekto lango, ir vėl grąžina į nuomojamo 
objekto langą. 

Deny.php-Tai funkcija kur nuomotojui atmetus užklausą pakeičia sutarties būseną į atmestą. 

Index.php-Šitam failiuke yra spausdinami visi nuomojami objektai kuriuos klientas gali užsisakyti, taip pat galima pasirinkti rušiavimą, 
pvz atrinkti tik tam tikros grupės nuomojamos objektus ir rikiuoti mažėjimo arba didėjimo tvarka. 

Objecthistory.php-Langas kuriame spausdina atitinkamo nuomojamo objekto visą užsakymų istoriją, (jau atliktus užsakymus ir dartik laukiamus). 

Operacija2.php-Šitam faile spausdiname atitnkamo nuomojamo objekto informaciją, galime įvesti atsiliepimą ir taip pat jį užsisakyti. 

Order.php-Funkcija kuriai nusiunčiame iš operacija2 datą nuo ir datą iki kada norima užsisakyti, ir joje yra įterpiamas užsakymas į 
sutartį, kur išpradžių yra tik laukianti patvirtinimo.

Ordersinq.php-Spausdina kurie objektai yra užsakyt ateityje ir užsakymas dar nėra praėjęs.

Orderstopermit.php-Nuomotujui matomas puslapis kuriame nuomotojas gali arba patvirtinti arba atmesti kliento pateiktą užklausą. 

Ownlit.php-Nuomotojui matomas puslapis kuriame nuomotojas mato visus savo nuomojamus objektus, gali peržiūrėti jų istoriją ir gali 
peržiūrėti apskritai objekto informaciją. 

Permit.php-Funkcija kur nuomotojui patvirtinus užklausą pakeičiamas sutarties statyusas į aktyvią ir nuskaitomi pinigai iš kliento 
sąskaitos. 

Responselist.php-Puslapis kurį gali matyti ir nuomotojas ir klientas, jame galima matyti visus parašytus atsiliepimus apie atitinkamą 
objektą ir datą kada jie parašyti. 

Waiting.php-Puslapis kurį mato tik klientas, jame matomi užsakymai kurie buvo patvirtinti, kurie atmesti, ir kurie dar tebelaukia
patvirtinimo.

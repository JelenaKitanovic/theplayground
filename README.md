## About Playground

Helping you look for meaningfull work in an unexpected way.


<img src="https://i.ibb.co/JcYgxSx/Screenshot-2020-12-12-155522.png" width="800">


Ovo pravim za neku drugaricu, ona kao pokrece neki svoj biznis :)
Cilj tog njenog biznisa je da spoji ljude koji zele zajedno da rade na usavrsavanju sebe, tako sto se svakom dodeli accountability buddy i onda se sa tom osobom vidjas jednom sedmicno, postavljate ciljeve i ispunjavate ih. 
Pri tom, na tim sastancima se rade razne igrice, gde kroz njih mozes d asaznas koje su neke tvoje kao key strengths kao osobe i kako ih koristis.

I sad njoj treba da se napravi neki matching algoritam koji bi na osnovu osobina ovih customera pravio parove. (to jos nisam uradila)

Ono sto ona sada ima je csv ljudi koji joj da typeform ili tako nesto i onda je zelela da napravim da ona moze da uploaduje csv novih ljudi i da se onda oni match-uju.
Napravicu tu i neki basic CRUD dashboard vrv.

Oni za sada nemaju domen i hosting, ali ga kupuju uskoro tako da cu moci ovo da joj podignem lepo, i onda treba da napravim neko bazicnu autentifikaciju da ne moze bas svako da pristupa tim podacima.
E sad, svi ovi customeri koje ona dobija u csv-u, nisu dosli preko njenog sajta  i to, pa zato oni nemaju sifre ni nista, i zato sam odlucila da ih odvojim u poseban entitet.
Kao user da je nesto usko vezano samo za email password i to, a ovi detalji o tim ljudima da idu u entitet customer (takodje mi je malo bezveze da sve bude u jednoj tabeli npr user, da on sadrzi i password i remember_token i your ideal partner ili favourite quote :)).


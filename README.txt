Resum executiu

Enviament Express, abans anomenada AmpollesPablo, és una empresa que té una botiga física d’ampolles i no disposa de venda en línia, de manera que tot el seu funcionament és presencial.
La gestió de les nòmines es fa manualment, amb paper i bolígraf, cosa que provoca molts problemes, ja que és fàcil equivocar-se. També passa el mateix amb l’inventari, que es porta a mà. A més, quan hi ha algun problema, com perdre un full amb informació important, s’ha de tornar a escriure tot.  

En aquest projecte es planteja un canvi en el funcionament de l’empresa. Es deixa la botiga física i es passa a treballar des d’un magatzem. Es venen els productes a través d’una pàgina web. Aquesta web inclourà els productes que abans es venien a la botiga.
Pel que fa a la gestió interna, les nòmines deixaran de fer-se a mà. El treballador de Recursos Humans tindrà un ordinador amb una aplicació que li permetrà accedir a tota la informació dels treballadors i generar les nòmines de manera més fàcil i amb menys errors. També disposarà d’una VPN perquè pugui teletreballar.
L’estoc també es digitalitza. En comptes d’utilitzar una llibreta, els treballadors podran fer servir el mòbil per connectar-se a una aplicació i registrar els productes que entren, surten o estan defectuosos.

Tots aquests serveis estaran en un servidor dins del magatzem, també es disposarà d’un SAI per seguretat davant de talls al subministrament elèctric. Per garantir l’accés a les dades en qualsevol moment i la seguretat d’aquestes disposarem d’un NAS i còpies al núvol.

Context i situació inicial

Una botiga de tota la vida especialitzada en la venda d’ampolles fa molt de temps que no atreu nous clients, ja no és rendible. Molta gent ara prefereix comprar per Internet, molt poca gent està disposada a recórrer una gran distància amb cotxe per anar a comprar una ampolla, encara que aquesta li pugui durar tota la vida. Venent per Internet es pot abastar una zona molt més gran i augmentar molt els clients potencials.

Pel que fa a la gestió interna, tot és massa rudimentari, el control de l’inventari es realitza completament a mà, utilitzant llibretes on els operaris apunten les entrades i sortides d’estoc.
Aquest mètode provoca errors constants en el recompte de l’estoc que a vegades deriva a fer comandes de producte quan encara quedava molt, o pel contrari no fer comandes quan ja no quedava producte i s’haurien d’haver fet.
També, la gestió de RH i la generació de nòmines es realitza de manera manual amb paper i bolígraf, un procés lent i que té un alt risc d'errors de càlcul.

Davant d’aquesta situació, l’empresa ven la seva botiga i decideix començar a llogar un magatzem força gran, amb una sala per a un futur servidor i una altra perquè pugui treballar el personal de RH.

Els objectius generals són; digitalitzar el control de l'estoc, la gestió dels treballadors, el procés de generació de nòmines, permetre el teletreball, crear una botiga en línia i garantir la disponibilitat de les dades en qualsevol moment, tant de l’estoc com de RH.

Abast del projecte
En aquest apartat es defineix amb precisió els límits del projecte d’Enviament Express, especificant quins elements queden dins i fora. També es dirà els components implicats, els actors, i s’explicaran els casos d’ús que justificaran el perquè de la solució tècnica triada.
El sistema inclou: 
Instal·lació física d’un servidor, un SAI i un dispositiu NAS al rack.
Desplegament i configuració d’un ERP per gestionar l’estoc i agilitzar processos RH.
Implementació d’un servei de VPN per permetre el teletreball de manera segura.
Configuració d’un sistema de còpies de seguretat automatitzat en xarxa local (NAS), definició de política de backups, elaboració del pla de contingència, i còpia de seguretat al núvol.
Disseny i integració de botiga en línia amb tots els productes del magatzem i amb comandes enllaçades automàticament a l’ERP.
Redacció de manuals tècnics d'instal·lació i configuració, així com manuals d'usuari final per al funcionament dels diferents serveis i aplicacions.

El sistema no inclou:
El procés d’enviament del producte.
Implementació de sistema de comandes automàtiques quan l’estoc baixa a cert punt.
Implementació de sistema de detecció i prevenció d’intrusos.
Especificació de hardware concret.

Actors
Treballador de Recursos Humans (RH)
Treballadors de magatzem
Administrador de sistemes
Client

Components:
Hardware
Servidor, NAS, SAI, Rack, Router, Switch, Cablejat RJ45, Access Point, Ordinador portàtil per a l’oficina i Mòbils dels treballadors del magatzem.

Software
SO del servidor i del NAS, Base de dades, Programari ERP, VPN, Emmagatzematge extern al núvol, Botiga en línia, Servei de compartició de fitxers.



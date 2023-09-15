---
title: 'Optimize your work with Docker'
date: '2023-09-23 11:00'
creator: szavadschi
hide_git_sync_repo_link: false
blog_url: /blog
show_sidebar: true
show_breadcrumbs: true
show_pagination: true
hide_from_post_list: false
feed:
    limit: 10
twitterenable: true
twittercardoptions: summary
articleenabled: false
musiceventenabled: false
orgaenabled: false
orga:
    ratingValue: 2.5
orgaratingenabled: false
eventenabled: false
personenabled: false
restaurantenabled: false
restaurant:
    acceptsReservations: 'yes'
    priceRange: $
facebookenable: true
page-toc:
    active: true
    start: 1
    depth: 4
---

Al doilea eveniment din anul 2023

- **Workshop:** [Optimize your work with Docker](https://tekwill.md/course/navigating-devops-for-beginners/)
- **Data:** 23 septembrie, 2023, cu începere la ora 11:00
- **Locația:** Tekwill Center, Chișinău
- **Înregistrare:** [Înregistrează-te aici](https://tekwill.md/course/optimize-work-with-docker/)

[toc]

===
## Prezentări

### Optimize your work with Docker - Introducere

> Prezentator: Bezu Igor, DevOps Engineer, SoftwareMind

Igor, in domeniul securității informațiilor, a demonstrat o înțelegere profunda a amenințărilor care pot afecta eficienta companiilor, implementind cu succes măsuri de securitate robuste și cele mai bune practici pentru a proteja activele și datele critice, asigurând conformitatea cu standardele și reglementările din industrie in companie.
Prin urmare a fost marcat de un angajament profund pentru îmbunătățirea eficienței, fiabilității și securității operațiunilor IT. Folosind expertiza în DevOps Engineering, a livrat în mod constant soluții inovatoare care reduc decalajul dintre departamentele de development si operations, simplificând procesele și promovând o cultură a automatizării in compania SoftwareMind.

### Fundamental Elements of the Docker Universe 
> Prezentator: Veronica Hajdeu, DevOps Engineer, Endava

Veronica este inginer DevOps cu o experiență bogată în implementarea principiilor DevOps și în utilizarea proficientă a tehnologiilor, precum Docker și Docker Compose, în cadrul proiectului său la compania Endava.
Ea se implică activ în dezvoltarea și consolidarea comunității IT, având rolul de coordonatoare și mentor în cadrul programului de internship în domeniul DevOps, organizat de Endava, contribuind astfel la formarea și dezvoltarea viitoarelor talente din industrie. De asemenea, Veronica este ambasadoare în programul Tech Women Moldova din 2022, unde își aduce contribuția la promovarea și susținerea femeilor în domeniul tehnologic.

### Dockerization of backend services. 
> Prezentator: Andrei Prescornic, DevOps Ingineer, SoftwareMind

Andrei are peste 20 de ani experienta in IT. La moment este Technical Director la o companie IT multinationala. Are experienta Devops in zeci de proiecte comerciale si opensource. Pe parcursul anilor a fost mentor pentru o serie de Ingineri DevOps.

### Dockerization of frontend services. 
> Prezentator: Berestian Victor, DevOps Ingineer, 

A mers pe calea de Jedi, de la incepator la CTO, iar acum inginer software. În total, peste 16 ani de experiență (backend și front-end). Ultimii 3 ani s-au concentrat pe soluții de backend scalabile și stabile pe k8s (în GoParrot, care a fost cumpărat în 2022 de Jack Dorsey)

## Scopul nostru

Pentru a ajuta dezvoltatorii și entuziaștii să folosească tehnologiile docker și docker-compose. Împreună, vom construi o comunitate în care studenții și tinerii profesioniști pot învăța, împărtăși idei și își pot dezvolta abilitățile în lumea fascinantă a DevOps. Avem misiunea de a cultiva o rețea de indivizi talentați care vor modela viitorul tehnologiei și inovației în Moldova.

## De ce ar trebui să folosesti docker în developement?

Docker este un instrument valoros în dezvoltare din mai multe motive convingătoare:

1. **Izolare:** Docker vă permite să creați containere izolate care încapsulează aplicația  și toate dependențele acesteia. Acest lucru vă asigură că mediul tau de dezvoltare rămâne coerent în diferite etape ale ciclului de dezvoltare și între membrii echipei. Gata cu problemele „funcționează pe localhost”.

2. **Consecvență:** Cu Docker, vă puteți asigura că aplicația ta rulează în mod consecvent pe diferite platforme, inclusiv mașina locală de dezvoltare, serverele de staging și serverele de producție. Acest lucru minimizează șansele de a întâmpina probleme neașteptate la migrarea codului între medii.

3. **Portabilitate:** containerele Docker sunt foarte portabile. Poti împacheta aplicația, dependențele sale și chiar sistemul de operare  într-o singură imagine de container. Această imagine poate fi partajată cu ușurință altora sau implementată în diferite medii de hostare, cum ar fi servicii cloud sau servere locale.

4. **Controlul versiunii:** imaginile Docker pot fi versionate la fel ca codul aplicației. Aceasta înseamnă că puteți urmări modificările aduse mediului de dezvoltare și puteți reveni la versiunile anterioare dacă este necesar. De asemenea, simplifică colaborarea, deoarece puteți specifica mediul exact pe care îl necesită aplicația dvs.

5. **Eficiența resurselor:** containerele Docker partajează nucleul sistemului de operare gazdă, ceea ce le face mai eficiente din punct de vedere al resurselor decât mașinile virtuale tradiționale. Puteți rula mai multe containere pe aceelas host fără o suprasolicitare semnificativă a performanței. Acest lucru este deosebit de benefic atunci când se dezvoltă microservicii sau aplicații complexe cu mai multe componente.

6. **Implementare rapidă:** containerele Docker pot fi pornite și oprite rapid. Acest lucru facilitează dezvoltarea mediilor de developement, rularea testelor și iterarea rapidă a codului. Este util în special în scenariile în care trebuie să extindeți mediul de developement sau să rulați mai multe instanțe simultan.

7. **Gestionarea dependențelor:** Docker simplifică gestionarea dependențelor, permițându-vă să definiți dependențe într-un fișier Dockerfile sau într-un fișier Docker Compose. Acest lucru asigură că toate software-urile și configurațiile necesare sunt incluse în container, reducând șansele de conflicte sau dependențe lipsă.

8. **Securitate:** containerele Docker oferă un nivel de izolare și securitate. Acestea restricționează accesul la resursele hostului, ceea ce poate ajuta la prevenirea interacțiunilor neintenționate între aplicații și la îmbunătățirea securității generale a sistemului.

9. **Curățare ușoară:** containerele Docker se sterg usor, ceea ce înseamnă că le puteți distruge și recrea cu ușurință atunci când este necesar. Acest lucru face simplă resetarea mediului de dezvoltare la o stare curată, ceea ce este deosebit de util atunci când depanați probleme complexe.

Pe scurt, Docker eficientizează procesul de dezvoltare oferind medii de dezvoltare consistente, portabile și eficiente. Vă ajută să evitați problemele obișnuite de dezvoltare și implementare, făcându-l un instrument esențial pentru workflourile de lucru moderne de dezvoltare de software.

## Aplicații Necesare pentru Workshop

Te așteptăm cu nerăbdare să participi la workshop, și te rugăm să vii pregătit de acasă. Să ai pe laptopul tău instalate din timp următoarele aplicații:
* Docker Desktop sau Engine
* Docker Compose
* Git
* VS Code

La fel, te mai îndemnăm să creezi conturi pe [GitHub](https://github.com/signup) și [Docker Hub](https://hub.docker.com/signup), dacă nu le ai până acum.

În cazul în care ți se pare că nu reușești singur, adresează-te după un sfat pe canalele noastre de Telegram sau Slack, sau pe Facebook
* [Telegram Group](https://t.me/+tqp4aRgys_NjMWEy)
* [Slack Channel](https://join.slack.com/t/devopsmd/shared_invite/zt-4ohkqths-get_wPjSSrYgTtIybwez0g)
* [Facebook Group](https://www.facebook.com/groups/devops.md/)
* [DevOps Facebook Chat](https://m.me/ch/AbZm0k3AidGJQ2dz/)

Mai jos, găsești ceva îndrumări.

---
### Windows WSL2
Dacă ești pe Windows și nu ai WSL2 - e timpul să corectezi situația.
Vezi informație de start pe pagina oficială - [Windows Subsystem for Linux Documentation](https://learn.microsoft.com/en-us/windows/wsl/), și [instrucțiunile de instalare](https://learn.microsoft.com/en-us/windows/wsl/install). 

Vezi și [instrucțiunile de la Ubuntu](https://ubuntu.com/tutorials/install-ubuntu-on-wsl2-on-windows-11-with-gui-support#1-overview), pare ceva mai simplu și mai ușor de urmat.

Docker Desktop are integrare cu WSL, iar în ultimele versiuni poți instala Docker Engine direct în WSL, care de fapt, poate fi considerat ca instanță de Linux, respectiv toate aplicațiile necesare vor fi instalate urmând pașii pentru Linux. VS Code, la fel se integrează excelent cu WSL.

### Docker Desktop sau Docker Engine

#### Docker Desktop

**Docker Desktop** este cea mai simplă opțiune de a instala Docker pe Windows sau MacOS, dar nu-l recomandăm 
pe Linux deoarece necesită virtualizare, deci mai multe resurse necesare (vezi mai jos instalarea a Docker Engine).

Locul de start este aici [Get Docker](https://docs.docker.com/get-docker/)

Documentația oficială este foarte ușor de urmat. Iată linkuri la cele mai populare sisteme de operare
* [Linux](https://docs.docker.com/desktop/install/linux-install/)
* [MacOS](https://docs.docker.com/desktop/install/mac-install/)
* [Windows](https://docs.docker.com/desktop/install/windows-install/) vezi și despre [integrarea cu WSL](https://docs.docker.com/desktop/wsl/)

#### Docker Engine

**Docker Engine** este disponibil doar pentru Linux. Pe alte platforme, nu poate fi instalat direct.

Poți urma instrucțiunile din [documentația oficială](https://docs.docker.com/engine/install/), dar cea mai simplă cale după părerea noastră este de a rula comanda de mai jos.  

```sh
curl -sSL https://get.docker.com/ | sh
```

Verifică instalarea:

```sh
docker version
docker run hello-world
```

### Docker Compose

La fel, mai multe opțiuni de a instala descrise în documentația oficială https://docs.docker.com/compose/install/. 

Varianta a doua este cea mai simplă, de fapt și cea recomandată, și anume instalarea ca Plugin. Pe ubuntu, se instalează cam așa.

```sh
sudo apt-get install docker-compose-plugin
```

Verifică instalarea:
```sh
docker compose version
```
Opțiunea a treia, este varianta cea mai des întâlnită până acum, dar nu mai este recomandată de cei de la Docker.

### VS Code
Descarcă package-ul pentru sistemul tău de pe [https://code.visualstudio.com/download](https://code.visualstudio.com/download), apoi urmează instrucțiunile de instalare pentru
* [Linux](https://code.visualstudio.com/docs/setup/linux)
* [Mac](https://code.visualstudio.com/docs/setup/mac)
* [Windows](https://code.visualstudio.com/docs/setup/windows)

Odată instalat, îți recomandăm următoarele extensii:
* [Visual Studio Code WSL](https://marketplace.visualstudio.com/items?itemName=ms-vscode-remote.remote-wsl) - dacă ești pe Windows
* [Remote Development](https://marketplace.visualstudio.com/items?itemName=ms-vscode-remote.vscode-remote-extensionpack)
* [Dev Containers](https://marketplace.visualstudio.com/items?itemName=ms-vscode-remote.remote-containers)


### Git

Instrucțiuni simple de urmat, și nu uita, dacă ești pe Windows cu WSL - folosește instrucțiunile pentru Linux
* [Linux](https://git-scm.com/download/linux)
* [Mac](https://git-scm.com/download/mac)
* [Windows](https://git-scm.com/download/win)

Verifică instalare prin a clona prezentările noastre precedente ;)

 ```
 git clone https://github.com/DevOps-Moldova/presentations.git
 ```
 
 ## Concluzie
 
Sperăm că nu ai întâmpinat greutăți și ai instalat toate aplicațiile necesare. Acum ești înarmat cu minimul necesar de unelte și ești pregătit să DevOpsești cu noi la workshop ;) 

Te așteptăm cu nerăbdare!

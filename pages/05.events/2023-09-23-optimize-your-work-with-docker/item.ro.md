---
title: 'Optimize your work with Docker: Utilizează Docker pentru dezvoltarea de backend și a frontend'
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
media_order: 'optimize_docker (Large).jpg'
---

Al doilea eveniment din anul 2023

- **Workshop:** [Optimize your work with Docker](https://tekwill.md/course/optimize-work-with-docker/)
- **Data:** 23 septembrie, 2023, cu începere la ora 11:00
- **Locația:** Tekwill Center, Chișinău
- **Înregistrare:** [Înregistrează-te aici](https://tekwill.typeform.com/to/RnaIQU2e)

===

[toc]

## Optimize your work with Docker
> Use Docker for backend and frontend develop

Explorați lumea magică a Docker, aflați-i filozofia, metodele și tehnologiile sale alături de specialiști locali DevOps de top!

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

Vei avea nevoie de următoarele aplicații pe laptopul tău:

* Docker Desktop sau Engine
* Docker Compose
* Git
* VS Code

La fel, te mai îndemnăm să creezi conturi pe GitHub și Docker Hub, dacă nu le ai până acum.

[Vezi ceva îndrumări aici](../../howto/aplicatii-necesare-pentru-workshop)
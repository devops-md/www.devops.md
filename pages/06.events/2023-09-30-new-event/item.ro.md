---
title: 'New Event'
date: '2023-09-30 17:00'
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
---

Al doilea eveniment din anul 2023

- **Data:** 30 septembrie, 2023
- **Locația:** Tekwill Center, Chișinău
- **Registration:** [Register here](https://tekwill.typeform.com/to/RAx4ZWYP)
- **Workshop:** Workshop Title

===

Your page content goes here.

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
## Windows WSL2
Dacă ești pe Windows și nu ai WSL2 - e timpul să corectezi situația.
Vezi informație de start pe pagina oficială - [Windows Subsystem for Linux Documentation](https://learn.microsoft.com/en-us/windows/wsl/), și [instrucțiunile de instalare](https://learn.microsoft.com/en-us/windows/wsl/install). 

Vezi și [instrucțiunile de la Ubuntu](https://ubuntu.com/tutorials/install-ubuntu-on-wsl2-on-windows-11-with-gui-support#1-overview), pare ceva mai simplu și mai ușor de urmat.

Docker are integrare cu WSL, dar, în ultimele versiuni, poți instala Docker Engine direct în WSL, care de fapt, poate fi considerat ca instanță de Linux, și respectiv, toate aplicațiile necesare vor fi instalate urmând pașii pentru Linux. VS Code, la fel se integrează excelent cu WSL2.

## Docker Desktop sau Docker Engine

### Docker Desktop

**Docker Desktop** este cea mai simplă opțiune de a instala Docker pe Windows sau MacOS, dar nu-l recomandăm 
pe Linux deoarece necesită virtualizare, deci mai multe resurse necesare (vezi mai jos instalarea a Docker Engine).

Locul de start este aici [Get Docker](https://docs.docker.com/get-docker/)

Documentația oficială este foarte ușor de urmat. Iată linkuri la cele mai populare sisteme de operare
* [Linux](https://docs.docker.com/desktop/install/linux-install/)
* [MacOS](https://docs.docker.com/desktop/install/mac-install/)
* [Windows](https://docs.docker.com/desktop/install/windows-install/) vezi și despre [integrarea cu WSL](https://docs.docker.com/desktop/wsl/)

### Docker Engine

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

## Docker Compose

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

## VS Code
Descarcă package-ul pentru sistemul tău de pe [https://code.visualstudio.com/download](https://code.visualstudio.com/download), apoi urmează instrucțiunile de instalare pentru
* [Linux](https://code.visualstudio.com/docs/setup/linux)
* [Mac](https://code.visualstudio.com/docs/setup/mac)
* [Windows](https://code.visualstudio.com/docs/setup/windows)

Odată instalat, îți recomandăm următoarele extensii:
* [Visual Studio Code WSL](https://marketplace.visualstudio.com/items?itemName=ms-vscode-remote.remote-wsl) - dacă ești pe Windows
* [Remote Development](https://marketplace.visualstudio.com/items?itemName=ms-vscode-remote.vscode-remote-extensionpack)
* [Dev Containers](https://marketplace.visualstudio.com/items?itemName=ms-vscode-remote.remote-containers)


## Git

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

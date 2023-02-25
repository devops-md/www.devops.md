---
title: 'Deploy From Bitbucket to AWS with CodeDeploy'
date: '2021-04-03 18:19'
hide_git_sync_repo_link: false
blog_url: /howto
show_sidebar: true
show_breadcrumbs: true
show_pagination: true
content:
    items:
        - '@self.children'
    limit: 5
    order:
        by: date
        dir: desc
    pagination: true
    url_taxonomy_filters: true
bricklayer_layout: true
display_post_summary:
    enabled: false
feed:
    limit: 10
taxonomy:
    category:
        - 'How To'
    tag:
        - aws
        - linux
        - bitbucket
        - pipelines
        - CI/CD
hide_from_post_list: false
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

Recent am avut ceva durere de cap cu cele enumerate în titlu. Folosesc Bitbucket Pipelines la un proiect, iar pentru a face deploy pe AWS, am decis să merg cu CodeDeploy.

Aici este articolul de bază, de unde m-am inspirat: 
[https://support.atlassian.com/bitbucket-cloud/docs/deploy-to-aws-with-codedeploy/](https://support.atlassian.com/bitbucket-cloud/docs/deploy-to-aws-with-codedeploy/)

La început, totul era bine, apoi mi-am dat seama că-mi lipses dotfiles (`.env`, `.htaccess`). Am crezut că e problema în `zip` și am zis că încerc să-i dau cu `tar`-ul. Dar, din articolul de mai sus era clar că nu pot folosi altceva decât zip. O soluție temporară a fost redenumirea fișierelor și anume schimbarea `.` cu un `_` iar la deploy - schimbarea înapoi. Recunosc, nu e elegantă soluția, dar mergea.

Peste vreo 2 săptămâni, am revenit la subiect și am dat de versiune (mult) mai nouă pentru pipe. Cea din documentație e `atlassian/aws-code-deploy:0.2.10` dar după ce am răscolit puțin, am dat și de repozitoriu pe [Bitbucket](https://bitbucket.org/atlassian/aws-code-deploy/src/master/), de unde am aflat că deja putem folosi, pe lângă `zip`, care e implicit, dar și `tar`, `tgz`, `YAML` sau `JSON` (BUNDLE_TYPE). Repozitoriul [Docker Hub](https://hub.docker.com/r/bitbucketpipelines/aws-code-deploy/)

De bucurie, am modificat pipe-ul, am făcut upgrade la ultima versiune (la momentul dat e `atlassian/aws-code-deploy:0.6.0`), dar am aflat cu stupoare că nu-mi rezolvă problema cu dotfiles.

Hai iar să revăd ce am mai făcut pe acolo, iar soluția a fost una simplă, și anume adăugarea opțiunii `dotglob` în `bash`

```shell
#!/bin/bash
shopt -s extglob dotglob
...
```

`extglob` era deja acolo, căci mi-a rezolvat altă problemă ce am avut-o de la bun început. Așa cum tot codul "trăiește" în "rădăcina" repozitoriului, pentru a împacheta totul, am creat directoriul `codedeploy` cu acest conținut

```shell
$ tree codedeploy/
codedeploy/
├── appspec.yml
├── configs
│   └── vhost.conf
└── scripts
    ├── AfterInstall.sh
    ├── ApplicationStart.sh
    ├── ApplicationStop.sh
    ├── BeforeInstall.sh
    ├── package.sh
    └── ValidateService.sh
    ```

Iar `package.sh` arată așa

```shell
#!/bin/bash
shopt -s extglob dotglob

[ -d cache ] && rm -rf cache

[ ! -d codedeploy/app ] && mkdir codedeploy/app
mv !(bitbucket-pipelines.yml|codedeploy) codedeploy/app/
tar czf codedeploy.tgz codedeploy
```

Am mai avut o problemă cu variabilile per mediu, dar e deja alt subiect.

---
title: 'Jenkins nu pornește după update la Alpine Linux'
date: '2021-07-30 01:06'
hide_git_sync_repo_link: false
blog_url: /blog
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
    tag:
        - linux
        - 'alpine linux'
        - jenkins
        - upgrade
hide_from_post_list: false
---

Recent, am instalat ultimile înnoiri pentru Jenkins, care rulează pe o mașină virtuală pe Alpine Linux 13.x

E un proces extrem de simplu:
```
jenkins:~# apk update
jenkins:~# apk upgrade
jenkins:~# reboot
```

Imediat ce mașina virtuală s-a reîncărcat, am observat că Jenkins nu mai este disponibil

Am verificat serviciul, care zicea că e pornit
```
jenkins:~# /etc/init.d/jenkins start
 * WARNING: jenkins has already been started
```
pe când, starea serviciului spunea altceva
```
jenkins:~# /etc/init.d/jenkins status
 * status: crashed
```
Respectiv, am încercat un stop/start
```
jenkins:~# service jenkins stop
 * Stopping jenkins ...   
jenkins:~# service jenkins start
 * Starting jenkins ...
```
însă, fără rezultat
```
jenkins:~# /etc/init.d/jenkins status
 * status: crashed
```
Nu era nimic în logurile Jenkins, iar logurile de system nu-mi ziceau nimic util

Așa că, am încercat să-l pornesc manual, și aici am avut ceva mai multă informație utilă
```
jenkins:~# java -DJENKINS_HOME=/var/lib/jenkins -jar /usr/share/webapps/jenkins/jenkins.war
Jul 29, 2021 9:41:00 PM Main verifyJavaVersion
SEVERE: Running with Java class version 60 which is not in the list of supported versions: [52, 55]. Run with the --enable-future-java flag to enable such behavior. See https://jenkins.io/redirect/java-support/
java.lang.UnsupportedClassVersionError: 60.0
        at Main.verifyJavaVersion(Main.java:174)
        at Main.main(Main.java:142)

Jenkins requires Java versions [8, 11] but you are running with Java 16 from /usr/lib/jvm/java-16-openjdk
java.lang.UnsupportedClassVersionError: 60.0
        at Main.verifyJavaVersion(Main.java:174)
        at Main.main(Main.java:142)
```

Totul se rezumă la versiunea Java nesuportată de Jenkins
```
jenkins:~# java --version
openjdk 16.0.1 2021-04-20
OpenJDK Runtime Environment (build 16.0.1+9-alpine-r0)
OpenJDK 64-Bit Server VM (build 16.0.1+9-alpine-r0, mixed mode, sharing)
```

Idee nu am cum a lucrat mai devreme, sau cum a ajuns OpenJDK 16 instalată în sistem, dar e cert că e timpul să instalez OpenJDK 11 :)
```
jenkins:~# apk add openjdk11
(1/15) Purging openjdk16-jre-headless (16.0.1_p9-r0)
(2/15) Installing openjdk11-jre-headless (11.0.11_p9-r0)
(3/15) Installing openjdk11-jmods (11.0.11_p9-r0)
(4/15) Installing openjdk11-demos (11.0.11_p9-r0)
(5/15) Installing openjdk11-doc (11.0.11_p9-r0)
(6/15) Installing libxi (1.7.10-r0)
(7/15) Installing libxrender (0.9.10-r3)
(8/15) Installing libxtst (1.2.3-r3)
(9/15) Installing alsa-lib (1.2.5.1-r1)
(10/15) Installing giflib (5.2.1-r0)
(11/15) Installing libjpeg-turbo (2.1.0-r0)
(12/15) Installing lcms2 (2.12-r1)
(13/15) Installing openjdk11-jre (11.0.11_p9-r0)
(14/15) Installing openjdk11-jdk (11.0.11_p9-r0)
(15/15) Installing openjdk11 (11.0.11_p9-r0)
Executing busybox-1.33.1-r4.trigger
Executing java-common-0.4-r0.trigger
OK: 1564 MiB in 247 packages
```

Și, e timpul să mai încerc o dată
```
jenkins:~# service jenkins restart
 * Caching service dependencies ...                                [ ok ]
 * Stopping jenkins ...
 * start-stop-daemon: no matching processes found                  [ ok ]
 * Starting jenkins ...                                            [ ok ]
jenkins:~# service jenkins status
 * status: started
 ```
 
 Astfel am petrecut alte 30 min din viața mea :)
---
title: 'Jenkins won''t start after Alpine Linux update'
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

I recently upgraded my Jenkins server, running Alpine Linux 13.x, in a VM

It's a straightforward process:
```
jenkins:~# apk update
jenkins:~# apk upgrade
jenkins:~# reboot
```

After the VM came back online, the surprise was having Jenkins refusing to start. 

I checked the service and it said it's started
```
jenkins:~# /etc/init.d/jenkins start
 * WARNING: jenkins has already been started
```
while the status was saying something different
```
jenkins:~# /etc/init.d/jenkins status
 * status: crashed
```
I tried to stop/start
```
jenkins:~# service jenkins stop
 * Stopping jenkins ...   
jenkins:~# service jenkins start
 * Starting jenkins ...
```
but, the result was the same
```
jenkins:~# /etc/init.d/jenkins status
 * status: crashed
```
I've found nothing in Jenkins log file or in system logs. 

So, I've tried to start Jenkins manually, and I've found much more helpful information
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

It was all about the Java version
```
jenkins:~# java --version
openjdk 16.0.1 2021-04-20
OpenJDK Runtime Environment (build 16.0.1+9-alpine-r0)
OpenJDK 64-Bit Server VM (build 16.0.1+9-alpine-r0, mixed mode, sharing)
```

I'm quite unsure how it was working before, or how it ended by having OpenJDK 16, buy it looks like it's the right time to install OpenJDK 11 :)
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

Now, it's time to try again
```
jenkins:~# service jenkins restart
 * Caching service dependencies ...                                [ ok ]
 * Stopping jenkins ...
 * start-stop-daemon: no matching processes found                  [ ok ]
 * Starting jenkins ...                                            [ ok ]
jenkins:~# service jenkins status
 * status: started
 ```
 
 And, this is how I spent 30 min of my life :)
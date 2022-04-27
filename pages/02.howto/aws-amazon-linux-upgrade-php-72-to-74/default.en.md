---
title: 'AWS Amazon Linux Upgrade PHP 72 to 74'
date: '2022-04-26 15:34'
hide_git_sync_repo_link: false
creator: szavadschi
---

Here are the simple steps to follow in order to upgrade php7.2, which has reached [EOL](https://www.php.net/supported-versions.php), but there are many installations still using this version.

At the time of writing, php7.4 is getting only security support and will reach EOL on 2022-11-28. Consider switching to a 8.x version, if that's possible.

### Step 1. System Updates
It's important to have an up to date system. If you are keeping it updated on a regular basis, you may skip this step.

`sudo yum update`

### Step 2. Disable the old topic in extrase

First, let's check the php version and modules installed

`php -v`

```
PHP 7.2.34 (cli) (built: Oct 21 2020 18:03:20) ( NTS )
Copyright (c) 1997-2018 The PHP Group
Zend Engine v3.2.0, Copyright (c) 1998-2018 Zend Technologies
```

Now, disable the topics

 `sudo amazon-linux-extras disable php7.2`
 
 `sudo amazon-linux-extras disable lamp-mariadb10.2-php7.2`

### Step 3. Enable the new topic and upgrade

`sudo amazon-linux-extras enable php7.4`

Here is a line stripped output, but you can see the confirmation the new version is enabled and suggested commands to run in order to upgrade at the bottom
```
  0  ansible2                 available    \
        [ =2.4.2  =2.4.6  =2.8  =stable ]
...
 42  php7.4=latest            enabled      [ =stable ]
...
 61  dnsmasq2.85              available    [ =stable ]

Now you can install:
 # yum clean metadata
 # yum install php-cli php-pdo php-fpm php-json php-mysqlnd
```

Note, the yum install command above, apparently doesn't include all the packages you might have, so double check by running this:

`rpm -qa | grep php`

```
php-mysqlnd-7.2.34-1.amzn2.x86_64
php-mbstring-7.2.34-1.amzn2.x86_64
php-pecl-mcrypt-1.0.1-3.amzn2.0.1.x86_64
php-common-7.2.34-1.amzn2.x86_64
php-bcmath-7.2.34-1.amzn2.x86_64
php-gd-7.2.34-1.amzn2.x86_64
php-xml-7.2.34-1.amzn2.x86_64
php-pecl-imagick-3.4.4-1.amzn2.0.3.x86_64
php-pdo-7.2.34-1.amzn2.x86_64
php-cli-7.2.34-1.amzn2.x86_64
php-json-7.2.34-1.amzn2.x86_64
php-fpm-7.2.34-1.amzn2.x86_64
php-soap-7.2.34-1.amzn2.x86_64
```




`rpm -qa --qf "sudo yum install %{NAME}\n" | grep php`
sudo yum install php-mysqlnd
sudo yum install php-mbstring
sudo yum install php-pecl-mcrypt
sudo yum install php-common
sudo yum install php-bcmath
sudo yum install php-gd
sudo yum install php-xml
sudo yum install php-pecl-imagick
sudo yum install php-pdo
sudo yum install php-cli
sudo yum install php-json
sudo yum install php-fpm
sudo yum install php-soap


`sudo yum clean metadata`

```
Loaded plugins: extras_suggestions, langpacks, priorities, update-motd
Cleaning repos: amzn2-core amzn2extra-docker amzn2extra-epel amzn2extra-php7.4 ius netdata_netdata netdata_netdata-source
37 metadata files removed
13 sqlite files removed
0 metadata files removed
```
udo yum install php-cli php-pdo php-fpm php-json php-mysqlnd
Loaded plugins: extras_suggestions, langpacks, priorities, update-motd
amzn2-core                                                                                                                 | 3.7 kB  00:00:00     
amzn2extra-docker                                                                                                          | 3.0 kB  00:00:00     
amzn2extra-epel                                                                                                            | 3.0 kB  00:00:00     
amzn2extra-php7.4                                                                                                          | 3.0 kB  00:00:00 

...

Remove any PECL packages

`sudo yum -y remove  php-pecl-mcrypt-1.0.1-3.amzn2.0.1.x86_64 php-pecl-imagick-3.4.4-1.amzn2.0.3.x86_64`

```
...


Running transaction
  Erasing    : php-pecl-imagick-3.4.4-1.amzn2.0.3.x86_64                                                                                      1/2 
  Erasing    : php-pecl-mcrypt-1.0.1-3.amzn2.0.1.x86_64                                                                                       2/2 
  Verifying  : php-pecl-mcrypt-1.0.1-3.amzn2.0.1.x86_64                                                                                       1/2 
  Verifying  : php-pecl-imagick-3.4.4-1.amzn2.0.3.x86_64                                                                                      2/2 

Removed:
  php-pecl-imagick.x86_64 0:3.4.4-1.amzn2.0.3                              php-pecl-mcrypt.x86_64 0:1.0.1-3.amzn2.0.1                             

Complete!
```

Run the suggested by `amazon-linux-extras` command:
`sudo yum install php-cli php-pdo php-fpm php-json php-mysqlnd`
```
...
Dependencies Resolved

==================================================================================================================================================
 Package                           Arch                        Version                               Repository                              Size
==================================================================================================================================================
Updating:
 php-cli                           x86_64                      7.4.28-1.amzn2                        amzn2extra-php7.4                      4.9 M
 php-fpm                           x86_64                      7.4.28-1.amzn2                        amzn2extra-php7.4                      1.7 M
 php-json                          x86_64                      7.4.28-1.amzn2                        amzn2extra-php7.4                       71 k
 php-mysqlnd                       x86_64                      7.4.28-1.amzn2                        amzn2extra-php7.4                      241 k
 php-pdo                           x86_64                      7.4.28-1.amzn2                        amzn2extra-php7.4                      134 k
Updating for dependencies:
 php-bcmath                        x86_64                      7.4.28-1.amzn2                        amzn2extra-php7.4                       69 k
 php-common                        x86_64                      7.4.28-1.amzn2                        amzn2extra-php7.4                      1.1 M
 php-gd                            x86_64                      7.4.28-1.amzn2                        amzn2extra-php7.4                      182 k
 php-mbstring                      x86_64                      7.4.28-1.amzn2                        amzn2extra-php7.4                      514 k
 php-soap                          x86_64                      7.4.28-1.amzn2                        amzn2extra-php7.4                      211 k
 php-xml                           x86_64                      7.4.28-1.amzn2                        amzn2extra-php7.4                      199 k

Transaction Summary
==================================================================================================================================================
Upgrade  5 Packages (+6 Dependent packages)

Total download size: 9.4 M
Is this ok [y/d/N]: 

...
Running transaction
  Updating   : php-common-7.4.28-1.amzn2.x86_64                                                                                              1/22 
  Updating   : php-json-7.4.28-1.amzn2.x86_64                                                                                                2/22 
  Updating   : php-pdo-7.4.28-1.amzn2.x86_64                                                                                                 3/22 
  Updating   : php-mysqlnd-7.4.28-1.amzn2.x86_64                                                                                             4/22 
  Updating   : php-cli-7.4.28-1.amzn2.x86_64                                                                                                 5/22 
  Updating   : php-mbstring-7.4.28-1.amzn2.x86_64                                                                                            6/22 
  Updating   : php-xml-7.4.28-1.amzn2.x86_64                                                                                                 7/22 
  Updating   : php-gd-7.4.28-1.amzn2.x86_64                                                                                                  8/22 
  Updating   : php-bcmath-7.4.28-1.amzn2.x86_64                                                                                              9/22 
  Updating   : php-soap-7.4.28-1.amzn2.x86_64                                                                                               10/22 
  Updating   : php-fpm-7.4.28-1.amzn2.x86_64                                                                                                11/22 
  Cleanup    : php-fpm-7.2.34-1.amzn2.x86_64                                                                                                12/22 
  Cleanup    : php-mysqlnd-7.2.34-1.amzn2.x86_64                                                                                            13/22 
  Cleanup    : php-pdo-7.2.34-1.amzn2.x86_64                                                                                                14/22 
  Cleanup    : php-soap-7.2.34-1.amzn2.x86_64                                                                                               15/22 
  Cleanup    : php-bcmath-7.2.34-1.amzn2.x86_64                                                                                             16/22 
  Cleanup    : php-gd-7.2.34-1.amzn2.x86_64                                                                                                 17/22 
  Cleanup    : php-xml-7.2.34-1.amzn2.x86_64                                                                                                18/22 
  Cleanup    : php-mbstring-7.2.34-1.amzn2.x86_64                                                                                           19/22 
  Cleanup    : php-cli-7.2.34-1.amzn2.x86_64                                                                                                20/22 
  Cleanup    : php-json-7.2.34-1.amzn2.x86_64                                                                                               21/22 
  Cleanup    : php-common-7.2.34-1.amzn2.x86_64                                                                                             22/22 
  Verifying  : php-cli-7.4.28-1.amzn2.x86_64                                                                                                 1/22 
  Verifying  : php-mbstring-7.4.28-1.amzn2.x86_64                                                                                            2/22 
  Verifying  : php-json-7.4.28-1.amzn2.x86_64                                                                                                3/22 
  Verifying  : php-xml-7.4.28-1.amzn2.x86_64                                                                                                 4/22 
  Verifying  : php-pdo-7.4.28-1.amzn2.x86_64                                                                                                 5/22 
  Verifying  : php-gd-7.4.28-1.amzn2.x86_64                                                                                                  6/22 
  Verifying  : php-bcmath-7.4.28-1.amzn2.x86_64                                                                                              7/22 
  Verifying  : php-soap-7.4.28-1.amzn2.x86_64                                                                                                8/22 
  Verifying  : php-mysqlnd-7.4.28-1.amzn2.x86_64                                                                                             9/22 
  Verifying  : php-fpm-7.4.28-1.amzn2.x86_64                                                                                                10/22 
  Verifying  : php-common-7.4.28-1.amzn2.x86_64                                                                                             11/22 
  Verifying  : php-bcmath-7.2.34-1.amzn2.x86_64                                                                                             12/22 
  Verifying  : php-soap-7.2.34-1.amzn2.x86_64                                                                                               13/22 
  Verifying  : php-mysqlnd-7.2.34-1.amzn2.x86_64                                                                                            14/22 
  Verifying  : php-pdo-7.2.34-1.amzn2.x86_64                                                                                                15/22 
  Verifying  : php-json-7.2.34-1.amzn2.x86_64                                                                                               16/22 
  Verifying  : php-cli-7.2.34-1.amzn2.x86_64                                                                                                17/22 
  Verifying  : php-xml-7.2.34-1.amzn2.x86_64                                                                                                18/22 
  Verifying  : php-mbstring-7.2.34-1.amzn2.x86_64                                                                                           19/22 
  Verifying  : php-common-7.2.34-1.amzn2.x86_64                                                                                             20/22 
  Verifying  : php-fpm-7.2.34-1.amzn2.x86_64                                                                                                21/22 
  Verifying  : php-gd-7.2.34-1.amzn2.x86_64                                                                                                 22/22 

Updated:
  php-cli.x86_64 0:7.4.28-1.amzn2    php-fpm.x86_64 0:7.4.28-1.amzn2    php-json.x86_64 0:7.4.28-1.amzn2    php-mysqlnd.x86_64 0:7.4.28-1.amzn2   
  php-pdo.x86_64 0:7.4.28-1.amzn2   

Dependency Updated:
  php-bcmath.x86_64 0:7.4.28-1.amzn2  php-common.x86_64 0:7.4.28-1.amzn2  php-gd.x86_64 0:7.4.28-1.amzn2  php-mbstring.x86_64 0:7.4.28-1.amzn2 
  php-soap.x86_64 0:7.4.28-1.amzn2    php-xml.x86_64 0:7.4.28-1.amzn2    
```

Make sure no old packages are left behind

`rpm -qa | grep php`

```
php-pdo-7.4.28-1.amzn2.x86_64
php-xml-7.4.28-1.amzn2.x86_64
php-fpm-7.4.28-1.amzn2.x86_64
php-json-7.4.28-1.amzn2.x86_64
php-mysqlnd-7.4.28-1.amzn2.x86_64
php-mbstring-7.4.28-1.amzn2.x86_64
php-gd-7.4.28-1.amzn2.x86_64
php-soap-7.4.28-1.amzn2.x86_64
php-common-7.4.28-1.amzn2.x86_64
php-cli-7.4.28-1.amzn2.x86_64
php-bcmath-7.4.28-1.amzn2.x86_64
```
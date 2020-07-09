---
title: 'How to enable and start services on Alpine Linux'
date: '2020-07-09 04:36'
hide_git_sync_repo_link: false
blog_url: /blog
show_sidebar: true
show_breadcrumbs: true
show_pagination: true
hide_from_post_list: false
feed:
    limit: 10
content:
    items: '@self.children'
    limit: '5'
    order:
        by: date
        dir: desc
    pagination: '1'
    url_taxonomy_filters: '1'
bricklayer_layout: '1'
display_post_summary:
    enabled: '0'
---

How do I add or delete service at boot time on an Alpine Linux? How do I enable service such as Nginx/Apache at boot time on an Alpine Linux? How do I start/stop/restart services on an Alpine Linux?

Alpine Linux comes with OpenRC init system. This tutorial shows how to use the various command on OpenRC to manage services.


## View status of all services
Type the following command:
```
# rc-status
```
```
Runlevel: default
 crond                                  [  started  ]
 networking                             [  started  ]
Dynamic Runlevel: hotplugged
Dynamic Runlevel: needed/wanted
Dynamic Runlevel: manual
```
The default run level is called default, and it started crond and networking service for us.


## View service list
Type the following command:
```
# rc-status --list
```

Sample outputs:
```
boot
nonetwork
default
sysinit
shutdown
```
You can change run level using the rc command:
```
# rc {runlevel}
# rc boot
# rc default
# rc shutdown
```

1. **boot** – Generally the only services you should add to the boot runlevel are those which deal with the mounting of filesystems, set the initial state of attached peripherals and logging. Hotplugged services are added to the boot runlevel by the system. All services in the boot and sysinit runlevels are automatically included in all other runlevels except for those listed here.
2. **single** – Stops all services except for those in the sysinit runlevel.
3. **reboot** – Changes to the shutdown runlevel and then reboots the host.
4. **shutdown** – Changes to the shutdown runlevel and then halts the host.
5. **default** – Used if no runlevel is specified. (This is generally the runlevel you want to add services to.)

To see manually started services, run:
```
# rc-status --manual
apache2
```

To see crashed services, run:
```
# rc-status --crashed
```

## How to list all available services
Type the following command:
```
# rc-service --list
# rc-service --list | grep -i nginx
```

If apache2/nginx not installed, try the apk command to install it:
```
# apk add apache2
```

How to add/enable service at boot time
The syntax is:
```
rc-update add {service-name} {run-level-name}
```

To add apache2 service at boot time, run:
```
# rc-update add apache2
```

OR
```
# rc-update add apache2 default
```

Sample outputs:
```
 * service apache2 added to runlevel default
```

## How to start/stop/restart services on Alpine Linux
The syntax is as as follows:

### How to start service
The syntax is:
```
# rc-service {service-name} start
```

OR
```
# /etc/init.d/{service-name} start
```

### How to stop service
The syntax is:
```
# rc-service {service-name} stop
```

OR
```
# /etc/init.d/{service-name} stop
```

### How to restart service
The syntax is:
```
# rc-service {service-name} restart
```

OR
```
# /etc/init.d/{service-name} restart
```

Thus to stop, start, and restart an Apache2 service:
```
# rc-service apache2 stop
# rc-service apache2 start
### [ edit config file ] ###
# vi /etc/apache2/httpd.conf
### [ restart apache 2 after editing the file ] ###
# rc-service apache2 restart
```
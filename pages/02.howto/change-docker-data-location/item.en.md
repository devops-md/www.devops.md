---
title: 'Change Docker Data Location'
date: '2023-05-25 05:53'
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
published: true
taxonomy:
    category:
        - 'How To'
    tag:
        - linux
        - docker
---

## The Problem
By default, Docker keeps its data in `/var/lib/docker` directory. 

As Docker can expand rapidly and big, most of default partitioning during OS installation could lead to running out of disk pretty quickly, as we are tempted to try more and more Docker images.

Likelly, it's easy to fix that by having all that data moved to a different partition or even dedicated disk drive.

===

## The Solution

### Before we start

First of all, you probably want to solve the potential critical lack of space in your root or var partition, depending on you partitioning layout.
Refer to [Official Docker Documentation](https://docs.docker.com/config/pruning/) to free up some space by pruning unused objects.

#### Delete unused images

```shell
$ docker image prune
WARNING! This will remove all dangling images.
Are you sure you want to continue? [y/N] y
Deleted Images:
untagged: allebb/studio-server@sha256:5908b5897980704f76489b2d7181ffcc2b42e798e1af628765fdb0ce587d8253
deleted: sha256:8bbc7e426c0cfd8adf9559db14ba61e42693c7a24df9c9570b33ba4c501395d5
deleted: sha256:e0256a33393ed6f4401544daf720a127e3ab40a147bcc5ed7f6d985efda31148
deleted: sha256:8524d218c33f867695790d576ef60b59e1bfa3e51d9d55c6517612eda5b001bc
deleted: sha256:bcedade9bbc412f44743073527f45b70eae41eaaf08609998a5287f17ab5a092
deleted: sha256:fbf10a077425748de14f529352bad8883594a1ac5843023deee13c06908b1f98
deleted: sha256:38410133c194b35fd175d99fefb2abf557bb815af65abf2e0057305eb03bb0a9
deleted: sha256:6fc88b523bb70b199228e24d35201d645c5e71f679d9a7a9e1ccd9cc481cba55
deleted: sha256:b7d0898c0c51a6740253670631d8892f1ced311975b4e72545178052b59cb337
deleted: sha256:5ce5a8a1773cc12b93a533d432702545bfee806ae9e5974c5cd7b715f2cc1634
deleted: sha256:10e082c9f402fa15ba9f054e7eabd339645e65fee7a370ffdf50b8e5584cd4cf
deleted: sha256:212585169584e7564cd2b88e93b8ad29d47ba92dfeb3cd77d0b8e0b5e36ba9cf
deleted: sha256:202fe64c3ce39b94d8beda7d7506ccdfcf7a59f02f17c915078e4c62b5c2ed11

Total reclaimed space: 650.3MB
```

#### Delete unused containers (stopped)

```shell
docker container prune
WARNING! This will remove all stopped containers.
Are you sure you want to continue? [y/N] y
Deleted Containers:
d26e0134590eaef3e5b7fed3cbf7e0795afca3ad0fc64a0e7f20b8d2d9370a18
9cd53e398fb2eece8f6d9340a5e3f2d26d8df883891d2f82e2cdc1b6ac4257f8
9e09cfc4fb335b5fababa2378395490eb02b94bb8149049614749f17e3a0f5af
6baa54852e4c41180f96c6230ca245bfcdded75ddcbedbe19cf886698627e529
0f5c4b984fd24c41d5e6cebab154b5e5bb0e583340d8d5de0fe786f2e7418d04

Total reclaimed space: 135.8MB
```

#### Prepare for the big move

Now, when your system gain back some free space and can breath, we can start breathing as well. Next thing, check the actuall dick usage of Docker data

```shell
du -sh /var/lib/docker/
35G     /var/lib/docker/
```

Make sure the destination partition or disk has a considerable more available free space by running `df -h -x overlay -x tmpfs` (-x can exclude unwanted file systems from being showed)

```shell
df -h -x overlay -xtmpfs
Filesystem                  Size  Used Avail Use% Mounted on
udev                         12G     0   12G   0% /dev
/dev/mapper/pve-root         94G   90G  118M 100% /
/dev/mapper/pve-data--fast   98G   14G   80G  15% /data-fast
storage                     2.2T  781G  1.5T  35% /storage
...
/dev/fuse                   128M   40K  128M   1% /etc/pve
```

In my case, I'll give it a try and use `/data-fast` as it's another volume on my SSD. Next time when it will become a problem, I'll move to the ZFS `/storage`.

Now, I'm ready to move some data. Please note, don't do that in your production environment, especially when the combination of S, L and A letters is triggering a bell in your head. Live migration with minimal downtime is not covered here, but is not impossible.

### The big move

Again, this process requires to stop the Docker daemon, resulting in downtimes. Proceed with caution and clear mind.

I run all commands a root, so make sure you have the right elevated permissions as well before continuing.

#### Stop Docker Daemon

```shell
systemctl stop docker
Warning: Stopping docker.service, but it can still be activated by:
  docker.socket
```

Stop the docker.socket service as well

```shell
systemctl stop docker.socket
```

Now, `docker ps` command should fail

#### Move the data

This can take some time, all depends on your volume of data, disk speeds, and individual perception of time... that's why, we put in front of all the time command :)

Hint: On a remote system, always it's a good idea to use `screen` or any other way to keep your session up even if your connection is lost.

```shell
time mv /var/lib/docker /data-fast/
real    8m45.907s
user    0m5.483s
sys     1m33.998s
```

#### Edit the configuration

At this time, my data transfer is still in progress (the times I added later), but using a different session I can go ahead and change the settings so Docker will look for it's data in the new location.

Using `vi` (other editor might work as well, but I can't guaranty) edit the `/etc/docker/daemon.json`. In most cases, that file doesn't exists, so simply add the following

```json
{
  "data-root": "/data-fast/docker"
}
```

In my case, I already have something, so my file will result in this

```json
{
  "insecure-registries": ["pve.lan:5000"],
  "data-root": "/data-fast/docker"
}
```

Save the file and we are almost done

### Start the engines

Start back the stopped services

```shell
systemctl start docker.socket
systemctl start docker
```

and if everything went well, we are able to run `docker ps` and start using docker again

I have obtained a better balanced disk usage across partitions, so I'm happy with the results

```shell
df -h / /data-fast/ 
Filesystem                  Size  Used Avail Use% Mounted on
/dev/mapper/pve-root         94G   64G   27G  71% /
/dev/mapper/pve-data--fast   98G   40G   54G  43% /data-fast
```

## The Conclusion

All this could be avoided with a better planning in the beginning.
Even if your OS is already installed, you can choose a different location for Docker data right after installing Docker itself.
It's a perfect moment as the data folder is not so huge, and changing some stings, moving considerable less files, and having nothing running yet makes it yeasier and faster make the things right.

I hope you enjoyed this "[one of ten thousand](https://www.google.com/search?q=move+docker+data+to+another+disk&sxsrf=APwXEdcKaSzs5fkLty0lZ2Mup_7h-4xWPw%3A1684982875431&ei=W8xuZIXyGcu1qtsPvt-n4AE&oq=move+docker+data+to&gs_lcp=Cgxnd3Mtd2l6LXNlcnAQAxgAMgUIABCABDIGCAAQFhAeMgYIABAWEB4yBggAEBYQHjIGCAAQFhAeMgYIABAWEB4yBggAEBYQHjIGCAAQFhAeMgYIABAWEB4yBggAEBYQHjoKCAAQRxDWBBCwAzoGCAAQBxAeOgYIABAFEB46CAgAEIoFEIYDOgQIABAeSgQIQRgAUI8KWK9AYIZUaAJwAXgAgAFiiAG1A5IBATWYAQCgAQGgAQLAAQHIAQg&sclient=gws-wiz-serp)" article and learned something new.
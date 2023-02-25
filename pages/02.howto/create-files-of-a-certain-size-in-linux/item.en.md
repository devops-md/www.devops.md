---
title: 'Create Files of a Certain Size in Linux'
date: '2023-02-25 19:35'
creator: szavadschi
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
hide_from_post_list: false
---

Occasionally, you might need test files of exact size, to test transfer speeds for instance.

`mkdir tmp ; cd tmp`

### The `dd` way

Create a 10MB file

`dd if=/dev/zero of=testfile_10MB_zero bs=1024 count=10240`
```shell
10240+0 records in
10240+0 records out
10485760 bytes (10 MB, 10 MiB) copied, 0.0547554 s, 192 MB/s
```

`dd if=/dev/random of=testfile_10MB_random bs=1024 count=10240`
```shell
10240+0 records in
10240+0 records out
10485760 bytes (10 MB, 10 MiB) copied, 0.0926541 s, 113 MB/s
```
`dd if=/dev/urandom of=testfile_10MB_urandom bs=1024 count=10240`
```shell
10240+0 records in
10240+0 records out
10485760 bytes (10 MB, 10 MiB) copied, 0.087707 s, 120 MB/s
```
`ls -la`
```shell
total 30728
drwxrwxr-x  2 user group     4096 Feb 25 13:04 .
drwxr-x--- 24 user group     4096 Feb 25 13:02 ..
-rw-rw-r--  1 user group 10485760 Feb 25 13:04 testfile_10MB_random
-rw-rw-r--  1 user group 10485760 Feb 25 13:04 testfile_10MB_urandom
-rw-rw-r--  1 user group 10485760 Feb 25 13:04 testfile_10MB_zero
```
You should avoid using the `/dev/zero` when want to test transfer speeds over a compressed channel, like a `rsync` with `-z` option. The reason is, zerofiles will have a high compression ratio. here is the proof
gzip the files
`gzip *`
list the results
`ls -l`
```shell
total 20500
-rw-rw-r-- 1 user group 10487399 Feb 25 13:04 testfile_10MB_random.gz
-rw-rw-r-- 1 user group 10487400 Feb 25 13:04 testfile_10MB_urandom.gz
-rw-rw-r-- 1 user group    10227 Feb 25 13:04 testfile_10MB_zero.gz
```
or, human readable output
`ls -lh`
```shell
total 21M
-rw-rw-r-- 1 user group 11M Feb 25 13:04 testfile_10MB_random.gz
-rw-rw-r-- 1 user group 11M Feb 25 13:04 testfile_10MB_urandom.gz
-rw-rw-r-- 1 user group 10K Feb 25 13:04 testfile_10MB_zero.gz
```

### Other ways
Of course, there are many ways to accomplish this goal, here are few more

`fallocate -l $((10*1024*1024))  fallocate_10MB`
`truncate -s 10M truncate_10MB`

Let's check the compression behavior of that files too.

`gzip fallocate_10MB truncate_10MB`

List the files, you can see it's basically the same, zero filled files

`ls -lh fallocate_10MB.gz truncate_10MB.gz `
```shell
-rw-rw-r-- 1 user group 10K Feb 25 13:15 fallocate_10MB.gz
-rw-rw-r-- 1 user group 10K Feb 25 13:15 truncate_10MB.gz
```

Head command 

`head -c 10MB /dev/urandom > head_10MB_urandom && ls -la head_10MB_urandom`
```shell
-rw-rw-r-- 1 user group 10000000 Feb 25 13:29 head_10MB_urandom
```

`head -c 10MB /dev/zero > head_10MB_zero && ls -la head_10MB_zero`
```shell
-rw-rw-r-- 1 user group 10000000 Feb 25 13:30 head_10MB_zero
```

check the man pages

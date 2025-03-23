---
title: 'Run a Local Shell Script on a Remote Server via SSH'
date: '2021-09-22 12:32'
hide_git_sync_repo_link: false
blog_url: /howto
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
taxonomy:
    tag:
        - linux
---

The problem with running commands over SSH is that generally you either have to type them yourself or upload a script file. However, with a bit of bash knowledge, you can pass entire scripts over SSH without having the .sh file on the remote machine.

===

The Solution: Pass The Script Over Standard Input
The SSH command has a mode where you can run any single command on a remote server. In order to run multiple commands, you’ll have to use the following hack:

`ssh user@remotehost 'bash -s' < script.sh`

The `bash -s` command means “execute the following commands in a new bash session.”

The `-s` flag makes it read from standard input, and the `< script.sh` bit will read a local script file into standard input.

The file is read entirely locally, and all gets sent to the remote server without uploading anything. This does require you to put all the commands into a separate script file.

Running Many Remote Commands Inside a Script
If you instead want to run a portion of a shell script on another server, but not the entire thing, you can include nested blocks like the following in your script:
```shell
ssh user@remotehost 'bash -s' <<'ENDSSH'
   # The following commands run on the remote host
   echo "test"
   cd /home/
   pwd
ENDSSH
```
This works because bash -s is expecting any kind of standard input. The `<<'ENDSSH'` directive makes a “here-document” structure, basically passing all characters between it and the ending `ENDSSH` to standard input, and hence to the remote host over SSH.
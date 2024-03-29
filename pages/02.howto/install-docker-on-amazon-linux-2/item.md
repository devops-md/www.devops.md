---
title: 'Install Docker on Amazon Linux 2'
date: '18:20 13-02-2020'
taxonomy:
    category:
        - howtoo
    tag:
        - aws
        - docker
        - linux
hide_git_sync_repo_link: false
blog_url: /howto
show_sidebar: true
show_breadcrumbs: true
show_pagination: true
hide_from_post_list: false
feed:
    limit: 10
---

Amazon changed the install in Linux 2. One no-longer using 'yum' See: https://aws.amazon.com/amazon-linux-2/release-notes/

===

## Docker CE Install

```sh
sudo amazon-linux-extras install docker
sudo service docker start
sudo usermod -a -G docker ec2-user
```

Make docker auto-start

`sudo chkconfig docker on`

Because you always need it....

`sudo yum install -y git`

Reboot to verify it all loads fine on its own.

`sudo reboot`

## docker-compose install

Copy the appropriate `docker-compose` binary from GitHub:

`sudo curl -L https://github.com/docker/compose/releases/download/1.22.0/docker-compose-$(uname -s)-$(uname -m) -o /usr/local/bin/docker-compose`

Fix permissions after download: 

`sudo chmod +x /usr/local/bin/docker-compose`

Verify success: 

`docker-compose version`
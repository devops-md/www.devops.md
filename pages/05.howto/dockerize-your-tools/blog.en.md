---
title: 'Dockerize your tools'
date: '2021-09-20 19:54'
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
---

First of all, install Docker on your system. Please refer to official docs 
https://docs.docker.com/engine/install/
https://docs.docker.com/engine/install/linux-postinstall/

For Linux, add to your `~/.bash_aliases` the flowing lines

```
# Docker setup
alias aws='docker run --rm -ti -v ~/.aws:/root/.aws -v $(pwd):/aws amazon/aws-cli'

# Terraform setup
alias terraform='docker run -v ~/.terraform:/root/.terraform -v ~/.terraform.d:/root/.terraform.d -v `pwd`:/docker -v ~/.config:/root/.config -w /docker --rm -it hashicorp/terraform:1.0.7'
```

type `source ~/.bash_aliases` in order to apply the changes and check the new aliases

`aws --version`
```
Unable to find image 'amazon/aws-cli:latest' locally
latest: Pulling from amazon/aws-cli
6b2f67060278: Pull complete 
f0e77df718fa: Pull complete 
54a875460fb0: Pull complete 
4841158cf54b: Pull complete 
edfbad4bf4e7: Pull complete 
Digest: sha256:0dcd0642c954efa3c2ef3bc88856d11d59722d0f2bab2a2ead8549e67f96d7c3
Status: Downloaded newer image for amazon/aws-cli:latest
aws-cli/2.2.39 Python/3.8.8 Linux/5.11.0-34-generic docker/x86_64.amzn.2 prompt/off
```


`terraform --version`
```
Unable to find image 'hashicorp/terraform:1.0.7' locally
1.0.7: Pulling from hashicorp/terraform
a0d0a0d46f8b: Pull complete 
8b1118f5fcf1: Pull complete 
3d25b56c9b1b: Pull complete 
Digest: sha256:122487e6bf0b09a88ffc5c9044de6ceccfa1ecd145cccd9d9c4c06930d4bbefe
Status: Downloaded newer image for hashicorp/terraform:1.0.7
Terraform v1.0.7
on linux_amd64
```

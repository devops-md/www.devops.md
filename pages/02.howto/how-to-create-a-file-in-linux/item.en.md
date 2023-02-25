---
title: 'How to Create a File in Linux'
date: '2020-09-08 19:27'
hide_git_sync_repo_link: false
blog_url: /howto
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
taxonomy:
    category:
        - 'How To'
    tag:
        - linux
        - bash
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

A simple way to create a file in Linux. I can be empty of have a line of text, or multiple lines - you are all covered.

===

### Create an empty file

`touch file.txt`

### Create a file with text

`echo "Some text" > file.txt`

### Create a file with multiline text

```shell
cat <<EOF > file.txt
line1
line2
line3
EOF
```

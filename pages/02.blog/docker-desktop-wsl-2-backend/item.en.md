---
title: 'Docker Desktop WSL 2 backend'
media_order: '2020-06-26 (1).png,2020-06-04 (1).png,2020-06-04 (2).png'
date: '2020-06-26 21:46'
taxonomy:
    category:
        - 'How To'
    tag:
        - windows
        - linux
        - docker
        - wsl
        - wsl2
hide_git_sync_repo_link: false
blog_url: /blog
show_sidebar: true
show_breadcrumbs: true
show_pagination: true
hide_from_post_list: false
feed:
    limit: 10
---

Windows Subsystem for Linux (WSL) 2 introduces a significant architectural change as it is a full Linux kernel built by Microsoft, allowing Linux containers to run natively without emulation. With Docker Desktop running on WSL 2, users can leverage Linux workspaces and avoid having to maintain both Linux and Windows build scripts. In addition, WSL 2 provides improvements to file system sharing, boot time, and allows access to some cool new features for Docker Desktop users.

===

Docker Desktop uses the dynamic memory allocation feature in WSL 2 to greatly improve the resource consumption. This means, Docker Desktop only uses the required amount of CPU and memory resources it needs, while enabling CPU and memory-intensive tasks such as building a container to run much faster.

Additionally, with WSL 2, the time required to start a Docker daemon after a cold start is significantly faster. It takes less than 10 seconds to start the Docker daemon when compared to almost a minute in the previous version of Docker Desktop.

## Prerequisites
In case you system reports no WSL 2 distro

![](2020-06-26%20%281%29.png)

you must complete the following steps:
* Install Windows 10, version 2004 or higher.
* Enable WSL 2 feature on Windows. For detailed instructions, refer to the [Microsoft documentation](https://docs.microsoft.com/en-us/windows/wsl/install-win10).
* Download and install the [Linux kernel update package](https://docs.microsoft.com/windows/wsl/wsl2-kernel).

![](2020-06-04%20%281%29.png) ![](2020-06-04%20%282%29.png)
---
title: Home
hide_git_sync_repo_link: false
body_classes: 'title-center title-h1h2'
---

# Сообщество DevOps Moldova
## Join the DevOps side!

### Stay in touch
First of all, don't forget to check out our
* [Facebook Group](https://www.facebook.com/groups/devops.md/)
* [Facebook Page](https://www.facebook.com/devops.md/)
* [LinkedIn Group](https://www.linkedin.com/groups/13527841/)
* [Slack Channel](https://join.slack.com/t/devopsmd/shared_invite/zt-4ohkqths-get_wPjSSrYgTtIybwez0g)

### Get involved

This website is built with **Grav**
* Learn about **Grav** by checking out our dedicated [Learn Grav](http://learn.getgrav.org) site.
* Check out our [Grav Development Blog](http://getgrav.org/blog) to find out the latest goings on in the Grav-verse.
* Start collaborating in [DevOps Moldova GitHub](https://github.com/devops-md/www.devops.md)


### Create a New Page

Creating a new page is a simple affair in **Grav**.  Simply follow these simple steps:

1. Navigate to your pages folder: `user/pages/` and create a new folder.  In this example, we will use [explicit default ordering](http://learn.getgrav.org/content/content-pages) and call the folder `03.mypage`.
2. Launch your text editor and paste in the following sample code:

        ---
        title: My New Page
        ---
        # My New Page!

        This is the body of **my new page** and I can easily use _Markdown_ syntax here.

3. Save this file in the `user/pages/03.mypage/` folder as `default.md`. This will tell **Grav** to render the page using the **default** template.
4. That is it! Reload your browser to see your new page in the menu.

! NOTE: The page will automatically show up in the Menu after the "Typography" menu item. If you wish to change the name that shows up in the Menu, simple add: `menu: My Page` between the dashes in the page content. This is called the YAML front matter, and it is where you configure page-specific options.

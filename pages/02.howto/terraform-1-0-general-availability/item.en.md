---
title: 'Terraform 1.0 General Availability'
date: '2021-06-09 18:50'
hide_git_sync_repo_link: false
blog_url: /blog
show_sidebar: true
show_breadcrumbs: true
show_pagination: true
hide_from_post_list: false
feed:
    limit: 10
media_order: terraform10.jpeg
---

Terraform 1.0 — now generally available — marks a major milestone for interoperability, ease of upgrades, and maintenance for your automation workflows.

===

On June 08, 2021, HashiCorp announced the availability of Terraform 1.0. 
The text below grabbed (in-text links are stripped) from [Blog Post from HashiCorp website](https://www.hashicorp.com/blog/announcing-hashicorp-terraform-1-0-general-availability)

---

Today at HashiConf Europe, we are pleased to announce the general availability of HashiCorp Terraform 1.0, a major milestone for interoperability, ease of upgrades, and maintenance for your automation workflows. Terraform 1.0 is immediately available for download as well as for use in HashiCorp Terraform Cloud. HashiCorp Terraform is already widely used by individuals and teams in companies large and small as the standard for multi-cloud provisioning and automation. This post takes a look at what’s new, and what the 1.0 designation means for Terraform users.

### Greater Terraform State Interoperability
Terraform has made tremendous strides around interoperability. Terraform state is now cross-compatible between versions 0.14.x, 0.15.x, and 1.0.x. Remote state data source compatibility is now backported to support versions 0.12.30, 0.13.6, 0.14.0, 0.15.0, and 1.0.x. These improvements add flexibility to workflows as you move between versions of Terraform. Visit our Learn platform for hands-on tutorials about versioning Terraform and Terraform Cloud workspaces.

### Improved Upgrade Experience
Starting with Terraform 0.15 and continuing through the lifecycle of 1.x, you can now upgrade to a new Terraform version and your workflows will continue to be operational, just as they were in those prior versions. There is no requirement for upgrade tools, refactoring, or other changes in order to use Terraform 1.x.

### Extended Maintenance Periods
All Terraform 1.x releases will have a maintenance period of at least 18 months. This means HashiCorp will continue to investigate bugs and release features for the 1.0 release for at least that long. These fixes may be released in subsequent 1.x releases and not necessarily as incremental 1.0.x releases.

### Terraform Plugin SDK v1 End of Life
The Terraform Plugin SDK is a framework that lets developers create and maintain Terraform providers. HashiCorp will be ending support for the version 1 release of the Plugin SDK on July 31, 2021. Users of the Terraform CLI and Terraform Cloud are not affected by this and do not need to take any action. Maintainers of Terraform providers who are impacted are encouraged to use our upgrade guide to move to version 2 of the Terraform Plugin SDK. Follow our tutorials to develop your first provider. Additional information can be found in the Terraform Provider Developer Community Discuss forum: End of Life Timeline for v1 of the Terraform Plugin SDK.

### What Release 1.0 Means for Terraform
A 1.0 release is a huge accomplishment, and especially so for Terraform. For many of the folks that have contributed to the project or have been part of the more than 100,000,000 downloads, it has been a long time coming. But at HashiCorp, we approach product versions and the 1.0 designation in a consistent, transparent manner based on four key requirements, as documented in an April 2017 blog post on Packer’s 1.0 release.

The first requirement to reach 1.0 is for a product to have been deployed broadly with many years of hardening in production. Terraform has been provisioning and managing infrastructure since the first release in 2014 and is trusted across a wide range of industries from retail (Starbucks) to stock exchanges (TMX Group, Deutsche Börse Group) to self-driving cars (Cruise).

The second requirement is that the major use cases are understood and well-supported. Mitchell Hashimoto and Armon Dadgar had several use cases in mind when they created Terraform back in 2014. Since then over 1,500 contributors have opened more than 11,000 pull requests, which added new features and support new use cases that we never could have imagined.

The third requirement mandates a well-defined user experience. Terraform users approach their workflows from various viewpoints, so we focused on creating intuitive user interfaces; clear documentation; a comprehensive, self-paced learning platform; and interactive, instructor-led workshops.

The fourth requirement is ensuring that the product’s technical architecture is mature and stable.

Terraform 1.0 satisfies all four requirements in the form of greater interoperability, easier upgrades, and a significant maintenance period to solidify your automation workflows and the stability of Terraform’s feature set.

### Get Started with Terraform 1.0
We have many Terraform 1.0 resources for new and existing users. To learn more about the new functionality of Terraform 1.0 you can:

* Review the [documentation](https://www.terraform.io/docs/cli-index.html)
* Try our [HashiCorp Learn tutorials](https://learn.hashicorp.com/terraform) with Terraform 1.0
* Attend the [Announcing Terraform 1.0 webinar](https://www.hashicorp.com/events/webinars/terraform-product-update-engineering-overview) on June 16

To get started using Terraform 1.0:

* Download the Terraform 1.0 release.
* Choose “1.0.0” to update your Terraform Cloud workspaces to Terraform 1.0
* If you are upgrading from a previous release, read the upgrade guide to learn about upgrade considerations and steps.

For more details, please see the full changelog. This Terraform 1.0 release includes a number of code contributions from the community and would not have been possible without all of the great community feedback we've received via GitHub issues and elsewhere. Thank you!

Finally, for a look back at the history of Terraform, check out this fascinating new infographic.
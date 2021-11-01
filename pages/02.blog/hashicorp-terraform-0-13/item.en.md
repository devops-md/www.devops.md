---
title: 'HashiCorp Terraform 0.13'
media_order: '1588888056-terraformprimarylogofullcolorrgb[1].svg'
date: '2020-08-19 20:48'
taxonomy:
    category:
        - News
    tag:
        - Hashicorp
        - 'Hashicorp Terraform'
        - 'Hashicorp Terraform 0.13'
hide_git_sync_repo_link: false
blog_url: /blog
show_sidebar: true
show_breadcrumbs: true
show_pagination: true
hide_from_post_list: false
feed:
    limit: 10
---

HashiCorp has [Announced](https://www.hashicorp.com/blog/announcing-hashicorp-terraform-0-13/) General Availability of Terraform 0.13

As they are saying on their [blog](https://www.hashicorp.com/blog/announcing-hashicorp-terraform-0-13/), after much anticipation, Terraform 0.13 is now in general availability. It is immediately available for download as well as for use in Terraform Cloud.

===

The 0.13 release of Terraform builds on the powerful language improvements made with 0.12, with a focus on improved usability for module-specific workflows and enhancements to our vibrant and growing provider ecosystem. Terraform 0.13 is also the first major release featuring terraform login, which makes it simple to collaborate using Terraform Cloud.

# Terraform 0.13 Highlights
## Improvements to modules
Module-centric workflows are getting a boost with the count, depends_on and for_each features of the Terraform configuration language.
```
variable "project_id" {
  type = string
}

variable "regions" {
  type = map(object({
    region            = string
    network           = string
    subnetwork        = string
    ip_range_pods     = string
    ip_range_services = string
  }))
}

module "kubernetes_cluster" {
  source   = "terraform-google-modules/kubernetes-engine/google"
  for_each = var.regions

  project_id        = var.project_id
  name              = each.key
  region            = each.value.region
  network           = each.value.network
  subnetwork        = each.value.subnetwork
  ip_range_pods     = each.value.ip_range_pods
  ip_range_services = each.value.ip_range_services
}
```
[Check out the recent blog post](https://www.hashicorp.com/blog/terraform-0-13-brings-powerful-meta-arguments-to-modular-workflows) on these new module features! We've also updated our [HashiCorp Learn collections](https://learn.hashicorp.com/collections/terraform/configuration-language) for Terraform 0.13.

## Automatic Installation of Third-Party Providers
Terraform 0.13 also brings with it a new required providers block. The required providers syntax includes Terraform’s provider source syntax now supports a source address including hostname support for multiple registries and namespaced providers.
```
terraform {
    required_providers {
        # HashiCorp's dns provider
        hdns = {
            source = "hashicorp/dns"
        }
        # A hypothetical alternative dns provider
        mydns = {
            source = "mycorp/dns"
        }
    }
}
```
The changes around provider source go hand in hand with improvements to the [HashiCorp Terraform Provider Registry](https://registry.terraform.io/). With Terraform 0.13, terraform init will [automatically download and install](https://www.hashicorp.com/blog/automatic-installation-of-third-party-providers-with-terraform-0-13) partner, and community providers in the HashiCorp Terraform Registry, following the same clear workflow as HashiCorp-supported official providers. These improvements to the ecosystem will benefit Terraform users and provider developers alike.

For those using official HashiCorp providers such as GCP, AWS & Azure, your configurations will continue to work as is.

## Custom Variable Validation
[Custom variable validation](https://www.hashicorp.com/blog/custom-variable-validation-in-terraform-0-13), introduced as a language experiment in Terraform 0.12.20, is now a production-ready feature in Terraform 0.13.
```
variable "ami_id" {
  type = string

  validation {
    condition     = can(regex("^ami-", var.example))
    error_message = "Must be an AMI id, starting with \"ami-\"."
  }
}
```
## Terraform Cloud
Terraform 0.13 also includes improvements to the enhanced remote backend, allowing users of Terraform Cloud to take advantage of resource targeting (-target) & terraform state push. We’ve also backported these changes to Terraform 0.12 to help ease the transition.

## Getting Started
We have many resources available for 0.13 for new and existing users. To learn more about the new functionality of 0.13 you can:

* [Review the documentation](https://www.terraform.io/docs/cli-index.html)
* Try our [HashiCorp Learn tutorials](https://learn.hashicorp.com/terraform), which have been updated for Terraform 0.13
    * [Manage Similar Resources with Count](https://learn.hashicorp.com/tutorials/terraform/count)
    * [Manage Similar Resources with For Each](https://learn.hashicorp.com/tutorials/terraform/for-each)

### To get started using 0.13:

* Download the [Terraform 0.13 release](https://www.terraform.io/downloads.html).
* If you are upgrading from a previous release, read the upgrade guide to learn about the required [upgrade steps](https://www.terraform.io/upgrade-guides/0-13.html).

For more details, please see [the full changelog](https://github.com/hashicorp/terraform/blob/master/CHANGELOG.md). This release also includes a number of code contributions from the community and wouldn't have been possible without all of the great community feedback we've received via GitHub issues and elsewhere. Thank you!

HashiCorp Terraform 0.13 is the next step on our way to solidifying the Terraform ecosystem and empowering collaborative workflows at organizations of all sizes. You can download Terraform 0.13 [here](https://www.terraform.io/downloads.html) and sign up for a Terraform Cloud account [here](https://app.terraform.io/signup?utm_source=blog_0.12&utm_campaign=intro_tf_cloud_remote).
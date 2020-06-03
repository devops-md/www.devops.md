# Social Counters Plugin

The **Social Counters** plugin retrieves counts for both **GitHub** stars and **Twitter followers** and makes them available as Twig variables. You can see a [demo here](https://getgrav.org).

## Installation

Installing the Social Counters plugin can be done in one of two ways. The GPM (Grav Package Manager) installation method enables you to quickly and easily install the plugin with a simple terminal command, while the manual method enables you to do so via a zip file.

### GPM Installation (Preferred)

The simplest way to install this plugin is via the [Grav Package Manager (GPM)](http://learn.getgrav.org/advanced/grav-gpm) through your system's terminal (also called the command line).  From the root of your Grav install type:

    bin/gpm install social-counters

This will install the Social Counters plugin into your `/user/plugins` directory within Grav. Its files can be found under `/your/site/grav/user/plugins/social-counters`.

## Configuration

Before configuring this plugin, you should copy the `user/plugins/social-counters/social-counters.yaml` to `user/config/plugins/social-counters.yaml` and only edit that copy.

Here is the default configuration and an explanation of available options:

```yaml
enabled: true
cache_timeout: 3600
github:
  user: getgrav
  repo: grav
twitter:
  user: getgrav
```

Just update the information for your GitHub and Twitter accounts. 

> Note: the cache_timeout of `3600` is a sensible default to ensure you don't need to use any OAUTH tokens to get past any API limits

## Usage

The plugin makes a couple of variables available to be used:


#### GitHub Star Gazers (Stars)

```
{{ social_counters.github.stars }}
```

#### Twitter followers

```
{{ social_counters.twitter.followers }}
```
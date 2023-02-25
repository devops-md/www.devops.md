---
title: 'WIP: IAM Assume Role and ECR Login (awscli)'
date: '2020-07-14 04:51'
taxonomy:
    category:
        - 'How To'
    tag:
        - aws
        - docker
        - aws-cli
        - 'aws ecr'
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
---

A simple way to assume a different role and login to ECR
Inspired from [here](https://aws.amazon.com/premiumsupport/knowledge-center/iam-assume-role-cli/)

===

```shell
aws sts assume-role --role-arn "arn:aws:iam::123456789012:role/example-role" --role-session-name AWSCLI-Session
```

will return a json similar to:

```json
{
    "AssumedRoleUser": {
        "AssumedRoleId": "AROA3XFRBF535PLBIFPI4:s3-access-example",
        "Arn": "arn:aws:iam::123456789012:role/example-role"
    },
    "Credentials": {
        "SecretAccessKey": "9drTJvcXLB89EXAMPLELB8923FB892xMFI",
        "SessionToken": "AQoXdzELDDY//////////wEaoAK1wvxJY12r2IrDFT2IvAzTCn3zHoZ7YNtpiQLF0MqZye/qwjzP2iEXAMPLEbw/m3hsj8VBTkPORGvr9jM5sgP+w9IZWZnU+LWhmg+a5fDi2oTGUYcdg9uexQ4mtCHIHfi4citgqZTgco40Yqr4lIlo4V2b2Dyauk0eYFNebHtYlFVgAUj+7Indz3LU0aTWk1WKIjHmmMCIoTkyYp/k7kUG7moeEYKSitwQIi6Gjn+nyzM+PtoA3685ixzv0R7i5rjQi0YE0lf1oeie3bDiNHncmzosRM6SFiPzSvp6h/32xQuZsjcypmwsPSDtTPYcs0+YN/8BRi2/IcrxSpnWEXAMPLEXSDFTAQAM6Dl9zR0tXoybnlrZIwMLlMi1Kcgo5OytwU=",
        "Expiration": "2016-03-15T00:05:07Z",
        "AccessKeyId": "ASIAJEXAMPLEXEG2JICEA"
    }
}
```

manually set the env variables or use this oneliner 

```shell
eval `aws sts assume-role --role-arn "arn:aws:iam::123456789012:role/example-role" --role-session-name AWSCLI-Session | jq -r '"export AWS_ACCESS_KEY_ID=" + .Credentials.AccessKeyId, "export AWS_SECRET_ACCESS_KEY="+.Credentials.SecretAccessKey, "export AWS_SESSION_TOKEN="+.Credentials.SessionToken'`
```

once you have the new variables set, you can login to ECR as you normally do:

```shell
$(aws ecr get-login --registry-ids 012345678910)
```

This could be easily be integrated in a shell step in Jenkins pipeline / job: 

```java
...
withAwsCli(credentialsId: 'some-credentials') {
    sh '''
    eval `aws sts assume-role --role-arn "arn:aws:iam::123456789012:role/example-role" --role-session-name AWSCLI-Session | jq -r '"export AWS_ACCESS_KEY_ID=" + .Credentials.AccessKeyId, "export AWS_SECRET_ACCESS_KEY="+.Credentials.SecretAccessKey, "export AWS_SESSION_TOKEN="+.Credentials.SessionToken'`
    $(aws ecr get-login --registry-ids 012345678910)
    docker push 012345678910.dkr.ecr.eu-west-1.amazonaws.com/some/image:tag
    '''
}
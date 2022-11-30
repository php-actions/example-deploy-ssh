An example project that uses [php-actions/deploy-ssh](https://github.com/php-actions/deploy-ssh)
========================================================================================

> **THIS IS CURRENTLY WORK IN PROGRESS** - once v1 is released there will be no more major changes.

This is a trivial PHP project that deploys automatically to example servers. Every branch is automatically deployed to a staging server, and every release is deployed to a production server. The responsibility of this repository is to stream the build project workspace to the remote server and perform basic post-deployment configuration, but to be a complete example, when a release is made, the "production" workflow uses Digital Ocean to deploy an entirely fresh new server, and then kills off the existing one.

TODO: 

Digital Ocean

+ [ ] Use official doctl to handle production releases onto fresh server
+ [ ] Smoke test new server to check it's deployed correctly
+ [ ] Automatically cull old production server after new one's smoke test is passing

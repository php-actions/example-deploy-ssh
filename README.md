An example project that uses [php-actions/deploy](https://github.com/php-actions/deploy)
========================================================================================

> **THIS IS CURRENTLY WORK IN PROGRESS** - once v1 is released there will be no more major changes.

This is a trivial PHP project that deploys automatically to example servers. Every branch is automatically deployed to a staging server, and every release is deployed to a production server. The staging server hosts multiple instances of the project - one per branch - and the production server uses Digital Ocean to deploy an entirely fresh new server each time there's a release made in Github.

The functionality of this project is a simple "Hello, you!" greeter, where the user types in their name, and the page updates to contain a personalised greeting. To simulate a real-world application, the functionality is tested using Behat, so if the functionality breaks, deployment will be halted.

The deployment is made to `example-deploy-ssh.php-actions.g105b.com`, which is set up to serve the `www.` subdomain to the latest release (on its own server), and all branches to the `branch_name.dev.` subdomain (on a staging server). This emulates the common usage of having http://master.dev.example.com as the latest bleeding-edge test, http://feature-branch.dev.example.com for testing individual features, and of course http://www.example.com for the latest release.

TODO: 
+ [x] Make a basic project with some tests
+ [x] Add the deploy action, dependent on tests
+ [ ] Test that if tests fail, deploy doesn't happen
+ [ ] Check what happens on remote server
+ [ ] COMPLETE!

Digital Ocean

+ [ ] Use official doctl to handle production releases onto fresh server
+ [ ] Smoke test new server to check it's deployed correctly
+ [ ] Automatically cull old production server after new one's smoke test is passing

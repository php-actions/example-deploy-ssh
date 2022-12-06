An example project that uses [php-actions/deploy-ssh](https://github.com/php-actions/deploy-ssh)
========================================================================================

> **THIS IS CURRENTLY WORK IN PROGRESS** - once v1 is released there will be no more major changes.

This is a trivial PHP project that deploys automatically to example servers. Every branch is automatically deployed to a staging server, and every release is deployed to a production server. The staging server hosts multiple instances of the project - one per branch - and the production server uses Digital Ocean to deploy an entirely fresh new server each time there's a release made in Github.

The functionality of this project is a simple "Hello, you!" greeter, where the user types in their name, and the page updates to contain a personalised greeting. To simulate a real-world application, the functionality is tested using Behat, so if the functionality breaks, deployment will be halted.

The deployment is made to `example-deploy-ssh.php-actions.g105b.com`, which is set up to serve the `www.` subdomain to the latest release (on its own server), and all branches to the `branch_name.dev.` subdomain (on a staging server). This emulates the common usage of having http://master.dev.example.com as the latest bleeding-edge test, http://feature-branch.dev.example.com for testing individual features, and of course http://www.example.com for the latest release.

Branches
--------

The [`ci.yml`][ci] config runs for every push to any branch. This means that every branch will be deployed by default, due to the use of `on: [push]`. This part of the config can be made more complex by [adding rules to match or ignore certain branch names or patterns](https://docs.github.com/en/actions/using-workflows/workflow-syntax-for-github-actions#onpull_requestpull_request_targetbranchesbranches-ignore).

As an example, this repository has a branch called `red`, which deploys to https://red.example-deploy-ssh.php-actions.g105b.com - you can have 10 points if you guess what it does, or you can check the diff to see exactly what is on this branch: https://github.com/php-actions/example-deploy-ssh/compare/master...red

Config & Secrets
----------------

Most projects require some secret information to be passed as part of the deployment, whether that's API keys, usage tokens, SSH identites, etc. this data can't be placed in a file in the repository, otherwise it may be seen by other people on the team, or on the internet.

This example project uses [php.gt/config][config] to manage the project configuration. By default, the [config.ini][config.ini] file contains an example test key, but doesn't include any secret message.

The [ci.yml][ci] has two steps in it called `Generate config value from Github Secret` and `Inject branch name into Config` as examples of how this kind of secret information and config management can be handled.

As part of the deployment process, just before the files are transferred to the remote server, a secret is injected into the config, and a message containing the current branch name is injected over the top of the existing `test_key`.

This means that if you check the [master deployment](https://master.example-deploy-ssh.php-actions.g105b.com), you'll see the secret value on the page, and if you check [another branch's deployment](https://red.example-deploy-ssh.php-actions.g105b.com), you'll see that the branch name has been successfully injected at deploy time.

TODO: 

Digital Ocean production deployment

+ [ ] Use official doctl to handle production releases onto fresh server
+ [ ] Smoke test new server to check it's deployed correctly
+ [ ] Automatically cull old production server after new one's smoke test is passing

[ci]: https://github.com/php-actions/example-deploy-ssh/blob/master/.github/workflows/ci.yml
[config]: https://php.gt/config
[config.ini]: https://github.com/php-actions/example-deploy-ssh/blob/master/config.ini

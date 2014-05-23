txtmindus
=========

Text messaging reminder service using [Nexmo](http://nexmo.com), created during php[tek] 2014 hackathon

## Setting up dev environment ##
For vagrant to work, add this to your hosts file:

``192.168.35.10   txtmindus.local``

Also, you need to create the application/protected/config/local.php file and fill out the github settings.
You can just copy the local.php.dist file to local.php and edit it.

You can get the client_id and client_secret by registering an application at https://github.com/settings/applications/

When registering the application, set the return url to http://txtmindus.local/auth/return

## Git Flow ##
Please use git-flow with standard configuration.

 - Git plugin: https://github.com/nvie/gitflow
 - Overview of process: http://nvie.com/posts/a-successful-git-branching-model/
#README#


##How to Install##

1) Clone the repository to your computer.

2) Open the folder and type this:

_bash install.sh_

3) After everything is installed, type this:

_gulpstart_

4) If you no longer want the global command, type this:

_bash removeGulp.sh_



##Testing##

To test whether or not Gulp is working, type this

_ps -ef | grep gulp_

If a line appears that is simply titled *gulp* the script has started successfully.


##Killing Gulp##

If you wish to kill the application while it is running in the background, type this:

_pkill gulp_

This will end the script -- you will no longer have live updates on your code.
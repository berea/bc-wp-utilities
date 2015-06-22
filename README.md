#README#

##What it does##

The copy script is designed to deposit the 99gulp.sh into the folder of automatically started scripts
whenever your system is restarted.  For Turnkey Linux (our testing environment), this is the:

/usr/lib/inithooks/firstboot.d/

This script starts from the ground up, installing dependencies that are required to execute the gulp
script.  If a dependency is no available, the script installs them.  The first time this script is
executed, expect a longer duration for start-up.The command will look to see if the there is a 
node_modules folder, and if none exists, it will activate the npm installer to install the packages 
listed in the package.json file.

*Gulp is started in the background, but will interrupt standard output when activated.*


##Clean-Up##

Once you are finished developing and you would no long like the script to automatically start at each
time you reboot your system, simply run the removeGulp.sh script.  This will remove the file from the
scripts folder, thereby removing the 100gulp.sh from activating.
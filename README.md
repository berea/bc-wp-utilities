#README#

##What it does##

The copy script is designed to deposit the 100gulp.sh into the folder of automatically started scripts
whenever your system is restarted.  For Turnkey Linux (our testing environment), this is the:

/usr/lib/inithooks/firstboot.d/

The command will look to see if the there is a node_modules folder, and if none exists, it will activate the
npm installer to install the packages listed in the package.json file.  

*THIS ASSUMES THAT SASS IS ALREADY INSTALLED*

##Clean-Up##

Once you are finished developing and you would no long like the script to automatically start at each
time you reboot your system, simply run the removeGulp.sh script.  This will remove the file from the
scripts folder, thereby removing the 100gulp.sh from activating.

##Installing Node.js and NPM##

In your VM, enter this into the console

*curl -sL https://deb.nodesource.com/setup_0.12 | bash -*

*apt-get install -y nodejs*

##Installing Gulp through NPM##

*npm install gulp -g*


##Installing Ruby and SASS##

In your VMs terminal, type this:

*apt-get install ruby*

Accept the progress and once it finishes installing, type this:

*su -c "gem install sass"*

This will install the appropriate dependencies for the gulp-ruby-sass to install.
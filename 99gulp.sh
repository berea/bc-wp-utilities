#if the machine does not have node.js installed on the machine...
if [ ! -f /usr/bin/node ]; then
	curl -sL https://deb.nodesource.com/setup_0.12 | bash -
	apt-get install -y nodejs
fi

#If the machine does not have gulp installed globally...
if [ ! -f /usr/bin/gulp ]; then
	npm install gulp -g
fi

#If Ruby is not installed on the machine...
if [ ! -f /usr/bin/ruby ]; then
	apt-get install ruby
fi

#If Sass is not installed on the machine
if [ ! -f /usr/local/bin/sass ]; then
	su -c "gem install sass"
	cp /usr/local/bin/sass /usr/bin #Copy the executable to the global
	cp /usr/local/bin/scss /usr/bin	#folder for accessibility on startup
fi

cd /var/www/wordpress/wp-content/themes/

#If the repository has not been pulled from GitHub yet...
if [ ! -d /var/www/wordpress/wp-content/themes/bc-wp-2015/ ]; then
	git clone https://github.com/berea/bc-wp-2015
fi


#change to the repository directory
cd bc-wp-2015/

#checks to see if the devDependencies are installed
if [ ! -d node_modules/ ]; then
	npm install --save-dev
fi

#And finally!!!!
gulp & #runs gulp in the background

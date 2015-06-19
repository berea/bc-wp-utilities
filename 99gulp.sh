if [ ! -f /usr/bin/node ]; then
	curl -sL https://deb.nodesource.com/setup_0.12 | bash -
	apt-get install -y nodejs
fi

if [ ! -f /usr/bin/gulp ]; then
	npm install gulp -g
fi

if [ ! -f /usr/bin/ruby ]; then
	apt-get install ruby
fi

if [ ! -f /usr/local/bin/sass ]; then
	su -c "gem install sass"
	cp /usr/local/bin/sass /usr/bin
	cp /usr/local/bin/scss /usr/bin	
fi

if [ ! -d /var/www/wordpress/wp-content/themes/bc-wp-2015/ ]; then
	git clone https://github.com/berea/bc-wp-2015
fi

cd /var/www/wordpress/wp-content/themes/bc-wp-2015

#checks to see if the devDependencies are installed
if [ ! -d node_modules/ ]; then
	npm install --save-dev
fi

gulp

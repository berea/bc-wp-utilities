cd /var/www/wordpress/wp-content/themes/bc-wp-2015

#checks to see if the devDependencies are installed
if [ ! -d node_modules/ ]; then
	npm install --save-dev
fi

gulp
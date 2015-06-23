#
#!/inithooks/firstinit.d/
#
# This script installs the needed dependencies
# to run gulp/set up the environment for testing
#

echo "I'm a $OSTYPE computer!"
echo ""

if [[ "$OSTYPE" == "linux"* ]]; then
	bash install_dependencies
	ls /usr/local/bin/
	cp ./gulpstart /usr/local/bin/
	cd /usr/local/bin/
	chmod +x gulpstart
	echo ""
	ls /usr/local/bin/

fi

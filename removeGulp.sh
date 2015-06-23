#
#!/inithooks/firstinit.d/
#
# This file removes the gulpfile from the /usr/local/bin
# script folder.
#

echo "I'm a $OSTYPE computer!"

if [[ "$OSTYPE" == "linux"* ]]; then
	ls /usr/local/bin/
	rm /usr/local/bin/gulpstart
	cd /usr/local/bin/
	echo ""
	ls /usr/local/bin/
	
fi

#
#!/inithooks/firstinit.d/
#
# This file removes the gulpfile from the everyboot
# script folder.
#

echo "I'm a $OSTYPE computer!"

if [[ "$OSTYPE" == "linux"* ]]; then
	ls /usr/lib/inithooks/everyboot.d/
	rm /usr/lib/inithooks/everyboot.d/99gulp.sh
	echo ""
	ls /usr/lib/inithooks/everyboot.d/
	
fi

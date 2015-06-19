#
#!/inithooks/firstinit.d/
#
# This file automatically starts the gulpfile
# which will watch and auto compile upon any change
# in the source files.
#

echo "I'm a $OSTYPE computer!"

if [[ "$OSTYPE" == "linux"* ]]; then
	ls /usr/lib/inithooks/firstboot.d/
	rm /usr/lib/inithooks/firstboot.d/100gulp.sh
	echo ""
	ls /usr/lib/inithooks/firstboot.d/
	
#elif [[ "$OSTYPE" == "MAC"* ]]; then
	#cp "gulpscript/100gulp.sh" "/Library/LaunchDaemons/"
	
#else
	#echo "Nothing...."
fi

#elif [[ $OSTYPE == "WIN32"*]]; then
#	copy "gulpscript\100gulp.sh" ""
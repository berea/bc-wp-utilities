#
#!/inithooks/firstinit.d/
#
# This file automatically starts the gulpfile
# which will watch and auto compile upon any change
# in the source files.
#

echo "I'm a $OSTYPE computer!"
echo ""

if [[ "$OSTYPE" == "linux"* ]]; then
	ls /usr/lib/inithooks/firstboot.d/
	cp ./100gulp.sh /usr/lib/inithooks/firstboot.d/
	echo ""
	ls /usr/lib/inithooks/firstboot.d/

fi

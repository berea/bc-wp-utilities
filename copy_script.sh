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
	ls /usr/lib/inithooks/everyboot.d/
	cp ./99gulp.sh /usr/lib/inithooks/everyboot.d/
	echo ""
	ls /usr/lib/inithooks/everyboot.d/

fi

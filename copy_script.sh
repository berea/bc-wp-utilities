#
#!/inithooks/firstinit.d/
#
# This file copies a file to the everyboot folder
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

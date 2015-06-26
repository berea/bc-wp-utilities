#README#

##Running the Sass_Mapper Script##

1. Open the sass_mapper.php file

2. Change the 'dir' variable to your exact directory

3. In your console, type:

		php sass_mapper.php
	
	* This will run a general map.
	* Other options include:
	
			php sass_mapper.php -v <name>
	
	* This looks for a specific variable throughout all the files
	* It will display the variables it defines, and which class/id it is used in
	
			php sass_mapper.php -c <name>
	
	* This looks for a class names throughout all the files
	
			php sass_mapper.php -i <name>
	
	* This looks for all the id names throughout all the files


##How to Install Script for Gulp##

1. Clone the repository to your computer.

2. Open the folder and type this:

	`bash install.sh`

3. After everything is installed, type this:

	`gulpstart`

4. If you no longer want the global command, type this:

	`bash removeGulp.sh`



##Testing##

To test whether or not Gulp is working, type this

`ps -ef | grep gulp`

If a line appears that is simply titled *gulp* the script has started successfully.


##Killing Gulp##

If you wish to kill the application while it is running in the background, type this:

`pkill gulp`

This will end the script -- you will no longer have live updates on your code.
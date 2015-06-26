<?php 

// Recurse a SCSS construction and display the file hierarchy.
//$start_dir  = getcwd();
$start_dir = 'C:\Users\rossma\Documents\bc-wp-2015\assets\sass';
$start_file = 'style.scss';

if(isset($argv[1])) {
	
	$switch = $argv[1];
	if(isset($argv[2])) { $name = $argv[2];}
	else {
		echo "Error... Must supply name of class, id, or variable after switch!\n"; 
		return -1;
	}

	switch($switch) {
		case '-c':
			//employ class expression
			echo "begin looking for a class called {$name}...\n\n";
			check_for_import(1, $start_dir, $start_file, 'class', $name);
			break;
		case '-i':
			//employ id expression
			echo "begin looking for an id called {$name}...\n\n";
			check_for_import(1, $start_dir, $start_file, 'id', $name);
			break;
		case '-v':
			//emply variable expression
			echo "begin looking for a variable called {$name}...\n\n";
			check_for_import(1, $start_dir, $start_file, 'var', $name);
			break;
		default:
			echo "Error... Not a valid switch... Either -c, -i, or -v <name>\n";
			return -1;
			break;
	}
}
else{
	check_for_import(1, $start_dir, $start_file);
}

function check_for_import($indent, $dir, $file, $switch='null', $name='null') 
{
	$this_file = $dir . '/' . $file;
	if ( file_exists($this_file) ) {
		
		//pull the lines from the file and pull into the variable
		$lines = file($this_file);

		//regular expression
		$pattern = '/@import [\"\'](.*)[\"\'];/';

		//switch statements to gear the Extra_PATTERN
		//to find either the class or id you're looking for!
		switch($switch){
			case 'id':
				$e_pattern = '/#('. $name .') {/';
				var_parse($lines,$e_pattern,$indent,$switch,$name);
				break;
			case 'class':
				$e_pattern = '/\.('. $name .') {/';
				var_parse($lines,$e_pattern,$indent,$switch,$name);
				break;
			case 'var':
				$e_pattern = '/\$('. $name . '):/';
				var_parse($lines,$e_pattern,$indent,$switch,$name);
				break;
			default:
				//otherwise, the unfindable search
				$e_pattern = '/################/';
				break;
		}
		

		//for each line in the file...
		foreach ($lines as $line_num => $line) {
			
			$num_tabs = str_repeat("\t",$indent);
			
			//prolog-esque compare and dump
			preg_match($pattern, $line, $matches);

			if ( $matches ) {

				$next_parts = explode('/', $matches[1]); //BOOOM!!
				$next_file = '_' . array_pop($next_parts) . '.scss';
				
				$next_indent = $indent;
				$next_indent++;


				$next_dir = $dir . '/' . implode('/', $next_parts); //BLACK HOLE!!
				echo $num_tabs . $matches[1] . "\n";

				check_for_import($next_indent, $next_dir, 
								 $next_file, $switch, $name);  //RECURSION!!
			}
			
			else{
				// No matches. Continue.
			}
		}
	}
	else {

		echo str_repeat("\t",$indent) . "Hmm...I can't find \n"
			. "**[" . $this_file . "]**\n";
	}
}

//Array_or_strings -> Regex -> #Indents -> type/switch -> string (name) -> echo'd results
function var_parse($lines,$pattern,$indent,$switch,$name){
	
	if($switch == 'var'){
		//NEEDS / TO BEGIN REGEX
		
		//Set up the regex to find classes and ids
		$class = '/\.(.*) {.*\n/';
		$id = '/#(.*) {.*/';
		$end ='/}/'; //if found, pop from array!
				
		//make arrays to push and pop from to find
		//if the variable is located inside.
		$classes = [];
		$ids = [];
		
		$var = '\$('. $name . ')';
		$set_var = '/(' . $var . '):/';
		$function_specific = '/.*\(.*(' . $var . '):/';
		$any_var = '/[\t]*(.*):/';
		$var_use = '/[: ]('. $var . ')/';
		
		foreach ($lines as $line_num => $line) {
			
			preg_match($class,$line,$c_match);
			preg_match($id,$line,$i_match);
			preg_match($end,$line,$e_match);
			
			/**
			* If you've found a class or id
			* push to the stack, or if found
			* a closing bracket, pop the entry
			**/
			if($c_match){
				array_push($classes,$c_match[1]);
			} elseif($i_match){
				array_push($ids,$i_match[1]);
			} elseif($e_match){
				if(count($classes) > 0){
					array_pop($classes);
				} elseif(count($ids) > 0){
					array_pop($ids);
				}
			}
			
			//perform ALL the searches...
			//well... most of them
			preg_match($set_var,$line,$set_match);
			preg_match($function_specific,$line,$function_match);
			preg_match($any_var,$line,$any_match);
			preg_match($var_use,$line,$var_use_match);
			
			//If the variable is found to be a function specific variable...
			if(!$function_match){
				
				$num_tabs = str_repeat("\t",$indent);
				$var_display = "***" . $num_tabs;
				
				//sets up the variable to display in the class || id || both
				$sc = count($classes);
				$si = count($ids);
				if($sc > 0 && $si > 0){
					$nest = $var_display . "Var in ". $classes[$sc-1] . " class and "
						   .$ids[$si-1] . "id\n";
				} elseif ($sc > 0){
					$nest = $var_display . "Var in ". $classes[$sc-1] . " class\n\t";
				} elseif ($si > 0){
					$nest = $var_display . "Var in " . $ids[$si-1] . " id\n\t";
				} else{
					$nest = "";
				}
				
				//if the variable is set...
				if($set_match){
					echo $nest;
					echo $var_display . $set_match[1] . " is set...\n";
				}
				//if the variable is used
				elseif($var_use_match){
					//if there is something the variable defines.
					if($any_match){
						echo $nest;
						echo $var_display . $var_use_match[1] 
							." defines " . $any_match[1] ."...\n";
					}
					//Otherwise... just display that it's being used
					else{
						echo $nest;
						echo $var_display . $var_use_match[1] . " is used...\n";
					}
				}
			}
		}
	}
	
	else{
			
		//Search through the entire file before looking
		//at the dependencies... Necessary -- otherwise
		//the variables are shown the end of the tree...
		foreach ($lines as $line_num => $line) {
			
			$num_tabs = str_repeat("\t",$indent);
			$var_display = "***" . $num_tabs;
			
			//search!
			preg_match($pattern, $line, $matches);
			
			if( $matches ) {
				//print out the name of the variable, class, or id
				//that is being search for throughout the files.

				if(isset($matches[1])){
					
					$class_name = $matches[0];
					
					if(isset($class_name[0])) {
						$nindent = $indent+1;
						echo $var_display . $name . "\n";
					}
				}
			}
		}
	}
}

echo "\n\nDone! || Finished! || Fertiggestellt!\n";
?>
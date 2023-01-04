<?php

class Split{
    
    public $path;

    public function Split($path){  
        
        ini_set('memory_limit', '1G');
        //clears the terminal
        system('clear');
        //changes the terminal color to white
        echo("\033[1;37m");
        
            $filename = $path;
            $name = $filename;
            $number_of_lines = 5000;
            //opens the file
            $f = @fopen($filename, 'rb');
            //defines the total_line var
            $total_lines = 1;
            //counts through the file to get all the new lines
            while (!feof($f)) $total_lines += substr_count(fread($f, 8192),"\n");
            //closes the main file
            fclose($f);
            //outputs the number of total lines
            echo("[\033[0;37m".current_time()."\033[1;37m] " . number_format($total_lines) . " number of lines..\033[1;37m\n");

            //gets the estimated number of files from dividing the number of lines
            $number_of_files = ceil(@($total_lines / $number_of_lines));

            echo("[\033[0;37m".current_time()."\033[1;37m] Esitmated number of files: " . number_format($number_of_files) . " \n");
            //defines the number for the name
            $i = 0;
            //opens the main file
            $file = fopen($filename, "rb");

            //defines the folder name
            $folder_name = "split/";
            // //defines the folder number
            // $fi = 0;
            // //if there is a folder loop
            //  while (file_exists($folder_name)) {
            // // //increase the number
            // $fi++;
            // // //sets a new name
            //  $folder_name = "split$fi/";
            // }
            //makes the new folder after it finally doesn't exist
            mkdir($folder_name,0777,true);
            echo("[\033[0;37m".current_time()."\033[1;37m Splitting $filename into $folder_name...\033[1;37m\n");

            while (!feof($file)) {
            //increments the loop for filenames
            @$i++;
            //makes the new file name
            $new_file = "$folder_name  part$i.$name";
            //opens the new file
            $new = fopen($new_file,"ab");

            //start a line counter
            $cl = 0;
            //while the line counter is less then the number of lines & the main file hasn't ended loop
            while($cl < $number_of_lines && !feof($file)) {
                //gets the next line.WHERE MY CODE SHOULD LIE
                $line = fgets($file);

                //writes the next line to the new file
                fwrite($new, $line);

                //increases the new file's line count
                $cl++;
            }
            }
            //closes the new file
            fclose($new);
            echo("[\033[0;37m".current_time()."\033[1;37m] File \033[1;33m" . number_format($i) . "\033[1;37m / \033[1;33m" . number_format($number_of_files) . " \033[1;32mCompleted\033[1;37m!\n");


            echo("[\033[0;37m".current_time()."\033[1;37m] Splitting of $filename into $folder_name \033[1;32mCompleted\033[1;37m!\n\n");
            fclose($file);

            return $folder_name;
    }
}
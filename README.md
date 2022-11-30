****** Steps for easy Use
   - Do a composer install for all dependencies.
```
composer install
```
   - Download the latest json lines manually and append filename to deline.
   ```
$json_lines = (new JsonLines())->delineEachLineFromFile('jobs_2022_11_30.jsonl'); 

   ```
   Otherwise, 

   ```
   $json_lines = (new JsonLines())->delineEachLineFromFile($path);
   ```
   $path Comes from aws autoload
   - Index.php saves file into current Folder.
   - generate_csv.php outputs a downloaded file with contents written on.
<p>Generally Split class split into 5000 each file . you can edit on split.class.php</p>
# S3-Buckect jsonlines splitted to CSV
> This is an automated script to download _zstandard_ zipped jsonlines file from the **S3-BUCKET** cloud and unzip it automatically to jsonlines by <b>_splitting_</b> it to smaller files then use it to generate **CSV** siles.

> <b>Simple steps for quick Installation!</b>

<!--Unordered lists-->
* Clone this repository to your computer.
    ```
    git clone https://github.com/KimelirR/generate_SplittedCsv_S3BUCKET.git
    ```
* Create .env file 
    ```
    cp .env.example .env
    ```
* **Provide credentials of your S3-BUCKET below in .env file**
   ~~~
    KEY=?
    SECRET=?
    REGION=?
    BUCKET=?
   ~~~

* Install required dependencies through 
  ```
   composer install
  ```
 > <b>Note!</b>
  1. Ensure you give credentials of your s3bucket correctly.

> <b>Lastly!  Generate Csv </b>

* All the functions and classes are inside src folder.

    ```php
    php index.php
    ```


   - Download the latest json lines manually and append filepath like example down below to deline.

   ```php
   $json_lines = (new JsonLines())->delineEachLineFromFile('jobs_2022_11_30.jsonl'); 

   ```
   - Otherwise using Linux environment everything will be executed automatically, 

   ```php
   $json_lines = (new JsonLines())->delineEachLineFromFile($path);
   ```
   #### $path Comes from aws autoload
   - Index.php saves file into current Folder._
   - generate_csv.php outputs a downloaded file with contents written on.
   
<p>Generally Split class split into 5000 each file . you can edit on split.class.php</p>
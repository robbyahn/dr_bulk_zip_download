<?php

// error_reporting(E_ALL);
// ini_set("display_errors","On");

// $drupal_dir = "/dr_photolib";
// $current_dir = getcwd();
// chdir($drupal_dir);
// require_once './includes/bootstrap.inc';

function zipFilesAndDownload($file_names,$archive_file_name,$file_path)
{
	$zip = new ZipArchive();

//To do customize
	$location = "/var/www/html/dr_photolib/sites/default/files/";

	if(!is_writable($location)){
		trigger_error("You can't write here");
	}

	//$archive_file_name = 'z.zip';
	$destination = $location.$archive_file_name;

    // If the archive already exists, open it. If not, create it.
    if (file_exists($destination)) {
      $zip->open($destination);
    }
    else {
      $zip->open($destination, ZIPARCHIVE::CREATE | ZIPARCHIVE::OVERWRITE);
    }

	//add each files of $file_name array to archive
	foreach($file_names as $files)
	{
  		if(!empty($files))
		{
//To do customize
			$file = str_replace("dr_photolib/sites/default/files/","",$files);

			$zip->addFile($location.$files,$file);
		}
	}

	$zip->close();

//To do customize
	$destination = "/dr_photolib/sites/default/files/";				

	echo $destination.$archive_file_name;
}



if($_GET['documents'])
{
	$documents=explode(",",$_GET['documents']);
	
	$file_names=$documents;
	
	$archive_file_name='zipped-'.time().'.zip';
	$file_path=$_SERVER['DOCUMENT_ROOT'].'/';

	zipFilesAndDownload($file_names, $archive_file_name, $file_path);
}

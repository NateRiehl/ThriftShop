<?php
include_once('dbproj_connect.php');
function saveProPic($fileData) {
    $msg = "";

    // 1. check the size: valid size is between (0, 5 MB]
    $fileSize = $fileData['size'];

    if ($fileSize == 0) {
        $msg = "file is empty";
    }
    else if ($fileSize > 5242880) { // greater than 5 MB
        $msg = "file is too big at " . $fileSize;
    }
    else {
        // actual uploaded file: stored in the server's temporary folder
        $realData = $fileData['tmp_name'];

        $imgInfo  = getimagesize($realData);

        // 2. check to see if the file actually is an image
        if ($imgInfo == FALSE) {
            $msg = "file is not an image file; only jpg, png, and gif files are allowed";
        }
        else {
            $mimeType = $imgInfo['mime'];
           
            // 3. check to see if the file is one of the tree allowed types (jpg, png, and gif)
            if ($mimeType == "image/jpeg" || $mimeType == "image/jpg" || 
                $mimeType == "image/gif" || $mimeType == "image/png") {

                $upFolder = "imgs/";
                $fnOriginal = $fileData['name'];
		$email = $GLOBALS['email'];
                $fnNew    = $upFolder . $email;
		$query = "UPDATE USER SET imageLink='$fnNew' WHERE email='$email'";
		$result = $GLOBALS['db'] ->query($query);
                // copy the uploaded file from temp folder to specified location
                $result = move_uploaded_file($realData, $fnNew);

                if ($result == FALSE) {
                    $msg = $fnOriginal . " could not be uploaded to the server; try again"; 
                }
                else {
                    $msg = $fnOriginal . " is successfully uploaded";
                }
            }
            else {
                $msg = "file is not an allowed image file; only jpg, png, and gif files are allowed";
            }
        }
    }

    return $msg;
}

function saveItem($fileData) {

    // DEBUG: print each file data
    echo "<PRE>\n";
    print_r($fileData);
    echo "</PRE>\n";

    // return an error or success message
    $msg = "";

    // 1. check the size: valid size is between (0, 5 MB]
    $fileSize = $fileData['size'];

    if ($fileSize == 0) {
        $msg = "file is empty";
    }
    else if ($fileSize > 5242880) { // greater than 5 MB
        $msg = "file is too big at " . $fileSize;
    }
    else {
        // actual uploaded file: stored in the server's temporary folder
        $realData = $fileData['tmp_name'];

        $imgInfo  = getimagesize($realData);

        // 2. check to see if the file actually is an image
        if ($imgInfo == FALSE) {
            $msg = "file is not an image file; only jpg, png, and gif files are allowed";
        }
        else {
            $mimeType = $imgInfo['mime'];
           
            // 3. check to see if the file is one of the tree allowed types (jpg, png, and gif)
            if ($mimeType == "image/jpeg" || $mimeType == "image/jpg" || 
                $mimeType == "image/gif" || $mimeType == "image/png") {

                $upFolder = "imgs/";
                $fnOriginal = $fileData['name'];
                $fnNew    = $upFolder. $GLOBALS['id'].$fnOriginal;
		$GLOBALS['imageLink'] = $upFolder. $GLOBALS['id'].$fnOriginal;
                //echo "saving as " . $fnNew;

                // copy the uploaded file from temp folder to specified location
                $result = move_uploaded_file($realData, $fnNew);

                if ($result == FALSE) {
                    $msg = $fnOriginal . " could not be uploaded to the server; try again"; 
                }
                else {
                    $msg = $fnOriginal . " is successfully uploaded";
                }
            }
            else {
                $msg = "file is not an allowed image file; only jpg, png, and gif files are allowed";
            }
        }
    }

    return $msg;
}


?>

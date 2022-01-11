<!DOCTYPE html>

<html>

<head>

    <meta charset="utf-8">

    <title>آپلود عکس به دیتابیس</title>

<body>

    <?php

    if (isset($_POST['text'])) {

        $text = $_POST['text'];
    }

    // اگر دکمه ی ارسال کلیک شود

    if (isset($_POST['Submit'])) {

        // اتصال به مای اس کیو ال سرور
        // die( mysql_connect('localhost', 'root', '', 'upload') );
        $link = mysqli_connect('localhost', 'root', '', 'upload');

        if (!$link) {

            die('Not connected : ' . mysql_error());
        }

        // اتصال به دیتابیس

        $db_selected = mysqli_select_db($link, 'upload');

        if (!$db_selected) {

            die('Database error : ' . mysqli_error());

            // انتخاب دیتابیس

        }



        //این کد برای ثبت متن در قسمت تکست است

        $maxFileSize = "1000000";

        // اندازه ی فایل یک مگابایت

        $image_array  = array("image/jpeg", "image/jpg", "image/gif", "image/bmp", "image/pjpeg", "image/png");

        //  نوع عکسی که می توانید وارد کنید



        $fileType = $_FILES['userfile']['type'];



        $msg = '';





        if (in_array($fileType, $image_array)) {

            // چک می کند که آیا فایل آپلود شد؟

            if (is_uploaded_file($_FILES['userfile']['tmp_name'])) {



                // چک می کند که آیا اندازه ی فایل زیر یک مگا بایت است؟

                if ($_FILES['userfile']['size'] < $maxFileSize) {





                    $imageData = addslashes(file_get_contents($_FILES['userfile']['tmp_name']));



                    // وارد کردن اطلاعاتی چون متن و تصویر

                    $sql = "INSERT INTO images (text,imageData) VALUES ('$text','$imageData', '$size)";
                    // die($sql);




                    mysqli_query($link, $sql) or die(mysqli_error());

                    $msg = " Data successfully uploaded";
                } else {



                    $msg = ' Error :  File size exceeds the maximum limit ';
                }
            }
        } else {

            $msg = 'Error: Not a valid image ';
        }

        echo "<span style='color:#FF0000'>$msg</span><br />";
    }



    ?>

    <h3>Select File to upload</h3>



    <form enctype="multipart/form-data" action="upload.php" method="post">

        <input name="userfile" type="file" /> <br>

        name: <input type="text" name="text" size="20">
        size: <input type="text" name="text" size="20">

        <input type="submit" value="Submit" name="Submit" />

    </form>

</body>

</html>
<?php
    function developer_details($param){
        $details =  array(
            'company' => 'Softring Solutions',
            'company_url' => 'https://www.softringsol.com/',
            'contact' => '+92 301 7140532',
            'contact_mail' => 'info@softringsol.com'
        );

        return $details[$param];
    }

    function displayDropDown(&$fieldlist, $defaultvalue = "")
    {
        $strDropDown = NULL;
        foreach ($fieldlist as $row) {
            if (!$row['name'] == "") {
                $strDropDown = $strDropDown . '<option value="' . $row['id'] . '"';
                if ($row['id'] == $defaultvalue && $defaultvalue != "") {
                    $strDropDown = $strDropDown . ' selected="selected" ';
                }
                $strDropDown = $strDropDown . ">" . set_output($row['name']) . "</option>";
            }
        }
        return $strDropDown;
    }

    function unique_id($l = 8)
    {
        return substr(md5(uniqid(mt_rand(), true)), 0, $l);
    }


    function replaceDash($str)
    {
        if ($str == '')
            return ("-");
        else
            return ($str);
    }

    function displayDropDownArray(&$list, $defaultvalue)
    {
        foreach ($list as $key => $val) {
            $strDropDown = $strDropDown . '<option value="' . $key . '"';
            if ($defaultvalue != "" && $key == $defaultvalue) {
                $strDropDown = $strDropDown . ' selected="selected" ';
            }
            $strDropDown = $strDropDown . ">" . $val . "</option>";
        }
        return $strDropDown;
    }


    function replacewithdash($str)
    {
        return strtolower(str_replace(' ', '-', $str));
    }


    function formatTimestamp($date)
    {
        if ($date != "") {
            return strtotime($date);
        } else {
            return false;
        }
    }





    function formatDate4db($date)
    {
        if ($date == "now" || $date == "") {
            return date("Y-m-d", time());
        } else {
            return date("Y-m-d", strtotime($date));
        }
    }

    function formatDateTime4db($date)
    {
        if ($date == "now" || $date == "") {
            return date("Y-m-d H:i:s", time());
        } else {
            return date("Y-m-d H:i:s", strtotime($date));
        }
    }

    function formatFullDate($timestamp = '')
    {
        if ($timestamp == 'now' || $timestamp == '') {
            return date("d M, Y", time());
        } else {
            return date("d M, Y", strtotime($timestamp));
        }
    }

    function formatFullDateTime($timestamp = '')
    {
        if ($timestamp == 'now' || $timestamp == '') {
            return date("d M, Y \a\\t H:iA", time());
        } else {
            return date('d M, Y \a\\t H:iA', strtotime($timestamp));
        }
    }

    function formatShortDate($timestamp = '')
    {
        if ($timestamp == 'now' || $timestamp == '') {
            return date("m/d/Y", time());
        } else {
            return date("m/d/Y", $timestamp);
        }
    }

    function splitDates($min, $max, $parts = 7, $output = "Y-m-d")
    {
        $dataCollection[] = date($output, strtotime($min));
        $diff = (strtotime($max) - strtotime($min)) / $parts;
        $convert = strtotime($min) + $diff;

        for ($i = 1; $i < $parts; $i++) {
            $dataCollection[] = date($output, $convert);
            $convert += $diff;
        }
        $dataCollection[] = date($output, strtotime($max));
        return $dataCollection;
    }

    function getYesNo($bool)
    {
        if ($bool)
            return "Yes";
        else
            return "No";
    }

    function altRow($isAlt)
    {
        if ($isAlt) {
            echo ' class="altrow"';
        }
    }

    function escape($str)
    {
        return addcslashes($str, "\x00\n\r\'\"\x1a");
    }

    function unescape($str)
    {
        return stripcslashes($str);
    }

    function IsEmpty($str)
    {
        if ($str == '')
            return (true);
        else
            return (false);
    }
    function getTotalDays($startDate, $endDate)
    {
        $start = strtotime($startDate);
        $end = strtotime($endDate);
        $total_days = ceil(abs($end - $start) / 86400) + 1;
        return $total_days;
    }

    function shortDesc($str, $char)
    {
        if (strlen($str) <= $char) {
            return $str;
        } else {
            return substr($str, 0, strpos($str, ' ', $char)) . '...';
        }
    }

    function array_to_json($array)
    {
        if (!is_array($array)) {
            return false;
        }
        $associative = count(array_diff(array_keys($array), array_keys(array_keys($array))));
        if ($associative) {
            $construct = array();
            foreach ($array as $key => $value) {
                if (is_numeric($key)) {
                    $key = "key_$key";
                }
                $key = "\"" . addslashes($key) . "\"";
                if (is_array($value)) {
                    $value = array_to_json($value);
                } else if (!is_numeric($value) || is_string($value)) {
                    $value = "\"" . addslashes($value) . "\"";
                }

                $construct[] = "$key: $value";
            }
            $result = "{ " . implode(", ", $construct) . " }";
        } else {

            $construct = array();
            foreach ($array as $value) {
                if (is_array($value)) {
                    $value = array_to_json($value);
                } else if (!is_numeric($value) || is_string($value)) {
                    $value = "'" . addslashes($value) . "'";
                }
                $construct[] = $value;
            }
            $result = "[ " . implode(", ", $construct) . " ]";
        }
        return $result;
    }

    if (!function_exists('array_column')) {

        function array_column(array $input, $columnKey, $indexKey = null)
        {
            $array = array();
            foreach ($input as $value) {
                if (!isset($value[$columnKey])) {
                    trigger_error("Key \"$columnKey\" does not exist in array");
                    return false;
                }
                if (is_null($indexKey)) {
                    $array[] = $value[$columnKey];
                } else {
                    if (!isset($value[$indexKey])) {
                        trigger_error("Key \"$indexKey\" does not exist in array");
                        return false;
                    }
                    if (!is_scalar($value[$indexKey])) {
                        trigger_error("Key \"$indexKey\" does not contain scalar value");
                        return false;
                    }
                    $array[$value[$indexKey]] = $value[$columnKey];
                }
            }
            return $array;
        }
    }

    function upload_file($file, $tpath, $max_size)
    {
        $target_path = $tpath;
        $tname = $_FILES[$file]['tmp_name'];
        $image = $_FILES[$file]['name'];
        $size = $_FILES[$file]['size'];
        $acname = pathinfo($image, PATHINFO_FILENAME);
        //echo $acname;
        $orgname = $acname;
        $ext = pathinfo($image, PATHINFO_EXTENSION);
        //echo $extension;
        if ($size <= $max_size) {
            $x = 1;
            while (file_exists($target_path . $acname . '.' . $ext)) {
                $acname = (string) $orgname . '(' . $x . ')';
                $x++;
            }
            $fullname = $acname . '.' . $ext;

            if (move_uploaded_file($tname, $target_path . $fullname)) {
                return $image;
            }
        } else {
            return 'Max Size allowed ' . ($max_size / 1024) . ' KB';
        }
    }

    function displayYears($defaultvalue)
    {
        $year_now = date("Y");
        $minyearr = $year_now - 50;
        for ($i = $year_now; $i >= $minyearr; $i--) {
            $year_dropDown = $year_dropDown . '<option value="' . $i . '"';
            if ($defaultvalue != "" && $i == $defaultvalue) {
                $year_dropDown = $year_dropDown . ' selected="selected" ';
            }
            $year_dropDown = $year_dropDown . ">" . $i . "</option>";
        }
        return $year_dropDown;
    }

    function displayDays($defaultvalue)
    {
        for ($i = 1; $i <= 31; $i++) {
            $days_dropDown = $days_dropDown . '<option value="' . $i . '"';
            if ($defaultvalue != "" && $i == $defaultvalue) {
                $days_dropDown = $days_dropDown . ' selected="selected" ';
            }
            $days_dropDown = $days_dropDown . ">" . $i . "</option>";
        }
        return $days_dropDown;
    }

    function random_number($size = 4)
    {
        $random_number = '';
        $count = 0;
        while ($count < $size) {
            $random_digit = mt_rand(1, 9);
            $random_number .= $random_digit;

            $count++;
        }
        return $random_number;
    }

    function removeslashes($string)
    {
        $string = implode("", explode("\r\n", $string));
        return stripslashes(trim($string));
    }

    function getExpireDate($createdDate, $option)
    {
        switch ($option) {
            case 1:
                $newDate = strtotime("+ 30 days", $createdDate);
                break;
            case 2:
                $newDate = strtotime("+ 60 days", $createdDate);
                break;
            case 3:
                $newDate = strtotime("+ 120 days", $createdDate);
                break;
            case 4:
                $newDate = strtotime("+ 6 months", $createdDate);
                break;
            case 5:
                $newDate = strtotime("+ 12 months", $createdDate);
                break;
            case 6:
                $newDate = strtotime("+ 24 months", $createdDate);
                break;
            case 7:
                $newDate = strtotime("+ 36 months", $createdDate);
                break;
            default:
                $newDate = $createdDate;
                break;
        }
        return $newDate;
    }

    function random_str($length = 10)
    {
        $random_str = '';
        $chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $chars_length = strlen($chars);
        for ($i = 0; $i < $length; $i++) {
            $random_str .= $chars[rand(0, $chars_length - 1)];
        }
        return $random_str;
    }

    function random_code($length = 6)
    {
        return str_pad(mt_rand(1, 999999), $length, '0', STR_PAD_LEFT);
    }

    function percentage($amount, $percentage)
    {
        if (!empty($amount)) {
            $total = ($percentage / 100) * $amount;
            return number_format($total, 2);
        } else {
            return FALSE;
        }
    }


    /**
     * Encode URL/Params
     * Using base64
     * * */
    function str_encrypt($input)
    {
        return strtr(base64_encode($input), '+/=', '._-');
    }

    /**
     * Decode URL/Params
     * Using base64
     * * */
    function str_decrypt($input)
    {
        return base64_decode(strtr($input, '._-', '+/='));
    }

    function str_encode($data)
    {
        $key = pseudo_random_string();
        #Remove the base64 encoding from our key
        $encryption_key = base64_decode($key);
        #Generate an initialization vector
        $iv = substr(hash('sha256', $key), 0, 16);
        //$iv = openssl_random_pseudo_bytes(openssl_cipher_iv_length('aes-256-cbc'));
        #Encrypt the data using AES 256 encryption in CBC mode using our encryption key and initialization vector.
        $encrypted = openssl_encrypt($data, 'aes-256-cbc', $encryption_key, 0, $iv);
        #The $iv is just as important as the key for decrypting, so save it with our encrypted data using a unique separator (::)
        return base64_encode($encrypted . '::' . $iv);
    }

    function str_decode($data)
    {
        $key = pseudo_random_string();
        #Remove the base64 encoding from our key
        $encryption_key = base64_decode($key);
        #To decrypt, split the encrypted data from our IV - our unique separator used was "::"
        list($encrypted_data, $iv) = explode('::', base64_decode($data), 2);
        return openssl_decrypt($encrypted_data, 'aes-256-cbc', $encryption_key, 0, $iv);
    }

    function pseudo_random_string()
    {
        //base64_encode(openssl_random_pseudo_bytes(32));
        return 'yKlUynJm8r657OEnDI7mcQmJI14y75aadMPQgdRAOOY=';
    }

    function exportToXLS($records)
    {
        $heading = false;
        if (!empty($records)) {
            foreach ($records as $row) {
                if (!$heading) {
                    // display field/column names as a first row
                    echo implode("\t", array_keys($row)) . "\n";
                    $heading = true;
                }
                echo implode("\t", array_values($row)) . "\n";
            }
        }
        exit;
    }

    function exportToCSV($records)
    {
        // create a file pointer connected to the output stream
        $fh = fopen('php://output', 'w');
        $heading = false;
        if (!empty($records)) {
            foreach ($records as $row) {
                if (!$heading) {
                    // output the column headings
                    fputcsv($fh, array_keys($row));
                    $heading = true;
                }
                // loop over the rows, outputting them
                fputcsv($fh, array_values($row));
            }
        }
        fclose($fh);
    }

    /**
     * Get the excel like column
     * Based on zero indexed numbers 1 == A
     * @return str - column name
     * * */
    function getColNameFromNo($num)
    {
        $numeric = ($num - 1) % 26;
        $letter = chr(65 + $numeric);
        $num2 = intval(($num - 1) / 26);
        if ($num2 > 0) {
            return getColNameFromNo($num2) . $letter;
        } else {
            return $letter;
        }
    }

    /**
     * Get the excel like column
     * Based on zero indexed numbers 0 == A
     * @return str - column name
     * * */
    function getNameFromNumber($num)
    {
        $numeric = $num % 26;
        $letter = chr(65 + $numeric);
        $num2 = intval($num / 26);
        if ($num2 > 0) {
            return getNameFromNumber($num2 - 1) . $letter;
        } else {
            return $letter;
        }
    }

    function dropDown(&$fieldlist, $defaultvalue = "")
    {
        $strDropDown = NULL;
        foreach ($fieldlist as $row) {
            if (!$row['name'] == "") {
                $strDropDown = $strDropDown . '<option value="' . str_encode($row['id']) . '"';
                if ((str_encode($row['id']) == $defaultvalue) && ($defaultvalue != "")) {
                    $strDropDown = $strDropDown . ' selected="selected" ';
                }
                $strDropDown = $strDropDown . ">" . set_output($row['name']) . "</option>";
            }
        }
        return $strDropDown;
    }

    /**
     * detect only list pages we can add page by param
     * @str string - comma separate pages name without extension
     * which you want to allow for permission/detection
     * @return boolean TRUE||FALSE
     * * */
    function detect_list_page($str = NULL)
    {
        $arr_pages = explode(',', trim($str));
        $page = $_SERVER["SCRIPT_NAME"];
        $file_name = basename($page, ".php");
        $status = NULL;
        if (strpos($file_name, '_list') !== false || in_array($file_name, $arr_pages)) {
            $status = TRUE;
        } else {
            $status = FALSE;
        }
        return $status;
    }

    /**
     * Get days
     * @desp get the desired date and calculate it with current datetime
     * @d date Y-m-d
     * @return int No. of days
     * * */
    function get_days($d)
    {
        $now = time();
        $date = strtotime($d);
        $day = $now - $date;
        return abs(round($day / (60 * 60 * 24)));
    }

    /**
     * Get difference between two dates
     * @param $d1 date Y-m-d
     * @param $d2 date Y-m-d
     * @return int no. of days
     * * */
    function get_dates_diff($d1, $d2)
    {
        $date1 = date_create($d1);
        $date2 = date_create($d2);
        $diff = date_diff($date1, $date2);
        return $diff->format("%R%a");
    }

    /**
     * Get the time and minutes and subtract the minutes from time.
     * @time time
     * @min int
     * @return time
     * * */
    function time_diff($time, $min)
    {
        return date("h:i A", strtotime("-$min minutes", strtotime($time)));
    }

    /**
     * Remove special characters from string e.g. $ ,
     * @str string
     * @return clean string
     * * */
    function filter_str($str)
    {
        //    return preg_replace('/[^A-Za-z0-9\-]/', '', $str);
        return preg_replace('~[$,]~', '', $str);
    }

    /**
     * Clean string and replace empty space wit hyphen
     * @retirn string
     * * */
    function hyphen_str($string)
    {
        $string = str_replace(' ', '-', $string);
        $string = preg_replace('/[^A-Za-z0-9\-]/', '', $string);
        $string = preg_replace('/-+/', '-', $string);
        return $string;
    }

    /**
     * Get minutes and return the hours and min
     * @time int minutes
     * @return formatted time
     * * */
    function calcu_time($time)
    {
        if ($time < 1) {
            return;
        }
        $hours = floor($time / 60);
        $minutes = ($time % 60);
        $timeSlot = NULL;
        if (!empty($hours) && $hours != 0) {
            $timeSlot .= $hours . " hours ";
        }
        if (!empty($minutes) && $minutes != 0) {
            $timeSlot .= $minutes . " mins";
        }
        return $timeSlot;
    }

    /**
     * Get name and return name first two words initials
     * @param string
     * @retun string
     * * */
    function initials($str)
    {
        if ($str) {
            $chunk = explode(' ', $str);
            return ucwords($chunk[0][0] . $chunk[1][0]);
        }
    }

    function filter_due($period)
    {
        $today_date = date('Y-m-d');
        switch ($period) {
            case 7:
                return date('Y-m-d', strtotime($today_date . ' +7 days'));
                break;
            case 14:
                return date('Y-m-d', strtotime($today_date . ' +14 days'));
                break;
            case 30:
                return date('Y-m-d', strtotime($today_date . ' +30 days'));
                break;
            case 60:
                return date('Y-m-d', strtotime($today_date . ' +60 days'));
                break;
            default:
                return date('Y-m-d', strtotime($today_date . ' +61 days'));
                return FALSE;
                break;
        }
    }

    function get_file_type($file_ext)
    {
        if ($file_ext == 'jpg' || $file_ext == 'jpeg' || $file_ext == 'png' || $file_ext == 'gif') {
            $file_type = 1;
        } elseif ($file_ext == 'pdf' || $file_ext == 'doc' || $file_ext == 'docx' || $file_ext == 'ppt' || $file_ext == 'pptx') {
            $file_type = 2;
        } elseif ($file_ext == 'mp3' || $file_ext == 'wav' || $file_ext == 'ogg') {
            $file_type = 3;
        } elseif ($file_ext == '3gp' || $file_ext == 'avi' || $file_ext == 'flv' || $file_ext == 'mkv' || $file_ext == 'mov' || $file_ext == 'mp4' || $file_ext == 'mpeg' || $file_ext == 'mpg' || $file_ext == 'webm' || $file_ext == 'wmv') {
            $file_type = 4;
        } else {
            $file_type = 5;
        }
        return $file_type;
    }

    function get_media_thumb($media, $folder)
    {
        if (!empty($media)) {
            $file_ext = pathinfo($media, PATHINFO_EXTENSION);
            $thumbnail = NULL;
            switch ($file_ext) {
                case 'jpg':
                    $thumbnail = 'uploads/' . $folder . '/' . $media;
                    break;
                case 'jpeg':
                    $thumbnail = 'uploads/' . $folder . '/' . $media;
                    break;
                case 'png':
                    $thumbnail = 'uploads/' . $folder . '/' . $media;
                    break;
                case 'gif':
                    $thumbnail = 'uploads/' . $folder . '/' . $media;
                    break;
                case 'doc':
                    $thumbnail = 'assets/thumbnails/docx.png';
                    break;
                case 'docx':
                    $thumbnail = 'assets/thumbnails/docx.png';
                    break;
                case 'ppt':
                    $thumbnail = 'assets/thumbnails/pptx.png';
                    break;
                case 'ppt':
                    $thumbnail = 'assets/thumbnails/pptx.png';
                    break;
                case 'pptx':
                    $thumbnail = 'assets/thumbnails/pptx.jpg';
                    break;
                case 'pdf':
                    $thumbnail = 'assets/thumbnails/pdf.png';
                    break;
                case 'mp3':
                    $thumbnail = 'assets/thumbnails/mp3.png';
                    break;
                case 'wav':
                    $thumbnail = 'assets/thumbnails/wav.png';
                    break;
                case 'ogg':
                    $thumbnail = 'assets/thumbnails/ogg.png';
                    break;
                case '3gp':
                    $thumbnail = 'assets/thumbnails/3gp.png';
                    break;
                case 'avi':
                    $thumbnail = 'assets/thumbnails/avi.png';
                    break;
                case 'flv':
                    $thumbnail = 'assets/thumbnails/flv.png';
                    break;
                case 'mkv':
                    $thumbnail = 'assets/thumbnails/mkv.png';
                    break;
                case 'mov':
                    $thumbnail = 'assets/thumbnails/mov.png';
                    break;
                case 'mp4':
                    $thumbnail = 'assets/thumbnails/mp4.png';
                    break;
                case 'mpeg':
                    $thumbnail = 'assets/thumbnails/mpeg.png';
                    break;
                case 'mpg':
                    $thumbnail = 'assets/thumbnails/mpg.png';
                    break;
                case 'webm':
                    $thumbnail = 'assets/thumbnails/webm.png';
                    break;
                case 'wmv':
                    $thumbnail = 'assets/thumbnails/wmv.png';
                    break;
                default:
                    $thumbnail = FALSE;
                    break;
            }
            return $thumbnail;
        } else {
            return 'Invalid Media';
        }
    }

    function create_thumb($img_src, $path, $width, $height, $name)
    {
        $str = explode(".", $name);
        if ($str[1] == "jpg" || $str[1] == "jpeg" || $str[1] == "png") {
            $myImage = imagecreatefromjpeg($img_src);
        } else {
            $myImage = imagecreatefrompng($img_src);
        }
        //calculating the part of the image to use for thumbnail
        if ($width > $height) {
            $y = 0;
            $x = ($width - $height) / 2;
            $smallestSide = $height;
        } else {
            $x = 0;
            $y = ($height - $width) / 2;
            $smallestSide = $width;
        }

        //copying the part into thumbnail
        $thumbSize = 200;
        $thumb = imagecreatetruecolor($thumbSize, $thumbSize);
        imagecopyresampled($thumb, $myImage, 0, 0, $x, $y, $thumbSize, $thumbSize, $smallestSide, $smallestSide);

        //final output
        //imagejpeg($thumb);
        imagejpeg($thumb, $path . $name);
        imagedestroy($thumb);
    }

    function filter_ref_number($str)
    {
        $pattern = '/\d{1,10}/u';
        if (preg_match($pattern, $str, $matches) > 0) {
            return $matches[0];
        } else {
            return FALSE;
        }
    }

    function week_of_month($date)
    {
        $firstOfMonth = date("Y-m-01", strtotime($date));
        return intval(date("W", strtotime($date))) - intval(date("W", strtotime($firstOfMonth)));
    }

    function get_week_intervals()
    {
        $counter = 1;
        $arr_start = $arr_end = array();
        $current_date = date('Y-m-d');
        $coming_friday = strtotime("next friday $current_date");
        $last_friday_4 = strtotime("last friday " . date('Y-m-d', $coming_friday));
        $last_friday_3 = strtotime("last friday " . date('Y-m-d', $last_friday_4));
        $last_friday_2 = strtotime("last friday " . date('Y-m-d', $last_friday_3));
        $last_friday_1 = strtotime("last friday " . date('Y-m-d', $last_friday_2));

        $arr_week['weeks'] = array(
            1 => date('Y-m-d', $last_friday_1),
            2 => date('Y-m-d', $last_friday_2),
            3 => date('Y-m-d', $last_friday_3),
            4 => date('Y-m-d', $last_friday_4),
            5 => date('Y-m-d', $coming_friday)
        );

        if ($arr_week['weeks']) {
            foreach ($arr_week['weeks'] as $week) {
                $previous_week = date('Y-m-d', strtotime("$week -6 days"));
                $arr_week['intervals'][$counter] = array($previous_week, $week);
                $arr_start[] = $previous_week;
                $arr_end[] = $week;
                $counter++;
            }
        }

        if (strtotime($current_date) >= strtotime($arr_start[0]) && strtotime($current_date) <= strtotime($arr_end[0])) {
            $arr_week['current_week'] = 1;
        } elseif (strtotime($current_date) >= strtotime($arr_start[1]) && strtotime($current_date) <= strtotime($arr_end[1])) {
            $arr_week['current_week'] = 2;
        } elseif (strtotime($current_date) >= strtotime($arr_start[2]) && strtotime($current_date) <= strtotime($arr_end[2])) {
            $arr_week['current_week'] = 3;
        } elseif (strtotime($current_date) >= strtotime($arr_start[3]) && strtotime($current_date) <= strtotime($arr_end[3])) {
            $arr_week['current_week'] = 4;
        } elseif (strtotime($current_date) >= strtotime($arr_start[4]) && strtotime($current_date) <= strtotime($arr_end[4])) {
            $arr_week['current_week'] = 5;
        } else {
            $arr_week['current_week'] = 5;
        }
        return $arr_week;
    }

    function read_more($str, $length = 14)
    {
        if (!empty($str) && is_string($str)) {
            $str_len = strlen(trim($str));
            if ($str_len > $length) {
                $string = substr($str, 0, 12) . '...';
            } else {
                $string = $str;
            }
            return $string;
        } else {
            return FALSE;
        }
    }

    function get_weekdays($month, $week, $year)
    {
        $week = date('Y-m-d', strtotime('1 ' . $month . ' ' . $year . '+ ' . $week . ' weeks 2021'));
        $start_date = date('Y-m-d', strtotime($week . ' -7 days'));
        $end_date = date('Y-m-d', strtotime($start_date . ' +7 days'));
        $date_range = $start_date . '__' . $end_date;
        return $date_range;
    }



    /**
     * @array data array
     * @key string key on which data will be filtered
     * @return unique array
     * * */
    function unique_multi_array($array, $key)
    {
        $temp_array = array();
        $key_array = array();
        $i = 0;

        foreach ($array as $val) {
            if (!in_array($val[$key], $key_array)) {
                $key_array[$i] = $val[$key];
                $temp_array[$i] = $val;
            }
            $i++;
        }
        return $temp_array;
    }

    /**
     *
     * Convert foot to miles
     * @param float foot
     * @return float distance
     * * */
    function ft_to_mi($ft)
    {
        $mi = floatval(0.00018939);
        $feet = is_nan(floatval($ft)) ? 0 : floatval($ft);
        $dist = $feet * $mi;
        return is_nan(floatval($dist)) ? 0 : number_format(floatval($dist), 2);
    }

    function array_diff_multi(array $defaults, $new_values)
    {
        $result = array();

        foreach ($defaults as $key => $val) {
            if (is_array($val) && isset($new_values[$key])) {
                $tmp = array_diff_multi($val, $new_values[$key]);
                if ($tmp) {
                    $result[$key] = $tmp;
                }
            } elseif (!isset($new_values[$key])) {
                $result[$key] = NULL;
            } elseif ($val != $new_values[$key]) {
                $result[$key] = $new_values[$key];
            }
            if (isset($new_values[$key])) {
                unset($new_values[$key]);
            }
        }

        $result = $result + $new_values;
        return $result;
    }

    /**
     * Wrap the HTML element surrounding the text
     * @return string
     * * */
    function wrap_txt($txt)
    {
        return "<span>" . $txt . '</span>';
    }

    /**
     * Get and escape data
     * @return data
     * * */
    function get_input($data)
    {
        $data = trim($data);
        $data = addslashes($data);
        $data = strip_tags($data);
        $data = htmlspecialchars($data, ENT_QUOTES, 'UTF-8');
        return $data;
    }

    /**
     * Set and strip output
     * @return data
     * * */
    function set_output($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        return $data;
    }

    /**
     * Clean String
     * @param $data string
     * $return
     * * */
    function clean_str($data)
    {
        $data = trim($data);
        $data = addslashes($data);
        $data = strip_tags($data);
        return $data;
    }

    /**
     * Forms Action
     * * */
    function form_action($str)
    {
        return htmlspecialchars($str);
    }

    /**
     * Get Page Mode
     * Is Valid & Not Empty
     * @param $mode string
     * @return mode or redirect error page if mode is invalid
     * * */
    function get_mode($str_mode)
    {
        global $arr_mode;
        if (!empty($str_mode)) {
            if (in_array($str_mode, $arr_mode)) {
                return get_input($str_mode);
            } else {
                header('Location: HTTP404.php');
            }
        } else {
            header('Location: HTTP404.php');
        }
    }

    /**
     * List Sort Order ASC|DESC
     * @param $order string
     * @return string
     * * */
    function sort_order($order)
    {
        global $arr_order;
        if (!empty($order)) {
            if (in_array($order, $arr_order)) {
                $order = get_input($order);
            } else {
                header('Location: HTTP404.php');
            }
        } else {
            $order = 'DESC';
        }
        return $order;
    }

    /**
     * Get Fields
     * get fields from URL for sorting order
     * @param field string
     * @param $default_field string
     * @return string
     * * */
    function get_fields($field, $default_field)
    {
        global $arr_fields;
        if (!empty($field)) {
            if (in_array($field, $arr_fields)) {
                $field_name = $field;
            } else {
                header('Location: HTTP404.php');
            }
        } else {
            $field_name = $default_field;
        }
        return get_input($field_name);
    }

    /**
     * Get Page
     * get page from URL
     * @param field int
     * @return int
     * * */
    function get_page($page_no)
    {
        if (!empty($page_no)) {
            if (!filter_var($page_no, FILTER_VALIDATE_INT) === false) {
                $page = $page_no;
            } else {
                header('Location: HTTP404.php');
            }
        } else {
            $page = 1;
        }
        return $page;
    }

    /**
     * Get fields from table name
     * @param $table string
     * @return fields array
     * * */
    function get_table_fields($table)
    {
        $arr_attr = array();
        if ($table) {
            $get_fields = db::getRecords("DESCRIBE `$table`");
            if ($get_fields) {
                foreach ($get_fields as $fields) {
                    $arr_attr[] = $fields['Field'];
                }
                return $arr_attr;
            }
        }
    }

    /**
     * @Desp: Delete temp folder file one by one
     * @return void
     * * */
    function del_temp($file_name)
    {
        unlink($file_name);
    }


    function prt($records){
        echo "<pre>";
        print_r($records);
        echo "</pre>";
    }

    function cash_in_hand()
    {
        $CI = get_instance();
        $CI->load->model('handler');
        $cash = $CI->handler->getCell('users','id', $_SESSION['user_id'], 'cash_in_hand');
        return $cash;
    }


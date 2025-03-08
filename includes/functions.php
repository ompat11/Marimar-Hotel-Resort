<?php
function strip_zeros_from_date($marked_string = "") {
    // First, remove the marked zeros
    $no_zeros = str_replace('*0', '', $marked_string);
    $cleaned_string = str_replace('*0', '', $no_zeros);
    return $cleaned_string;
}

function redirect_to($location = NULL) {
    if ($location != NULL) {
        header("Location: {$location}");
        exit;
    }
}

function redirect($location = NULL) {
    if ($location != NULL) {
        echo "<script>
                window.location='{$location}';
              </script>";    
    } else {
        echo 'Error: Location not provided.';
    }
}

function output_message($message = "") {
    if (!empty($message)) {
        return "<p class=\"message\">{$message}</p>";
    } else {
        return "";
    }
}

function date_toText($datetime = "") {
    $nicetime = strtotime($datetime);
    return strftime("%B %d, %Y at %I:%M %p", $nicetime);
}

// ✅ Fixing `spl_autoload_register()`
spl_autoload_register(function ($class_name) {
    $class_name = strtolower($class_name);
    $path = LIB_PATH . DS . "{$class_name}.php";

    if (file_exists($path)) {
        require_once($path);
    } else {
        die("The file {$class_name}.php could not be found.");
    }
}); // ✅ Fixed missing closing bracket

function file_path() {
    $pathinfo = pathinfo(__FILE__);
    echo $pathinfo['dirname'];
}

function currentpage() {
    $this_page = $_SERVER['SCRIPT_NAME']; // Returns /path/to/file.php
    $bits = explode('/', $this_page);
    return end($bits); // ✅ Fixed incorrect index reference
}

function unsetSessions() {
    $session_keys = ['from', 'to', 'adults', 'child', 'roomid'];
    foreach ($session_keys as $key) {
        if (isset($_SESSION[$key])) {
            unset($_SESSION[$key]);
        }
    }
}

function dateDiff($start, $end) {
    $start_ts = strtotime($start);
    $end_ts = strtotime($end);
    $diff = $end_ts - $start_ts;
    return round($diff / 86400);
}
?>

<?php
$cookies = "";
if (count($_COOKIE) > 0) {
    foreach ($_COOKIE as $key => $value) {
        if (strpos($key, "BIGipServer") === 0) {
            if (isset($_POST[$key]) && !empty($_POST[$key])) {
                $value = $_POST[$key];
                setcookie($key, $value);
            }
            $cookies .= '<div class="form-group">';
            $cookies .= '<label for="'.$key.'">'.$key.'</label>';
            $cookies .= '<input class="form-control" name="'.$key.'" id="'.$key.'" value="'.$value.'">';
            $cookies .= '</div>';
        }
    }
}
?>
<!DOCTYPE html>
<html lang="ca">
<head>
<meta charset="utf-8">
<title>Check cookies</title>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
</head>
<body>
<div class="container">
<h1>Check cookies</h1>
<?php
if (count($_COOKIE) > 0) {

    echo '<div class="well well-sm">Cookies are enabled</div>';
    if (!empty($cookies)) {
        echo '<form method="POST">'.$cookies;
        echo '<button type="submit" class="btn btn-primary">Submit</button>';
        echo '</form>';
    } else {
        echo 'No hi ha cookies de balanceig';
    }
} else {
    echo '<div class="alert-danger alert">Cookies are disabled</div>';
}

?>
</div></body></html>
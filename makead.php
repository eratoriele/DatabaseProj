<link rel="stylesheet" href="bootstrap.min.css">
<body style="background-color:#dbc6a8">

<?php

if (!isset($_GET["fields"])) {
    exit();
}
if ($_GET["fields"] < 1 || $_GET["fields"] > 10) {
    exit();
}
if (isset($_POST["field0"])) {
    makead();
}
else {

    echo "<form method=\"post\" enctype=\"multipart/form-data\">";
        echo "<h2 class=\"form-signin-heading\">\tPlease fill in</h2>";

        if ($_GET["fields"] > 0) {
            echo "<div class=\"container\">";
            echo "<div class=\"row\">";
                echo "<div class=\"col-sm-3\">";
                    echo "<input type=\"text\" name=\"field0\" class=\"form-control\" placeholder=\"Field\" required autofocus>";
                echo "</div><div class=\"col-sm-9\">";
                    echo "<input type=\"text\" name=\"value0\" class=\"form-control\" placeholder=\"Value\" required><br>";
            echo "</div></div></div>";
        }
        if ($_GET["fields"] > 1) {
            echo "<div class=\"container\">";
            echo "<div class=\"row\">";
                echo "<div class=\"col-sm-3\">";
                    echo "<input type=\"text\" name=\"field1\" class=\"form-control\" placeholder=\"Field\" required>";
                echo "</div><div class=\"col-sm-9\">";
                    echo "<input type=\"text\" name=\"value1\" class=\"form-control\" placeholder=\"Value\" required><br>";
            echo "</div></div></div>";
        }
        if ($_GET["fields"] > 2) {
            echo "<div class=\"container\">";
            echo "<div class=\"row\">";
                echo "<div class=\"col-sm-3\">";
                    echo "<input type=\"text\" name=\"field2\" class=\"form-control\" placeholder=\"Field\" required><br>";
                echo "</div><div class=\"col-sm-9\">";
                    echo "<input type=\"text\" name=\"value2\" class=\"form-control\" placeholder=\"Value\" required><br>";
            echo "</div></div></div>";
        }
        if ($_GET["fields"] > 3) {
            echo "<div class=\"container\">";
            echo "<div class=\"row\">";
                echo "<div class=\"col-sm-3\">";
                    echo "<input type=\"text\" name=\"field3\" class=\"form-control\" placeholder=\"Field\" required>";
                echo "</div><div class=\"col-sm-9\">";
                    echo "<input type=\"text\" name=\"value3\" class=\"form-control\" placeholder=\"Value\" required><br>";
            echo "</div></div></div>";
        }
        if ($_GET["fields"] > 4) {
            echo "<div class=\"container\">";
            echo "<div class=\"row\">";
                echo "<div class=\"col-sm-3\">";
                    echo "<input type=\"text\" name=\"field4\" class=\"form-control\" placeholder=\"Field\" required>";
                echo "</div><div class=\"col-sm-9\">";
                    echo "<input type=\"text\" name=\"value4\" class=\"form-control\" placeholder=\"Value\" required><br>";
            echo "</div></div></div>";
        }
        if ($_GET["fields"] > 5) {
            echo "<div class=\"container\">";
            echo "<div class=\"row\">";
                echo "<div class=\"col-sm-3\">";
                    echo "<input type=\"text\" name=\"field5\" class=\"form-control\" placeholder=\"Field\" required>";
                echo "</div><div class=\"col-sm-9\">";
                    echo "<input type=\"text\" name=\"value5\" class=\"form-control\" placeholder=\"Value\" required><br>";
            echo "</div></div></div>";
        }
        if ($_GET["fields"] > 6) {
            echo "<div class=\"container\">";
            echo "<div class=\"row\">";
                echo "<div class=\"col-sm-3\">";
                    echo "<input type=\"text\" name=\"field6\" class=\"form-control\" placeholder=\"Field\" required>";
                echo "</div><div class=\"col-sm-9\">";
                    echo "<input type=\"text\" name=\"value6\" class=\"form-control\" placeholder=\"Value\" required><br>";
            echo "</div></div></div>";
        }
        if ($_GET["fields"] > 7) {
            echo "<div class=\"container\">";
            echo "<div class=\"row\">";
                echo "<div class=\"col-sm-3\">";
                    echo "<input type=\"text\" name=\"field7\" class=\"form-control\" placeholder=\"Field\" required>";
                echo "</div><div class=\"col-sm-9\">";
                    echo "<input type=\"text\" name=\"value7\" class=\"form-control\" placeholder=\"Value\" required><br>";
            echo "</div></div></div>";
        }
        if ($_GET["fields"] > 8) {
            echo "<div class=\"container\">";
            echo "<div class=\"row\">";
                echo "<div class=\"col-sm-3\">";
                    echo "<input type=\"text\" name=\"field8\" class=\"form-control\" placeholder=\"Field\" required>";
                echo "</div><div class=\"col-sm-9\">";
                    echo "<input type=\"text\" name=\"value8\" class=\"form-control\" placeholder=\"Value\" required><br>";
            echo "</div></div></div>";
        }
        if ($_GET["fields"] > 9) {
            echo "<div class=\"container\">";
            echo "<div class=\"row\">";
                echo "<div class=\"col-sm-3\">";
                    echo "<input type=\"text\" name=\"field9\" class=\"form-control\" placeholder=\"Field\" required>";
                echo "</div><div class=\"col-sm-9\">";
                    echo "<input type=\"text\" name=\"value9\" class=\"form-control\" placeholder=\"Value\" required><br>";
            echo "</div></div></div>";
        }
        echo "<div class=\"container\">";
        echo "<div class=\"row\">";
            echo "<div class=\"col-sm-12\">";
                echo "Select image to upload: (JPG, JPEG, PNG) (Optional) (File name shouldn't be longer than 200 chars)";
                echo "<input type=\"file\" name=\"fileToUpload\" id=\"fileToUpload\"><br><br>";
            echo "</div></div></div>";

        echo "<div class=\"container\">";
            echo "<div class=\"row\">";
                    echo "<button class=\"btn btn-lg btn-primary btn-block\" type=\"submit\">Make an ad!</button></div></div>";

        echo "<input type=\"hidden\" name=\"fields\" value=\"" . $_GET["fields"] . "\">";
    
    echo "</form>";

}
?>

<?php

function makead() {
    $connection = new MongoClient();
    $db = $connection->db_project_ads->ads;
    
    $entry = array('Verified' => false);

    if ($_FILES["fileToUpload"]["name"] != '') {		// upload an image if there is any provided
        require "upload.php";
        $entry['Image'] = $target_file;
    }
    
    if ($_POST["fields"] > 0)
        $entry[$_POST["field0"]] = $_POST["value0"];
    if ($_POST["fields"] > 1)
        $entry[$_POST["field1"]] = $_POST["value1"];
    if ($_POST["fields"] > 2)
        $entry[$_POST["field2"]] = $_POST["value2"];
    if ($_POST["fields"] > 3)
        $entry[$_POST["field3"]] = $_POST["value3"];
    if ($_POST["fields"] > 4)
        $entry[$_POST["field4"]] = $_POST["value4"];
    if ($_POST["fields"] > 5)
        $entry[$_POST["field5"]] = $_POST["value5"];
    if ($_POST["fields"] > 6)
        $entry[$_POST["field6"]] = $_POST["value6"];
    if ($_POST["fields"] > 7)
        $entry[$_POST["field7"]] = $_POST["value7"];
    if ($_POST["fields"] > 8)
        $entry[$_POST["field8"]] = $_POST["value8"];
    if ($_POST["fields"] > 9)
        $entry[$_POST["field9"]] = $_POST["value9"];

    $db->insert($entry);           // Create

    echo "<a href=\"./\">Go back</a>";
}

?>
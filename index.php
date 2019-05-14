<link rel="stylesheet" href="bootstrap.min.css">
<style>
    .card {
    box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
    transition: 0.4s;
    width: 100%;
    border-radius: 10px;
    }

    .card:hover {
    box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);
    }

    .container {
    padding: 2px 16px;
    }
    
    li{
    max-width:330px;
    word-wrap:break-word;
    }
</style>
<body style="background-color:#dbc6a8">

<?php
$connection = new MongoClient();
$db = $connection->db_project_ads->ads;

if (isset($_POST["invisible"])) {
    $db->update(['_id' => new MongoId($_POST["id"])], array('$set' => array("Verified" => false)));
}
if (isset($_POST["delete"])) {
    $db->remove(['_id' => new MongoId($_POST["id"])]);
}

echo "<form action=\"./makead.php\" method=\"get\">";
    echo "Make a new ad:<br>";
    echo "How many fields does your ad have?  ";
    echo "<input type=\"number\" value=\"1\" name=\"fields\" min=\"1\" max=\"10\">";
    echo "  <button type=\"submit\" class=\"btn btn-primary\">Make an ad</button></form>"; 

$result = $db->find(array('Verified' => true));      // SELECT

$result = (iterator_to_array($result)); 

$i = 0;

echo "<div class=\"container\">";
echo "<div class=\"row\">";

foreach ($result as $item) {
    echo "<div class=\"col-sm-4\">";
        echo "<div class=\"card\">"; 
            echo "<div class=\"container\">";
                for ($i = 2; $i < count(array_keys($item)); $i++) {
                    echo "<li><b>" . array_keys($item)[$i] . ": " . array_values($item)[$i] . "</b></li><br>";      // WRITE PRETTILY
                }
                echo "<form method=\"post\">";
                    echo "<input type=\"hidden\" name=\"id\" value=\"" . array_values($item)[0] . "\">";
                    echo "<button type=\"submit\" name=\"invisible\" class=\"btn\">Set Invisible</button>";
                    echo "\t<button type=\"submit\" name=\"delete\" class=\"btn btn-danger\">Delete</button></form>";
    echo "</div></div><br><br></div>";
}

echo "</div></div>";

?>
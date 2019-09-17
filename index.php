<html>

<head>

<title>Cafe Chill Reviews</title>

<link rel="stylesheet" href="style.css">
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>

    <h2 style="text-align:center;">Cafe Chill Reviews</h2>
    <h4 style="text-align:center;">highlighted key words ("good","food")</h4>

    <div class="container">
    <?Php 

    function highlighter($str, $arr_word)
    {
        foreach($arr_word as $vword) {
            $str = preg_replace("/($vword)/Ui", "<span class=highlight>$1</span>", $str);
        }

        return $str;
    }

    $query = "good";
    $arr_accepted_keyword = array('good', 'food');

    echo '<table  class="table table-striped table-bordered table-hover">';
    $f = fopen("review.csv", "r");
    while (($line = fgetcsv($f)) !== false) {
            echo "<tr>";
            echo "<td>".highlighter($line[1], $arr_accepted_keyword)."</td>";
            echo "<tr>\n";
    }
    fclose($f);
    echo "\n</table>";
    ?> 
    </div>  
    
</body>

<script>

</script>

</html>


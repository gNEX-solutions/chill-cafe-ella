<html>
<!-- Array ( [0] => Kelly B [1] => Cleveland, Ohio [2] => 18-Sep-19 [3] => 50 [4] => 
Great vibe with excellent service [5] => Had a delicious dinner tonight with fabulous service from Rasika. 
Was sat at a large table as a solo traveler which allowed me to meet others. Once they left I 
still had company with this adorable kitty.This is a solid choice for any meal. Will be back soon. ) -->
<head>

<title>Cafe Chill Reviews</title>

<link rel="stylesheet" href="style.css">
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>

    <h2 style="text-align:center;">Cafe Chill Reviews</h2>
    <h4 style="text-align:center;">highlighted key words ("good","food")</h4>

    <?php
        function highlighter($str, $arr_word){
            foreach($arr_word as $vword) {
                $str = preg_replace("/($vword)/Ui", "<span class=highlight>$1</span>", $str);
            }
            return $str;
        }
    
        function search($text, $word_dic){
            $found = FALSE;
            foreach ($word_dic as $word) {
                if( strpos( $text, $word ) !== false) {
                    $found = TRUE;
            }
            return $found;
            }
        }
    ?>


    <div class="container">

    <div class="tab">
         <button class="tablinks" onclick="openCity(event, 'London')">Positive Reviews</button>
         <button class="tablinks" onclick="openCity(event, 'Paris')">Negative Reviews</button>
         <button class="tablinks" onclick="openCity(event, 'Tokyo')">Food Reviews</button>
    </div>

    <?php
        $positive_dictionary = array('good', 'great','amazing','awesome','Excellent');
        $negative_dictionary = array('bad', 'unsatis','disappointed');
        $menu_items = array('food','rice','drink', 'tasty', 'Delicious');
    ?>

    <div id="London" class="tabcontent">
        <h3>Positive Reviews</h3>
        
        <?Php
        echo "<p>Keywords</p>";
        foreach ($positive_dictionary as $value) {
            echo "<label>".$value."</label><br>";
        }

        echo '<table  class="table table-striped table-bordered table-hover">';
        echo'<thead><tr>
        <th>Reviewer</th>
        <th>Country</th>
        <th>Date</th>
        <th>Rating</th>
        <th>Comment Heading</th>
        <th>Detailed Comment</th>
        </tr></thead>';
        $f = fopen("reviews_1_to_250.csv", "r");
        while (($line = fgetcsv($f)) !== false) {
            // echo (search($line[1], $positive_dictionary));
            // print_r ($line);
            if (search($line[5], $positive_dictionary)) {

                echo "<tr>";
                echo "<td>".$line[0]."</td>";
                echo "<td>".$line[1]."</td>";
                echo "<td>".$line[2]."</td>";
                echo "<td>".$line[3]."</td>";
                echo "<td>".$line[4]."</td>";
                echo "<td>".highlighter($line[5], $positive_dictionary)."</td>";
                echo "<tr>\n";
            }
        }
        fclose($f);
        echo "\n</table>";
        ?>

    </div>

    <div id="Paris" class="tabcontent">
        <h3>Negative Reviews</h3>

        <?Php 
        
        echo "<p>Keywords</p>";
        foreach ($negative_dictionary as $value) {
            echo "<label>".$value."</label><br>";
        }

        echo '<table  class="table table-striped table-bordered table-hover">';
        echo'<thead><tr>
        <th>Reviewer</th>
        <th>Country</th>
        <th>Date</th>
        <th>Rating</th>
        <th>Comment Heading</th>
        <th>Detailed Comment</th>
        </tr></thead>';
        $f = fopen("reviews_1_to_250.csv", "r");
        while (($line = fgetcsv($f)) !== false) {
            // echo (search($line[1], $negative_dictionary));
            if (search($line[5], $negative_dictionary)) {

                echo "<tr>";
                echo "<td>".$line[0]."</td>";
                echo "<td>".$line[1]."</td>";
                echo "<td>".$line[2]."</td>";
                echo "<td>".$line[3]."</td>";
                echo "<td>".$line[4]."</td>";
                echo "<td>".highlighter($line[5], $negative_dictionary)."</td>";
                echo "<tr>\n";
            }
        }
        fclose($f);
        echo "\n</table>";
        ?>

    </div>

    <div id="Tokyo" class="tabcontent">
        <h3>Food Reviews</h3>
    
        <?Php 

        echo "<p>Keywords</p>";
        foreach ($menu_items as $value) {
            echo "<label>".$value."</label><br>";
        }
    
        echo '<table  class="table table-striped table-bordered table-hover">';
        echo'<thead><tr>
        <th>Reviewer</th>
        <th>Country</th>
        <th>Date</th>
        <th>Rating</th>
        <th>Comment Heading</th>
        <th>Detailed Comment</th>
        </tr></thead>';
        $f = fopen("reviews_1_to_250.csv", "r");
        while (($line = fgetcsv($f)) !== false) {
            // echo (search($line[1], $menu_items));
            if (search($line[5], $menu_items)) {

                echo "<tr>";
                echo "<td>".$line[0]."</td>";
                echo "<td>".$line[1]."</td>";
                echo "<td>".$line[2]."</td>";
                echo "<td>".$line[3]."</td>";
                echo "<td>".$line[4]."</td>";
                echo "<td>".highlighter($line[5], $menu_items)."</td>";
                echo "<tr>\n";
            }
        }
        fclose($f);
        echo "\n</table>";
        ?>

    </div>

    </div>  
    
</body>

<script>
    function openCity(evt, cityName) {
      var i, tabcontent, tablinks;
      tabcontent = document.getElementsByClassName("tabcontent");
      for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
      }
      tablinks = document.getElementsByClassName("tablinks");
      for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
      }
      document.getElementById(cityName).style.display = "block";
      evt.currentTarget.className += " active";
    }
</script>

</html>


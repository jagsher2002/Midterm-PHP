        <!DOCTYPE html>
        <html>
        <head>

        <title>Foods</title>

        </head>
        <body>
            
        <h1>Your Favourite cuisine</h1>

        <?php
        include('select-cuisine.php'); 

        if ($_SERVER["REQUEST_METHOD"] == "POST") 
        {

        if (isset($_POST["cuisine"])) 
        {

        $cuisine = $_POST["cuisine"];
        
        $host = '172.31.22.43';
        $dbname = 'Jagsher200567017';
        $username = 'Jagsher200567017';
        $password = 'a_RwALIaGd';

        try {

        $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $stmt = $pdo->prepare("SELECT foodId, name FROM foods WHERE cuisine = :cuisine");
        $stmt->bindParam(':cuisine', $cuisine);
        $stmt->execute();

        echo "<ul>";

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) 
        
        {
        echo "<li><a href=\"delete-food.php?foodId={$row['foodId']}\">{$row['name']}</a></li>";
        }

        echo "</ul>";
        } 
        catch (PDOException $e) 
        {
        echo "Error: " . $e->getMessage();
        }
        }
        }
        ?>
        </body>
        </html>

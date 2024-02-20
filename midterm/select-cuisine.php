        <!DOCTYPE html>
        <html>
        <head>

        <title>Select Cuisine</title>

        </head>
        <body>

        <h1>Choose your favourite Cuisine</h1>
        <form action="foods.php" method="POST">
        <label for="cuisine">Choose a cuisine:</label>
        <select id="cuisine" name="cuisine">

        <?php

        // connecting to database using the PDO (PHP Data Objects Library) 
        // My database connection credentials are:-

        $host = '172.31.22.43';
        $dbname = 'Jagsher200567017';
        $username = 'Jagsher200567017';
        $password = 'a_RwALIaGd';


        try {

        $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $stmt = $pdo->prepare("SELECT name FROM cuisines");
        $stmt->execute();

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        echo "<option value=\"{$row['name']}\">{$row['name']}</option>";
        }
        } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
        }
        ?>

        </select>
        <br>

        <button type="submit">Get Foods</button>

        </form>
        </body>
        </html>



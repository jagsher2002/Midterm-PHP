    <?php
    include('select-cuisine.php');
    
    if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["foodId"])) {
    $foodId = $_GET["foodId"];

    $host = '172.31.22.43';
    $dbname = 'Jagsher200567017';
    $username = 'Jagsher200567017';
    $password = 'a_RwALIaGd';

    try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $stmt = $pdo->prepare("DELETE FROM foods WHERE foodId = :foodId");
    $stmt->bindParam(':foodId', $foodId);
    $stmt->execute();

    header("Location: select-cuisine.php");
    exit();
    } catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
    }
    } else {
    header("Location: select-cuisine.php");
    exit();
    }
    ?>

<?php
// Conectare la baza de date
$servername = "localhost";
$username = "system";
$password = "Whiplash20!";
$dbname = "irina";

$conn = new mysqli($servername, $username, $password, $dbname);

// Verificare conexiune
if ($conn->connect_error) {
    die("Conexiune eșuată: " . $conn->connect_error);
}

// Interogare SQL pentru a prelua produsele
$sql = "SELECT MODEL, FABRICANT, CATEGORIE, PRET, MONEDA FROM PRODUS";
$result = $conn->query($sql);

// Afișare rezultate într-o listă
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "<li><strong>Model:</strong> " . $row["MODEL"]. " - <strong>Fabricant:</strong> " . $row["FABRICANT"]. " - <strong>Categorie:</strong> " . $row["CATEGORIE"]. " - <strong>Pret:</strong> " . $row["PRET"]. " " . $row["MONEDA"]. "</li>";
    }
} else {
    echo "Nu există produse în baza de date.";
}

// Închidere conexiune
$conn->close();
?>

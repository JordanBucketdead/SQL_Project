<?php
$servername = "localhost";
$username = "system";
$password = "Whiplash20!";
$dbname = "irina";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexiune eșuată: " . $conn->connect_error);
}

$query = "SELECT MODEL, CULOARE, TIP
FROM IMPRIMANTA I
WHERE EXISTS (
    SELECT *
    FROM PRODUS P
    WHERE P.MODEL = 123 AND P.PRET = (SELECT PRET FROM PRODUS WHERE MODEL = I.MODEL)
)";

$result = $conn->query($query);

// Adaugă textul deasupra rezultatelor cu dimensiunea fontului mărită și un mic spațiu
echo '<div class="result" style="margin-top: 50px;"><div style="text-align: center; font-weight: bold; font-size: 25px; margin-bottom: 20px;">Să se găsească detaliile imprimantelor cu anumite condiții.</div>';

// Începe afișarea rezultatelor
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        // Afișare rezultate
        echo "<p>Model: " . $row["MODEL"] . " - Culoare: " . $row["CULOARE"] . " - Tip: " . $row["TIP"] . "</p>";
    }
} else {
    // Afișează un mesaj pentru cazul în care nu există rezultate
    echo "<p>Nu s-au găsit rezultate pentru exercițiu</p>";
}

// Adaugă butonul de revenire cu stiluri CSS și URL-ul complet al paginii principale
echo '<button onclick="goBack()" style="margin-top: 10px; padding: 10px 20px; font-size: 18px;">Revenire</button></div>';

$conn->close();
?>

<!-- Adaugă scriptul JavaScript pentru a gestiona funcționalitatea butonului de revenire -->
<script>
    function goBack() {
        // Inlocuiește 'URL_PAGINA_PRINCIPALA' cu URL-ul complet al paginii principale
        window.location.href = 'http://localhost/proiectel/proiect.html';
    }
</script>

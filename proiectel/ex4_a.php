<?php
$servername = "localhost";
$username = "system";
$password = "Whiplash20!";
$dbname = "irina";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexiune eșuată: " . $conn->connect_error);
}

$query = "
SELECT i.MODEL, p.FABRICANT, p.PRET, i.TIP, i.CULOARE
FROM IMPRIMANTA i
JOIN PRODUS p ON i.MODEL = p.MODEL
WHERE i.TIP = 'laser' AND i.CULOARE = 'D'
ORDER BY p.PRET ASC";

$result = $conn->query($query);

if ($result->num_rows > 0) {
    // Adaugă textul deasupra tabelului cu dimensiunea fontului mărită și un mic spațiu
    echo '<div class="result" style="margin-top: 50px; text-align: center;"><div style="font-weight: bold; font-size: 25px; margin-bottom: 20px;">Să se găsească detaliile imprimantelor de tip laser color ordonate crescător după preț.</div>';

    // Începe tabelul HTML și adaugă stilul CSS
    echo '<style>table {border-collapse: collapse; width: 100%;} th, td {border: 1px solid black; padding: 8px; text-align: left;} th {background-color: #f2f2f2;}</style><table>';

    // Adaugă antetele tabelului
    echo '<tr><th>Model</th><th>Fabricant</th><th>Preț</th><th>Tip</th><th>Culoare</th></tr>';

    while ($row = $result->fetch_assoc()) {
        // Adaugă rânduri în tabel pentru fiecare rezultat
        echo "<tr><td>" . $row["MODEL"] . "</td><td>" . $row["FABRICANT"] . "</td><td>" . $row["PRET"] . "</td><td>" . $row["TIP"] . "</td><td>" . $row["CULOARE"] . "</td></tr>";
    }

    // Sfârșitul tabelului HTML
    echo '</table>';

    // Adaugă butonul de revenire cu stiluri CSS și URL-ul complet al paginii principale
    echo '<button onclick="goBack()" style="margin-top: 10px; padding: 10px 20px; font-size: 18px;">Revenire</button></div>';
} else {
    echo "Nu s-au găsit rezultate pentru exercițiul 5.04 a)";
}

$conn->close();
?>

<!-- Adaugă scriptul JavaScript pentru a gestiona funcționalitatea butonului de revenire -->
<script>
    function goBack() {
        // Inlocuiește 'URL_PAGINA_PRINCIPALA' cu URL-ul complet al paginii principale
        window.location.href = 'http://localhost/proiectel/proiect.html';
    }
</script>

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
SELECT
   P1.MODEL AS Model1,
   P2.MODEL AS Model2,
   P1.FABRICANT
FROM PRODUS P1
JOIN PRODUS P2 ON P1.FABRICANT = P2.FABRICANT
WHERE P1.CATEGORIE = 'PC' AND P2.CATEGORIE = 'PC' AND P1.MODEL < P2.MODEL";

$result = $conn->query($query);

if ($result->num_rows > 0) {
    // Adaugă textul deasupra tabelului cu dimensiunea fontului mărită și un mic spațiu
    echo '<div class="result" style="margin-top: 50px; text-align: center;"><div style="font-weight: bold; font-size: 25px; margin-bottom: 20px;">Să se găsească perechi de modele (Model1, Model2) de PC-uri produse de același fabricant. O pereche este unică în rezultat.</div>';

    // Începe tabelul HTML și adaugă stilul CSS
    echo '<style>table {border-collapse: collapse; width: 100%;} th, td {border: 1px solid black; padding: 8px; text-align: left;} th {background-color: #f2f2f2;}</style><table>';

    // Adaugă antetele tabelului
    echo '<tr><th>Model1</th><th>Model2</th><th>Fabricant</th></tr>';

    while ($row = $result->fetch_assoc()) {
        // Adaugă rânduri în tabel pentru fiecare rezultat
        echo "<tr><td>" . $row["Model1"] . "</td><td>" . $row["Model2"] . "</td><td>" . $row["FABRICANT"] . "</td></tr>";
    }

    // Sfârșitul tabelului HTML
    echo '</table>';

    // Adaugă butonul de revenire cu stiluri CSS și URL-ul complet al paginii principale
    echo '<button onclick="goBack()" style="margin-top: 10px; padding: 10px 20px; font-size: 18px;">Revenire</button></div>';
} else {
    echo "Nu s-au găsit rezultate pentru exercițiu";
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

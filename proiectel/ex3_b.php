<?php
$servername = "localhost";
$username = "system";
$password = "Whiplash20!";
$dbname = "irina";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexiune eșuată: " . $conn->connect_error);
}

$query = "SELECT * FROM LAPTOP WHERE ECRAN = 15.6 ORDER BY VITEZA DESC, HD DESC";

$result = $conn->query($query);

if ($result->num_rows > 0) {
    // Adaugă textul deasupra tabelului cu dimensiunea fontului mărită și un mic spațiu
    echo '<div class="result" style="margin-top: 50px; text-align: center;"><div style="font-weight: bold; font-size: 25px; margin-bottom: 20px;">Să se găsească detaliile laptopurilor cu ecran 15.6 inch ordonat descrescător după viteză și descrescător după HD.</div>';

    // Începe tabelul HTML și adaugă stilul CSS
    echo '<style>table {border-collapse: collapse; width: 100%;} th, td {border: 1px solid black; padding: 8px; text-align: left;} th {background-color: #f2f2f2;}</style><table>';

    // Adaugă antetele tabelului
    echo '<tr><th>Model</th><th>Viteză</th><th>HD</th></tr>';

    while ($row = $result->fetch_assoc()) {
        // Adaugă rânduri în tabel pentru fiecare rezultat
        echo "<tr><td>" . $row["MODEL"] . "</td><td>" . $row["VITEZA"] . " GHz</td><td>" . $row["HD"] . " GB</td></tr>";
    }

    // Sfârșitul tabelului HTML
    echo '</table>';

    // Adaugă butonul de revenire cu stiluri CSS și URL-ul complet al paginii principale
    echo '<button onclick="goBack()" style="margin-top: 10px; padding: 10px 20px; font-size: 18px;">Revenire</button></div>';
} else {
    echo "Nu s-au găsit rezultate pentru exerciți";
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

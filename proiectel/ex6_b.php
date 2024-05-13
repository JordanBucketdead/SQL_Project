<?php
$servername = "localhost";
$username = "system";
$password = "Whiplash20!";
$dbname = "irina";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexiune eșuată: " . $conn->connect_error);
}

$query = "SELECT I.TIP, ROUND(AVG(P.PRET), 2) AS PRET_MEDIU
FROM IMPRIMANTA I
JOIN PRODUS P ON I.MODEL = P.MODEL
GROUP BY I.TIP";

$result = $conn->query($query);

if ($result->num_rows > 0) {
    // Adaugă textul deasupra tabelului cu dimensiunea fontului mărită și un mic spațiu
    echo '<div class="result" style="margin-top: 50px; text-align: center;"><div style="font-weight: bold; font-size: 25px; margin-bottom: 20px;">Să se găsească prețul mediu al imprimantelor în funcție de tip.</div>';

    // Începe tabelul HTML și adaugă stilul CSS
    echo '<style>table {border-collapse: collapse; width: 100%;} th, td {border: 1px solid black; padding: 8px; text-align: left;} th {background-color: #f2f2f2;}</style><table>';

    // Adaugă antetele tabelului
    echo '<tr><th>Tip</th><th>Preț mediu</th></tr>';

    while ($row = $result->fetch_assoc()) {
        // Adaugă rânduri în tabel pentru fiecare rezultat
        echo "<tr><td>" . $row["TIP"] . "</td><td>" . $row["PRET_MEDIU"] . "</td></tr>";
    }

    // Sfârșitul tabelului HTML
    echo '</table>';

    // Adaugă butonul de revenire cu stiluri CSS pentru a-l plasa în mijloc
    echo '<div style="text-align: center; margin-top: 10px;"><button onclick="goBack()" style="padding: 10px 20px; font-size: 18px;">Revenire</button></div></div>';
} else {
    echo "Nu s-au găsit rezultate pentru exercițiul 5.06 b)";
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

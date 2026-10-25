<?php
if (!isset($_POST['values']) || count($_POST['values']) !== 8) {
    die("Please enter exactly 8 values.");
}

$numbers = array_map('intval', $_POST['values']);

function displayArray($title, $arr) {
    echo "<h2>" . htmlspecialchars($title) . "</h2>";

    echo "<b>Without keys/indexes:</b><br>";
    foreach ($arr as $value) {
        echo htmlspecialchars((string)$value) . " ";
    }

    echo "<br><br><b>With keys/indexes:</b><br>";
    foreach ($arr as $key => $value) {
        echo "[" . $key . "] => " . htmlspecialchars((string)$value) . "<br>";
    }

    echo "<hr>";
}

echo "<h1>Week Eight Array Operations</h1>";

// Original array
displayArray("1. Original Array", $numbers);

// Delete two elements
$deleted = $numbers;
unset($deleted[1], $deleted[3]);
displayArray("2. Delete Two Elements", $deleted);

// Remove gaps
$noGaps = array_values($deleted);
displayArray("3. Remove Gaps", $noGaps);

// Sort ascending
$ascending = $noGaps;
sort($ascending);
displayArray("4. Ascending Order", $ascending);

// Sort descending
$descending = $noGaps;
rsort($descending);
displayArray("5. Descending Order", $descending);

// Sort by value while keeping keys
$keepKeys = $noGaps;
asort($keepKeys);
displayArray("6. Ascending by Value (Keep Keys)", $keepKeys);

// Sort by keys
$sortKeys = $keepKeys;
ksort($sortKeys);
displayArray("7. Ascending by Keys", $sortKeys);
?>
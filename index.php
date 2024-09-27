<?php
require_once 'includes/RatioChecker.php';

$result = '';
$ratio = 0;
$totalTextLength = 0;
$totalHtmlLength = 0;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $htmlContent = $_POST['html_content'];
    $checker = new RatioChecker();
    $ratio = $checker->calculateRatio($htmlContent);
    $totalTextLength = strlen($checker->extractText($htmlContent));
    $totalHtmlLength = strlen($htmlContent);
    
    $percentage = number_format($ratio * 100, 2); // Percentage formatted to 2 decimal places
    $ratioFormatted = formatRatio($ratio, $totalTextLength, $totalHtmlLength);
    $result = [
        'ratio' => $ratioFormatted,
        'percentage' => $percentage,
        'textLength' => $totalTextLength,
        'htmlLength' => $totalHtmlLength,
    ];

    // Return JSON response for AJAX
    echo json_encode($result);
    exit; // Stop further execution after returning JSON
}

function formatRatio($ratio, $textLength, $htmlLength) {
    if ($textLength === 0) {
        return "0:1"; 
    }
    
    $gcd = gcd($textLength, $htmlLength);
    return ($textLength / $gcd) . ":" . ($htmlLength / $gcd);
}

function gcd($a, $b) {
    while ($b) {
        $a %= $b;
        $a ^= $b;
        $b ^= $a;
        $a ^= $b;
    }
    return $a;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Text-to-HTML Ratio Checker</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="container">
        <h1>Text-to-HTML Ratio Checker</h1>
        <textarea id="html_content" rows="10" cols="50" placeholder="Paste your HTML content here"></textarea>
        <button id="check_ratio">Check Ratio</button>
        
        <div id="result" class="result" style="display:none;">
            <p id="ratio_output"></p>
            <p id="text_length_output"></p>
            <p id="html_length_output"></p>
            <button id="clear_result" style="margin-top:25px">Clear Result</button>
        </div>
    </div>
    <script src="js/script.js"></script>
</body>
</html>

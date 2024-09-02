<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the input text from the form
    $inputText = $_POST["input_text"];

    // Replace * with & and display the modified text
    $modifiedText = str_replace("*", "&", $inputText);
    echo "Modified Text: " . $modifiedText . "<br>";

    // Apply Caesar cipher with a seed of 3 and display the encrypted text
    $encryptedText = "";
    for ($i = 0; $i < strlen($modifiedText); $i++) {
        $char = $modifiedText[$i];
        if ($char >= 'A' && $char <= 'Z') {
            $encryptedText .= chr(((ord($char) - 65 + 3) % 26) + 65);
        } elseif ($char >= 'a' && $char <= 'z') {
            $encryptedText .= chr(((ord($char) - 97 + 3) % 26) + 97);
        } else {
            $encryptedText .= $char;
        }
    }
    echo "Encrypted Text: " . $encryptedText . "<br>";

    // Display the length of the encrypted text
    echo "Length of Encrypted Text: " . strlen($encryptedText) . "<br>";

    // Sort the encrypted characters based on ASCII value
    $sortedCharacters = str_split($encryptedText);
    sort($sortedCharacters);
    echo "Sorted Characters: " . implode("", $sortedCharacters) . "<br>";

    // Extract repeated characters and unique characters
    $repeatedCharacters = [];
    $uniqueCharacters = [];
    foreach (count_chars($encryptedText, 1) as $char => $count) {
        if ($count > 1) {
            $repeatedCharacters[] = chr($char);
        } else {
            $uniqueCharacters[] = chr($char);
        }
    }

    echo "Repeated Characters: " . implode(", ", $repeatedCharacters) . "<br>";
    echo "Unique Characters: " . implode(", ", $uniqueCharacters) . "<br>";
}
?>
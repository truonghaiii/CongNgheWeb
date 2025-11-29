<?php
$conn = new mysqli("localhost", "root", "", "web_course");

$json = file_get_contents($_FILES["jsonFile"]["tmp_name"]);
$data = json_decode($json, true);

foreach ($data as $q) {
    $question = $q["question"];
    $options = json_encode($q["options"]);
    $answer = json_encode($q["answer"]);
    $type = $q["type"];

    $sql = "INSERT INTO questions (question, options, answer, type)
            VALUES ('$question', '$options', '$answer', '$type')";
    $conn->query($sql);
}

echo "Upload JSON thành công!";
?>

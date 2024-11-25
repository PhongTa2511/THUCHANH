<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Quiz Application</title>
</head>
<body>
    <h1>Bài thi trắc nghiệm</h1>
    <?php
    // Đường dẫn file
    $filePath = 'Quiz.txt';

    // Kiểm tra nếu file tồn tại
    if (file_exists($filePath)) {
        // Đọc file vào một mảng
        $lines = file($filePath, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

        // Biến để chứa câu hỏi và đáp án
        $questions = [];
        $currentQuestion = [];

        foreach ($lines as $line) {
            if (strpos($line, 'ANSWER:') === 0) {
                // Lưu đáp án
                $currentQuestion['answer'] = trim(substr($line, 7));
                $questions[] = $currentQuestion; // Lưu câu hỏi vào danh sách
                $currentQuestion = []; // Reset
            } elseif (preg_match('/^[A-D]\./', $line)) {
                // Lưu lựa chọn
                $currentQuestion['options'][] = $line;
            } elseif (!empty($line)) {
                // Lưu câu hỏi
                $currentQuestion['question'] = $line;
            }
        }

        // Hiển thị câu hỏi
        echo '<form action="submit.php" method="post">';
        foreach ($questions as $index => $question) {
            echo '<div>';
            echo '<p><strong>Câu ' . ($index + 1) . ':</strong> ' . $question['question'] . '</p>';
            foreach ($question['options'] ?? [] as $option) {
                $optionValue = substr($option, 0, 1); // Lấy ký tự đầu làm giá trị
                echo '<label>';
                echo '<input type="radio" name="question' . $index . '" value="' . $optionValue . '"> ';
                echo $option;
                echo '</label><br>';
            }
            echo '</div><hr>';
        }
        echo '<button type="submit">Nộp bài</button>';
        echo '</form>';
    } else {
        echo '<p>File không tồn tại.</p>';
    }
    ?>
</body>
</html>

<?php
    include 'db_config.php';

    $response = ['success' => false, 'error' => ''];

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $full_name = $_POST['full_name'];
        $email = $_POST['email'];
        $mobile_number = $_POST['mobile_number'];
        $dob = $_POST['dob'];
        $age = $_POST['age'];
        $gender = $_POST['gender'];

        if (empty($full_name) || empty($email) || empty($mobile_number) || empty($dob) || empty($gender)) {
            $response['error'] = 'All fields are required.';
        } elseif (!preg_match('/^[a-zA-Z\s.,]+$/', $full_name)) {
            $response['error'] = 'Full Name contains invalid characters.';
        } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $response['error'] = 'Invalid email address.';
        } elseif (!preg_match('/^09\d{9}$/', $mobile_number)) {
            $response['error'] = 'Invalid mobile number. Must be in the format 09123456789.';
        } else {
            try {
                $stmt = $pdo->prepare("INSERT INTO user_info (full_name, email, mobile_number, date_of_birth, age, gender) VALUES (?, ?, ?, ?, ?, ?)");
                $stmt->execute([$full_name, $email, $mobile_number, $dob, $age, $gender]);
                $response['success'] = true;
            } catch (PDOException $e) {
                $response['error'] = 'Database error: ' . $e->getMessage();
            }
        }
    }

    echo json_encode($response);
?>

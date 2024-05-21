<?php
require_once 'path/to/checkUserSession.php';
checkUserSession();
include '../database/config.php';

$client_id = $_SESSION['client_id'];

$sql = "SELECT * FROM `client` WHERE client_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param('i', $client_id);
$stmt->execute();

$result = $stmt->get_result();
if ($result->num_rows > 0) {
    // email / company_name / company_type / company_address / legal_company / TAX_id / created_date
    $data = $result->fetch_assoc();

    $email = $data['email'];
    $company_name = $data['company_name'];
    $company_type = $data['company_type'];
    $company_address = $data['company_address'];
    $legal_company = $data['legal_company'];
    $TAX_id = $data['TAX_id'];
    $created_date = $data['created_date'];

} else {
    $company_name = "Client not found";
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
</head>
<body>
    <h3>email : <?php echo htmlspecialchars($email); ?>!</h3>
    <h3>company_name : <?php echo htmlspecialchars($company_name); ?>!</h3>
    <h3>company_type : <?php echo htmlspecialchars($company_type); ?>!</h3>
    <h3>company_address : <?php echo htmlspecialchars($company_address); ?>!</h3>
    <h3>legal_company : <?php echo htmlspecialchars($legal_company); ?>!</h3>
    <h3>TAX_id : <?php echo htmlspecialchars($TAX_id); ?>!</h3>
    <h3>created_date : <?php echo htmlspecialchars($created_date); ?>!</h3>
</body>
</html>

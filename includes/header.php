<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo isset($pageTitle) ? $pageTitle : 'Default Title'; ?></title>
    
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css"> <!-- Your custom styles -->
    
    <?php
    //Include additional CSS based on the page
    if (isset($additionalCSS)) {
        foreach ($additionalCSS as $css) {
            echo '<link rel="stylesheet" href="css/' . $css . '">';
        }
    }
    ?>
</head>
<body>
    <?php include 'includes/navbar.php'; ?>
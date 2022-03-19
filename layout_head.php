<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Authentication </title>

    <!--Boostrp CSS-->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" media="screen" />

    <!--custom css-->
    <link href="libs/css/custom.css" rel="stylesheet">
</head>
<body>

    <!-- Include Navigation Bar -->
    <?php include_once 'navigation.php'; ?>

    <!--container-->
    <div class="container">
            <?php
                if($page_title != "Login"){
                    ?>
                        <div class="col-md-12">
                            <!-- If give title is login, do not display the title -->
                            <div class="page-header">
                                <h1> <?php echo isset($page_title) ? $page_title : "Onyango Codes"; ?> </h1>
                            </div>
                        </div>
                    <?php

                }
            ?>
        
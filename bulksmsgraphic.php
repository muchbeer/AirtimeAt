<?php
    define( "TITLE", "Muchbeer Message Portal" );
    include("bulksmscode.php");
   
    if( isset( $_POST["btn_submit"] ) ) {
        
        // call function
        sendMessage();
    }
?>

<!DOCTYPE html>

<html>

    <head>
        
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title><?php echo TITLE; ?></title>

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

    </head>
    
    <body>
        <div class="container">
            <h1><?php echo TITLE; ?></h1>
            <p class="lead">Muchbeer Message Portal that save you time from sending Multiple Message.</p>
            
            <div class="row">
                <form class="col-sm-8 col-sm-offset-2" action="" method="post">
                    <textarea placeholder="Enter mobile number here" class="form-control input-lg" name="edt_phone_number"></textarea><br>
                   
                    <textarea placeholder="Enter Your Message" class="form-control 
                    input-lg" name="edt_message"></textarea><br>
                   
                    <button type="submit" class="btn btn-primary btn-lg pull-right" name="btn_submit">Send Message!</button><br><br><hr>
                </form>
            </div>
            
             <!-- tHE script below enable the output to be displayed to the screen -->
          
            
            <?php
            if ( isset( $_POST["btn_submit"] ) ) {
                
                    
                // get first value in array returned by sendMessage() function
                // store it in a variable
              $dumpResult = sendMessage()[2];
                
                // get second value in array returned by sendMessage() function
                // store it in a variable
                $phoneNumber = sendMessage()[1];
                
                $message = sendMessage()[0];
                
                // call function
                // pass all arguments in the function
                
           // Evaluates to true because $var is empty
                    if (empty($dumpResult)) {
                    echo "Error occured on sending Airtime. ";
                    } else {
                         displayResults( $message, $phoneNumber, $dumpResult );
                    }
                
                 }
            ?>

        </div>
        <!-- Bootstrap JS -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    </body>
</html>

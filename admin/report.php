<?php
    require('js/phpToPDF.php');

    //It is possible to include a file that outputs html and store it in a variable 
    //using output buffering.
    ob_start();
    include('result.php');
    $my_html = ob_get_clean();

    //Set Your Options -- we are saving the PDF as 'my_filename.pdf' to a 'my_pdfs' folder
    $pdf_options = array(
      "source_type" => 'html',
      "source" => $my_html,
      "action" => 'save',
      "save_directory" => 'result',
      "margin"=>array("right"=>"25","left"=>'25',"top"=>"20","bottom"=>"60"),
      "omit_images" => 'no',   
      "file_name" => 'report.pdf');

    //Code to generate PDF file from options above
    phptopdf($pdf_options);
?>
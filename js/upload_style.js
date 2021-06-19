//Auto submit form when file is selected
$(document).ready(function() {
    //$('#upload').load('./views/upload/selectFile.php');

    $('#fileInput').change(function() {
        $('#uploadForm').submit();
        console.log("Submited");

        //Show progresss bar when file uploading
        $('#upload').load('./views/upload/loadFile.php');
    });


});
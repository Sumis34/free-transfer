//Auto submit form when file is selected
$(document).ready(function() {
    $('#fileInput').change(function() {
        $('#uploadForm').submit();
        console.log("Submited");
    });
});
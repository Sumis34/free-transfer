//Auto submit form when file is selected
$(document).ready(function() {
    //$('#upload').load('./views/upload/selectFile.php');

    $('#fileInput').change(function() {

        var allowedTypes = ['application/pdf',
            'application/msword',
            'application/vnd.ms-office',
            'application/vnd.openxmlformats-officedocument.wordprocessingml.document',
            'image/jpeg',
            'image/png',
            'image/jpg',
            'image/gif',
            'video/mp4',
            'text/plain',
            'application /x-compressed',
            'application/x-zip-compressed',
            'application/zip',
            'multipart/x-zip',
            'audio/mpeg'
        ];
        var file = this.files[0];
        var fileType = file.type;
        if (allowedTypes.includes(fileType)) {
            $('#uploadForm').submit();
            console.log("Submited");

            //Show progresss bar when file uploading
            $('#upload').load('./views/upload/loadFile.php');
        }
    });
});
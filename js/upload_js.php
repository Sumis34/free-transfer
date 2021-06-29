<?php
$fileCode = $_SESSION['fileCode'];

//For live server remove transfer 
// like this: (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]/file/$fileCode";

//This link is the download link the user gets

$actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]/transfer/file/$fileCode";
$share_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]/transfer/share";
?>
<script>
    var ajaxCall;
    $(document).ready(function() {
        // File upload via Ajax
        $("#uploadForm").on('submit', function(e) {
            e.preventDefault();
            ajaxCall = $.ajax({
                xhr: function() {
                    var xhr = new window.XMLHttpRequest();
                    xhr.upload.addEventListener("progress", function(evt) {
                        if (evt.lengthComputable) {
                            var percentComplete = ((evt.loaded / evt.total) * 100);
                            $(".progress-bar").width(percentComplete + '%');
                            $(".progress-bar").html(Math.round(percentComplete) + '%');
                        }
                    }, false);
                    return xhr;
                },
                type: 'POST',
                url: 'upload',
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                beforeSend: function() {
                    $(".progress-bar").width('0%');
                    $('#uploadStatus').html('<p style="color:#000;">File uploading.</p>');
                },
                error: function(xhr, status, error) {
                    $('#uploadStatus').html('<p style="color:#EA4335;">File upload failed, please try again.' + error + '</p>');
                },
                success: function(resp) {
                    if (resp == 'ok') {
                        $('#uploadForm')[0].reset();
                        $('#uploadStatus').html('<p style="color:#28A74B;">File has uploaded successfully!</p>');
                    } else if (resp == 'err') {
                        $('#uploadStatus').html('<p style="color:#EA4335;">Please select a valid file to upload.</p>');
                    } else {
                        //window.location.replace('<?php echo $share_link ?>');
                    }
                }
            });
        });

        //stop upload
        $(document).on('click', '#abort', function(e) {
            ajaxCall.abort();
            location.reload();
            console.log("Canceled");
        });

        // File type validation
        $("#fileInput").change(function() {
            var allowedTypes = [
                'application/pdf', 
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
            if (!allowedTypes.includes(fileType)) {
                alert('Please select a valid file (PDF/DOC/DOCX/JPEG/JPG/PNG/GIF/MP4/ZIP).');
                $("#fileInput").val('');
                return false;
            }
        });
    });
</script>
<?php
    function formatSizeUnits($bytes, $roundPericion = 0)
    {
        if ($bytes >= 1073741824)
            $bytes = number_format($bytes / 1073741824, $roundPericion + 2) . ' GB';

        elseif ($bytes >= 1048576)
            $bytes = number_format($bytes / 1048576, $roundPericion) . ' MB';

        elseif ($bytes >= 1024)
            $bytes = number_format($bytes / 1024, $roundPericion) . ' KB';

        elseif ($bytes > 1)
            $bytes = $bytes . ' bytes';

        elseif ($bytes == 1)
            $bytes = $bytes . ' byte';

        else
            $bytes = '0 bytes';

        return $bytes;
}
?>
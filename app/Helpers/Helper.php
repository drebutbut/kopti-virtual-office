<?php

function showDateTime($carbon, $format = 'd M Y H:i:s')
{
    return $carbon->translatedFormat($format);
}

?>
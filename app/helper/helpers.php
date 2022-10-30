<?php
function sizeFilter($bytes)
{
    $label = array('B', 'KB', 'MB', 'GB', 'TB', 'PB');
    for ($i = 0; $bytes >= 1024 && $i < (count($label) - 1); $bytes /= 1024, $i++);
    return (round($bytes, 2) . " " . $label[$i]);
}
function dateTimeHepler($value)
{
    return date("Y-m-d h:i a", strtotime($value));
}
function getLatitudeLongitude($address)
{
    if (!is_string($address)) {
        return false;
    }
    $arrContextOptions = array(
        "ssl" => array(
            "verify_peer" => false,
            "verify_peer_name" => false,
        )
    );
    $address = urlencode($address);
    $geocode = file_get_contents('https://maps.google.com/maps/api/geocode/json?key=AIzaSyCcbWlKpbS5BOqrktc7iW0CCgKrQkvG8zc&address=' . $address . '&sensor=false', 'false', stream_context_create($arrContextOptions));
    // traceMessage('http://maps.google.com/maps/api/geocode/json?address='.$address.'&sensor=false');
    $output = json_decode($geocode);
    // traceMessage("Output Info ".print_r_log($output));
    if($output->status == "OK")
    {
        $lat = $output->results[0]->geometry->location->lat;
        $long = $output->results[0]->geometry->location->lng;
        $locationArray['lat'] = "$lat";
        $locationArray['long'] = "$long";
    }
    else
    {
        $locationArray['lat'] = "0";
        $locationArray['long'] = "0";
    }
   
    return $locationArray;
}
function charaterCountTo20($char)
{
    $char=substr(ucwords($char), 0, 19);
    $char .=strlen($char) >= 19 ? '....' : '';
    return $char;
}
function charaterCountTo26($char)
{
    $char=substr(ucwords($char), 0, 26);
    $char .=strlen($char) >= 26 ? '....' : '';
    return $char;
}
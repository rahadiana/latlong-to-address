<?php

function LatLongAddres($lat,$long){

        $Response = file_get_contents("https://www.google.com/maps/search/$lat,+$long");
        // Start Get String Between       
        $BeforeText = '[[[1,[[\"';
        $AfterText = '\"]';

        $Text = ' ' . $Response;
        $This = strpos($Text, $BeforeText);
        if ($This == 0) return '';
        $This += strlen($BeforeText);
        $RangeText = strpos($Text, $AfterText, $This) - $This;
        $ResultAddress = substr($Text, $This, $RangeText);
        // End Get String Between
        return $ResultAddress;
};

print_r (LatLongAddres('-6.104243','106.801670'));

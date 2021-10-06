<?php
    $filecounter = "counter.txt";
    $file = fopen($filecounter, "r+");
    $hit = fread($file, filesize($filecounter));

    echo("<table width=250 align=center border=1 cellspacing=0 cellpadding=0 bordercolor=#0000FF><tr>");
        echo("<td width=250 valign=middle align=center>");
            echo("<font face=verdana size=2 color=#FF0000><b>");
                echo("Anda Pengunjung Ke- ");
                echo($hit);
            echo("<b></font>");
        echo("</td>");
    echo("</tr></table>");
    fclose($file);

    $file = fopen($filecounter, "w+");
    $hit = $hit + 1;
    fwrite($file, $hit, strlen($hit));
    fclose($file);
?>
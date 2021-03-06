<?php
require '../class/connect.php';

$bookNo = $_GET['id'];

if ($bookNo == null) {
    $bookNo = 0;
}

$query = "SELECT id, date_format(booking_date, '%d/%m/%Y') as tarikh, date_format(start_time, '%H:%i') as mula, date_format(end_time, '%H:%i') as tamat, "
        . "duration, customer_id, customer_name, worker_id, worker_name, status, price "
        . "FROM booking WHERE id=$bookNo;";
$result = mysqli_query($conn, $query);

$row = mysqli_fetch_assoc($result);
?>
<html>

    <head>
        <meta http-equiv=Content-Type content="text/html; charset=windows-1252">
        <meta name=Generator content="Microsoft Word 15 (filtered)">
        <style>
            <!--
            /* Font Definitions */
            @font-face
            {font-family:"Cambria Math";
             panose-1:2 4 5 3 5 4 6 3 2 4;}
            @font-face
            {font-family:Calibri;
             panose-1:2 15 5 2 2 2 4 3 2 4;}
            @font-face
            {font-family:"Arial Rounded MT Bold";
             panose-1:2 15 7 4 3 5 4 3 2 4;}
            /* Style Definitions */
            p.MsoNormal, li.MsoNormal, div.MsoNormal
            {margin-top:0cm;
             margin-right:0cm;
             margin-bottom:8.0pt;
             margin-left:0cm;
             line-height:106%;
             font-size:11.0pt;
             font-family:"Calibri",sans-serif;}
            p.MsoHeader, li.MsoHeader, div.MsoHeader
            {mso-style-link:"Header Char";
             margin:0cm;
             margin-bottom:.0001pt;
             font-size:11.0pt;
             font-family:"Calibri",sans-serif;}
            p.MsoFooter, li.MsoFooter, div.MsoFooter
            {mso-style-link:"Footer Char";
             margin:0cm;
             margin-bottom:.0001pt;
             font-size:11.0pt;
             font-family:"Calibri",sans-serif;}
            p.MsoTitle, li.MsoTitle, div.MsoTitle
            {mso-style-link:"Title Char";
             margin:0cm;
             margin-bottom:.0001pt;
             font-size:28.0pt;
             font-family:"Calibri Light",sans-serif;
             letter-spacing:-.5pt;}
            p.MsoTitleCxSpFirst, li.MsoTitleCxSpFirst, div.MsoTitleCxSpFirst
            {mso-style-link:"Title Char";
             margin:0cm;
             margin-bottom:.0001pt;
             font-size:28.0pt;
             font-family:"Calibri Light",sans-serif;
             letter-spacing:-.5pt;}
            p.MsoTitleCxSpMiddle, li.MsoTitleCxSpMiddle, div.MsoTitleCxSpMiddle
            {mso-style-link:"Title Char";
             margin:0cm;
             margin-bottom:.0001pt;
             font-size:28.0pt;
             font-family:"Calibri Light",sans-serif;
             letter-spacing:-.5pt;}
            p.MsoTitleCxSpLast, li.MsoTitleCxSpLast, div.MsoTitleCxSpLast
            {mso-style-link:"Title Char";
             margin:0cm;
             margin-bottom:.0001pt;
             font-size:28.0pt;
             font-family:"Calibri Light",sans-serif;
             letter-spacing:-.5pt;}
            span.HeaderChar
            {mso-style-name:"Header Char";
             mso-style-link:Header;}
            span.FooterChar
            {mso-style-name:"Footer Char";
             mso-style-link:Footer;}
            span.TitleChar
            {mso-style-name:"Title Char";
             mso-style-link:Title;
             font-family:"Calibri Light",sans-serif;
             letter-spacing:-.5pt;}
            .MsoChpDefault
            {font-size:10.0pt;
             font-family:"Calibri",sans-serif;}
            /* Page Definitions */
            @page WordSection1
            {size:595.3pt 841.9pt;
             margin:72.0pt 72.0pt 72.0pt 72.0pt;}
            div.WordSection1
            {page:WordSection1;}
            -->
        </style>

    </head>

    <body lang=EN-MY>

        <div class=WordSection1>

            <p class=MsoNormal align=center style='text-align:center'><b>House Cleaning 2 U</b></p>

            <table class=MsoTableGrid border=0 cellspacing=0 cellpadding=0
                   style='border-collapse:collapse;border:none'>
                <tr style='height:19.85pt'>
                    <td width=104 style='width:77.75pt;padding:0cm 5.4pt 0cm 5.4pt;height:19.85pt'>
                        <p class=MsoNormal align=right style='margin-bottom:0cm;margin-bottom:.0001pt;
                           text-align:right;line-height:normal'><span style='font-family:"Arial Rounded MT Bold",sans-serif'>Booking
                                No:</span></p>
                    </td>
                    <td width=497 style='width:373.05pt;padding:0cm 5.4pt 0cm 5.4pt;height:19.85pt'>
                        <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
                           normal'><span style='font-family:"Arial Rounded MT Bold",sans-serif'>&nbsp;<?= $bookNo ?></span></p>
                    </td>
                </tr>
                <tr style='height:19.85pt'>
                    <td width=104 style='width:77.75pt;padding:0cm 5.4pt 0cm 5.4pt;height:19.85pt'>
                        <p class=MsoNormal align=right style='margin-bottom:0cm;margin-bottom:.0001pt;
                           text-align:right;line-height:normal'><span style='font-family:"Arial Rounded MT Bold",sans-serif'>Customer:</span></p>
                    </td>
                    <td width=497 style='width:373.05pt;padding:0cm 5.4pt 0cm 5.4pt;height:19.85pt'>
                        <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
                           normal'><span style='font-family:"Arial Rounded MT Bold",sans-serif'>&nbsp;(<?= $row['customer_id'] ?>) <?= $row['customer_name'] ?></span></p>
                    </td>
                </tr>
                <tr style='height:19.85pt'>
                    <td width=104 style='width:77.75pt;padding:0cm 5.4pt 0cm 5.4pt;height:19.85pt'>
                        <p class=MsoNormal align=right style='margin-bottom:0cm;margin-bottom:.0001pt;
                           text-align:right;line-height:normal'><span style='font-family:"Arial Rounded MT Bold",sans-serif'>Worker:</span></p>
                    </td>
                    <td width=497 style='width:373.05pt;padding:0cm 5.4pt 0cm 5.4pt;height:19.85pt'>
                        <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
                           normal'><span style='font-family:"Arial Rounded MT Bold",sans-serif'>&nbsp;(<?= $row['worker_id'] ?>) <?= $row['worker_name'] ?></span></p>
                    </td>
                </tr>
                <tr style='height:19.85pt'>
                    <td width=104 style='width:77.75pt;padding:0cm 5.4pt 0cm 5.4pt;height:19.85pt'>
                        <p class=MsoNormal align=right style='margin-bottom:0cm;margin-bottom:.0001pt;
                           text-align:right;line-height:normal'><span style='font-family:"Arial Rounded MT Bold",sans-serif'>Date:</span></p>
                    </td>
                    <td width=497 style='width:373.05pt;padding:0cm 5.4pt 0cm 5.4pt;height:19.85pt'>
                        <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
                           normal'><span style='font-family:"Arial Rounded MT Bold",sans-serif'>&nbsp;<?= $row['tarikh'] ?></span></p>
                    </td>
                </tr>
                <tr style='height:19.85pt'>
                    <td width=104 style='width:77.75pt;padding:0cm 5.4pt 0cm 5.4pt;height:19.85pt'>
                        <p class=MsoNormal align=right style='margin-bottom:0cm;margin-bottom:.0001pt;
                           text-align:right;line-height:normal'><span style='font-family:"Arial Rounded MT Bold",sans-serif'>Start:</span></p>
                    </td>
                    <td width=497 style='width:373.05pt;padding:0cm 5.4pt 0cm 5.4pt;height:19.85pt'>
                        <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
                           normal'><span style='font-family:"Arial Rounded MT Bold",sans-serif'>&nbsp;<?= $row['mula'] ?></span></p>
                    </td>
                </tr>
                <tr style='height:19.85pt'>
                    <td width=104 style='width:77.75pt;padding:0cm 5.4pt 0cm 5.4pt;height:19.85pt'>
                        <p class=MsoNormal align=right style='margin-bottom:0cm;margin-bottom:.0001pt;
                           text-align:right;line-height:normal'><span style='font-family:"Arial Rounded MT Bold",sans-serif'>End:</span></p>
                    </td>
                    <td width=497 style='width:373.05pt;padding:0cm 5.4pt 0cm 5.4pt;height:19.85pt'>
                        <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
                           normal'><span style='font-family:"Arial Rounded MT Bold",sans-serif'>&nbsp;<?= $row['tamat'] ?></span></p>
                    </td>
                </tr>
                <tr style='height:19.85pt'>
                    <td width=104 style='width:77.75pt;padding:0cm 5.4pt 0cm 5.4pt;height:19.85pt'>
                        <p class=MsoNormal align=right style='margin-bottom:0cm;margin-bottom:.0001pt;
                           text-align:right;line-height:normal'><span style='font-family:"Arial Rounded MT Bold",sans-serif'>Duration:</span></p>
                    </td>
                    <td width=497 style='width:373.05pt;padding:0cm 5.4pt 0cm 5.4pt;height:19.85pt'>
                        <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
                           normal'><span style='font-family:"Arial Rounded MT Bold",sans-serif'>&nbsp;<?= $row['duration'] ?> hour</span></p>
                    </td>
                </tr>
                <tr style='height:19.85pt'>
                    <td width=104 style='width:77.75pt;padding:0cm 5.4pt 0cm 5.4pt;height:19.85pt'>
                        <p class=MsoNormal align=right style='margin-bottom:0cm;margin-bottom:.0001pt;
                           text-align:right;line-height:normal'><span style='font-family:"Arial Rounded MT Bold",sans-serif'>Price:</span></p>
                    </td>
                    <td width=497 style='width:373.05pt;padding:0cm 5.4pt 0cm 5.4pt;height:19.85pt'>
                        <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
                           normal'><span style='font-family:"Arial Rounded MT Bold",sans-serif'>&nbsp;RM <?= $row['price'] ?></span></p>
                    </td>
                </tr>
            </table>

            <p class=MsoNormal>&nbsp;</p>

            <p class=MsoNormal align=center style='text-align:center'>Thank you for
                acquiring our service.</p>

        </div>

        <script>
            window.focus();
            window.print();
            window.close();
        </script>
    </body>

</html>


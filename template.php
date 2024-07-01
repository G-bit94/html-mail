<?php

$mail->Body = "<!DOCTYPE html>

                    <html lang='en' xmlns:o='urn:schemas-microsoft-com:office:office' xmlns:v='urn:schemas-microsoft-com:vml'>
                    <head>
                    <meta charset='UTF-8'>
                    <title>$mail->Subject</title>
                    <meta content='text/html; charset=utf-8' http-equiv='Content-Type'/>
                    <meta content='width=device-width, initial-scale=1.0' name='viewport'/>
                    <!--[if mso]><xml><o:OfficeDocumentSettings><o:PixelsPerInch>96</o:PixelsPerInch><o:AllowPNG/></o:OfficeDocumentSettings></xml><![endif]-->
                    <style>
                            * {
                                box-sizing: border-box;
                            }
                    
                            body {
                                margin: 0;
                                padding: 0;
                            }
                    
                            a[x-apple-data-detectors] {
                                color: inherit !important;
                                text-decoration: inherit !important;
                            }
                    
                            #MessageViewBody a {
                                color: inherit;
                                text-decoration: none;
                            }
                    
                            p {
                                line-height: inherit
                            }
                    
                            .desktop_hide,
                            .desktop_hide table {
                                mso-hide: all;
                                display: none;
                                max-height: 0px;
                                overflow: hidden;
                            }
                    
                            @media (max-width:620px) {
                    
                                .desktop_hide table.icons-inner,
                                .social_block.desktop_hide .social-table {
                                    display: inline-block !important;
                                }
                    
                                .icons-inner {
                                    text-align: center;
                                }
                    
                                .icons-inner td {
                                    margin: 0 auto;
                                }
                    
                                .row-content {
                                    width: 100% !important;
                                }
                    
                                .mobile_hide {
                                    display: none;
                                }
                    
                                .stack .column {
                                    width: 100%;
                                    display: block;
                                }
                    
                                .mobile_hide {
                                    min-height: 0;
                                    max-height: 0;
                                    max-width: 0;
                                    overflow: hidden;
                                    font-size: 0px;
                                }
                    
                                .desktop_hide,
                                .desktop_hide table {
                                    display: table !important;
                                    max-height: none !important;
                                }
                            }
                        </style>
                    </head>
                    <body style='margin: 0; padding-left: 25px; padding-right: 50px; -webkit-text-size-adjust: none; text-size-adjust: none; padding-top: 20px;'>
                    <div style='background-color: $backgroundColor; padding: 6px; border-radius: 15px;'>
                        <table border='0' cellpadding='0' cellspacing='0' class='nl-container' role='presentation' style='mso-table-lspace: 0pt; mso-table-rspace: 0pt; background-color: $backgroundColor; margin-top: 20px;' width='100%'>
                        <tbody>
                        <tr>
                        <td>
                        <table align='center' border='0' cellpadding='0' cellspacing='0' class='row row-1' role='presentation' style='mso-table-lspace: 0pt; mso-table-rspace: 0pt; background-color: $backgroundColor; background-position: center top; background-repeat: repeat;' width='100%'>
                        <tbody>
                        <tr>
                        <td>
                        <table align='center' border='0' cellpadding='0' cellspacing='0' class='row-content stack' role='presentation' style='mso-table-lspace: 0pt; mso-table-rspace: 0pt; color: #000000; width: 600px;' width='600'>
                        <tbody>
                        <tr>
                        <td class='column column-1' style='mso-table-lspace: 0pt; mso-table-rspace: 0pt; font-weight: 400; text-align: left; padding-left: 10px; padding-right: 10px; vertical-align: top; padding-top: 5px; padding-bottom: 15px; border-top: 0px; border-right: 0px; border-bottom: 0px; border-left: 0px;' width='100%'>
                        <table border='0' cellpadding='0' cellspacing='0' class='image_block block-2' role='presentation' style='mso-table-lspace: 0pt; mso-table-rspace: 0pt;' width='100%'>
                        <tr>
                        <td class='pad' style='width:100%;padding-right:0px;padding-left:0px;padding-top:8px;'>
                        <div align='center' class='alignment' style='line-height:10px'></div>
                        </td>
                        </tr>
                        </table>
                        <table border='0' cellpadding='0' cellspacing='0' class='text_block block-3' role='presentation' style='mso-table-lspace: 0pt; mso-table-rspace: 0pt; word-break: break-word;' width='100%'>
                        <tr>
                        <td class='pad' style='padding-bottom:15px;padding-top:10px;'>
                        <div style='font-family: sans-serif'>
                        <div class='' style='font-size: 14px; mso-line-height-alt: 16.8px; color: #ffffff; line-height: 1.2; font-family: Varela Round, Trebuchet MS, Helvetica, sans-serif;'>
                        $heading
                        </div>
                        </div>
                        </td>
                        </tr>
                        </table>
                        <table border='0' cellpadding='5' cellspacing='0' class='text_block block-4' role='presentation' style='mso-table-lspace: 0pt; mso-table-rspace: 0pt; word-break: break-word;' width='100%'>
                        <tr>
                        <td class='pad'>
                        <div style='font-family: sans-serif'>
                        <div class='pad' style='font-size: 16px; mso-line-height-alt: 21px; color: #ffffff; line-height: 1.5; font-family: Varela Round, Trebuchet MS, Helvetica, sans-serif;'>                
                        $introLine
                        $emailBody
                        </div>
                        </div>
                        </td>
                        </tr>
                        </table>
                        $replyButtonHTML
                        <table border='0' cellpadding='0' cellspacing='0' class='divider_block block-6' role='presentation' style='mso-table-lspace: 0pt; mso-table-rspace: 0pt;' width='100%'>
                        <tr>
                        <td class='pad' style='padding-bottom:15px;padding-left:10px;padding-right:10px;padding-top:10px;'>
                        </td>
                        </tr>
                        </table>
                        <table border='0' cellpadding='0' cellspacing='0' class='text_block block-7' role='presentation' style='mso-table-lspace: 0pt; mso-table-rspace: 0pt; word-break: break-word;' width='100%'>
                        <tr>
                        <td class='pad' style='padding-bottom:40px;padding-left:25px;padding-right:25px;padding-top:10px;'>
                        <div style='font-family: sans-serif'>
                        <div class='' style='font-size: 14px; mso-line-height-alt: 21px; color: #ffffff; line-height: 1.5; font-family: Varela Round, Trebuchet MS, Helvetica, sans-serif;'>
                        $outroLine
                        </div>
                        </div>
                        </td>
                        </tr>
                        </table>
                        </td>
                        </tr>
                        </tbody>
                        </table>
                        </td>
                        </tr>
                        </tbody>
                        </table>
                        <table align='center' border='0' cellpadding='0' cellspacing='0' class='row row-2' role='presentation' style='mso-table-lspace: 0pt; mso-table-rspace: 0pt;' width='100%'>
                        <tbody>
                        <tr>
                        <td>
                        <table align='center' border='0' cellpadding='0' cellspacing='0' class='row-content stack' role='presentation' style='mso-table-lspace: 0pt; mso-table-rspace: 0pt; color: #000000; width: 600px;' width='600'>
                        <tbody>
                        <tr>
                        <td class='column column-1' style='mso-table-lspace: 0pt; mso-table-rspace: 0pt; font-weight: 400; text-align: left; padding-left: 10px; padding-right: 10px; vertical-align: top; padding-top: 15px; padding-bottom: 15px; border-top: 0px; border-right: 0px; border-bottom: 0px; border-left: 0px;' width='100%'>
                        <table border='0' cellpadding='5' cellspacing='0' class='image_block block-1' role='presentation' style='mso-table-lspace: 0pt; mso-table-rspace: 0pt;' width='100%'>
                        <tr>
                        <td class='pad'>                    
                        </td>
                        </tr>
                        </table>
                        <table border='0' cellpadding='0' cellspacing='0' class='divider_block block-2' role='presentation' style='mso-table-lspace: 0pt; mso-table-rspace: 0pt;' width='100%'>
                        <tr>
                        <td class='pad' style='padding-bottom:15px;padding-left:10px;padding-right:10px;padding-top:15px;'>
                        <div align='center' class='alignment'>
                        <table border='0' cellpadding='0' cellspacing='0' role='presentation' style='mso-table-lspace: 0pt; mso-table-rspace: 0pt;' width='60%'>
                        <tr>
                        <td class='divider_inner' style='font-size: 1px; line-height: 1px; border-top: 1px solid #e8edf2;'><span></span></td>
                        </tr>
                        </table>
                        </div>
                        </td>
                        </tr>
                        <table border='0' cellpadding='15' cellspacing='0' class='text_block block-4' role='presentation' style='mso-table-lspace: 0pt; mso-table-rspace: 0pt; word-break: break-word;' width='100%'>
                        <tr>
                        <td class='pad'>
                        <div style='font-family: sans-serif'>
                        <div class='' style='font-size: 12px; font-family: Varela Round, Trebuchet MS, Helvetica, sans-serif; mso-line-height-alt: 14.399999999999999px; color: #ffffff; line-height: 1.2;'>
                        $footerText<br/><br/></span></p>                    
                        </div>
                        </div>
                        </td>
                        </tr>
                        </table>
                        <table border='0' cellpadding='0' cellspacing='0' class='html_block block-5' role='presentation' style='mso-table-lspace: 0pt; mso-table-rspace: 0pt;' width='100%'>
                        <tr>
                        <td class='pad'>
                        <div align='center' style='font-family:Varela Round, Trebuchet MS, Helvetica, sans-serif;text-align:center;'><div style='height-top: 20px;'></div></div>
                        </td>
                        </tr>
                        </table>
                        </td>
                        </tr>
                        </tbody>
                        </table>
                        </td>
                        </tr>
                        </tbody>
                        </table>
                        <table align='center' border='0' cellpadding='0' cellspacing='0' class='row row-3' role='presentation' style='mso-table-lspace: 0pt; mso-table-rspace: 0pt;' width='100%'>
                        <tbody>
                        <tr>
                        <td>
                        <table align='center' border='0' cellpadding='0' cellspacing='0' class='row-content stack' role='presentation' style='mso-table-lspace: 0pt; mso-table-rspace: 0pt; color: #000000; width: 600px;' width='600'>
                        <tbody>
                        <tr>
                        <td class='column column-1' style='mso-table-lspace: 0pt; mso-table-rspace: 0pt; font-weight: 400; text-align: left; vertical-align: top; padding-top: 5px; padding-bottom: 5px; border-top: 0px; border-right: 0px; border-bottom: 0px; border-left: 0px;' width='100%'>
                        <table border='0' cellpadding='0' cellspacing='0' class='icons_block block-1' role='presentation' style='mso-table-lspace: 0pt; mso-table-rspace: 0pt;' width='100%'>
                        <tr>
                        <td class='pad' style='vertical-align: middle; color: #9d9d9d; font-family: inherit; font-size: 15px; padding-bottom: 5px; padding-top: 5px; text-align: center;'>
                        <table cellpadding='0' cellspacing='0' role='presentation' style='mso-table-lspace: 0pt; mso-table-rspace: 0pt;' width='100%'>
                        <tr>
                        <td class='alignment' style='vertical-align: middle; text-align: center;'>
                        </td>
                        </tr>
                        </table>
                        </td>
                        </tr>
                        </table>
                        </td>
                        </tr>
                        </tbody>
                        </table>
                        </td>
                        </tr>
                        </tbody>
                        </table>
                        </td>
                        </tr>
                        </tbody>
                        </table><!-- End -->
                        </div>
                    </body> 
                </html>";


?>
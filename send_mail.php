<?php

date_default_timezone_set('Africa/Nairobi');

//Import PHPMailer classes
use PHPMailer\PHPMailer\PHPMailer;

require_once 'vendor/autoload.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    /*******************Form processing*****************/

    $_POST = json_decode(file_get_contents('php://input'), true);

    // Initialize variables using null coalescing operator
    $mailHost = $_POST['mailHost'] ?? null;
    $port = $_POST['port'] ?? null;
    $smtpUsername = $_POST['smtpUsername'] ?? null;
    $smtpPassword = $_POST['smtpPassword'] ?? null;
    $emailFrom = $_POST['emailFrom'] ?? null;
    $emailFromName = $_POST['emailFromName'] ?? null;
    $recipient = $_POST['recipient'] ?? null;
    $subject = $_POST['subject'] ?? null;
    $backgroundColor = $_POST['backgroundColor'] ?? null;
    $heading = $_POST['heading'] ?? null;
    $introLine = $_POST['introLine'] ?? null;
    $emailBody = $_POST['emailBody'] ?? null;
    $outroLine = $_POST['outroLine'] ?? null;
    $footerText = $_POST['footerText'] ?? null;
    $showReplyButton = isset($_POST['showReplyButton']) ? true : false;
    $allowReplyToCurrentSubject = isset($_POST['allowReplyToCurrentSubject']) ? true : false;
    $alternativeSubject = $_POST['alternativeSubject'] ?? null;

    // Check for required fields
    $required_fields = ['mailHost', 'port', 'smtpUsername', 'smtpPassword', 'emailFrom', 'emailFromName', 'recipient', 'subject', 'emailBody'];
    $missing_fields = [];

    foreach ($required_fields as $field) {
        if (empty($$field)) {
            $missing_fields[] = $field;
        }

        // $dump_fields[] = $$field;
    }

    // echo json_encode(['field_values' => $dump_fields]);

    // If there are missing required fields, send a JSON response
    if (!empty($missing_fields)) {
        echo json_encode(['required_inputs' => $missing_fields]);
        exit;
    }

    /*******************Sending Email*****************/
    // Prepare email body
    $mail = new PHPMailer(true); /* passing `true` enables exceptions */

    $mail->isSMTP();

    //Set the hostname of the mail server
    $mail->Host = $mailHost;

    //Set the SMTP port number - 587 for authenticated TLS
    //ensure $port is an integer
    $port = (int) $port ?? 587;

    //Set the encryption system to use - ssl (deprecated) or tls
    $mail->SMTPSecure = 'tls';

    //Whether to use SMTP authentication
    $mail->SMTPAuth = true;

    //Username to use for SMTP authentication
    $mail->Username = $smtpUsername;

    //Password to use for SMTP authentication
    $mail->Password = $smtpPassword;

    //Set who the message is to be sent from
    $mail->setFrom($emailFrom, $emailFromName);

    //Set who the message is to be sent to
    $mail->addAddress($recipient);

    $mail->Subject = $subject;
    $mail->isHTML(true);

    $replyButtonHTML = $replyURL = '';

    if ($showReplyButton) {

        if ($allowReplyToCurrentSubject) {
            // Encode the subject to make it URL-safe
            $encodedSubject = urlencode($mail->Subject);
            $replyURL = 'mailto:' . $emailFrom . '?subject=' . $encodedSubject;
        } else {
            $encodedSubject = urlencode($alternativeSubject);
            $replyURL = 'mailto:' . $emailFrom . '?subject=' . $encodedSubject;
        }

        $replyButtonHTML = "<table border='0' cellpadding='0' cellspacing='0' class='button_block block-5' role='presentation' style='mso-table-lspace: 0pt; mso-table-rspace: 0pt;' width='100%'>
                        <tr>
                        <td class='pad' style='padding-bottom:20px;padding-left:15px;padding-right:15px;padding-top:20px;text-align:center;'>
                        <div align='center' class='alignment'>
                        <!--[if mso]><v:roundrect xmlns:v='urn:schemas-microsoft-com:vml' xmlns:w='urn:schemas-microsoft-com:office:word' href=\"$replyURL\" style='height:40px;width:202px;v-text-anchor:middle;' arcsize='60%' stroke='false' fillcolor='#ffffff'><w:anchorlock/><v:textbox inset='0px,0px,0px,0px'><center style='color:$backgroundColor; font-family:sans-serif; font-size:15px'><![endif]-->
                        <a href=\"$replyURL\" style='text-decoration:none;display:inline-block;color:$backgroundColor;background-color:#ffffff;border-radius:24px;width:auto;border-top:0px solid transparent;font-weight:undefined;border-right:0px solid transparent;border-bottom:0px solid transparent;border-left:0px solid transparent;padding-top:5px;padding-bottom:5px;font-family:Varela Round, Trebuchet MS, Helvetica, sans-serif;text-align:center;mso-border-alt:none;word-break:keep-all;' target='_blank'>
                        <span style='padding-left:25px;padding-right:25px;font-size:15px;display:inline-block;letter-spacing:normal;'><span style='word-break: break-word;'><span data-mce-style='' style='line-height: 30px;'><strong>Reply</strong></span></span></span></a>
                        <!--[if mso]></center></v:textbox></v:roundrect><![endif]-->
                        </div>
                        </td>
                        </tr>
                        </table>";
    }




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
                        <!--[if vml]><table align='left' cellpadding='0' cellspacing='0' role='presentation' style='display:inline-block;padding-left:0px;padding-right:0px;mso-table-lspace: 0pt;mso-table-rspace: 0pt;'><![endif]-->
                        <!--[if !vml]><!-->
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
    echo ($mail->Body);

    // Send email                
    // if ($mail->send()) {
    //     $status = "SUCCESS";
    // } else {
    //     $status = "FAILED";
    // }

    /*******************/

    // echo json_encode($status);

}
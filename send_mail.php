<?php

date_default_timezone_set('Africa/Nairobi');

error_reporting(0);

// Import PHPMailer classes
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require_once 'vendor/autoload.php';

$response = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    /******************* Form processing *****************/

    $_POST = json_decode(file_get_contents('php://input'), true);

    // Initialize variables using null coalescing operator
    $mailHost = $_POST['mailHost'] ?? null;
    $port = (int) ($_POST['port'] ?? 587);
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
    $showReplyButton = isset($_POST['showReplyButton']);
    $allowReplyToCurrentSubject = isset($_POST['allowReplyToCurrentSubject']);
    $alternativeSubject = $_POST['alternativeSubject'] ?? null;

    // Check for required fields
    $required_fields = ['mailHost', 'port', 'smtpUsername', 'smtpPassword', 'emailFrom', 'emailFromName', 'recipient', 'subject', 'emailBody'];
    $missing_fields = [];

    foreach ($required_fields as $field) {
        if (empty($$field)) {
            $missing_fields[] = $field;
        }
    }

    // If there are missing required fields, send a JSON response
    if (!empty($missing_fields)) {
        echo json_encode(['status' => 'FAILED', 'required_inputs' => $missing_fields]);
        exit;
    }

    /******************* Prepare Email *****************/
    // Prepare reply button HTML if required
    $replyButtonHTML = '';
    if ($showReplyButton) {
        $encodedSubject = urlencode($allowReplyToCurrentSubject ? $subject : $alternativeSubject);
        $replyURL = 'mailto:' . $emailFrom . '?subject=' . $encodedSubject;
        $replyButtonHTML = "<table border='0' cellpadding='0' cellspacing='0' class='button_block block-5' role='presentation' style='mso-table-lspace: 0pt; mso-table-rspace: 0pt;' width='100%'>
                            <tr>
                            <td class='pad' style='padding-bottom:20px;padding-left:15px;padding-right:15px;padding-top:20px;text-align:center;'>
                            <div align='center' class='alignment'>
                            <a href=\"$replyURL\" style='text-decoration:none;display:inline-block;color:$backgroundColor;background-color:#ffffff;border-radius:24px;width:auto;border-top:0px solid transparent;font-weight:undefined;border-right:0px solid transparent;border-bottom:0px solid transparent;border-left:0px solid transparent;padding-top:5px;padding-bottom:5px;font-family:Varela Round, Trebuchet MS, Helvetica, sans-serif;text-align:center;mso-border-alt:none;word-break:keep-all;' target='_blank'>
                            <span style='padding-left:25px;padding-right:25px;font-size:15px;display:inline-block;letter-spacing:normal;'><span style='word-break: break-word;'><span data-mce-style='' style='line-height: 30px;'><strong>Reply</strong></span></span></span></a>
                            </div>
                            </td>
                            </tr>
                            </table>";
    }

    include "template.php";

    $mailHTML = $mail->Body;

    // Handle preview request
    if (isset($_POST["preview"]) && $_POST["preview"] == true) {
        $response["preview"] = $mailHTML;
    }

    // Handle submit request
    if (isset($_POST["submit"]) && $_POST["submit"] == true) {
        /******************* Sending Email *****************/
        $mail = new PHPMailer(true); // Passing `true` enables exceptions

        try {
            $mail->isSMTP();
            $mail->Host = $mailHost;
            $mail->Port = $port;
            $mail->SMTPSecure = 'tls';
            $mail->SMTPAuth = true;
            $mail->Username = $smtpUsername;
            $mail->Password = $smtpPassword;
            $mail->setFrom($emailFrom, $emailFromName);
            $mail->addAddress($recipient);
            $mail->Subject = $subject;
            $mail->isHTML(true);
            $mail->Body = $mailHTML;

            if ($mail->send()) {
                $response["status"] = "SUCCESS";
            } else {
                $response["status"] = "FAILED";
            }
        } catch (Exception $e) {
            $response["status"] = "FAILED";
            $response["error"] = $e->getMessage();
        }
    }

    echo json_encode($response);
}
?>
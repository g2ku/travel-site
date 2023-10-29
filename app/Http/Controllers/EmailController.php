<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class EmailController extends Controller
{
    public function sendEmail(Request $request)
    {

        $name = $request->input('name');
        $email = $request->input('email');
        $messageBody = $request->input('message');

        $mail = new PHPMailer(true);

        try {

            $mail->isSMTP();
            $mail->Host = 'smtp-mail.outlook.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'ravilyermukhan@outlook.com';
            $mail->Password = 'zhanboravok008A';
            $mail->SMTPSecure = 'tls';
            $mail->Port = 587;

            // Отправитель и получатель
            $mail->setFrom('ravilyermukhan@outlook.com', 'Your Name');
            $mail->addAddress('r.yermukhan@gmail.com', 'Recipient Name');

            // Тема письма и текст
            $mail->isHTML(true);
            $mail->Subject = 'IDoctor';
            $mail->Body = $messageBody;

            // Отправка письма
            $mail->send();

            return response()->json(['message' => 'Email sent successfully']);
        } catch (Exception $e) {
            return response()->json(['message' => 'Email could not be sent. Mailer Error: ' . $mail->ErrorInfo], 500);
        }
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FormsController extends Controller
{

    public function index(Request $request)
    {
        $name = $request->input('USER_NAME');
        $mail = $request->input('USER_MAIL');
        $message = $request->input('USER_MESSAGE');
        $response = mail(
            'podchasov.oleg@gmail.com',
//            'Сообщение с главной страницы блога',
//            "Пользователь с именем {$name} и почтой {$mail} оставил вам сообщение: {$message}"
        'askldfj',
            'aksdjf'
        );
        return view(
            'pages.form-send',
            [
                'page' => 'form',
                'title' => 'Спасибо за обратную связь!',
                'success' => $response
            ]
        );
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

/**
 * Class PdfController
 *
 * @package App\Http\Controllers
 */
class PdfController extends Controller
{
    public function users()
    {
        return 'todo';
    }

    public function user()
    {
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML('<h1>Hello World!</h1>');

        return $pdf->stream('user');
    }
}

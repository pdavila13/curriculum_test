<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use View;

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
        $view = View::make('pdf.user')->render();
        $pdf->loadHTML($view);

        return $pdf->stream('user');
    }

    public function users_view()
    {
        return view('pdf.user');
    }
}

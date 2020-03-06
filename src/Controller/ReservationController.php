<?php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;

class ReservationController
{
    public function submit()
    {
        return new Response(
            '<html><body>Reservation submitted. Congrats!</body></html>'
        );
    }
}
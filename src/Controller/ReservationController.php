<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Form\Type\ReservationType;
use App\Entity\Reservation;

class ReservationController extends AbstractController
{
    public function submit(\Swift_Mailer $mailer, Request $request)
    {
        $contact = new Reservation();

        $form = $this->createForm(ReservationType::class, $contact);
        $data = $request->request->all();
        $form->submit($data);

        if ($form->isSubmitted() && !$form->isValid()) {
            return new Response($form->getErrors(true, false), 400);
        }

        $email_form = (new \Swift_Message('Nauja rezervacija iš: ' . $data['name'] ))
            ->setFrom($_ENV['MAILER_FROM'])
            ->setTo($_ENV['MAILER_TO'])
            ->setBody(
                $this->renderView(
                // templates/emails/registration.html.twig
                    'emails/reservation.html.twig',
                    $data
                ),
                'text/html'
            )
            ->addPart(
                $this->renderView(
                // templates/emails/registration.txt.twig
                    'emails/reservation.txt.twig',
                    $data
                ),
                'text/plain'
            );

        $mailer->send($email_form);
        return new Response('Success', 200, [
            'Access-Control-Allow-Origin' => '*'
        ]);
    }
}
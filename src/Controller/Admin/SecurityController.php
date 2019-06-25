<?php

namespace App\Controller\Admin;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

/**
 * Class        SecurityController
 *
 * @since       1.0.0
 * @package     App\Controller\Admin
 * @author      Kristijan Soldo <soldokristijan@yahoo.com>
 */
class SecurityController extends AbstractController
{
    /**
     * Admin login.
     *
     * @Route("/login", name="admin_login")
     *
     * @param AuthenticationUtils $authenticationUtils
     *
     * @return Response
     */
    public function login(AuthenticationUtils $authenticationUtils): Response
    {
        // Get the login error if there is one
        $error = $authenticationUtils->getLastAuthenticationError();

        // Last username entered by the user
        $lastUsername = $authenticationUtils->getLastUsername();

        // Render template
        return $this->render('admin/login.html.twig', ['last_username' => $lastUsername, 'error' => $error]);
    }

    /**
     * Admin logging out.
     *
     * @Route("/logout", name="admin_logout", methods={"GET"})
     */
    public function logout()
    {
    }
}

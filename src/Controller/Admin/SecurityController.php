<?php

namespace App\Controller\Admin;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
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
     * @var AuthenticationUtils
     */
    private $authenticationUtils;

    /**
     * @var UrlGeneratorInterface
     */
    private $urlGenerator;

    /**
     * SecurityController constructor.
     *
     * @param AuthenticationUtils $authenticationUtils
     * @param UrlGeneratorInterface $urlGenerator
     */
    public function __construct(AuthenticationUtils $authenticationUtils, UrlGeneratorInterface $urlGenerator)
    {
        $this->authenticationUtils = $authenticationUtils;
        $this->urlGenerator = $urlGenerator;
    }

    /**
     * Admin login.
     *
     * @Route("/login", name="admin_login")
     *
     * @return Response
     */
    public function login(): Response
    {
        // Get the login error if there is one
        $error = $this->authenticationUtils->getLastAuthenticationError();

        // Last username entered by the user
        $lastUsername = $this->authenticationUtils->getLastUsername();

        // If is logged in
        if($this->isGranted('IS_AUTHENTICATED_FULLY')){
            // Redirect to dashboard
            return new RedirectResponse($this->urlGenerator->generate('admin_dashboard'));
        }

        // Render template
        return $this->render('admin/views/login.html.twig', ['last_username' => $lastUsername, 'error' => $error]);
    }

    /**
     * Admin logging out.
     *
     * @Route("/logout", name="admin_logout", methods={"GET"})
     */
    public function logout()
    {
        // This route will be redirect user to login page
    }
}

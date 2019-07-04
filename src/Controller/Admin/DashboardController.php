<?php

namespace App\Controller\Admin;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

/**
 * Class        DashboardController
 *
 * @since       1.0.0
 * @package     App\Controller\Admin
 * @author      Kristijan Soldo <soldokristijan@yahoo.com>
 */
class DashboardController extends AbstractController
{
    /**
     * Renders dashboard.
     *
     * @Route("/", name="admin_dashboard")
     *
     * @return Response
     */
    public function renderDashboard(): Response
    {
        // Render template
        return $this->render('admin/views/dashboard/dashboard.html.twig',[]);
    }
}

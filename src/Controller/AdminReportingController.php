<?php

namespace gr_reporting\Controller;

use PrestaShop\PrestaShop\Adapter\Entity\ModuleAdminController;
use Symfony\Component\HttpFoundation\Response;


class AdminReporting extends ModuleAdminController
{
    /**
     * @Route('/error', name='error_list')
     */
    public function getContent(): Response
    {
        return $this->render('error/index.html.twig', [
        ]);
    }

}
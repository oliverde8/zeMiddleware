<?php

namespace App\Controller\Admin;

use App\Entity\User;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use oliverde8\ComfyBundle\Model\ConfigInterface;
use oliverde8\ComfyEasyAdminBundle\Services\MenuConfigurator;
use Oliverde8\PhpEtlBundle\Entity\EtlExecution;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractDashboardController
{
    protected $menuConfigurator;

    /**
     * DashboardController constructor.
     *
     * @param ConfigInterface $testConfig
     */
    public function __construct(MenuConfigurator $menuConfigurator)
    {
        $this->menuConfigurator = $menuConfigurator;
    }

    /**
     * @Route("/admin", name="admin")
     */
    public function index(): Response
    {
        return parent::index();
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Html')
            ->renderContentMaximized();
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linktoDashboard('Dashboard', 'fa fa-home');

        yield MenuItem::section('Jobs', 'fas fa-cogs');
        yield MenuItem::linkToCrud('Job Executions', 'fas fa-list', EtlExecution::class);

        yield MenuItem::section('System', 'fas fa-toolbox');
        yield MenuItem::linkToCrud('Admins', 'fas fa-users', User::class);
        yield $this->menuConfigurator->getMenuItem();
    }
}

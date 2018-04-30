<?php
namespace App\Controllers;

use Interop\Container\ContainerInterface;

class Controller {
    protected $container;
    protected $view;
    protected $session;

    public function __construct(ContainerInterface $container) {
        $this->container = $container;
        $this->view      = $this->container->get('view');
        $this->session   = $this->container->get('session');
    }
}
<?php

/* /admin/users.html */
class __TwigTemplate_e48aa2893d954e1d74d1de17dde1c9002ff91e0718fe9d0fa85cf6a5796b5986 extends Twig_Template
{
    private $source;

    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "Hello Users";
    }

    public function getTemplateName()
    {
        return "/admin/users.html";
    }

    public function getDebugInfo()
    {
        return array (  23 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "/admin/users.html", "/var/www/html/uib/templates/admin/users.html");
    }
}

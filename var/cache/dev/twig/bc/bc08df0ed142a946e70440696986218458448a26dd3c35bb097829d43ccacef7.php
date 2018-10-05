<?php

/* @WebProfiler/Collector/router.html.twig */
class __TwigTemplate_3c64606e9c8c0ce43019012352af934edc105f5e609865527446d9a5469af85c extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("@WebProfiler/Profiler/layout.html.twig", "@WebProfiler/Collector/router.html.twig", 1);
        $this->blocks = array(
            'toolbar' => array($this, 'block_toolbar'),
            'menu' => array($this, 'block_menu'),
            'panel' => array($this, 'block_panel'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "@WebProfiler/Profiler/layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_096992fd993020329142f141bf1642f5cda898186f01ba82d24ac13ebbb27713 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_096992fd993020329142f141bf1642f5cda898186f01ba82d24ac13ebbb27713->enter($__internal_096992fd993020329142f141bf1642f5cda898186f01ba82d24ac13ebbb27713_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@WebProfiler/Collector/router.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_096992fd993020329142f141bf1642f5cda898186f01ba82d24ac13ebbb27713->leave($__internal_096992fd993020329142f141bf1642f5cda898186f01ba82d24ac13ebbb27713_prof);

    }

    // line 3
    public function block_toolbar($context, array $blocks = array())
    {
        $__internal_8c76f136175de472fa0c7d2c40c780cf46cbbed78973a474f1ad2d58005c7eaf = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_8c76f136175de472fa0c7d2c40c780cf46cbbed78973a474f1ad2d58005c7eaf->enter($__internal_8c76f136175de472fa0c7d2c40c780cf46cbbed78973a474f1ad2d58005c7eaf_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "toolbar"));

        
        $__internal_8c76f136175de472fa0c7d2c40c780cf46cbbed78973a474f1ad2d58005c7eaf->leave($__internal_8c76f136175de472fa0c7d2c40c780cf46cbbed78973a474f1ad2d58005c7eaf_prof);

    }

    // line 5
    public function block_menu($context, array $blocks = array())
    {
        $__internal_e55ce16a40f350d0c70dc33ff459f66637a0e461e7ae94b9d344720e68a8aee8 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_e55ce16a40f350d0c70dc33ff459f66637a0e461e7ae94b9d344720e68a8aee8->enter($__internal_e55ce16a40f350d0c70dc33ff459f66637a0e461e7ae94b9d344720e68a8aee8_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "menu"));

        // line 6
        echo "<span class=\"label\">
    <span class=\"icon\">";
        // line 7
        echo twig_include($this->env, $context, "@WebProfiler/Icon/router.svg");
        echo "</span>
    <strong>Routing</strong>
</span>
";
        
        $__internal_e55ce16a40f350d0c70dc33ff459f66637a0e461e7ae94b9d344720e68a8aee8->leave($__internal_e55ce16a40f350d0c70dc33ff459f66637a0e461e7ae94b9d344720e68a8aee8_prof);

    }

    // line 12
    public function block_panel($context, array $blocks = array())
    {
        $__internal_5d8a0a119805c65781dc2bf8f9d700a5b1ce6dbc339a7f89b2a41a2c11223e90 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_5d8a0a119805c65781dc2bf8f9d700a5b1ce6dbc339a7f89b2a41a2c11223e90->enter($__internal_5d8a0a119805c65781dc2bf8f9d700a5b1ce6dbc339a7f89b2a41a2c11223e90_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "panel"));

        // line 13
        echo "    ";
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\HttpKernelExtension')->renderFragment($this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("_profiler_router", array("token" => ($context["token"] ?? $this->getContext($context, "token")))));
        echo "
";
        
        $__internal_5d8a0a119805c65781dc2bf8f9d700a5b1ce6dbc339a7f89b2a41a2c11223e90->leave($__internal_5d8a0a119805c65781dc2bf8f9d700a5b1ce6dbc339a7f89b2a41a2c11223e90_prof);

    }

    public function getTemplateName()
    {
        return "@WebProfiler/Collector/router.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  73 => 13,  67 => 12,  56 => 7,  53 => 6,  47 => 5,  36 => 3,  11 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("{% extends '@WebProfiler/Profiler/layout.html.twig' %}

{% block toolbar %}{% endblock %}

{% block menu %}
<span class=\"label\">
    <span class=\"icon\">{{ include('@WebProfiler/Icon/router.svg') }}</span>
    <strong>Routing</strong>
</span>
{% endblock %}

{% block panel %}
    {{ render(path('_profiler_router', { token: token })) }}
{% endblock %}
", "@WebProfiler/Collector/router.html.twig", "/Users/yiming/popynov/vendor/symfony/symfony/src/Symfony/Bundle/WebProfilerBundle/Resources/views/Collector/router.html.twig");
    }
}

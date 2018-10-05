<?php

/* base.html.twig */
class __TwigTemplate_9ca5459e2be581bd1b96a3fdbc5d380067081c4a32ca3c36e80f185d57781e13 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'stylesheets' => array($this, 'block_stylesheets'),
            'body' => array($this, 'block_body'),
            'javascripts' => array($this, 'block_javascripts'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_8f804ffe87bd5e342fd096bc79d6b56aa7cebdda2effae9229b94bcbd8a58951 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_8f804ffe87bd5e342fd096bc79d6b56aa7cebdda2effae9229b94bcbd8a58951->enter($__internal_8f804ffe87bd5e342fd096bc79d6b56aa7cebdda2effae9229b94bcbd8a58951_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "base.html.twig"));

        // line 1
        echo "<!DOCTYPE html>
<html>
    <head>
        <meta charset=\"UTF-8\" />
        <title>";
        // line 5
        $this->displayBlock('title', $context, $blocks);
        echo "</title>
        ";
        // line 6
        $this->displayBlock('stylesheets', $context, $blocks);
        // line 7
        echo "        <link rel=\"icon\" type=\"image/x-icon\" href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("favicon.ico"), "html", null, true);
        echo "\" />
    </head>
    <body>
        ";
        // line 10
        $this->displayBlock('body', $context, $blocks);
        // line 11
        echo "        ";
        $this->displayBlock('javascripts', $context, $blocks);
        // line 12
        echo "    </body>
</html>
";
        
        $__internal_8f804ffe87bd5e342fd096bc79d6b56aa7cebdda2effae9229b94bcbd8a58951->leave($__internal_8f804ffe87bd5e342fd096bc79d6b56aa7cebdda2effae9229b94bcbd8a58951_prof);

    }

    // line 5
    public function block_title($context, array $blocks = array())
    {
        $__internal_145fac4487b2135694239adb26253fa7f16e7918da56e543e1d9a19e8f6a9e76 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_145fac4487b2135694239adb26253fa7f16e7918da56e543e1d9a19e8f6a9e76->enter($__internal_145fac4487b2135694239adb26253fa7f16e7918da56e543e1d9a19e8f6a9e76_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "title"));

        echo "Welcome!";
        
        $__internal_145fac4487b2135694239adb26253fa7f16e7918da56e543e1d9a19e8f6a9e76->leave($__internal_145fac4487b2135694239adb26253fa7f16e7918da56e543e1d9a19e8f6a9e76_prof);

    }

    // line 6
    public function block_stylesheets($context, array $blocks = array())
    {
        $__internal_f88d3b963a91aab8aed939bdee5733b6253820f889031ffd63c4900ee899e7a2 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_f88d3b963a91aab8aed939bdee5733b6253820f889031ffd63c4900ee899e7a2->enter($__internal_f88d3b963a91aab8aed939bdee5733b6253820f889031ffd63c4900ee899e7a2_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "stylesheets"));

        
        $__internal_f88d3b963a91aab8aed939bdee5733b6253820f889031ffd63c4900ee899e7a2->leave($__internal_f88d3b963a91aab8aed939bdee5733b6253820f889031ffd63c4900ee899e7a2_prof);

    }

    // line 10
    public function block_body($context, array $blocks = array())
    {
        $__internal_bf87f7a87cf1ead6b1c79f150d694a5a20dd942b0c814df56e8eb3c7f96f3ff5 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_bf87f7a87cf1ead6b1c79f150d694a5a20dd942b0c814df56e8eb3c7f96f3ff5->enter($__internal_bf87f7a87cf1ead6b1c79f150d694a5a20dd942b0c814df56e8eb3c7f96f3ff5_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "body"));

        
        $__internal_bf87f7a87cf1ead6b1c79f150d694a5a20dd942b0c814df56e8eb3c7f96f3ff5->leave($__internal_bf87f7a87cf1ead6b1c79f150d694a5a20dd942b0c814df56e8eb3c7f96f3ff5_prof);

    }

    // line 11
    public function block_javascripts($context, array $blocks = array())
    {
        $__internal_017bd003e41728035cdc8ced7acbae4c4bc9db627ff4273797a6fedc6f318717 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_017bd003e41728035cdc8ced7acbae4c4bc9db627ff4273797a6fedc6f318717->enter($__internal_017bd003e41728035cdc8ced7acbae4c4bc9db627ff4273797a6fedc6f318717_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "javascripts"));

        
        $__internal_017bd003e41728035cdc8ced7acbae4c4bc9db627ff4273797a6fedc6f318717->leave($__internal_017bd003e41728035cdc8ced7acbae4c4bc9db627ff4273797a6fedc6f318717_prof);

    }

    public function getTemplateName()
    {
        return "base.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  93 => 11,  82 => 10,  71 => 6,  59 => 5,  50 => 12,  47 => 11,  45 => 10,  38 => 7,  36 => 6,  32 => 5,  26 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("<!DOCTYPE html>
<html>
    <head>
        <meta charset=\"UTF-8\" />
        <title>{% block title %}Welcome!{% endblock %}</title>
        {% block stylesheets %}{% endblock %}
        <link rel=\"icon\" type=\"image/x-icon\" href=\"{{ asset('favicon.ico') }}\" />
    </head>
    <body>
        {% block body %}{% endblock %}
        {% block javascripts %}{% endblock %}
    </body>
</html>
", "base.html.twig", "/Users/yiming/popynov/app/Resources/views/base.html.twig");
    }
}

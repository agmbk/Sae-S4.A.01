<?php

use Twig\Environment;
use Twig\Profiler\Profile;
use Twig\Source;
use Twig\Template;

/* matches/edit.html.twig */

class __TwigTemplate_6080f9b81f9d6bb26d44dd1a3c9a8138 extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->blocks = [
            'title' => [$this, 'block_title'],
            'body' => [$this, 'block_body'],
        ];
    }

    public function getSourceContext()
    {
        return new Source("{% extends 'base.html.twig' %}

{% block title %}Edit Matches{% endblock %}

{% block body %}
    <h1>Edit Matches</h1>

    {{ include('matches/_form.html.twig', {'button_label': 'Update'}) }}

    <a href=\"{{ path('app_matches_index') }}\">back to list</a>

    {{ include('matches/_delete_form.html.twig') }}
{% endblock %}
", "matches/edit.html.twig", "C:\\Users\\tomon\\PhpstormProjects\\Sae-S4.A.01\\Sae_old\\templates\\matches\\edit.html.twig");
    }

    public function block_title($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new Profile($this->getTemplateName(), "block", "title"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new Profile($this->getTemplateName(), "block", "title"));

        echo "Edit Matches";

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);


        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

    }

    // line 3

    public function getTemplateName()
    {
        return "matches/edit.html.twig";
    }

    // line 5

    public function block_body($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new Profile($this->getTemplateName(), "block", "body"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new Profile($this->getTemplateName(), "block", "body"));

        // line 6
        echo "    <h1>Edit Matches</h1>

    ";
        // line 8
        echo twig_include($this->env, $context, "matches/_form.html.twig", ["button_label" => "Update"]);
        echo "

    <a href=\"";
        // line 10
        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_matches_index");
        echo "\">back to list</a>

    ";
        // line 12
        echo twig_include($this->env, $context, "matches/_delete_form.html.twig");
        echo "
";

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);


        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array(102 => 12, 97 => 10, 92 => 8, 88 => 6, 78 => 5, 59 => 3, 36 => 1,);
    }

    protected function doGetParent(array $context)
    {
        // line 1
        return "base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new Profile($this->getTemplateName(), "template", "matches/edit.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new Profile($this->getTemplateName(), "template", "matches/edit.html.twig"));

        $this->parent = $this->loadTemplate("base.html.twig", "matches/edit.html.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));

        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);


        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

    }
}

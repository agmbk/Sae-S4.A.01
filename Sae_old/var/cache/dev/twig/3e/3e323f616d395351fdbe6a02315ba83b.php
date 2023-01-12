<?php

use Twig\Environment;
use Twig\Error\RuntimeError;
use Twig\Profiler\Profile;
use Twig\Source;
use Twig\Template;

/* equipes/show.html.twig */

class __TwigTemplate_ae6779f539f295253bd2cf731ba8c17d extends Template
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

{% block title %}Equipes{% endblock %}

{% block body %}
    <h1>Equipes</h1>

    <table class=\"table\">
        <tbody>
            <tr>
                <th>Id</th>
                <td>{{ equipe.id }}</td>
            </tr>
            <tr>
                <th>Libelle</th>
                <td>{{ equipe.libelle }}</td>
            </tr>
            <tr>
                <th>Entraineur</th>
                <td>{{ equipe.entraineur }}</td>
            </tr>
            <tr>
                <th>Creneaux</th>
                <td>{{ equipe.creneaux }}</td>
            </tr>
            <tr>
                <th>Url_photo</th>
                <td>{{ equipe.urlPhoto }}</td>
            </tr>
            <tr>
                <th>Url_result_calendrier</th>
                <td>{{ equipe.urlResultCalendrier }}</td>
            </tr>
            <tr>
                <th>Commentaire</th>
                <td>{{ equipe.commentaire }}</td>
            </tr>
        </tbody>
    </table>

    <a href=\"{{ path('app_equipes_index') }}\">back to list</a>

    <a href=\"{{ path('app_equipes_edit', {'id': equipe.id}) }}\">edit</a>

    {{ include('equipes/_delete_form.html.twig') }}
{% endblock %}
", "equipes/show.html.twig", "C:\\Users\\tomon\\PhpstormProjects\\Sae-S4.A.01\\Sae_old\\templates\\equipes\\show.html.twig");
    }

    public function block_title($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new Profile($this->getTemplateName(), "block", "title"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new Profile($this->getTemplateName(), "block", "title"));

        echo "Equipes";

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);


        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

    }

    // line 3

    public function getTemplateName()
    {
        return "equipes/show.html.twig";
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
        echo "    <h1>Equipes</h1>

    <table class=\"table\">
        <tbody>
            <tr>
                <th>Id</th>
                <td>";
        // line 12
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["equipe"]) || array_key_exists("equipe", $context) ? $context["equipe"] : (function () {
            throw new RuntimeError('Variable "equipe" does not exist.', 12, $this->source);
        })()), "id", [], "any", false, false, false, 12), "html", null, true);
        echo "</td>
            </tr>
            <tr>
                <th>Libelle</th>
                <td>";
        // line 16
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["equipe"]) || array_key_exists("equipe", $context) ? $context["equipe"] : (function () {
            throw new RuntimeError('Variable "equipe" does not exist.', 16, $this->source);
        })()), "libelle", [], "any", false, false, false, 16), "html", null, true);
        echo "</td>
            </tr>
            <tr>
                <th>Entraineur</th>
                <td>";
        // line 20
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["equipe"]) || array_key_exists("equipe", $context) ? $context["equipe"] : (function () {
            throw new RuntimeError('Variable "equipe" does not exist.', 20, $this->source);
        })()), "entraineur", [], "any", false, false, false, 20), "html", null, true);
        echo "</td>
            </tr>
            <tr>
                <th>Creneaux</th>
                <td>";
        // line 24
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["equipe"]) || array_key_exists("equipe", $context) ? $context["equipe"] : (function () {
            throw new RuntimeError('Variable "equipe" does not exist.', 24, $this->source);
        })()), "creneaux", [], "any", false, false, false, 24), "html", null, true);
        echo "</td>
            </tr>
            <tr>
                <th>Url_photo</th>
                <td>";
        // line 28
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["equipe"]) || array_key_exists("equipe", $context) ? $context["equipe"] : (function () {
            throw new RuntimeError('Variable "equipe" does not exist.', 28, $this->source);
        })()), "urlPhoto", [], "any", false, false, false, 28), "html", null, true);
        echo "</td>
            </tr>
            <tr>
                <th>Url_result_calendrier</th>
                <td>";
        // line 32
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["equipe"]) || array_key_exists("equipe", $context) ? $context["equipe"] : (function () {
            throw new RuntimeError('Variable "equipe" does not exist.', 32, $this->source);
        })()), "urlResultCalendrier", [], "any", false, false, false, 32), "html", null, true);
        echo "</td>
            </tr>
            <tr>
                <th>Commentaire</th>
                <td>";
        // line 36
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["equipe"]) || array_key_exists("equipe", $context) ? $context["equipe"] : (function () {
            throw new RuntimeError('Variable "equipe" does not exist.', 36, $this->source);
        })()), "commentaire", [], "any", false, false, false, 36), "html", null, true);
        echo "</td>
            </tr>
        </tbody>
    </table>

    <a href=\"";
        // line 41
        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_equipes_index");
        echo "\">back to list</a>

    <a href=\"";
        // line 43
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_equipes_edit", ["id" => twig_get_attribute($this->env, $this->source, (isset($context["equipe"]) || array_key_exists("equipe", $context) ? $context["equipe"] : (function () {
            throw new RuntimeError('Variable "equipe" does not exist.', 43, $this->source);
        })()), "id", [], "any", false, false, false, 43)]), "html", null, true);
        echo "\">edit</a>

    ";
        // line 45
        echo twig_include($this->env, $context, "equipes/_delete_form.html.twig");
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
        return array(156 => 45, 151 => 43, 146 => 41, 138 => 36, 131 => 32, 124 => 28, 117 => 24, 110 => 20, 103 => 16, 96 => 12, 88 => 6, 78 => 5, 59 => 3, 36 => 1,);
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new Profile($this->getTemplateName(), "template", "equipes/show.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new Profile($this->getTemplateName(), "template", "equipes/show.html.twig"));

        $this->parent = $this->loadTemplate("base.html.twig", "equipes/show.html.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));

        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);


        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

    }
}

<?php

use Twig\Environment;
use Twig\Error\RuntimeError;
use Twig\Profiler\Profile;
use Twig\Source;
use Twig\Template;

/* matches/show.html.twig */

class __TwigTemplate_70e21c550bb8d53660f1e45f035ce5c6 extends Template
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

{% block title %}Matches{% endblock %}

{% block body %}
    <h1>Matches</h1>

    <table class=\"table\">
        <tbody>
            <tr>
                <th>Id</th>
                <td>{{ match.id }}</td>
            </tr>
            <tr>
                <th>Id_match</th>
                <td>{{ match.idMatch }}</td>
            </tr>
            <tr>
                <th>Domicile_exterieur</th>
                <td>{{ match.domicileExterieur }}</td>
            </tr>
            <tr>
                <th>Hote</th>
                <td>{{ match.hote }}</td>
            </tr>
            <tr>
                <th>Date_heure</th>
                <td>{{ match.dateHeure ? match.dateHeure|date('Y-m-d H:i:s') : '' }}</td>
            </tr>
            <tr>
                <th>Num_semaine</th>
                <td>{{ match.numSemaine }}</td>
            </tr>
            <tr>
                <th>Num_journee</th>
                <td>{{ match.numJournee }}</td>
            </tr>
            <tr>
                <th>Gymnase</th>
                <td>{{ match.gymnase }}</td>
            </tr>
        </tbody>
    </table>

    <a href=\"{{ path('app_matches_index') }}\">back to list</a>

    <a href=\"{{ path('app_matches_edit', {'id': match.id}) }}\">edit</a>

    {{ include('matches/_delete_form.html.twig') }}
{% endblock %}
", "matches/show.html.twig", "C:\\Users\\tomon\\PhpstormProjects\\Sae-S4.A.01\\Sae_old\\templates\\matches\\show.html.twig");
    }

    public function block_title($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new Profile($this->getTemplateName(), "block", "title"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new Profile($this->getTemplateName(), "block", "title"));

        echo "Matches";

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);


        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

    }

    // line 3

    public function getTemplateName()
    {
        return "matches/show.html.twig";
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
        echo "    <h1>Matches</h1>

    <table class=\"table\">
        <tbody>
            <tr>
                <th>Id</th>
                <td>";
        // line 12
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["match"]) || array_key_exists("match", $context) ? $context["match"] : (function () {
            throw new RuntimeError('Variable "match" does not exist.', 12, $this->source);
        })()), "id", [], "any", false, false, false, 12), "html", null, true);
        echo "</td>
            </tr>
            <tr>
                <th>Id_match</th>
                <td>";
        // line 16
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["match"]) || array_key_exists("match", $context) ? $context["match"] : (function () {
            throw new RuntimeError('Variable "match" does not exist.', 16, $this->source);
        })()), "idMatch", [], "any", false, false, false, 16), "html", null, true);
        echo "</td>
            </tr>
            <tr>
                <th>Domicile_exterieur</th>
                <td>";
        // line 20
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["match"]) || array_key_exists("match", $context) ? $context["match"] : (function () {
            throw new RuntimeError('Variable "match" does not exist.', 20, $this->source);
        })()), "domicileExterieur", [], "any", false, false, false, 20), "html", null, true);
        echo "</td>
            </tr>
            <tr>
                <th>Hote</th>
                <td>";
        // line 24
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["match"]) || array_key_exists("match", $context) ? $context["match"] : (function () {
            throw new RuntimeError('Variable "match" does not exist.', 24, $this->source);
        })()), "hote", [], "any", false, false, false, 24), "html", null, true);
        echo "</td>
            </tr>
            <tr>
                <th>Date_heure</th>
                <td>";
        // line 28
        ((twig_get_attribute($this->env, $this->source, (isset($context["match"]) || array_key_exists("match", $context) ? $context["match"] : (function () {
            throw new RuntimeError('Variable "match" does not exist.', 28, $this->source);
        })()), "dateHeure", [], "any", false, false, false, 28)) ? (print (twig_escape_filter($this->env, twig_date_format_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["match"]) || array_key_exists("match", $context) ? $context["match"] : (function () {
            throw new RuntimeError('Variable "match" does not exist.', 28, $this->source);
        })()), "dateHeure", [], "any", false, false, false, 28), "Y-m-d H:i:s"), "html", null, true))) : (print ("")));
        echo "</td>
            </tr>
            <tr>
                <th>Num_semaine</th>
                <td>";
        // line 32
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["match"]) || array_key_exists("match", $context) ? $context["match"] : (function () {
            throw new RuntimeError('Variable "match" does not exist.', 32, $this->source);
        })()), "numSemaine", [], "any", false, false, false, 32), "html", null, true);
        echo "</td>
            </tr>
            <tr>
                <th>Num_journee</th>
                <td>";
        // line 36
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["match"]) || array_key_exists("match", $context) ? $context["match"] : (function () {
            throw new RuntimeError('Variable "match" does not exist.', 36, $this->source);
        })()), "numJournee", [], "any", false, false, false, 36), "html", null, true);
        echo "</td>
            </tr>
            <tr>
                <th>Gymnase</th>
                <td>";
        // line 40
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["match"]) || array_key_exists("match", $context) ? $context["match"] : (function () {
            throw new RuntimeError('Variable "match" does not exist.', 40, $this->source);
        })()), "gymnase", [], "any", false, false, false, 40), "html", null, true);
        echo "</td>
            </tr>
        </tbody>
    </table>

    <a href=\"";
        // line 45
        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_matches_index");
        echo "\">back to list</a>

    <a href=\"";
        // line 47
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_matches_edit", ["id" => twig_get_attribute($this->env, $this->source, (isset($context["match"]) || array_key_exists("match", $context) ? $context["match"] : (function () {
            throw new RuntimeError('Variable "match" does not exist.', 47, $this->source);
        })()), "id", [], "any", false, false, false, 47)]), "html", null, true);
        echo "\">edit</a>

    ";
        // line 49
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
        return array(163 => 49, 158 => 47, 153 => 45, 145 => 40, 138 => 36, 131 => 32, 124 => 28, 117 => 24, 110 => 20, 103 => 16, 96 => 12, 88 => 6, 78 => 5, 59 => 3, 36 => 1,);
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new Profile($this->getTemplateName(), "template", "matches/show.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new Profile($this->getTemplateName(), "template", "matches/show.html.twig"));

        $this->parent = $this->loadTemplate("base.html.twig", "matches/show.html.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));

        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);


        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

    }
}

<?php

use Twig\Environment;
use Twig\Error\RuntimeError;
use Twig\Profiler\Profile;
use Twig\Source;
use Twig\Template;

/* matches/index.html.twig */

class __TwigTemplate_8c5a36564543f1ce6e5e7acbddfcfb83 extends Template
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

{% block title %}Matches index{% endblock %}

{% block body %}
    <h1>Matches index</h1>

    <table class=\"table\">
        <thead>
            <tr>
                <th>Id</th>
                <th>Id_match</th>
                <th>Domicile_exterieur</th>
                <th>Hote</th>
                <th>Date_heure</th>
                <th>Num_semaine</th>
                <th>Num_journee</th>
                <th>Gymnase</th>
                <th>actions</th>
            </tr>
        </thead>
        <tbody>
        {% for match in matches %}
            <tr>
                <td>{{ match.id }}</td>
                <td>{{ match.idMatch }}</td>
                <td>{{ match.domicileExterieur }}</td>
                <td>{{ match.hote }}</td>
                <td>{{ match.dateHeure ? match.dateHeure|date('Y-m-d H:i:s') : '' }}</td>
                <td>{{ match.numSemaine }}</td>
                <td>{{ match.numJournee }}</td>
                <td>{{ match.gymnase }}</td>
                <td>
                    <a href=\"{{ path('app_matches_show', {'id': match.id}) }}\">show</a>
                    <a href=\"{{ path('app_matches_edit', {'id': match.id}) }}\">edit</a>
                </td>
            </tr>
        {% else %}
            <tr>
                <td colspan=\"9\">no records found</td>
            </tr>
        {% endfor %}
        </tbody>
    </table>

    <a href=\"{{ path('app_matches_new') }}\">Create new</a>
{% endblock %}
", "matches/index.html.twig", "C:\\Users\\tomon\\PhpstormProjects\\Sae-S4.A.01\\Sae_old\\templates\\matches\\index.html.twig");
    }

    public function block_title($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new Profile($this->getTemplateName(), "block", "title"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new Profile($this->getTemplateName(), "block", "title"));

        echo "Matches index";

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);


        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

    }

    // line 3

    public function getTemplateName()
    {
        return "matches/index.html.twig";
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
        echo "    <h1>Matches index</h1>

    <table class=\"table\">
        <thead>
            <tr>
                <th>Id</th>
                <th>Id_match</th>
                <th>Domicile_exterieur</th>
                <th>Hote</th>
                <th>Date_heure</th>
                <th>Num_semaine</th>
                <th>Num_journee</th>
                <th>Gymnase</th>
                <th>actions</th>
            </tr>
        </thead>
        <tbody>
        ";
        // line 23
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["matches"]) || array_key_exists("matches", $context) ? $context["matches"] : (function () {
            throw new RuntimeError('Variable "matches" does not exist.', 23, $this->source);
        })()));
        $context['_iterated'] = false;
        foreach ($context['_seq'] as $context["_key"] => $context["match"]) {
            // line 24
            echo "            <tr>
                <td>";
            // line 25
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["match"], "id", [], "any", false, false, false, 25), "html", null, true);
            echo "</td>
                <td>";
            // line 26
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["match"], "idMatch", [], "any", false, false, false, 26), "html", null, true);
            echo "</td>
                <td>";
            // line 27
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["match"], "domicileExterieur", [], "any", false, false, false, 27), "html", null, true);
            echo "</td>
                <td>";
            // line 28
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["match"], "hote", [], "any", false, false, false, 28), "html", null, true);
            echo "</td>
                <td>";
            // line 29
            ((twig_get_attribute($this->env, $this->source, $context["match"], "dateHeure", [], "any", false, false, false, 29)) ? (print (twig_escape_filter($this->env, twig_date_format_filter($this->env, twig_get_attribute($this->env, $this->source, $context["match"], "dateHeure", [], "any", false, false, false, 29), "Y-m-d H:i:s"), "html", null, true))) : (print ("")));
            echo "</td>
                <td>";
            // line 30
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["match"], "numSemaine", [], "any", false, false, false, 30), "html", null, true);
            echo "</td>
                <td>";
            // line 31
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["match"], "numJournee", [], "any", false, false, false, 31), "html", null, true);
            echo "</td>
                <td>";
            // line 32
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["match"], "gymnase", [], "any", false, false, false, 32), "html", null, true);
            echo "</td>
                <td>
                    <a href=\"";
            // line 34
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_matches_show", ["id" => twig_get_attribute($this->env, $this->source, $context["match"], "id", [], "any", false, false, false, 34)]), "html", null, true);
            echo "\">show</a>
                    <a href=\"";
            // line 35
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_matches_edit", ["id" => twig_get_attribute($this->env, $this->source, $context["match"], "id", [], "any", false, false, false, 35)]), "html", null, true);
            echo "\">edit</a>
                </td>
            </tr>
        ";
            $context['_iterated'] = true;
        }
        if (!$context['_iterated']) {
            // line 39
            echo "            <tr>
                <td colspan=\"9\">no records found</td>
            </tr>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['match'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 43
        echo "        </tbody>
    </table>

    <a href=\"";
        // line 46
        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_matches_new");
        echo "\">Create new</a>
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
        return array(175 => 46, 170 => 43, 161 => 39, 152 => 35, 148 => 34, 143 => 32, 139 => 31, 135 => 30, 131 => 29, 127 => 28, 123 => 27, 119 => 26, 115 => 25, 112 => 24, 107 => 23, 88 => 6, 78 => 5, 59 => 3, 36 => 1,);
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new Profile($this->getTemplateName(), "template", "matches/index.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new Profile($this->getTemplateName(), "template", "matches/index.html.twig"));

        $this->parent = $this->loadTemplate("base.html.twig", "matches/index.html.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));

        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);


        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

    }
}

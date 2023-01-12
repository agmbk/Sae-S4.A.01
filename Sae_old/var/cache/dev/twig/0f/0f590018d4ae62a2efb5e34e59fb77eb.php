<?php

use Twig\Environment;
use Twig\Error\RuntimeError;
use Twig\Profiler\Profile;
use Twig\Source;
use Twig\Template;

/* equipes/_delete_form.html.twig */

class __TwigTemplate_385789e9aa12ec0e53e095ba3bbf3511 extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
        ];
    }

    public function getSourceContext()
    {
        return new Source("<form method=\"post\" action=\"{{ path('app_equipes_delete', {'id': equipe.id}) }}\" onsubmit=\"return confirm('Are you sure you want to delete this item?');\">
    <input type=\"hidden\" name=\"_token\" value=\"{{ csrf_token('delete' ~ equipe.id) }}\">
    <button class=\"btn\">Delete</button>
</form>
", "equipes/_delete_form.html.twig", "C:\\Users\\tomon\\PhpstormProjects\\Sae-S4.A.01\\Sae_old\\templates\\equipes\\_delete_form.html.twig");
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array(48 => 2, 43 => 1,);
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new Profile($this->getTemplateName(), "template", "equipes/_delete_form.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new Profile($this->getTemplateName(), "template", "equipes/_delete_form.html.twig"));

        // line 1
        echo "<form method=\"post\" action=\"";
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_equipes_delete", ["id" => twig_get_attribute($this->env, $this->source, (isset($context["equipe"]) || array_key_exists("equipe", $context) ? $context["equipe"] : (function () {
            throw new RuntimeError('Variable "equipe" does not exist.', 1, $this->source);
        })()), "id", [], "any", false, false, false, 1)]), "html", null, true);
        echo "\" onsubmit=\"return confirm('Are you sure you want to delete this item?');\">
    <input type=\"hidden\" name=\"_token\" value=\"";
        // line 2
        echo twig_escape_filter($this->env, $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderCsrfToken(("delete" . twig_get_attribute($this->env, $this->source, (isset($context["equipe"]) || array_key_exists("equipe", $context) ? $context["equipe"] : (function () {
                throw new RuntimeError('Variable "equipe" does not exist.', 2, $this->source);
            })()), "id", [], "any", false, false, false, 2))), "html", null, true);
        echo "\">
    <button class=\"btn\">Delete</button>
</form>
";

        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);


        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

    }

    public function getTemplateName()
    {
        return "equipes/_delete_form.html.twig";
    }
}

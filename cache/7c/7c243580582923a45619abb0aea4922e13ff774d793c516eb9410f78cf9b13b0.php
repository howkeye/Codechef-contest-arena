<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Extension\SandboxExtension;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;

/* problems.twig */
class __TwigTemplate_aa34659defa62f79544d7ea589f86bed72223d266ee7529c6200ef38047d6622 extends \Twig\Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->blocks = [
            'content' => [$this, 'block_content'],
        ];
    }

    protected function doGetParent(array $context)
    {
        // line 2
        return "base.twig";
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        $this->parent = $this->loadTemplate("base.twig", "problems.twig", 2);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_content($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 4
        echo "<div class=\"cantainer container p-3 my-3 border\">
<div class=\"row\">
<div class='col-md-3'></div>
<div class='col-md-6 title'>
<center> <h2> ";
        // line 8
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["wrap"] ?? null), "contest", [], "any", false, false, false, 8), "html", null, true);
        echo " </h2>  <center>
<div class=\"list-group\">
 <ul class=\"list-group\">
 
    
  <h3>

";
        // line 15
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, ($context["wrap"] ?? null), "problems", [], "any", false, false, false, 15));
        foreach ($context['_seq'] as $context["_key"] => $context["problem"]) {
            // line 16
            echo "  <a href=\"/problem/";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["wrap"] ?? null), "contest", [], "any", false, false, false, 16), "html", null, true);
            echo "/";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["problem"], "problemCode", [], "any", false, false, false, 16), "html", null, true);
            echo "\" class=\"list-group-item d-flex justify-content-between align-items-center\">
   ";
            // line 17
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["problem"], "problemCode", [], "any", false, false, false, 17), "html", null, true);
            echo "
   <span class=\"badge badge-primary badge-pill\">";
            // line 18
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["problem"], "accuracy", [], "any", false, false, false, 18), "html", null, true);
            echo "%</span>
   <span class=\"badge badge-primary badge\">";
            // line 19
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["problem"], "successfulSubmissions", [], "any", false, false, false, 19), "html", null, true);
            echo "</span>
  </a>
 ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['problem'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 21
        echo "  
 </h3> 

</div>
</div>
<div class='col-md-3'></div>



";
    }

    public function getTemplateName()
    {
        return "problems.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  94 => 21,  85 => 19,  81 => 18,  77 => 17,  70 => 16,  66 => 15,  56 => 8,  50 => 4,  46 => 3,  35 => 2,);
    }

    public function getSourceContext()
    {
        return new Source("", "problems.twig", "/home/howkeye/django/Codechef-contest-arena/templates/problems.twig");
    }
}

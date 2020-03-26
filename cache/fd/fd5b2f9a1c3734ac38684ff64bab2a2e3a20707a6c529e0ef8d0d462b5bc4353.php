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

/* home.twig */
class __TwigTemplate_b1d1c75967959cbb40183909a3c08f1ac5855f530b54171d01ff0e99172b3506 extends \Twig\Template
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
        $this->parent = $this->loadTemplate("base.twig", "home.twig", 2);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_content($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 4
        echo "



<div class=\"cantainer container p-3 my-6 border\" style=\"margin-top:10%;\">
<center>
<h1><p> Welcome to Codechef Contest Arena !!!</p><h1>

<div class=\"row\" style=\"    width: 100%;\">
<div class=\" col-md-4\"></div>
<div class=\" col-md-3\">
";
        // line 15
        if ((($context["flag"] ?? null) == 0)) {
            // line 16
            echo "

 <a href=\"info.php\">
    <button type=\"button\" class=\"btn btn-primary btn-lg\" >
        <span class=\"spinner-grow spinner-grow-sm\"></span>
        Enter
    </button>
 </a> 

 ";
        }
        // line 26
        if ((($context["flag"] ?? null) == 1)) {
            // line 27
            echo " <a href=\"templates/contests.php\">
    <button type=\"button\" class=\"btn btn-primary btn-lg\" >
        <span class=\"spinner-grow spinner-grow-sm\"></span>
        Enter
    </button>
 </a> 
";
        }
        // line 34
        echo twig_escape_filter($this->env, ($context["flag"] ?? null), "html", null, true);
        echo "
 </div>
<div class=\" col-md-5\"></div>
</div>
</center>
</div> 
";
    }

    public function getTemplateName()
    {
        return "home.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  88 => 34,  79 => 27,  77 => 26,  65 => 16,  63 => 15,  50 => 4,  46 => 3,  35 => 2,);
    }

    public function getSourceContext()
    {
        return new Source("", "home.twig", "/home/howkeye/django/Codechef-contest-arena/templates/home.twig");
    }
}

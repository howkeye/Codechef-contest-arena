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

/* base.twig */
class __TwigTemplate_c3e0b3736797e4641f749a709cbfa2b3bd5e9c96cfc2ef0c8cf4abba9dd97600 extends \Twig\Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
            'content' => [$this, 'block_content'],
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 1
        echo "
<!DOCTYPE html>
<html>
<head> 
    <meta charset=\"utf-8\">
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1, shrink-to-fit=no\"> 
    <link rel=\"stylesheet\" href=\"https://stackpath.bootstrapcdn.com/bootswatch/4.4.1/flatly/bootstrap.min.css\"  >  
    
    <title>Contest Arena</title> 
</head>


<body  class=\"page-bootswatch\" style=\"font-family: 'Ubuntu Mono', monospace;\">


<header>
    <nav class=\"navbar navbar-expand-lg navbar-dark bg-primary\">
  <a class=\"navbar-brand\" href=\"/\"><img src=\"/templates/images/logo.png\"  alt=\"Logo\" width=\"130\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Codechef Contest Arena</a>
  <button class=\"navbar-toggler\" type=\"button\" data-toggle=\"collapse\" data-target=\"#navbarColor01\" aria-controls=\"navbarColor01\" aria-expanded=\"false\" aria-label=\"Toggle navigation\">
    <span class=\"navbar-toggler-icon\"></span>
  </button>


  <div class=\"collapse navbar-collapse\" id=\"navbarColor01\">
    <ul class=\"navbar-nav mr-auto\">
      <li class=\"nav-item active\">
        <a class=\"nav-link\" href=\"/\">Home <span class=\"sr-only\">(current)</span></a>
      </li>
      <li class=\"nav-item\">
        <a class=\"nav-link\" href=\"/logout\">logout</a> 
        </li>
      ";
        // line 35
        echo "      
    </ul>   
  </div>
</nav>

";
        // line 40
        $this->displayBlock('content', $context, $blocks);
        // line 42
        echo "

<div class=\"jumbotron\" style=\"position:fixed;bottom:0px;width:100%; margin:0px; padding:0px;\">


  
  <center>Made with love by Rajat (<a target='_blank' href=\"https://github.com/howkeye\">@howkeye</a>) </center>
  </div>
  </header>

</body>
</html>

";
    }

    // line 40
    public function block_content($context, array $blocks = [])
    {
        $macros = $this->macros;
    }

    public function getTemplateName()
    {
        return "base.twig";
    }

    public function getDebugInfo()
    {
        return array (  97 => 40,  80 => 42,  78 => 40,  71 => 35,  38 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "base.twig", "/home/howkeye/django/Codechef-contest-arena/templates/base.twig");
    }
}

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

        $this->parent = false;

        $this->blocks = [
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
    <link rel=\"stylesheet\" href=\"https://stackpath.bootstrapcdn.com/bootswatch/4.4.1/sketchy/bootstrap.min.css\"  >  
    <title>Contest Arena</title> 
</head>


<body  class=\"page-bootswatch\">


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
        <a class=\"nav-link\" href=\"/aboutus\">About Us</a>
      </li>
    </ul>   
  </div>
</nav>
<br>


<center>

<h1> Welcome To Codechef Contest arena !!!!<h1>
<div class=\"row\" style=\"position:fixed;bottom:60%;    width: 100%;\">
<div class=\" col-md-5\"></div>
<div class=\" col-md-2\">
 <a href=\"auth\"><button type=\"button\" class=\"btn btn-primary btn-lg\" ><h1>Enter</h1></button></a> </div>
<div class=\" col-md-5\"></div>
</div>
</center> 

<div class=\"jumbotron\" style=\"position:fixed;bottom:0px;width:100%; margin:0px;\">


  
  <center>Made with love by Rajat (<a target='_blank' href=\"https://github.com/howkeye\">@howkeye</a>) </center>
  </div>
  </header>

</body>
</html>

";
    }

    public function getTemplateName()
    {
        return "home.twig";
    }

    public function getDebugInfo()
    {
        return array (  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "home.twig", "/home/howkeye/django/Codechef-contest-arena/templates/home.twig");
    }
}

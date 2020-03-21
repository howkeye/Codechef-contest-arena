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

/* base.html */
class __TwigTemplate_16bea1c1610e9cb57da8ade47fa64178311b3071379f9f5648f2db0ac1612ae9 extends \Twig\Template
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

    <!-- Required meta tags -->
    <meta charset=\"utf-8\">
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1, shrink-to-fit=no\">

    <!-- Bootstrap CSS -->
    <link rel=\"stylesheet\" href=\"https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css\" integrity=\"sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm\" crossorigin=\"anonymous\">
   <link href=\"https://fonts.googleapis.com/css?family=Shadows+Into+Light&display=swap\" rel=\"stylesheet\" crossorigin=\"anonymous\">

  <link rel=\"stylesheet\" href=\"http://2020.almafiesta.com/hosted_files/main.css\" crossorigin=\"anonymous\" >  

   

  
        <title>UtkalHacks 2.0</title>
 
</head>
<body>
    <header class=\"site-header\">
      <nav class=\"navbar navbar-expand-md navbar-dark bg-steel fixed-top\">
        <div class=\"container\">
         
          <a class=\"navbar-brand mr-4\" style=\"font-family: 'Shadows Into Light', cursive; font-size: 2.2vw;\" href=\"#\" ><b>BoostYourCP</b></a>
          <img src=\"http://2020.almafiesta.com/hosted_files/raja.gif\" width=5% height=5%>
      
          <button class=\"navbar-toggler\" type=\"button\" data-toggle=\"collapse\" data-target=\"#navbarToggle\" aria-controls=\"navbarToggle\" aria-expanded=\"false\" aria-label=\"Toggle navigation\">
          <span class=\"navbar-toggler-icon\"></span>
          </button>
          <div class=\"collapse navbar-collapse\" id=\"navbarToggle\">
            <div class=\"navbar-nav mr-auto\">
              
              
            </div>
            <!-- Navbar Right Side -->
       /*     <div class=\"navbar-nav\">
              ";
        // line 40
        if (twig_get_attribute($this->env, $this->source, ($context["user"] ?? null), "is_authenticated", [], "any", false, false, false, 40)) {
            // line 41
            echo "                <a class=\"nav-item nav-link\" href=\"#\">Home</a>
                <a class=\"nav-item nav-link\" href=\"#\">Profile</a>
                <a class=\"nav-item nav-link\" href=\"#\">Logout</a>
              ";
        } else {
            // line 45
            echo "                <a class=\"nav-item nav-link\" href=\"#\">Home</a>
                <a class=\"nav-item nav-link\" href=\"#\">Login</a>
                <a class=\"nav-item nav-link\" href=\"#\">Register</a>
              ";
        }
        // line 48
        echo " 
            </div>
          </div>
        </div>
      </nav>
    </header>
    <main role=\"main\" class=\"container\">
      <div class=\"row\">
  
        <div class=\"col-md-4\">
          <div class=\"content-section\">
            <h3>Our Sidebar</h3>
            <p class='text-muted'>You can put any information here you'd like.
              <ul class=\"list-group\">
                <li class=\"list-group-item list-group-item-light\"> <a href=\"#\">Coding Contest</a></li>
                <li class=\"list-group-item list-group-item-light\"> <a href=\"#\"> Resources</a></li>
                <li class=\"list-group-item list-group-item-light\"> <a href=\"#\">Announcements</a></li>
              
                <li class=\"list-group-item list-group-item-light\"> <a href=\"#\">Leaderboard</a></li>
                <li class=\"list-group-item list-group-item-light\">Other features coming soon</li> 
              </ul>
            </p>
            <br>
            <br>
            <p><center style=\"font-family: 'Nunito', sans-serif;\">
          <h2>     Developed in <br>
              <b> <div style=\"color:red;\">UtkalHacks 2.0 </div> </b>
               </center> <h2>

            </p>

          </div>

        </div>
      </div>
    </main>



    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src=\"https://code.jquery.com/jquery-3.2.1.slim.min.js\" integrity=\"sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN\" crossorigin=\"anonymous\"></script>
    <script src=\"https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js\" integrity=\"sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q\" crossorigin=\"anonymous\"></script>
    <script src=\"https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js\" integrity=\"sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl\" crossorigin=\"anonymous\"></script>
</body>
</html>

<!----------                 for stylesheet scroll deap very deap-->

















<style>
  body {
  background: #fafafa;
  color: #333333;
  margin-top: 5rem;
}

h1, h2, h3, h4, h5, h6 {
  color: #444444;
}

ul {
  margin: 0;
}

.bg-steel {
  background-color: #5f788a;
}

.site-header .navbar-nav .nav-link {
  color: #cbd5db;
}

.site-header .navbar-nav .nav-link:hover {
  color: #ffffff;
}

.site-header .navbar-nav .nav-link.active {
  font-weight: 500;
}

.content-section {
  background: #ffffff;
  padding: 10px 20px;
  border: 1px solid #dddddd;
  border-radius: 3px;
  margin-bottom: 20px;
}

.article-title {
  color: #444444;
}

a.article-title:hover {
  color: #428bca;
  text-decoration: none;
}

.article-content {
  white-space: pre-line;
}

.article-img {
  height: 65px;
  width: 65px;
  margin-right: 16px;
}

.article-metadata {
  padding-bottom: 1px;
  margin-bottom: 4px;
  border-bottom: 1px solid #e3e3e3
}

.article-metadata a:hover {
  color: #333;
  text-decoration: none;
}

.article-svg {
  width: 25px;
  height: 25px;
  vertical-align: middle;
}

.account-img {
  height: 125px;
  width: 125px;
  margin-right: 20px;
  margin-bottom: 16px;
}

.account-heading {
  font-size: 2.5rem;
}

</style>";
    }

    public function getTemplateName()
    {
        return "base.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  92 => 48,  86 => 45,  80 => 41,  78 => 40,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "base.html", "/home/howkeye/django/Codechef-contest-arena/templates/base.html");
    }
}

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

/* problem.twig */
class __TwigTemplate_8e538b3b5f5a7503418db45b05e4063a4ec7ea21392eb11904c86302ab828b1a extends \Twig\Template
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
        // line 3
        return "base.twig";
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        $this->parent = $this->loadTemplate("base.twig", "problem.twig", 3);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 4
    public function block_content($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 5
        echo "<link rel=\"stylesheet\" href=\"https://cdn.jsdelivr.net/simplemde/latest/simplemde.min.css\">
<script src=\"https://cdn.jsdelivr.net/simplemde/latest/simplemde.min.js\"></script>
<script src=\"https://polyfill.io/v3/polyfill.min.js?features=es6\"></script>
<script id=\"MathJax-script\" async src=\"https://cdn.jsdelivr.net/npm/mathjax@3.0.1/es5/tex-mml-chtml.js\"></script>

<!-- Start simple MDE -->
<script>
    var simplemde = new SimpleMDE({ 
        element: document.getElementById(\"markdown\") 
    });
</script>

 
 <div class=\"cantainer container p-3 my-6 border\" >
 <center><h3><b> ";
        // line 19
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["wrap"] ?? null), "problem", [], "any", false, false, false, 19), "html", null, true);
        echo "</b> </h3> </center>
<div class=\"markdown\">
";
        // line 21
        echo twig_get_attribute($this->env, $this->source, ($context["wrap"] ?? null), "problemStat", [], "any", false, false, false, 21);
        echo "
</div>


<br>
<br>
<hr>


<form>
  <fieldset>
   <h3> <legend>Run/Submit Your Code </legend></h3>
   
  
<form action=\"\" method=\"POST\">
    <div class=\"form-group\">
    <label for=\"language\"> Language:</label> 
      <select class=\"custom-select\" name=\"language\" style=\"width:20%\">
      <option selected=\"";
        // line 39
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["wrap"] ?? null), "body", [], "any", false, false, false, 39), "language", [], "any", false, false, false, 39), "html", null, true);
        echo "\">c++14</option>
     <br>
    </select>

      <label for=\"Code\"></label>

      <textarea class=\"form-control\" name=\"Code\" id=\"Code\" rows=\"15\" spellcheck=\"true\">
      ";
        // line 46
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["wrap"] ?? null), "body", [], "any", false, false, false, 46), "sourceCode", [], "any", false, false, false, 46), "html", null, true);
        echo "
      
      </textarea>
      <br>
      <div class=\"row\">
       <div class=\"col-md-5\">
        <label for=\"input\">Input values</label>

       <textarea class=\"form-control\" id=\"input\" name=\"input\" rows=\"5\" spellcheck=\"true\">";
        // line 54
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["wrap"] ?? null), "body", [], "any", false, false, false, 54), "input", [], "any", false, false, false, 54), "html", null, true);
        echo "</textarea>         
        </div>
       
       <div class=\"col-md-2\">
        <button type=\"submit\" class=\"btn btn-primary\" Name=\"run\">Run</button>

           <button type=\"submit\" class=\"btn btn-primary\" Name=\"submit\">Submit</button>
           </form>
        </div>
      
      
        

        <div class=\"col-md-5\">
        ";
        // line 68
        if ((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["wrap"] ?? null), "result", [], "any", false, false, false, 68), "cmpinfo", [], "any", false, false, false, 68) != "")) {
            // line 69
            echo "            <div class=\"alert alert-dismissible alert-danger\">
      
            <h4 class=\"alert-heading\">Compliation error !</h4>
            <p class=\"mb-0\"> ";
            // line 72
            echo twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["wrap"] ?? null), "result", [], "any", false, false, false, 72), "cmpinfo", [], "any", false, false, false, 72);
            echo " ahgva </p>
            </div>
         ";
        }
        // line 75
        echo "        ";
        if ((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["wrap"] ?? null), "result", [], "any", false, false, false, 75), "stderr", [], "any", false, false, false, 75) != "")) {
            // line 76
            echo "            <div class=\"alert alert-dismissible alert-info\">
      
            <h4 class=\"alert-heading\">stderr error!!</h4>
            <p class=\"mb-0\"> ";
            // line 79
            echo twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["wrap"] ?? null), "result", [], "any", false, false, false, 79), "stderr", [], "any", false, false, false, 79);
            echo " ahgva </p>
            </div>
         ";
        }
        // line 82
        echo "         ";
        if ((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["wrap"] ?? null), "result", [], "any", false, false, false, 82), "output", [], "any", false, false, false, 82) != "")) {
            // line 83
            echo "
              <div class=\"alert alert-dismissible alert-success\">
                <button type=\"button\" class=\"close\" data-dismiss=\"alert\">&times;</button>
                <strong>Well done,compiled successfully!!! output: <br></strong>   ";
            // line 86
            echo twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["wrap"] ?? null), "result", [], "any", false, false, false, 86), "output", [], "any", false, false, false, 86);
            echo " 
              </div>   
         ";
        }
        // line 88
        echo "  

         ";
        // line 90
        if ((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["wrap"] ?? null), "result", [], "any", false, false, false, 90), "status", [], "any", false, false, false, 90) == "OK")) {
            echo "  
           
         
         <div class=\"alert alert-dismissible alert-success\">
                <button type=\"button\" class=\"close\" data-dismiss=\"alert\">&times;</button>
                <strong>Well done,compiled successfully!!! No output to stdout <br></strong>   ";
            // line 95
            echo twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["wrap"] ?? null), "result", [], "any", false, false, false, 95), "output", [], "any", false, false, false, 95);
            echo " 
              </div> 

         ";
        }
        // line 99
        echo "

       </div>
         
        </div>
        </div>
<button type=\"button\" class=\"btn btn-primary\" data-toggle=\"modal\" data-target=\"#myModal\">
  Open modal
</button>       
       <div class=\"modal\" id=\"myModal\">
  <div class=\"modal-dialog\" role=\"document\">
    <div class=\"modal-content\">
      <div class=\"modal-header\">
        <h5 class=\"modal-title\">Modal title</h5>
        <button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-label=\"Close\">
          <span aria-hidden=\"true\">&times;</span>
        </button>
      </div>
      <div class=\"modal-body\">
        <p>Modal body text goes here.</p>
      </div>
      <div class=\"modal-footer\">
        <button type=\"button\" class=\"btn btn-primary\">Save changes</button>
        <button type=\"button\" class=\"btn btn-secondary\" data-dismiss=\"modal\">Close</button>
      </div>
    </div>
  </div>
</div>


       

</diV>
<br>
<br>


";
    }

    public function getTemplateName()
    {
        return "problem.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  190 => 99,  183 => 95,  175 => 90,  171 => 88,  165 => 86,  160 => 83,  157 => 82,  151 => 79,  146 => 76,  143 => 75,  137 => 72,  132 => 69,  130 => 68,  113 => 54,  102 => 46,  92 => 39,  71 => 21,  66 => 19,  50 => 5,  46 => 4,  35 => 3,);
    }

    public function getSourceContext()
    {
        return new Source("", "problem.twig", "/home/howkeye/django/Codechef-contest-arena/templates/problem.twig");
    }
}

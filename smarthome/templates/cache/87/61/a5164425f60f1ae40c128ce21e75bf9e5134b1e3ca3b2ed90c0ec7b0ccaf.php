<?php

/* login.html.twig */
class __TwigTemplate_8761a5164425f60f1ae40c128ce21e75bf9e5134b1e3ca3b2ed90c0ec7b0ccaf extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        try {
            $this->parent = $this->env->loadTemplate("blank.html.twig");
        } catch (Twig_Error_Loader $e) {
            $e->setTemplateFile($this->getTemplateName());
            $e->setTemplateLine(1);

            throw $e;
        }

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'container' => array($this, 'block_container'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "blank.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 2
    public function block_title($context, array $blocks = array())
    {
        echo "SmartHome System";
    }

    // line 3
    public function block_container($context, array $blocks = array())
    {
        // line 4
        echo "<section>     
    <div class=\"container\">      
        <div class=\"row\">
            <div class=\"col-md-4 col-md-offset-4\">
                ";
        // line 8
        if ($this->getAttribute((isset($context["flash"]) ? $context["flash"] : null), "error", array(), "array", true, true)) {
            // line 9
            echo "                <div class=\"alert alert-danger\">
                ";
            // line 10
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["flash"]) ? $context["flash"] : null), "error", array(), "array"), "html", null, true);
            echo "
                </div>
                ";
        }
        // line 13
        echo "                <div class=\"login-panel panel panel-default\">
                    <div class=\"panel-heading\">
                        <h3 class=\"panel-title\">Please Sign In</h3>
                    </div>
                    <div class=\"panel-body\">
                        <form role=\"form\" action=\"/login\" method=\"post\">
                            <fieldset>
                                <div class=\"form-group\">
                                    <input class=\"form-control\" placeholder=\"E-mail\" name=\"email\" type=\"email\" autofocus>
                                </div>
                                <div class=\"form-group\">
                                    <input class=\"form-control\" placeholder=\"Password\" name=\"password\" type=\"password\" value=\"\">
                                </div>
                                <div class=\"checkbox\">
                                    <label>
                                        <input name=\"remember\" type=\"checkbox\" value=\"Remember Me\">Remember Me
                                    </label>
                                </div>
                                <!-- Change this to a button or input when using this as a form -->
                                <button class=\"btn btn-lg btn-success btn-block\">Login</button>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>    
";
    }

    public function getTemplateName()
    {
        return "login.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  63 => 13,  57 => 10,  54 => 9,  52 => 8,  46 => 4,  43 => 3,  37 => 2,  11 => 1,);
    }
}

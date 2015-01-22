<?php

/* blank.html.twig */
class __TwigTemplate_7cee1212c91f6391c96f553afaf2cde0145a02426615b08b143f6575d697a48d extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'meta' => array($this, 'block_meta'),
            'title' => array($this, 'block_title'),
            'content' => array($this, 'block_content'),
            'container' => array($this, 'block_container'),
            'scripts' => array($this, 'block_scripts'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<!DOCTYPE html>
<html lang=\"en\">

<head>

    <meta charset=\"utf-8\">
    <meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\">
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1\">
    <meta name=\"description\" content=\"\">
    <meta name=\"author\" content=\"\">

    ";
        // line 12
        $this->displayBlock('meta', $context, $blocks);
        // line 13
        echo "
    <title>Nostradomus :: ";
        // line 14
        $this->displayBlock('title', $context, $blocks);
        echo "</title>

    <!-- Bootstrap Core CSS -->
    <link href=\"/css/bootstrap.min.css\" rel=\"stylesheet\">
    <link href=\"/css/bootstrap-switch.min.css\" rel=\"stylesheet\">

    <!-- MetisMenu CSS -->
    <link href=\"/css/metisMenu.min.css\" rel=\"stylesheet\">

    <!-- Custom CSS -->
    <link href=\"/css/sb-admin-2.css\" rel=\"stylesheet\">

    <!-- Custom Fonts -->
    <link href=\"/css/font-awesome.min.css\" rel=\"stylesheet\" type=\"text/css\">


</head>

<body>
    <!-- Page Content -->
    <div id=\"page-wrapper\">    
    ";
        // line 35
        $this->displayBlock('content', $context, $blocks);
        // line 50
        echo "    
    </div>    

    </div>
    <!-- /#wrapper -->
    <div id=\"footer\">
      <div class=\"container\">
          <p class=\"text-muted\">NostraDomus Automation System</p>
       </div>
    </div>


    <!-- jQuery -->
    <script src=\"/js/jquery.min.js\"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src=\"/js/bootstrap.min.js\"></script>
    <script src=\"/js/bootstrap-switch.min.js\"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src=\"/js/metisMenu.min.js\"></script>

    <!-- Custom Theme JavaScript -->
    <script src=\"/js/sb-admin-2.js\"></script>

    <script src=\"/js/smarthome.js\"></script>

";
        // line 77
        $this->displayBlock('scripts', $context, $blocks);
        // line 78
        echo "
</body>

</html>
";
    }

    // line 12
    public function block_meta($context, array $blocks = array())
    {
    }

    // line 14
    public function block_title($context, array $blocks = array())
    {
    }

    // line 35
    public function block_content($context, array $blocks = array())
    {
        // line 36
        echo "        <div class=\"container\">
            <div class=\"container-fluid\">
                ";
        // line 38
        $this->displayBlock('container', $context, $blocks);
        // line 47
        echo "            </div>
            <!-- /.container-fluid -->
        </div>
    ";
    }

    // line 38
    public function block_container($context, array $blocks = array())
    {
        // line 39
        echo "                <div class=\"row\">
                    <div class=\"col-lg-12\">
                        <h1 class=\"page-header\">Blank</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
                ";
    }

    // line 77
    public function block_scripts($context, array $blocks = array())
    {
    }

    public function getTemplateName()
    {
        return "blank.html.twig";
    }

    public function getDebugInfo()
    {
        return array (  147 => 77,  136 => 39,  133 => 38,  126 => 47,  124 => 38,  120 => 36,  117 => 35,  112 => 14,  107 => 12,  99 => 78,  97 => 77,  68 => 50,  66 => 35,  42 => 14,  39 => 13,  37 => 12,  24 => 1,);
    }
}

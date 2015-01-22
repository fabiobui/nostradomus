<?php

/* base.html.twig */
class __TwigTemplate_404a92da377f73bcae42bd0b76daaaa1a74779f8d31cbef94fd475c831d9c302 extends Twig_Template
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
        // line 11
        $this->displayBlock('meta', $context, $blocks);
        // line 12
        echo "
    <title>Nostradomus :: ";
        // line 13
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

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src=\"https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js\"></script>
        <script src=\"https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js\"></script>
    <![endif]-->

</head>

<body class=\"";
        // line 37
        echo twig_escape_filter($this->env, $this->env->getExtension('jswhetstone')->getPageClasses(), "html", null, true);
        echo "\">

<body>

    <div id=\"wrapper\">

    <!-- Navigation -->
    <nav class=\"navbar navbar-default navbar-static-top\" role=\"navigation\" style=\"margin-bottom: 0\">
        <div class=\"container\">
            <ul class=\"nav navbar-nav\">
                <li class=\"";
        // line 47
        echo $this->env->getExtension('jswhetstone')->getActiveClass("");
        echo "\"><a href=\"/\"><i class=\"fa fa-dashboard fa-fw fa-2x\"></i> Dashboard</a></li>
                <li class=\"";
        // line 48
        echo $this->env->getExtension('jswhetstone')->getActiveClass("/sensors");
        echo "\"><a href=\"/sensors\"><i class=\"fa fa-tasks fa-fw fa-2x\"></i> Sensors</a></li> 
                  <li class=\"";
        // line 49
        echo $this->env->getExtension('jswhetstone')->getActiveClass("/logs");
        echo "\"><a href=\"/logs\"><i class=\"fa fa-table fa-fw fa-2x\"></i> Logs</a></li>                  
                <!-- /.dropdown -->
            </ul>
            <ul class=\"nav navbar-top-links navbar-right\">    
                <li class=\"dropdown\">
                    <a class=\"dropdown-toggle\" data-toggle=\"dropdown\" href=\"#\">
                        <i class=\"fa fa-user fa-fw fa-2x\"></i>  <i class=\"fa fa-caret-down\"></i>
                    </a>
                    <ul class=\"dropdown-menu dropdown-user\">
                        <li><a href=\"/profile\"><i class=\"fa fa-user fa-fw\"></i> User Profile</a>
                        </li>
                        <li><a href=\"/settings\"><i class=\"fa fa-gear fa-fw\"></i> Settings</a>
                        </li>
                        <li class=\"divider\"></li>
                        <li><a href=\"/logout\"><i class=\"fa fa-sign-out fa-fw\"></i> Logout</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
            </ul>
            <!-- /.navbar-top-links -->

            <!-- /.navbar-static-side -->
        </div>
    </nav>

    <!-- Page Content -->
    <div id=\"page-wrapper\">    
    ";
        // line 77
        $this->displayBlock('content', $context, $blocks);
        // line 92
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
        // line 119
        $this->displayBlock('scripts', $context, $blocks);
        // line 120
        echo "</body>
</html>
";
    }

    // line 11
    public function block_meta($context, array $blocks = array())
    {
    }

    // line 13
    public function block_title($context, array $blocks = array())
    {
    }

    // line 77
    public function block_content($context, array $blocks = array())
    {
        // line 78
        echo "        <div class=\"container\">
            <div class=\"container-fluid\">
                ";
        // line 80
        $this->displayBlock('container', $context, $blocks);
        // line 89
        echo "            </div>
            <!-- /.container-fluid -->
        </div>
    ";
    }

    // line 80
    public function block_container($context, array $blocks = array())
    {
        // line 81
        echo "                <div class=\"row\">
                    <div class=\"col-lg-12\">
                        <h1 class=\"page-header\">Blank</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
                ";
    }

    // line 119
    public function block_scripts($context, array $blocks = array())
    {
    }

    public function getTemplateName()
    {
        return "base.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  199 => 119,  188 => 81,  185 => 80,  178 => 89,  176 => 80,  172 => 78,  169 => 77,  164 => 13,  159 => 11,  153 => 120,  151 => 119,  122 => 92,  120 => 77,  89 => 49,  85 => 48,  81 => 47,  68 => 37,  41 => 13,  38 => 12,  36 => 11,  24 => 1,);
    }
}

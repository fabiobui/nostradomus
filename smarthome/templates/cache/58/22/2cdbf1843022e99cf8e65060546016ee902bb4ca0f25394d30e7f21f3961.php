<?php

/* index.html.twig */
class __TwigTemplate_58222cdbf1843022e99cf8e65060546016ee902bb4ca0f25394d30e7f21f3961 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        try {
            $this->parent = $this->env->loadTemplate("base.html.twig");
        } catch (Twig_Error_Loader $e) {
            $e->setTemplateFile($this->getTemplateName());
            $e->setTemplateLine(1);

            throw $e;
        }

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'container' => array($this, 'block_container'),
            'scripts' => array($this, 'block_scripts'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "base.html.twig";
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
   <!-- /.main row -->
    <div class=\"row\">
    <!-- /.panel-external info -->     
        <div class=\"col-lg-8\">
            <div class=\"panel panel-default\">
                <div class=\"panel-heading\">
                    <i class=\"fa fa-external-link fa-fw\"></i> External info
                </div>
                <div class=\"panel-body\">
                </div>
            </div>
            <div class=\"panel panel-default\">
              <div class=\"panel-heading\">
                  <i class=\"fa fa-home fa-fw\"></i> Internal info
              </div>
              <div class=\"panel-body\">
                <div class=\"panel panel-info\">
                  <div class=\"panel-heading\">
                      <i class=\"fa fa-arrows-v fa-fw\"></i> Temperature
                  </div>
                  <div class=\"panel-body\">
                     <div class=\"row\"> 
                         <div class=\"col-lg-3 col-md-6\">
                             <div class=\"panel panel-primary\">
                                 <div class=\"panel-heading text-center\">
                                     <div class=\"huge\">18°</div>
                                     <div>Min</div>
                                 </div>
                             </div>
                         </div>
                         <div class=\"col-lg-3 col-md-6\">
                             <div class=\"panel panel-green\">
                                 <div class=\"panel-heading text-center\">
                                     <div class=\"huge\" id=\"temp_in\">&nbsp;</div>
                                     <div>Actual</div>
                                 </div>
                             </div>
                         </div>
                         <div class=\"col-lg-3 col-md-6\">
                             <div class=\"panel panel-red\">
                                 <div class=\"panel-heading text-center\">
                                     <div class=\"huge\">22°</div>
                                     <div>Max</div>
                                 </div>
                             </div>
                         </div>
                     </div>   
                 </div>
                </div>
            </div>
            </div>                        
          </div>
    <!-- /.system info panel -->
        <div class=\"col-lg-4\">
            <div class=\"panel panel-default\">
                <div class=\"panel-heading\">
                    <i class=\"fa fa-cog fa-fw\"></i> System Info
                </div>
                <div class=\"panel-body\">
                    <div class=\"form-group\">
                        <label>Server IP</label>
                        <input type=\"text\" class=\"form-control\" placeholder=\"IP address\" name=\"ip_num\" id=\"ip_num\" value=\"";
        // line 66
        echo twig_escape_filter($this->env, (isset($context["ip_server"]) ? $context["ip_server"] : null), "html", null, true);
        echo "\">
                    </div>    
                    <button id=\"loadArduino\" type=\"button\" class=\"btn btn-success\">
                    <i class=\"fa fa-refresh fa-fw\"></i> Refresh        
                    </button>
                </div>
            </div>       
    <!-- /.notification panel -->
            <div class=\"panel panel-default\">
              <div class=\"panel-heading\">
                   <i class=\"fa fa-bell fa-fw\"></i> Notifications Panel
               </div>
               <div class=\"panel-body\">
                    <div class=\"list-group\">
                        <div id=\"loading\"></div>
                        <div id=\"system_info\"></div>
                    </div>
               </div>
            </div>     
    </div>  
  <!-- /.main row -->
</section>
";
    }

    // line 89
    public function block_scripts($context, array $blocks = array())
    {
        // line 90
        echo "   <script type=\"text/javascript\">
     getArduino();
   </script>
";
    }

    public function getTemplateName()
    {
        return "index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  141 => 90,  138 => 89,  111 => 66,  47 => 4,  44 => 3,  38 => 2,  11 => 1,);
    }
}

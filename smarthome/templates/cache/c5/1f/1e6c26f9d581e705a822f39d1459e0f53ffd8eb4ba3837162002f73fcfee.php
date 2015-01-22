<?php

/* sensors.html.twig */
class __TwigTemplate_c51f1e6c26f9d581e705a822f39d1459e0f53ffd8eb4ba3837162002f73fcfee extends Twig_Template
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
                    <i class=\"fa fa-home fa-fw\"></i> Internal sensors
                </div>
                <div class=\"panel-body\">
                    <div class=\"row show-grid\">
                        <div class=\"col-lg-6\">Main switch</div>
                        <div class=\"col-lg-6\">
                            <input name=\"sw-main\" type=\"checkbox\" checked data-indeterminate=\"true\">
                        </div>
                    </div>                   
                    <div class=\"panel panel-info\">
                        <div class=\"panel-heading\">
                            <i class=\"fa fa-arrows-v fa-fw\"></i>  Heater
                        </div>
                    <div id=\"collapseOne\" class=\"panel-collapse collapse in\">
                      <div class=\"panel-body\"> 
                      <div class=\"row\">
                        <div class=\"col-lg-8\">                   
                          <div class=\"row show-grid\">
                        <div class=\"col-lg-6\">Fan switch</div>
                        <div class=\"col-lg-6\">
                            <input name=\"sw-fan\" type=\"checkbox\" checked data-indeterminate=\"true\">
                        </div>
                          </div>
                          <div class=\"row show-grid\">
                        <div class=\"col-lg-6\">Season switch</div>
                        <div class=\"col-lg-6\">
                            <input name=\"sw-season\" type=\"checkbox\" data-label-text=\"Summer\" checked data-indeterminate=\"true\">
                        </div>
                          </div>
                          <div class=\"row show-grid\">
                        <div class=\"col-lg-4\">
                            <div class=\"form-group\">
                                <label>T. Min.</label>
                                <input type=\"text\" class=\"form-control\" placeholder=\"Min\" name=\"t_min\" id=\"t_min\">
                            </div>
                        </div>
                        <div class=\"col-lg-4\">
                            <div class=\"form-group\">
                                <label>T. Max.</label>
                                <input type=\"text\" class=\"form-control\" placeholder=\"Max\" name=\"t_max\" id=\"t_max\">
                            </div>
                        </div>
                        <div class=\"col-lg-4\">
                            <div class=\"form-group\">
                               <br>
                               <button id=\"setTemp\" type=\"button\" class=\"btn btn-success\">
                               <i class=\"fa fa-wrench fa-fw\"></i> Set        
                               </button>
                            </div>
                        </div>                        
                        </div>
                        </div>  
                        <div class=\"col-lg-4\">
                            <div class=\"panel panel-green\">
                               <div class=\"text-center\"><h4>Temperature</h4></div>
                               <div class=\"panel-heading text-center\">
                                   <div class=\"huge\" id=\"temp_in\">&nbsp;</div>
                                   <div>Actual</div>
                               </div>
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
        // line 88
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

    // line 111
    public function block_scripts($context, array $blocks = array())
    {
        // line 112
        echo "   <script type=\"text/javascript\">
     getArduino();
   </script>
";
    }

    public function getTemplateName()
    {
        return "sensors.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  163 => 112,  160 => 111,  133 => 88,  47 => 4,  44 => 3,  38 => 2,  11 => 1,);
    }
}

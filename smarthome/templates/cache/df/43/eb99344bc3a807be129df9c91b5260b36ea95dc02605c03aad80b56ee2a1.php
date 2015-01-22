<?php

/* example_container.html.twig */
class __TwigTemplate_df43eb99344bc3a807be129df9c91b5260b36ea95dc02605c03aad80b56ee2a1 extends Twig_Template
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
        echo "Container Example";
    }

    // line 3
    public function block_container($context, array $blocks = array())
    {
        // line 4
        echo "    <section>
        <h1>Container Example</h1>
        <div class=\"well\">
            <p>
                This page implements the <code>";
        // line 8
        echo "{% block container %}";
        echo "</code> block.<br>
                All Sections Implemented in this block will be wrapped in a single
                <code>&lt;div class=\"container\"&gt;</code> element.
            </p>
        </div>
    </section>
    <section>
        <h2>Another Section</h2>
        <div class=\"well\">
            <p>Notice how both of these sections are contained within the <code>&lt;div class=\"container\"&gt;</code>
                element. Nothing will overflow.
            </p>
        </div>
    </section>
";
    }

    public function getTemplateName()
    {
        return "example_container.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  52 => 8,  46 => 4,  43 => 3,  37 => 2,  11 => 1,);
    }
}

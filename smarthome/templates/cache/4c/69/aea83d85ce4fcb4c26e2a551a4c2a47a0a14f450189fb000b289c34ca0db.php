<?php

/* example_content.html.twig */
class __TwigTemplate_4c69aea83d85ce4fcb4c26e2a551a4c2a47a0a14f450189fb000b289c34ca0db extends Twig_Template
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
            'content' => array($this, 'block_content'),
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
        echo "Content Example";
    }

    // line 3
    public function block_content($context, array $blocks = array())
    {
        // line 4
        echo "    <section>
        <div class=\"container\">
            <h1>Content Example</h1>
            <div class=\"well\">
                <p>
                    This page implements the <code>";
        // line 9
        echo "{% block content %}";
        echo "</code> block.<br>
                    Each Area of the page which you would like to keep within the container width must be wrapped in
                    it's own <code>&lt;div class=\"container\"&gt;</code> element.
                </p>
            </div>
        </div>
    </section>
    <section>
        <h2>Another Section</h2>
        <div class=\"well\">
            <p>
                Notice how this section will stretch out to the edge of the screen, it is not constrained to the
                container width because it does not have a <code>&lt;div class=\"container\"&gt;</code> wrapper element.
            </p>
        </div>
    </section>
";
    }

    public function getTemplateName()
    {
        return "example_content.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  53 => 9,  46 => 4,  43 => 3,  37 => 2,  11 => 1,);
    }
}

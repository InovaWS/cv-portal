<?php

/* 404.twig */
class __TwigTemplate_37fca1abcb40ec0957985cd3bbfba61a extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("base.twig");

        $this->blocks = array(
            'styles' => array($this, 'block_styles'),
            'conteudo' => array($this, 'block_conteudo'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "base.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 3
        $context["pagina"] = array("titulo" => "Página não encontrada", "css_route" => "page");
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 8
    public function block_styles($context, array $blocks = array())
    {
        // line 9
        echo "<style>
#goog-fixurl ul {
    list-style: none;
    padding: 0;
    margin: 0;
}

#goog-fixurl form {
    margin: 0;
}

#goog-wm-qt,
#goog-wm-sb {
    border: 1px solid #bbb;
    font-size: 16px;
    line-height: normal;
    vertical-align: top;
    color: #444;
    border-radius: 2px;
}

#goog-wm-qt {
    width: 220px;
    height: 20px;
    padding: 5px;
    margin: 5px 10px 0 0;
    box-shadow: inset 0 1px 1px #ccc;
}

#goog-wm-sb {
    display: inline-block;
    height: 32px;
    padding: 0 10px;
    margin: 5px 0 0;
    white-space: nowrap;
    cursor: pointer;
    background-color: #f5f5f5;
    background-image: -webkit-linear-gradient(rgba(255,255,255,0), #f1f1f1);
    background-image: -moz-linear-gradient(rgba(255,255,255,0), #f1f1f1);
    background-image: -ms-linear-gradient(rgba(255,255,255,0), #f1f1f1);
    background-image: -o-linear-gradient(rgba(255,255,255,0), #f1f1f1);
    -webkit-appearance: none;
    -moz-appearance: none;
    appearance: none;
    *overflow: visible;
    *display: inline;
    *zoom: 1;
}

#goog-wm-sb:hover,
#goog-wm-sb:focus {
    border-color: #aaa;
    box-shadow: 0 1px 1px rgba(0, 0, 0, 0.1);
    background-color: #f8f8f8;
}

#goog-wm-qt:hover,
#goog-wm-qt:focus {
    border-color: #105cb6;
    outline: 0;
    color: #222;
}

input::-moz-focus-inner {
    padding: 0;
    border: 0;
}
</style>
";
    }

    // line 79
    public function block_conteudo($context, array $blocks = array())
    {
        // line 80
        echo "<h1>Página não encontrada</h1>
<div class=\"row-fluid\">
\t<div class=\"span6\">
\t\t<p>Lamentamos, mas a página que você está tentando visualizar não existe.</p>
\t\t<p>Parece que isto pode ser o resultado de:</p>
\t\t<ul>
\t\t    <li>um endereço digitado incorretamente</li>
\t\t    <li>um link desatualizado</li>
\t\t</ul>
\t</div>
\t<div class=\"span6\">
\t\t<script>
\t\t    var GOOG_FIXURL_LANG = (navigator.language || '').slice(0,2),GOOG_FIXURL_SITE = location.host;
\t\t</script>
\t\t";
        // line 95
        echo "\t</div>
</div>
";
    }

    public function getTemplateName()
    {
        return "404.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  125 => 95,  109 => 80,  106 => 79,  34 => 9,  31 => 8,  26 => 3,);
    }
}

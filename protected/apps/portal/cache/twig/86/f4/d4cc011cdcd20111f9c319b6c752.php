<?php

/* base.twig */
class __TwigTemplate_86f4d4cc011cdcd20111f9c319b6c752 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'conteudo' => array($this, 'block_conteudo'),
            'scripts' => array($this, 'block_scripts'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<!DOCTYPE html>
<!--[if IE 6]><html class=\"no-js lt-ie9 lt-ie8 lt-ie7\"><![endif]-->
<!--[if IE 7]><html class=\"no-js lt-ie9 lt-ie8\"><![endif]-->
<!--[if IE 8]><html class=\"no-js lt-ie9\"><![endif]-->
<!--[if gt IE 8]><!--><html class=\"no-js\"><!--<![endif]-->
<head>
\t<meta charset=\"utf-8\">
\t<meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge,chrome=1\">
\t<meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">
\t
\t<!--[if lt IE 9]>
\t";
        // line 13
        echo "\t<![endif]-->
\t
\t";
        // line 15
        if (isset($context["pagina"])) { $_pagina_ = $context["pagina"]; } else { $_pagina_ = null; }
        if ($this->getAttribute($_pagina_, "titulo", array(), "any", true, true)) {
            // line 16
            echo "\t<title>";
            if (isset($context["pagina"])) { $_pagina_ = $context["pagina"]; } else { $_pagina_ = null; }
            echo twig_escape_filter($this->env, $this->getAttribute($_pagina_, "titulo"), "html", null, true);
            echo " &ndash; Portal Central do Veículo</title>
\t";
        } else {
            // line 18
            echo "\t<title>Portal Central do Veículo</title>
\t";
        }
        // line 20
        echo "\t
\t";
        // line 21
        if (isset($context["pagina"])) { $_pagina_ = $context["pagina"]; } else { $_pagina_ = null; }
        if ($this->getAttribute($_pagina_, "descricao", array(), "any", true, true)) {
            // line 22
            echo "\t<meta name=\"description\" content=\"";
            if (isset($context["pagina"])) { $_pagina_ = $context["pagina"]; } else { $_pagina_ = null; }
            echo twig_escape_filter($this->env, $this->getAttribute($_pagina_, "descricao"), "html", null, true);
            echo "\">
\t";
        }
        // line 24
        echo "\t
\t";
        // line 26
        echo "\t<link href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('Rio\Twig\TwigExtension')->url("/vendor/bootstrap/css/bootstrap.css"), "html", null, true);
        echo "\" rel=\"stylesheet\" type=\"text/css\" charset=\"utf-8\">
\t<link href=\"";
        // line 27
        echo twig_escape_filter($this->env, $this->env->getExtension('Rio\Twig\TwigExtension')->url("/vendor/bootstrap/css/bootstrap-responsive.css"), "html", null, true);
        echo "\" rel=\"stylesheet\" type=\"text/css\" charset=\"utf-8\">
\t<link href=\"";
        // line 28
        echo twig_escape_filter($this->env, $this->env->getExtension('Rio\Twig\TwigExtension')->url("/vendor/jquery-ui/jquery-ui-1.8.18.custom.css"), "html", null, true);
        echo "\" rel=\"stylesheet\" type=\"text/css\" charset=\"utf-8\">
\t<link href=\"";
        // line 29
        echo twig_escape_filter($this->env, $this->env->getExtension('Rio\Twig\TwigExtension')->url("/vendor/prettyGallery/prettyGallery.css"), "html", null, true);
        echo "\" rel=\"stylesheet\" type=\"text/css\" charset=\"utf-8\">
\t<link href=\"";
        // line 30
        echo twig_escape_filter($this->env, $this->env->getExtension('Rio\Twig\TwigExtension')->url("/css/portal.css"), "html", null, true);
        echo "\" rel=\"stylesheet\" type=\"text/css\" charset=\"utf-8\">
</head>

<body id=\"main-body\">
\t<div id=\"body-wrapper\">
\t\t<header id=\"main-header\">
\t\t\t<div class=\"logo-and-menu-row\">
\t\t\t\t<div class=\"container\">
\t\t\t\t\t<h1 class=\"logo-place\">
\t\t\t\t\t\t<a id=\"logo\" href=\"";
        // line 39
        echo twig_escape_filter($this->env, $this->env->getExtension('Rio\Twig\TwigExtension')->url("/"), "html", null, true);
        echo "\" title=\"Ir para a página inicial\">Central do Veículo</a>
\t\t\t\t\t</h1>
\t\t\t\t\t
\t\t\t\t\t<div id=\"navbar\">
\t\t\t\t\t\t<div class=\"links pull-left\">
\t\t\t\t\t\t\t<ul>
\t\t\t\t\t\t\t\t<li><a href=\"";
        // line 45
        echo twig_escape_filter($this->env, $this->env->getExtension('Rio\Twig\TwigExtension')->url("/"), "html", null, true);
        echo "\" title=\"Ir para a página inicial\">Home</a></li>
\t\t\t\t\t\t\t\t<li><a href=\"";
        // line 46
        echo twig_escape_filter($this->env, $this->env->getExtension('Rio\Twig\TwigExtension')->url("/noticias"), "html", null, true);
        echo "\" title=\"Ver as notícias\">Notícias</a></li>
\t\t\t\t\t\t\t\t<li><a href=\"";
        // line 47
        echo twig_escape_filter($this->env, $this->env->getExtension('Rio\Twig\TwigExtension')->url("/anuncie"), "html", null, true);
        echo "\" title=\"Veja os motivos para anunciar conosco\">Anuncie</a></li>
\t\t\t\t\t\t\t\t";
        // line 48
        if (isset($context["usuario_logado"])) { $_usuario_logado_ = $context["usuario_logado"]; } else { $_usuario_logado_ = null; }
        if ($_usuario_logado_) {
            // line 49
            echo "\t\t\t\t\t\t\t\t<li><a href=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('Rio\Twig\TwigExtension')->url("/logout"), "html", null, true);
            echo "\" title=\"Encerrar a sua sessão de login\">Sair</a></li>
\t\t\t\t\t\t\t\t";
        } else {
            // line 51
            echo "\t\t\t\t\t\t\t\t<li><a href=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('Rio\Twig\TwigExtension')->url("/login"), "html", null, true);
            echo "\" title=\"Entre no nosso sistema para anunciar\">Entrar</a></li>
\t\t\t\t\t\t\t\t";
        }
        // line 53
        echo "\t\t\t\t\t\t\t</ul>
\t\t\t\t\t\t</div>
\t\t\t\t\t\t
\t\t\t\t\t\t<div class=\"social-media pull-right\">
\t\t\t\t\t\t\t<span class=\"text\">Estamos também aqui:</span>
\t\t\t\t\t\t\t<a href=\"http://facebook.com/portalcv\" title=\"Página da Central do Veículo no Facebook\" target=\"_blank\"><img src=\"";
        // line 58
        echo twig_escape_filter($this->env, $this->env->getExtension('Rio\Twig\TwigExtension')->url("/img/redes/facebook-icon.png"), "html", null, true);
        echo "\" alt=\"Facebook\"></a>
\t\t\t\t\t\t\t<a href=\"http://twitter.com/portalcv\" title=\"Perfil da Central do Veículo no Twitter\" target=\"_blank\"><img src=\"";
        // line 59
        echo twig_escape_filter($this->env, $this->env->getExtension('Rio\Twig\TwigExtension')->url("/img/redes/twitter-icon.png"), "html", null, true);
        echo "\" alt=\"Twitter\"></a>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t</div>
\t\t\t</div>
\t\t\t
\t\t\t<div class=\"second-row\">
\t\t\t\t
\t\t\t</div>
\t\t</header>
\t\t
\t\t<div id=\"main-content\">
\t\t\t<div";
        // line 71
        if (isset($context["pagina"])) { $_pagina_ = $context["pagina"]; } else { $_pagina_ = null; }
        if ($this->getAttribute($_pagina_, "css_route", array(), "any", true, true)) {
            echo " id=\"";
            if (isset($context["pagina"])) { $_pagina_ = $context["pagina"]; } else { $_pagina_ = null; }
            echo twig_escape_filter($this->env, $this->getAttribute($_pagina_, "css_route"), "html", null, true);
            echo "\"";
        }
        echo " class=\"container\">
\t\t\t\t";
        // line 72
        $this->displayBlock('conteudo', $context, $blocks);
        // line 73
        echo "\t\t\t</div>
\t\t</div>
\t</div>
\t
\t<footer id=\"main-footer\">
\t\t<div class=\"container\">
\t\t\t<div class=\"row-fluid\">
\t\t\t\t<div class=\"span4\">
\t\t\t\t\t<ul class=\"footer-menu\">
\t\t\t\t\t\t<li><a href=\"";
        // line 82
        echo twig_escape_filter($this->env, $this->env->getExtension('Rio\Twig\TwigExtension')->url("/"), "html", null, true);
        echo "\">Home</a></li>
\t\t\t\t\t\t<li><a href=\"#\">Notícias</a></li>
\t\t\t\t\t\t<li><a href=\"#\">Anuncie</a></li>
\t\t\t\t\t\t<li><a href=\"#\">Entrar</a></li>
\t\t\t\t\t\t<li><a href=\"#\">Facebook</a></li>
\t\t\t\t\t\t<li><a href=\"#\">Twitter</a></li>
\t\t\t\t\t\t<li><a href=\"#\">Google+</a></li>
\t\t\t\t\t</ul>
\t\t\t\t</div>
\t\t\t\t
\t\t\t\t<div class=\"span8\">
\t\t\t\t\t<div class=\"footer-noticias\">
\t\t\t\t\t\t<h4>Últimas notícias</h4>
\t\t\t\t\t\t
\t\t\t\t\t\t<div class=\"row-fluid\">
\t\t\t\t\t\t\t<div class=\"span6\">
\t\t\t\t\t\t\t\t<ul>
\t\t\t\t\t\t\t\t\t";
        // line 99
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable(range(1, 4));
        foreach ($context['_seq'] as $context["_key"] => $context["i"]) {
            // line 100
            echo "\t\t\t\t\t\t\t\t\t<li>
\t\t\t\t\t\t\t\t\t\t<img data-src=\"//placehold.it/32x32\" class=\"imagem\">
\t\t\t\t\t\t\t\t\t\t<a href=\"#\">Título da notícia aqui, resumido.</a>
\t\t\t\t\t\t\t\t\t</li>
\t\t\t\t\t\t\t\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['i'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        // line 105
        echo "\t\t\t\t\t\t\t\t</ul>
\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t
\t\t\t\t\t\t\t<div class=\"span6\">
\t\t\t\t\t\t\t\t<ul>
\t\t\t\t\t\t\t\t\t";
        // line 112
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable(range(1, 4));
        foreach ($context['_seq'] as $context["_key"] => $context["i"]) {
            // line 113
            echo "\t\t\t\t\t\t\t\t\t<li>
\t\t\t\t\t\t\t\t\t\t<img data-src=\"//placehold.it/32x32\" class=\"imagem\">
\t\t\t\t\t\t\t\t\t\t<a href=\"#\">Título da notícia aqui, resumido</a>
\t\t\t\t\t\t\t\t\t</li>
\t\t\t\t\t\t\t\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['i'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        // line 118
        echo "\t\t\t\t\t\t\t\t</ul>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t</div>
\t\t\t</div>
\t\t</div>
\t\t
\t\t<div class=\"footer-copyright\">
\t\t\t<div class=\"container\">
\t\t\t\t<div class=\"clearfix\">
\t\t\t\t\t<div class=\"pull-left\">Copyright © 2013 Central do Veículo. Todos os direitos reservados.</div>
\t\t\t\t\t<div class=\"pull-right\">
\t\t\t\t\t\tPortal
\t\t\t\t\t\t<a href=\"http://www.centraldoveiculo.com.br/\" title=\"Central do Veículo\">centraldoveiculo.com.br</a> &mdash;
\t\t\t\t\t\tUm produto
\t\t\t\t\t\t<a href=\"http://www.inovaws.com.br/\" title=\"Inova Websites\" target=\"_blank\">inovaws.com.br</a>
\t\t\t\t\t</div>
\t\t\t\t</div>
\t\t\t</div>
\t\t</div>
\t</footer>
\t
\t<script src=\"";
        // line 141
        echo twig_escape_filter($this->env, $this->env->getExtension('Rio\Twig\TwigExtension')->url("/vendor/modernizr-2.6.2.min.js"), "html", null, true);
        echo "\"></script>
\t<script src=\"";
        // line 142
        echo twig_escape_filter($this->env, $this->env->getExtension('Rio\Twig\TwigExtension')->url("/vendor/jquery-1.9.1.min.js"), "html", null, true);
        echo "\"></script>
\t<script src=\"";
        // line 143
        echo twig_escape_filter($this->env, $this->env->getExtension('Rio\Twig\TwigExtension')->url("/vendor/bootstrap/js/bootstrap.js"), "html", null, true);
        echo "\"></script>
\t<script src=\"";
        // line 144
        echo twig_escape_filter($this->env, $this->env->getExtension('Rio\Twig\TwigExtension')->url("/vendor/jquery-ui/jquery-ui-1.10.0.custom.min.js"), "html", null, true);
        echo "\"></script>
\t<script src=\"";
        // line 145
        echo twig_escape_filter($this->env, $this->env->getExtension('Rio\Twig\TwigExtension')->url("/vendor/jquery.maskedinput-1.2.2.js"), "html", null, true);
        echo "\"></script>
\t<script src=\"";
        // line 146
        echo twig_escape_filter($this->env, $this->env->getExtension('Rio\Twig\TwigExtension')->url("/vendor/prettyGallery/jquery.prettyGallery.js"), "html", null, true);
        echo "\"></script>
\t<script src=\"";
        // line 147
        echo twig_escape_filter($this->env, $this->env->getExtension('Rio\Twig\TwigExtension')->url("/js/plugins.js"), "html", null, true);
        echo "\"></script>
\t<script src=\"";
        // line 148
        echo twig_escape_filter($this->env, $this->env->getExtension('Rio\Twig\TwigExtension')->url("/js/routes.js"), "html", null, true);
        echo "\"></script>
\t<script src=\"";
        // line 149
        echo twig_escape_filter($this->env, $this->env->getExtension('Rio\Twig\TwigExtension')->url("/js/main.js"), "html", null, true);
        echo "\"></script>
\t<script src=\"";
        // line 150
        echo twig_escape_filter($this->env, $this->env->getExtension('Rio\Twig\TwigExtension')->url("/js/portal.js"), "html", null, true);
        echo "\"></script>
\t";
        // line 151
        $this->displayBlock('scripts', $context, $blocks);
        // line 152
        echo "\t";
        // line 160
        echo "</body>
</html>";
    }

    // line 72
    public function block_conteudo($context, array $blocks = array())
    {
    }

    // line 151
    public function block_scripts($context, array $blocks = array())
    {
    }

    public function getTemplateName()
    {
        return "base.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  318 => 151,  313 => 72,  308 => 160,  306 => 152,  304 => 151,  300 => 150,  296 => 149,  292 => 148,  288 => 147,  284 => 146,  280 => 145,  276 => 144,  272 => 143,  268 => 142,  264 => 141,  239 => 118,  229 => 113,  225 => 112,  216 => 105,  206 => 100,  202 => 99,  182 => 82,  171 => 73,  169 => 72,  159 => 71,  144 => 59,  140 => 58,  133 => 53,  127 => 51,  121 => 49,  114 => 47,  110 => 46,  106 => 45,  97 => 39,  81 => 29,  77 => 28,  73 => 27,  68 => 26,  65 => 24,  55 => 21,  52 => 20,  48 => 18,  41 => 16,  38 => 15,  34 => 13,  21 => 1,  142 => 58,  135 => 55,  128 => 52,  124 => 50,  118 => 48,  111 => 45,  104 => 42,  101 => 41,  95 => 39,  88 => 36,  85 => 30,  82 => 34,  76 => 32,  72 => 30,  69 => 29,  66 => 28,  58 => 22,  51 => 21,  44 => 18,  33 => 9,  30 => 8,  25 => 3,);
    }
}

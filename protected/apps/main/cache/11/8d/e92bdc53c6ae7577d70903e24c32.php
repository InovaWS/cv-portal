<?php

/* base.twig */
class __TwigTemplate_118de92bdc53c6ae7577d70903e24c32 extends Twig_Template
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
\t<script src=\"//html5shim.googlecode.com/svn/trunk/html5.js\"></script>
\t<script>
\tfor (var elems = 'header,footer'.split(','), elem; elem = elems.shift(); document.createElement(elem));
\t</script>
\t<![endif]-->
\t
\t";
        // line 18
        if (isset($context["pagina"])) { $_pagina_ = $context["pagina"]; } else { $_pagina_ = null; }
        if ($this->getAttribute($_pagina_, "titulo", array(), "any", true, true)) {
            // line 19
            echo "\t<title>";
            if (isset($context["pagina"])) { $_pagina_ = $context["pagina"]; } else { $_pagina_ = null; }
            echo twig_escape_filter($this->env, $this->getAttribute($_pagina_, "titulo"), "html", null, true);
            echo " &ndash; Portal Central do Veículo</title>
\t";
        } else {
            // line 21
            echo "\t<title>Portal Central do Veículo</title>
\t";
        }
        // line 23
        echo "\t
\t";
        // line 24
        if (isset($context["pagina"])) { $_pagina_ = $context["pagina"]; } else { $_pagina_ = null; }
        if ($this->getAttribute($_pagina_, "descricao", array(), "any", true, true)) {
            // line 25
            echo "\t<meta name=\"description\" content=\"";
            if (isset($context["pagina"])) { $_pagina_ = $context["pagina"]; } else { $_pagina_ = null; }
            echo twig_escape_filter($this->env, $this->getAttribute($_pagina_, "descricao"), "html", null, true);
            echo "\">
\t";
        }
        // line 27
        echo "\t
\t<link href=\"http://fonts.googleapis.com/css?family=Oxygen:400,700\" rel=\"stylesheet\" type=\"text/css\">
\t<link href=\"";
        // line 29
        echo twig_escape_filter($this->env, $this->env->getExtension('Rio\Slim\TwigExtension')->url((("/css/all." . twig_date_format_filter($this->env, "now", "Ymd")) . ".css")), "html", null, true);
        echo "\" rel=\"stylesheet\" type=\"text/css\" charset=\"utf-8\">
</head>

<body id=\"main-body\">
\t<header id=\"main-header\">
\t\t<div class=\"logo-and-menu-row\">
\t\t\t<div class=\"container\">
\t\t\t\t<h1 class=\"logo-place\">
\t\t\t\t\t<a id=\"logo\" href=\"";
        // line 37
        echo twig_escape_filter($this->env, $this->env->getExtension('Rio\Slim\TwigExtension')->url("/"), "html", null, true);
        echo "\" title=\"Ir para a página inicial\">Central do Veículo</a>
\t\t\t\t</h1>
\t\t\t\t
\t\t\t\t<div id=\"navbar\">
\t\t\t\t\t<div class=\"links pull-left\">
\t\t\t\t\t\t<ul>
\t\t\t\t\t\t\t<li><a href=\"";
        // line 43
        echo twig_escape_filter($this->env, $this->env->getExtension('Rio\Slim\TwigExtension')->url("/"), "html", null, true);
        echo "\" title=\"Ir para a página inicial\">Home</a></li>
\t\t\t\t\t\t\t<li><a href=\"";
        // line 44
        echo twig_escape_filter($this->env, $this->env->getExtension('Rio\Slim\TwigExtension')->url("/noticias"), "html", null, true);
        echo "\" title=\"Ver as notícias\">Notícias</a></li>
\t\t\t\t\t\t\t<li><a href=\"";
        // line 45
        echo twig_escape_filter($this->env, $this->env->getExtension('Rio\Slim\TwigExtension')->url("/anuncie"), "html", null, true);
        echo "\" title=\"Veja os motivos para anunciar conosco\">Anuncie</a></li>
\t\t\t\t\t\t\t";
        // line 46
        if (isset($context["usuario_logado"])) { $_usuario_logado_ = $context["usuario_logado"]; } else { $_usuario_logado_ = null; }
        if ($_usuario_logado_) {
            // line 47
            echo "\t\t\t\t\t\t\t<li><a href=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('Rio\Slim\TwigExtension')->url("/logout"), "html", null, true);
            echo "\" title=\"Encerrar a sua sessão de login\">Sair</a></li>
\t\t\t\t\t\t\t";
        } else {
            // line 49
            echo "\t\t\t\t\t\t\t<li><a href=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('Rio\Slim\TwigExtension')->url("/login"), "html", null, true);
            echo "\" title=\"Entre no nosso sistema para anunciar\">Entrar</a></li>
\t\t\t\t\t\t\t";
        }
        // line 51
        echo "\t\t\t\t\t\t</ul>
\t\t\t\t\t</div>
\t\t\t\t\t
\t\t\t\t\t<div class=\"social-media pull-right\">
\t\t\t\t\t\t<span class=\"text\">Estamos também aqui:</span>
\t\t\t\t\t\t<a href=\"http://facebook.com/portalcv\" title=\"Página da Central do Veículo no Facebook\" target=\"_blank\"><img src=\"";
        // line 56
        echo twig_escape_filter($this->env, $this->env->getExtension('Rio\Slim\TwigExtension')->url("/img/redes/facebook-icon.png"), "html", null, true);
        echo "\" alt=\"Facebook\"></a>
\t\t\t\t\t\t<a href=\"http://twitter.com/portalcv\" title=\"Perfil da Central do Veículo no Twitter\" target=\"_blank\"><img src=\"";
        // line 57
        echo twig_escape_filter($this->env, $this->env->getExtension('Rio\Slim\TwigExtension')->url("/img/redes/twitter-icon.png"), "html", null, true);
        echo "\" alt=\"Twitter\"></a>
\t\t\t\t\t</div>
\t\t\t\t</div>
\t\t\t</div>
\t\t</div>
\t\t
\t\t<div class=\"second-row\">
\t\t\t
\t\t</div>
\t</header>
\t
\t<div id=\"main-content\">
\t\t<div";
        // line 69
        if (isset($context["pagina"])) { $_pagina_ = $context["pagina"]; } else { $_pagina_ = null; }
        if ($this->getAttribute($_pagina_, "css_route", array(), "any", true, true)) {
            echo " id=\"";
            if (isset($context["pagina"])) { $_pagina_ = $context["pagina"]; } else { $_pagina_ = null; }
            echo twig_escape_filter($this->env, $this->getAttribute($_pagina_, "css_route"), "html", null, true);
            echo "\"";
        }
        echo " class=\"container\">
\t\t\t";
        // line 70
        $this->displayBlock('conteudo', $context, $blocks);
        // line 71
        echo "\t\t</div>
\t</div>
\t
\t<footer id=\"main-footer\">
\t\t<div class=\"container\">
\t\t\t<div class=\"clearfix\">
\t\t\t\t<ul class=\"footer-menu\">
\t\t\t\t\t<li><a href=\"";
        // line 78
        echo twig_escape_filter($this->env, $this->env->getExtension('Rio\Slim\TwigExtension')->url("/"), "html", null, true);
        echo "\">Home</a></li>
\t\t\t\t\t<li><a href=\"#\">Notícias</a></li>
\t\t\t\t\t<li><a href=\"#\">Anuncie</a></li>
\t\t\t\t\t<li><a href=\"#\">Entrar</a></li>
\t\t\t\t\t<li><a href=\"#\">Facebook</a></li>
\t\t\t\t\t<li><a href=\"#\">Twitter</a></li>
\t\t\t\t\t<li><a href=\"#\">Google+</a></li>
\t\t\t\t</ul>
\t\t
\t\t\t\t<div class=\"footer-noticias\">
\t\t\t\t\t<h4>Últimas notícias</h4>
\t\t
\t\t\t\t\t<div class=\"row-fluid\">
\t\t\t\t\t\t<div class=\"span6\">
\t\t\t\t\t\t\t<ul>
\t\t\t\t\t\t\t\t<li>
\t\t\t\t\t\t\t\t\t<div class=\"clearfix\">
\t\t\t\t\t\t\t\t\t\t<div class=\"imagem\"></div>
\t\t\t\t\t\t\t\t\t\t<div class=\"titulo\">
\t\t\t\t\t\t\t\t\t\t\t<a href=\"#\">Título da notícia aqui, resumido.</a>
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t</li>
\t\t\t\t\t\t\t\t<li>
\t\t\t\t\t\t\t\t\t<div class=\"clearfix\">
\t\t\t\t\t\t\t\t\t\t<div class=\"imagem\"></div>
\t\t\t\t\t\t\t\t\t\t<div class=\"titulo\">
\t\t\t\t\t\t\t\t\t\t\t<a href=\"#\">Título da notícia aqui, resumido.</a>
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t</li>
\t\t\t\t\t\t\t\t<li>
\t\t\t\t\t\t\t\t\t<div class=\"clearfix\">
\t\t\t\t\t\t\t\t\t\t<div class=\"imagem\"></div>
\t\t\t\t\t\t\t\t\t\t<div class=\"titulo\">
\t\t\t\t\t\t\t\t\t\t\t<a href=\"#\">Título da notícia aqui, resumido.</a>
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t</li>
\t\t\t\t\t\t\t\t<li>
\t\t\t\t\t\t\t\t\t<div class=\"clearfix\">
\t\t\t\t\t\t\t\t\t\t<div class=\"imagem\"></div>
\t\t\t\t\t\t\t\t\t\t<div class=\"titulo\">
\t\t\t\t\t\t\t\t\t\t\t<a href=\"#\">Título da notícia aqui, resumido.</a>
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t</li>
\t\t\t\t\t\t\t</ul>
\t\t\t\t\t\t</div>
\t\t\t\t\t\t<div class=\"span6\">
\t\t\t\t\t\t\t<ul>
\t\t\t\t\t\t\t\t<li>
\t\t\t\t\t\t\t\t\t<div class=\"clearfix\">
\t\t\t\t\t\t\t\t\t\t<div class=\"imagem\"></div>
\t\t\t\t\t\t\t\t\t\t<div class=\"titulo\">
\t\t\t\t\t\t\t\t\t\t\t<a href=\"#\">Título da notícia aqui, resumido.</a>
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t</li>
\t\t\t\t\t\t\t\t<li>
\t\t\t\t\t\t\t\t\t<div class=\"clearfix\">
\t\t\t\t\t\t\t\t\t\t<div class=\"imagem\"></div>
\t\t\t\t\t\t\t\t\t\t<div class=\"titulo\">
\t\t\t\t\t\t\t\t\t\t\t<a href=\"#\">Título da notícia aqui, resumido.</a>
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t</li>
\t\t\t\t\t\t\t\t<li>
\t\t\t\t\t\t\t\t\t<div class=\"clearfix\">
\t\t\t\t\t\t\t\t\t\t<div class=\"imagem\"></div>
\t\t\t\t\t\t\t\t\t\t<div class=\"titulo\">
\t\t\t\t\t\t\t\t\t\t\t<a href=\"#\">Título da notícia aqui, resumido.</a>
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t</li>
\t\t\t\t\t\t\t\t<li>
\t\t\t\t\t\t\t\t\t<div class=\"clearfix\">
\t\t\t\t\t\t\t\t\t\t<div class=\"imagem\"></div>
\t\t\t\t\t\t\t\t\t\t<div class=\"titulo\">
\t\t\t\t\t\t\t\t\t\t\t<a href=\"#\">Título da notícia aqui, resumido.</a>
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t</li>
\t\t\t\t\t\t\t</ul>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t</div>
\t\t\t</div>
\t\t
\t\t\t<div class=\"footer-copyright\">
\t\t\t\t<div class=\"clearfix\">
\t\t\t\t\t<div class=\"pull-left muted\">Copyright © 2013 Central do Veículo. Todos os direitos reservados.</div>
\t\t\t\t\t<div class=\"pull-right muted\">
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
        // line 181
        echo twig_escape_filter($this->env, $this->env->getExtension('Rio\Slim\TwigExtension')->url((("/js/all." . twig_date_format_filter($this->env, "now", "Ymd")) . ".js")), "html", null, true);
        echo "\"></script>
\t";
        // line 182
        $this->displayBlock('scripts', $context, $blocks);
        // line 183
        echo "\t";
        // line 184
        echo "</body>
</html>";
    }

    // line 70
    public function block_conteudo($context, array $blocks = array())
    {
    }

    // line 182
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
        return array (  289 => 182,  284 => 70,  279 => 184,  277 => 183,  275 => 182,  271 => 181,  165 => 78,  156 => 71,  154 => 70,  144 => 69,  129 => 57,  125 => 56,  118 => 51,  112 => 49,  106 => 47,  103 => 46,  99 => 45,  95 => 44,  91 => 43,  82 => 37,  71 => 29,  67 => 27,  60 => 25,  57 => 24,  54 => 23,  50 => 21,  43 => 19,  40 => 18,  21 => 1,);
    }
}

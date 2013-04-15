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
        echo twig_escape_filter($this->env, $this->env->getExtension('Rio\Slim\TwigExtension')->url("/vendor/bootstrap/css/bootstrap.css"), "html", null, true);
        echo "\" rel=\"stylesheet\" type=\"text/css\" charset=\"utf-8\">
\t<link href=\"";
        // line 27
        echo twig_escape_filter($this->env, $this->env->getExtension('Rio\Slim\TwigExtension')->url("/vendor/bootstrap/css/bootstrap-responsive.css"), "html", null, true);
        echo "\" rel=\"stylesheet\" type=\"text/css\" charset=\"utf-8\">
\t<link href=\"";
        // line 28
        echo twig_escape_filter($this->env, $this->env->getExtension('Rio\Slim\TwigExtension')->url("/vendor/jquery-ui/jquery-ui-1.8.18.custom.css"), "html", null, true);
        echo "\" rel=\"stylesheet\" type=\"text/css\" charset=\"utf-8\">
\t<link href=\"";
        // line 29
        echo twig_escape_filter($this->env, $this->env->getExtension('Rio\Slim\TwigExtension')->url("/vendor/jquery-ui/jquery-ui-1.8.18.custom.css"), "html", null, true);
        echo "\" rel=\"stylesheet\" type=\"text/css\" charset=\"utf-8\">
\t<link href=\"";
        // line 30
        echo twig_escape_filter($this->env, $this->env->getExtension('Rio\Slim\TwigExtension')->url("/css/portal.css"), "html", null, true);
        echo "\" rel=\"stylesheet\" type=\"text/css\" charset=\"utf-8\">
</head>

<body id=\"main-body\">
\t";
        // line 34
        if (isset($context["usuario_logado"])) { $_usuario_logado_ = $context["usuario_logado"]; } else { $_usuario_logado_ = null; }
        echo twig_escape_filter($this->env, $_usuario_logado_, "html", null, true);
        echo "
\t<header id=\"main-header\">
\t\t<div class=\"logo-and-menu-row\">
\t\t\t<div class=\"container\">
\t\t\t\t<h1 class=\"logo-place\">
\t\t\t\t\t<a id=\"logo\" href=\"";
        // line 39
        echo twig_escape_filter($this->env, $this->env->getExtension('Rio\Slim\TwigExtension')->url("/"), "html", null, true);
        echo "\" title=\"Ir para a página inicial\">Central do Veículo</a>
\t\t\t\t</h1>
\t\t\t\t
\t\t\t\t<div id=\"navbar\">
\t\t\t\t\t<div class=\"links pull-left\">
\t\t\t\t\t\t<ul>
\t\t\t\t\t\t\t<li><a href=\"";
        // line 45
        echo twig_escape_filter($this->env, $this->env->getExtension('Rio\Slim\TwigExtension')->url("/"), "html", null, true);
        echo "\" title=\"Ir para a página inicial\">Home</a></li>
\t\t\t\t\t\t\t<li><a href=\"";
        // line 46
        echo twig_escape_filter($this->env, $this->env->getExtension('Rio\Slim\TwigExtension')->url("/noticias"), "html", null, true);
        echo "\" title=\"Ver as notícias\">Notícias</a></li>
\t\t\t\t\t\t\t<li><a href=\"";
        // line 47
        echo twig_escape_filter($this->env, $this->env->getExtension('Rio\Slim\TwigExtension')->url("/anuncie"), "html", null, true);
        echo "\" title=\"Veja os motivos para anunciar conosco\">Anuncie</a></li>
\t\t\t\t\t\t\t";
        // line 48
        if (isset($context["usuario_logado"])) { $_usuario_logado_ = $context["usuario_logado"]; } else { $_usuario_logado_ = null; }
        if ($_usuario_logado_) {
            // line 49
            echo "\t\t\t\t\t\t\t<li><a href=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('Rio\Slim\TwigExtension')->url("/logout"), "html", null, true);
            echo "\" title=\"Encerrar a sua sessão de login\">Sair</a></li>
\t\t\t\t\t\t\t";
        } else {
            // line 51
            echo "\t\t\t\t\t\t\t<li><a href=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('Rio\Slim\TwigExtension')->url("/login"), "html", null, true);
            echo "\" title=\"Entre no nosso sistema para anunciar\">Entrar</a></li>
\t\t\t\t\t\t\t";
        }
        // line 53
        echo "\t\t\t\t\t\t</ul>
\t\t\t\t\t</div>
\t\t\t\t\t
\t\t\t\t\t<div class=\"social-media pull-right\">
\t\t\t\t\t\t<span class=\"text\">Estamos também aqui:</span>
\t\t\t\t\t\t<a href=\"http://facebook.com/portalcv\" title=\"Página da Central do Veículo no Facebook\" target=\"_blank\"><img src=\"";
        // line 58
        echo twig_escape_filter($this->env, $this->env->getExtension('Rio\Slim\TwigExtension')->url("/img/redes/facebook-icon.png"), "html", null, true);
        echo "\" alt=\"Facebook\"></a>
\t\t\t\t\t\t<a href=\"http://twitter.com/portalcv\" title=\"Perfil da Central do Veículo no Twitter\" target=\"_blank\"><img src=\"";
        // line 59
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
        // line 71
        if (isset($context["pagina"])) { $_pagina_ = $context["pagina"]; } else { $_pagina_ = null; }
        if ($this->getAttribute($_pagina_, "css_route", array(), "any", true, true)) {
            echo " id=\"";
            if (isset($context["pagina"])) { $_pagina_ = $context["pagina"]; } else { $_pagina_ = null; }
            echo twig_escape_filter($this->env, $this->getAttribute($_pagina_, "css_route"), "html", null, true);
            echo "\"";
        }
        echo " class=\"container\">
\t\t\t";
        // line 72
        $this->displayBlock('conteudo', $context, $blocks);
        // line 73
        echo "\t\t</div>
\t</div>
\t
\t<footer id=\"main-footer\">
\t\t<div class=\"container\">
\t\t\t<div class=\"row-fluid\">
\t\t\t\t<div class=\"span4\">
\t\t\t\t\t<ul class=\"footer-menu\">
\t\t\t\t\t\t<li><a href=\"";
        // line 81
        echo twig_escape_filter($this->env, $this->env->getExtension('Rio\Slim\TwigExtension')->url("/"), "html", null, true);
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
        // line 98
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable(range(1, 4));
        foreach ($context['_seq'] as $context["_key"] => $context["i"]) {
            // line 99
            echo "\t\t\t\t\t\t\t\t\t<li>
\t\t\t\t\t\t\t\t\t\t<img data-src=\"//placehold.it/32x32\" class=\"imagem\">
\t\t\t\t\t\t\t\t\t\t<a href=\"#\">Título da notícia aqui, resumido.</a>
\t\t\t\t\t\t\t\t\t</li>
\t\t\t\t\t\t\t\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['i'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        // line 104
        echo "\t\t\t\t\t\t\t\t</ul>
\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t
\t\t\t\t\t\t\t<div class=\"span6\">
\t\t\t\t\t\t\t\t<ul>
\t\t\t\t\t\t\t\t\t";
        // line 111
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable(range(1, 4));
        foreach ($context['_seq'] as $context["_key"] => $context["i"]) {
            // line 112
            echo "\t\t\t\t\t\t\t\t\t<li>
\t\t\t\t\t\t\t\t\t\t<img data-src=\"//placehold.it/32x32\" class=\"imagem\">
\t\t\t\t\t\t\t\t\t\t<a href=\"#\">Título da notícia aqui, resumido</a>
\t\t\t\t\t\t\t\t\t</li>
\t\t\t\t\t\t\t\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['i'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        // line 117
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
        // line 140
        echo twig_escape_filter($this->env, $this->env->getExtension('Rio\Slim\TwigExtension')->url((("/js/all." . twig_date_format_filter($this->env, "now", "Ymd")) . ".js")), "html", null, true);
        echo "\"></script>
\t";
        // line 141
        $this->displayBlock('scripts', $context, $blocks);
        // line 142
        echo "\t";
        // line 143
        echo "</body>
</html>";
    }

    // line 72
    public function block_conteudo($context, array $blocks = array())
    {
    }

    // line 141
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
        return array (  285 => 141,  280 => 72,  275 => 143,  273 => 142,  271 => 141,  267 => 140,  242 => 117,  232 => 112,  228 => 111,  219 => 104,  209 => 99,  205 => 98,  185 => 81,  175 => 73,  173 => 72,  163 => 71,  148 => 59,  144 => 58,  137 => 53,  131 => 51,  125 => 49,  122 => 48,  118 => 47,  114 => 46,  110 => 45,  101 => 39,  92 => 34,  85 => 30,  81 => 29,  77 => 28,  73 => 27,  68 => 26,  65 => 24,  58 => 22,  55 => 21,  52 => 20,  48 => 18,  41 => 16,  38 => 15,  34 => 13,  21 => 1,);
    }
}

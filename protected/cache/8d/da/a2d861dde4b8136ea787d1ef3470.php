<?php

/* base.twig */
class __TwigTemplate_8ddaa2d861dde4b8136ea787d1ef3470 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'lateral' => array($this, 'block_lateral'),
            'conteudo' => array($this, 'block_conteudo'),
            'scripts' => array($this, 'block_scripts'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<!DOCTYPE html>
<!--[if IE 7]><html class=\"no-js lt-ie9 lt-ie8 lt-ie7\"><![endif]-->
<!--[if IE 7]><html class=\"no-js lt-ie9 lt-ie8\"><![endif]-->
<!--[if IE 8]><html class=\"no-js lt-ie9\"><![endif]-->
<!--[if gt IE 8]><!--><html class=\"no-js\"><!--<![endif]-->
<head>
\t<meta charset=\"utf-8\">
\t<meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge,chrome=1\">
\t<meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">

\t<!--[if lt IE 9]>
\t<script src=\"//html5shim.googlecode.com/svn/trunk/html5.js\"></script>
\t<![endif]-->
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
\t<link href=\"http://fonts.googleapis.com/css?family=Oxygen:400,700\" rel=\"stylesheet\" type=\"text/css\">
\t<link href=\"";
        // line 26
        echo twig_escape_filter($this->env, $this->env->getExtension('Skull Twig')->url((("/css/all." . twig_date_format_filter($this->env, "now", "Ymd")) . ".css")), "html", null, true);
        echo "\" rel=\"stylesheet\" type=\"text/css\" charset=\"utf-8\">
</head>

<body id=\"main-body\">
\t<header id=\"main-header\">
\t\t<div class=\"first-row\">
\t\t\t<div class=\"container\">
\t\t\t\t<h1 class=\"logo-place\">
\t\t\t\t\t<a id=\"logo\" href=\"";
        // line 34
        echo twig_escape_filter($this->env, $this->env->getExtension('Skull Twig')->url("/"), "html", null, true);
        echo "\" title=\"Ir para a página inicial\">
\t\t\t\t\t\tCentral do Veículo
\t\t\t\t\t</a>
\t\t\t\t</h1>
\t\t\t\t
\t\t\t\t<div id=\"header-links\" class=\"dropdown\">
\t\t\t\t \t<a href=\"#\" data-toggle=\"dropdown\" class=\"dropdown-menu-invoker\">Menu</a>
\t\t\t\t \t\t\t\t\t
\t\t\t\t\t<ul class=\"normal\">
\t\t\t\t\t\t<li><a href=\"";
        // line 43
        echo twig_escape_filter($this->env, $this->env->getExtension('Skull Twig')->url("/"), "html", null, true);
        echo "\" title=\"Ir para a página inicial\">Home</a></li>
\t\t\t\t\t\t<li><a href=\"";
        // line 44
        echo twig_escape_filter($this->env, $this->env->getExtension('Skull Twig')->url("/noticias"), "html", null, true);
        echo "\" title=\"Ver as notícias\">Notícias</a></li>
\t\t\t\t\t\t<li><a href=\"";
        // line 45
        echo twig_escape_filter($this->env, $this->env->getExtension('Skull Twig')->url("/anuncie"), "html", null, true);
        echo "\" title=\"Veja os motivos para anunciar conosco\">Anuncie</a></li>
\t\t\t\t\t\t";
        // line 46
        if (isset($context["usuario_logado"])) { $_usuario_logado_ = $context["usuario_logado"]; } else { $_usuario_logado_ = null; }
        if ($_usuario_logado_) {
            // line 47
            echo "\t\t\t\t\t\t<li><a href=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('Skull Twig')->url("/logout"), "html", null, true);
            echo "\" title=\"Encerrar a sua sessão de login\">Sair</a></li>
\t\t\t\t\t\t";
        } else {
            // line 49
            echo "\t\t\t\t\t\t<li><a href=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('Skull Twig')->url("/login"), "html", null, true);
            echo "\" title=\"Entre no nosso sistema para anunciar\">Entrar</a></li>
\t\t\t\t\t\t";
        }
        // line 51
        echo "\t\t\t\t\t</ul>
\t\t\t\t</div>
\t\t\t\t
\t\t\t\t<div id=\"social-media\">
\t\t\t\t\t<span class=\"text\">Estamos também aqui:</span>
\t\t\t\t\t<a href=\"http://facebook.com/portalcv\" title=\"Página da Central do Veículo no Facebook\" target=\"_blank\"><img src=\"";
        // line 56
        echo twig_escape_filter($this->env, $this->env->getExtension('Skull Twig')->url("/img/redes/facebook-icon.png"), "html", null, true);
        echo "\" alt=\"Facebook\"></a>
\t\t\t\t\t<a href=\"http://twitter.com/portalcv\" title=\"Perfil da Central do Veículo no Twitter\" target=\"_blank\"><img src=\"";
        // line 57
        echo twig_escape_filter($this->env, $this->env->getExtension('Skull Twig')->url("/img/redes/twitter-icon.png"), "html", null, true);
        echo "\" alt=\"Twitter\"></a>
\t\t\t\t</div>
\t\t\t</div>
\t\t</div>
\t\t
\t\t<div class=\"second-row\">
\t\t\t
\t\t</div>
\t</header>
\t
\t<div id=\"main-content\" class=\"container\">
\t\t<div class=\"container\">
\t\t\t<div class=\"row\">
\t\t\t\t<div class=\"span3\">
\t\t\t\t\t<div id=\"lateral\" class=\"well well-small\">
\t\t\t\t\t\t";
        // line 72
        if (array_key_exists("usuario_logado", $context)) {
            // line 73
            echo "\t\t\t\t\t\t";
            $this->displayBlock('lateral', $context, $blocks);
            // line 74
            echo "\t\t\t\t\t\t";
        } else {
            // line 75
            echo "\t\t\t\t\t\t<h4>Cadastre-se, é <strong>gratuito</strong></h4>
\t\t\t\t\t\t<form action=\"";
            // line 76
            echo twig_escape_filter($this->env, $this->env->getExtension('Skull Twig')->url("/cadastro"), "html", null, true);
            echo "\" method=\"post\" class=\"form-vertical\">
\t\t\t\t\t\t\t<div class=\"control-group\">
\t\t\t\t\t\t\t\t<label class=\"control-label\">Nome</label>
\t\t\t\t\t\t\t\t<div class=\"controls\">
\t\t\t\t\t\t\t\t\t<input type=\"text\" name=\"nome\">
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t</form>
\t\t\t\t\t\t";
        }
        // line 85
        echo "\t\t\t\t\t</div>
\t\t\t\t</div>
\t\t\t\t<div class=\"span9\">
\t\t\t\t\tTeste
\t\t\t\t</div>
\t\t\t</div>
\t\t\t
\t\t\t";
        // line 92
        $this->displayBlock('conteudo', $context, $blocks);
        // line 93
        echo "\t\t</div>
\t</div>
\t
\t<footer id=\"main-footer\">
\t\t<div class=\"container\">
\t\t\t<div class=\"clearfix\">
\t\t\t\t<ul id=\"footer-menu\">
\t\t\t\t\t<li><a href=\"";
        // line 100
        echo twig_escape_filter($this->env, $this->env->getExtension('Skull Twig')->url("/"), "html", null, true);
        echo "\">Home</a></li>
\t\t\t\t\t<li><a href=\"#\">Notícias</a></li>
\t\t\t\t\t<li><a href=\"#\">Anuncie</a></li>
\t\t\t\t\t<li><a href=\"#\">Entrar</a></li>
\t\t\t\t\t<li><a href=\"#\">Facebook</a></li>
\t\t\t\t\t<li><a href=\"#\">Twitter</a></li>
\t\t\t\t\t<li><a href=\"#\">Google+</a></li>
\t\t\t\t</ul>
\t\t
\t\t\t\t<div id=\"footer-noticias\">
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
\t\t\t<div id=\"footer-copyright\" class=\"clearfix\">
\t\t\t\t<div class=\"left\"></div>
\t\t\t\t<div class=\"right\"></div>
\t\t
\t\t\t\t<div class=\"pull-left\">
\t\t\t\t\t<p class=\"muted\">Copyright © 2013 Central do Veículo. Todos os direitos reservados.</p>
\t\t\t\t</div>
\t\t\t\t<div class=\"pull-right\">
\t\t\t\t\t<p class=\"muted\">
\t\t\t\t\t\tPortal
\t\t\t\t\t\t<a href=\"http://www.centraldoveiculo.com.br/\" title=\"Central do Veículo\">centraldoveiculo.com.br</a> -
\t\t\t\t\t\tMais um produto
\t\t\t\t\t\t<a href=\"http://www.inovaws.com.br/\" title=\"Inova Websites\" target=\"_blank\">inovaws.com.br</a>
\t\t\t\t\t</p>
\t\t\t\t</div>
\t\t\t</div>
\t\t</div>
\t</footer>
\t
\t<script src=\"";
        // line 208
        echo twig_escape_filter($this->env, $this->env->getExtension('Skull Twig')->url((("/js/all." . twig_date_format_filter($this->env, "now", "Ymd")) . ".js")), "html", null, true);
        echo "\"></script>
\t";
        // line 209
        $this->displayBlock('scripts', $context, $blocks);
        // line 210
        echo "\t<script src=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('Skull Twig')->url((("/js/all.async." . twig_date_format_filter($this->env, "now", "Ymd")) . ".js")), "html", null, true);
        echo "\" async=\"async\"></script>
</body>
</html>
";
    }

    // line 73
    public function block_lateral($context, array $blocks = array())
    {
    }

    // line 92
    public function block_conteudo($context, array $blocks = array())
    {
    }

    // line 209
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
        return array (  327 => 209,  322 => 92,  317 => 73,  308 => 210,  306 => 209,  191 => 100,  182 => 93,  180 => 92,  171 => 85,  159 => 76,  156 => 75,  150 => 73,  148 => 72,  130 => 57,  126 => 56,  119 => 51,  113 => 49,  107 => 47,  104 => 46,  100 => 45,  96 => 44,  92 => 43,  80 => 34,  69 => 26,  65 => 24,  58 => 22,  55 => 21,  52 => 20,  48 => 18,  41 => 16,  38 => 15,  22 => 1,  853 => 524,  850 => 523,  835 => 512,  815 => 497,  811 => 496,  801 => 488,  781 => 473,  777 => 472,  551 => 248,  521 => 231,  509 => 230,  505 => 228,  494 => 219,  482 => 218,  478 => 216,  464 => 204,  452 => 203,  448 => 201,  396 => 153,  388 => 152,  370 => 151,  366 => 149,  346 => 147,  337 => 145,  319 => 144,  315 => 142,  312 => 141,  302 => 208,  295 => 131,  270 => 119,  257 => 117,  253 => 116,  241 => 106,  228 => 104,  224 => 103,  209 => 90,  196 => 88,  192 => 87,  161 => 60,  153 => 74,  135 => 58,  131 => 56,  105 => 54,  87 => 53,  42 => 11,  33 => 4,  30 => 3,);
    }
}

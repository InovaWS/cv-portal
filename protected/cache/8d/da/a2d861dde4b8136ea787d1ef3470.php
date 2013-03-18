<?php

/* base.twig */
class __TwigTemplate_8ddaa2d861dde4b8136ea787d1ef3470 extends Twig_Template
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
\t<link href=\"";
        // line 25
        echo twig_escape_filter($this->env, $this->env->getExtension('Skull Twig')->url((("/css/all." . twig_date_format_filter($this->env, "now", "Ymd")) . ".css")), "html", null, true);
        echo "\" rel=\"stylesheet\" type=\"text/css\" charset=\"utf-8\">
</head>

<body>
\t<header id=\"header\">
\t\t<div id=\"header-links\">
\t\t\t<div class=\"container\">
\t\t\t\t<div class=\"row\">
\t\t\t\t\t<div class=\"span3\">
\t\t\t\t\t\t<div id=\"header-logo\">
\t\t\t\t\t\t\t<a href=\"";
        // line 35
        echo twig_escape_filter($this->env, $this->env->getExtension('Skull Twig')->url("/"), "html", null, true);
        echo "\" title=\"Ir para a página inicial\"><img src=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('Skull Twig')->url("/img/logo.png"), "html", null, true);
        echo "\" alt=\"Logotipo da Central do Veículo\" /></a>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t\t<div class=\"span9\">
\t\t\t\t\t\t<ul id=\"header-links-left\">
\t\t\t\t\t\t\t<li><a href=\"";
        // line 40
        echo twig_escape_filter($this->env, $this->env->getExtension('Skull Twig')->url("/"), "html", null, true);
        echo "\" class=\"header-link-a\">notícias</a></li>
\t\t\t\t\t\t\t<li class=\"separador\">|</li>
\t\t\t\t\t\t\t<li><a href=\"";
        // line 42
        echo twig_escape_filter($this->env, $this->env->getExtension('Skull Twig')->url("/"), "html", null, true);
        echo "\" class=\"header-link-b\">anuncie</a></li>
\t\t\t\t\t\t\t<li class=\"separador\">|</li>
\t\t\t\t\t\t\t<li><a href=\"";
        // line 44
        echo twig_escape_filter($this->env, $this->env->getExtension('Skull Twig')->url("/"), "html", null, true);
        echo "\" class=\"header-link-c\">entrar</a></li>
\t\t\t\t\t\t</ul>

\t\t\t\t\t\t<div id=\"header-links-right\">
\t\t\t\t\t\t\tEstamos também aqui:
\t\t\t\t\t\t\t<a href=\"http://www.facebook.com/portalcv\" target=\"_blank\" title=\"Nossa página no Facebook\">
\t\t\t\t\t\t\t\t<img src=\"";
        // line 50
        echo twig_escape_filter($this->env, $this->env->getExtension('Skull Twig')->url("/img/redes/face.jpg"), "html", null, true);
        echo "\" alt=\"Facebook\" /> /portalcv
\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t\t<a href=\"http://twitter.com/portalcv\" target=\"_blank\" title=\"Nosso perfil no Twitter\">
\t\t\t\t\t\t\t\t<img src=\"";
        // line 53
        echo twig_escape_filter($this->env, $this->env->getExtension('Skull Twig')->url("/img/redes/twitter.jpg"), "html", null, true);
        echo "\" alt=\"Twitter\" /> @portalcv
\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t</div>
\t\t\t</div>
\t\t</div>

\t\t<div id=\"header-login\">
\t\t\t<div class=\"container\">
\t\t\t\t";
        // line 63
        if (isset($context["usuario_logado"])) { $_usuario_logado_ = $context["usuario_logado"]; } else { $_usuario_logado_ = null; }
        if ($_usuario_logado_) {
            // line 64
            echo "\t\t\t\t<div id=\"usuario-logado\">
\t\t\t\t\t<p class=\"mensagem\">Olá, <strong>";
            // line 65
            if (isset($context["usuario_logado"])) { $_usuario_logado_ = $context["usuario_logado"]; } else { $_usuario_logado_ = null; }
            echo twig_escape_filter($this->env, $this->getAttribute($_usuario_logado_, "nome"), "html", null, true);
            echo "</strong>!</p>
\t\t\t\t\t<p class=\"acoes\">
\t\t\t\t\t\t";
            // line 67
            if (isset($context["vendedor_logado"])) { $_vendedor_logado_ = $context["vendedor_logado"]; } else { $_vendedor_logado_ = null; }
            if ($this->getAttribute($_vendedor_logado_, "bloqueado")) {
                // line 68
                echo "\t\t\t\t\t\t<a href=\"";
                echo twig_escape_filter($this->env, $this->env->getExtension('slim')->urlFor("/cadastro"), "html", null, true);
                echo "\" title=\"Completar cadastro\">Completar cadastro</a>
\t\t\t\t\t\t";
            } else {
                // line 70
                echo "\t\t\t\t\t\t<a href=\"";
                echo twig_escape_filter($this->env, $this->env->getExtension('slim')->urlFor("/logout"), "html", null, true);
                echo "\" title=\"Fazer logout\">Sair</a>
\t\t\t\t\t\t";
            }
            // line 72
            echo "\t\t\t\t\t</p>
\t\t\t\t</div>
\t\t\t\t";
        } else {
            // line 75
            echo "\t\t\t\t<form action=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('Skull Twig')->url("/login"), "html", null, true);
            echo "\" method=\"post\" id=\"header-login-form\" class=\"clearfix\">
\t\t\t\t\t<div class=\"pull-right\">
\t\t\t\t\t\t<input type=\"text\" name=\"login\" placeholder=\"Usuário\" class=\"input-medium\" />
\t\t\t\t\t\t<input type=\"password\" name=\"senha\" placeholder=\"Senha\" class=\"input-medium\" />
\t\t\t\t\t\t<button type=\"submit\" class=\"btn btn-cv\">Entrar</button>
\t\t\t\t\t\t<span><a href=";
            // line 80
            echo twig_escape_filter($this->env, $this->env->getExtension('Skull Twig')->url("/login/esqueci-minha-senha"), "html", null, true);
            echo ">Esqueci minha senha</a> </span>
\t\t\t\t\t</div>
\t\t\t\t</form>
\t\t\t\t";
        }
        // line 84
        echo "\t\t\t\t</div>
\t\t\t</div>
\t\t</div>
\t</header>

\t<div class=\"container\">
\t\t<div id=\"conteudo\">";
        // line 90
        $this->displayBlock('conteudo', $context, $blocks);
        echo "</div>

\t\t<footer>
\t\t\t<div class=\"clearfix\">
\t\t\t\t<ul id=\"footer-menu\">
\t\t\t\t\t<li><a href=\"";
        // line 95
        echo twig_escape_filter($this->env, $this->env->getExtension('Skull Twig')->url("/"), "html", null, true);
        echo "\">Home</a></li>
\t\t\t\t\t<li><a href=\"#\">Notícias</a></li>
\t\t\t\t\t<li><a href=\"#\">Anuncie</a></li>
\t\t\t\t\t<li><a href=\"#\">Entrar</a></li>
\t\t\t\t\t<li><a href=\"#\">Facebook</a></li>
\t\t\t\t\t<li><a href=\"#\">Twitter</a></li>
\t\t\t\t\t<li><a href=\"#\">Google+</a></li>
\t\t\t\t</ul>

\t\t\t\t<div id=\"footer-noticias\">
\t\t\t\t\t<h4>Últimas notícias</h4>

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

\t\t\t<div id=\"footer-copyright\" class=\"clearfix\">
\t\t\t\t<div class=\"left\"></div>
\t\t\t\t<div class=\"right\"></div>

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
\t\t</footer>
\t</div>
\t
\t<script src=\"";
        // line 203
        echo twig_escape_filter($this->env, $this->env->getExtension('Skull Twig')->url((("/js/all." . twig_date_format_filter($this->env, "now", "Ymd")) . ".js")), "html", null, true);
        echo "\"></script>
\t";
        // line 204
        $this->displayBlock('scripts', $context, $blocks);
        // line 205
        echo "\t<script src=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('Skull Twig')->url((("/js/all.async." . twig_date_format_filter($this->env, "now", "Ymd")) . ".js")), "html", null, true);
        echo "\" async=\"async\"></script>
</body>
</html>
";
    }

    // line 90
    public function block_conteudo($context, array $blocks = array())
    {
    }

    // line 204
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
        return array (  323 => 204,  318 => 90,  309 => 205,  307 => 204,  303 => 203,  192 => 95,  184 => 90,  176 => 84,  169 => 80,  160 => 75,  155 => 72,  149 => 70,  143 => 68,  140 => 67,  134 => 65,  131 => 64,  128 => 63,  115 => 53,  109 => 50,  100 => 44,  95 => 42,  90 => 40,  80 => 35,  67 => 25,  64 => 24,  57 => 22,  54 => 21,  51 => 20,  47 => 18,  40 => 16,  37 => 15,  21 => 1,);
    }
}

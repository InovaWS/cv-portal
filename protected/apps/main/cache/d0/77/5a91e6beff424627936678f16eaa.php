<?php

/* index.twig */
class __TwigTemplate_d0775a91e6beff424627936678f16eaa extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("base.twig");

        $this->blocks = array(
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
        $context["pagina"] = array("css_route" => "home");
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 7
    public function block_conteudo($context, array $blocks = array())
    {
        // line 8
        echo "<div class=\"row\">
\t<div class=\"span4\">
\t\t<div class=\"lateral\">
\t\t\t";
        // line 11
        if (array_key_exists("usuario_logado", $context)) {
            // line 12
            echo "\t\t\t";
            // line 13
            echo "\t\t\t";
        } else {
            // line 14
            echo "\t\t\t<h4>Cadastre-se, é <strong>gratuito</strong></h4>
\t\t\t<form action=\"";
            // line 15
            echo twig_escape_filter($this->env, $this->env->getExtension('Rio\Slim\TwigExtension')->url("/cadastro"), "html", null, true);
            echo "\" method=\"post\" class=\"form-vertical\">
\t\t\t\t<div class=\"row-fluid\">
\t\t\t\t\t<div class=\"control-group\">
\t\t\t\t\t\t<label class=\"control-label\" for=\"box-cadastro-nome\">Nome</label>
\t\t\t\t\t\t<div class=\"controls controls-row\">
\t\t\t\t\t\t\t<input type=\"text\" id=\"box-cadastro-nome\" name=\"nome\" class=\"span12\">
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t\t
\t\t\t\t\t<div class=\"control-group\">
\t\t\t\t\t\t<label class=\"control-label\" for=\"box-cadastro-email\">E-mail</label>
\t\t\t\t\t\t<div class=\"controls controls-row\">
\t\t\t\t\t\t\t<input type=\"email\" id=\"box-cadastro-email\" name=\"email\" class=\"span12\">
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t
\t\t\t\t\t<div class=\"control-group\">
\t\t\t\t\t\t<label class=\"control-label\" for=\"box-cadastro-senha\">Senha</label>
\t\t\t\t\t\t<div class=\"controls\">
\t\t\t\t\t\t\t<input type=\"password\" id=\"box-cadastro-senha\" name=\"senha\" class=\"span12\">
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t
\t\t\t\t\t<div class=\"control-group\">
\t\t\t\t\t\t<label class=\"control-label\" for=\"box-cadastro-confirmar-senha\">Confirmar senha</label>
\t\t\t\t\t\t<div class=\"controls\">
\t\t\t\t\t\t\t<input type=\"password\" id=\"box-cadastro-confirmar-senha\" name=\"confirmar-senha\" class=\"span12\">
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t
\t\t\t\t\t<div class=\"control-group\">
\t\t\t\t\t\t<div class=\"controls clearfix\">
\t\t\t\t\t\t\t<button type=\"submit\" class=\"btn pull-right\">Cadastrar</button>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t</div>
\t\t\t</form>
\t\t\t";
        }
        // line 53
        echo "\t\t</div>
\t</div>
\t<div class=\"span8\">
\t\t<div class=\"central\">
\t\t\t<ul class=\"nav nav-tabs\">
\t\t\t\t<li class=\"active\"><a href=\"#busca-carros\" data-toggle=\"tab\">Carros</a></li>
\t\t\t\t<li><a href=\"#busca-motos\" data-toggle=\"tab\">Motos</a></li>
\t\t\t</ul>
\t\t\t\t
\t\t\t<div class=\"tab-content\">
\t\t\t\t<div class=\"tab-pane active\" id=\"busca-carros\">";
        // line 63
        $this->env->loadTemplate("busca/carros.twig")->display($context);
        echo "</div>
\t\t\t\t<div class=\"tab-pane\" id=\"busca-motos\">";
        // line 64
        $this->env->loadTemplate("busca/motos.twig")->display($context);
        echo "</div>
\t\t\t</div>
\t\t\t
\t\t\t<div class=\"row-fluid\">
\t\t\t\t<div class=\"span12\">
\t\t\t\t\t<a href=\"anuncie\" title=\"Anuncie\">
\t\t\t\t\t\t<img src=\"";
        // line 70
        echo twig_escape_filter($this->env, $this->env->getExtension('Rio\Slim\TwigExtension')->url("/img/banner.jpg"), "html", null, true);
        echo "\" alt=\"banner\" style=\"width: 100%\" />
\t\t\t\t\t</a>
\t\t\t\t</div>
\t\t\t</div>
\t\t</div>
\t</div>
</div>
<div class=\"downside\">
\t<div class=\"row\">
\t\t<div class=\"span12\">
\t\t\t<div id=\"myCarousel\" class=\"carousel slide\">
\t\t\t    <ol class=\"carousel-indicators\">
\t\t\t    \t<li data-target=\"#myCarousel\" data-slide-to=\"0\" class=\"active\"></li>
\t\t\t    \t<li data-target=\"#myCarousel\" data-slide-to=\"1\"></li>
\t\t\t    \t<li data-target=\"#myCarousel\" data-slide-to=\"2\"></li>
\t\t\t    </ol>
\t\t\t    
\t\t\t    <!-- Carousel items -->
\t\t\t    <div class=\"carousel-inner\">
\t\t\t\t    <div class=\"active item\">
\t\t\t\t    \t<div>
\t\t\t\t    \t\t<div class=\"DestaqueHomeItem\">
\t\t\t                \t<div class=\"imagem\"><a href=\"index.php\" class=\"LinkFotoDestaque\"></a></div>
\t\t\t                    <div class=\"DadosDestaque\">
\t\t\t                            <strong>Chevrolet - Vectra</strong><br>
\t\t\t                            Ano 2011/2012<br>
\t\t\t                            Gaudério Veículos<br>
\t\t\t                            <span class=\"ValorDestaque\">R\$ 22.000,00</span>
\t\t\t                        </div>
\t\t\t                    
\t\t\t                    </div>
\t\t\t                
\t\t\t                </div>
\t\t\t\t    </div>
\t\t\t\t    <div class=\"item\">
\t\t\t\t    </div>
\t\t\t\t    <div class=\"item\">
\t\t\t\t    </div>
\t\t\t    </div>
\t\t\t    
\t\t\t    <!-- Carousel nav
\t\t\t    <a class=\"carousel-control left\" href=\"#myCarousel\" data-slide=\"prev\">&lsaquo;</a>
\t\t\t    <a class=\"carousel-control right\" href=\"#myCarousel\" data-slide=\"next\">&rsaquo;</a> -->
\t\t\t</div>
\t\t</div>
\t</div>
</div>
";
    }

    public function getTemplateName()
    {
        return "index.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  114 => 70,  105 => 64,  101 => 63,  89 => 53,  48 => 15,  45 => 14,  42 => 13,  40 => 12,  38 => 11,  33 => 8,  30 => 7,  25 => 3,);
    }
}

<?php

/* index.twig */
class __TwigTemplate_24da1ead0478c1b95f686f83676586a2 extends Twig_Template
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
        echo "<div class=\"row-fluid\">
\t<div class=\"span4\">
\t\t<div class=\"lateral\">
\t\t\t";
        // line 11
        if (isset($context["usuario_logado"])) { $_usuario_logado_ = $context["usuario_logado"]; } else { $_usuario_logado_ = null; }
        if ($_usuario_logado_) {
            // line 12
            echo "\t\t\t<h4>Olá, <strong>";
            if (isset($context["usuario_logado"])) { $_usuario_logado_ = $context["usuario_logado"]; } else { $_usuario_logado_ = null; }
            echo twig_escape_filter($this->env, $this->getAttribute($_usuario_logado_, "nome"), "html", null, true);
            echo "</strong></h4>
\t\t\t
\t\t\t<div class=\"row-fluid\">
\t\t\t\t<div class=\"span12\">
\t\t\t\t\tÁrea de mensagens
\t\t\t\t</div>
\t\t\t</div>
\t\t\t
\t\t\t<ul class=\"nav nav-list\">
\t\t\t\t<li><a href=\"";
            // line 21
            echo twig_escape_filter($this->env, $this->env->getExtension('Rio\Twig\TwigExtension')->url("/meus-dados"), "html", null, true);
            echo "\">Meus dados</a></li>
\t\t\t\t<li><a href=\"";
            // line 22
            echo twig_escape_filter($this->env, $this->env->getExtension('Rio\Twig\TwigExtension')->url("/meus-anuncios"), "html", null, true);
            echo "\">Meus anúncios</a></li>
\t\t\t\t<li><a href=\"";
            // line 23
            echo twig_escape_filter($this->env, $this->env->getExtension('Rio\Twig\TwigExtension')->url("/logout"), "html", null, true);
            echo "\">Sair</a></li>
\t\t\t</ul>
\t\t\t
\t\t\t";
        } else {
            // line 27
            echo "\t\t\t<h4>Cadastre-se, é <strong>gratuito</strong></h4>
\t\t\t<form action=\"";
            // line 28
            echo twig_escape_filter($this->env, $this->env->getExtension('Rio\Twig\TwigExtension')->url("/cadastro"), "html", null, true);
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
        // line 66
        echo "\t\t</div>
\t</div>
\t<div class=\"span8\">
\t\t<div class=\"central\">
\t\t\t<ul class=\"nav nav-tabs\">
\t\t\t\t";
        // line 71
        if (isset($context["tipos_de_veiculo"])) { $_tipos_de_veiculo_ = $context["tipos_de_veiculo"]; } else { $_tipos_de_veiculo_ = null; }
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($_tipos_de_veiculo_);
        $context['loop'] = array(
          'parent' => $context['_parent'],
          'index0' => 0,
          'index'  => 1,
          'first'  => true,
        );
        if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof Countable)) {
            $length = count($context['_seq']);
            $context['loop']['revindex0'] = $length - 1;
            $context['loop']['revindex'] = $length;
            $context['loop']['length'] = $length;
            $context['loop']['last'] = 1 === $length;
        }
        foreach ($context['_seq'] as $context["_key"] => $context["tipo_de_veiculo"]) {
            // line 72
            echo "\t\t\t\t<li";
            if (isset($context["loop"])) { $_loop_ = $context["loop"]; } else { $_loop_ = null; }
            if ($this->getAttribute($_loop_, "first")) {
                echo " class=\"active\"";
            }
            echo ">
\t\t\t\t\t<a href=\"#busca-";
            // line 73
            if (isset($context["tipo_de_veiculo"])) { $_tipo_de_veiculo_ = $context["tipo_de_veiculo"]; } else { $_tipo_de_veiculo_ = null; }
            echo twig_escape_filter($this->env, $this->getAttribute($_tipo_de_veiculo_, "id"), "html", null, true);
            echo "\" data-toggle=\"tab\">";
            if (isset($context["tipo_de_veiculo"])) { $_tipo_de_veiculo_ = $context["tipo_de_veiculo"]; } else { $_tipo_de_veiculo_ = null; }
            echo twig_escape_filter($this->env, $this->getAttribute($_tipo_de_veiculo_, "descricao"), "html", null, true);
            echo "</a>
\t\t\t\t</li>
\t\t\t\t";
            ++$context['loop']['index0'];
            ++$context['loop']['index'];
            $context['loop']['first'] = false;
            if (isset($context['loop']['length'])) {
                --$context['loop']['revindex0'];
                --$context['loop']['revindex'];
                $context['loop']['last'] = 0 === $context['loop']['revindex0'];
            }
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['tipo_de_veiculo'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        // line 76
        echo "\t\t\t</ul>
\t\t\t\t
\t\t\t<div class=\"tab-content\">
\t\t\t\t";
        // line 79
        if (isset($context["tipos_de_veiculo"])) { $_tipos_de_veiculo_ = $context["tipos_de_veiculo"]; } else { $_tipos_de_veiculo_ = null; }
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($_tipos_de_veiculo_);
        $context['loop'] = array(
          'parent' => $context['_parent'],
          'index0' => 0,
          'index'  => 1,
          'first'  => true,
        );
        if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof Countable)) {
            $length = count($context['_seq']);
            $context['loop']['revindex0'] = $length - 1;
            $context['loop']['revindex'] = $length;
            $context['loop']['length'] = $length;
            $context['loop']['last'] = 1 === $length;
        }
        foreach ($context['_seq'] as $context["_key"] => $context["tipo_de_veiculo"]) {
            // line 80
            echo "\t\t\t\t<div class=\"tab-pane";
            if (isset($context["loop"])) { $_loop_ = $context["loop"]; } else { $_loop_ = null; }
            if ($this->getAttribute($_loop_, "first")) {
                echo " active";
            }
            echo "\" id=\"busca-";
            if (isset($context["tipo_de_veiculo"])) { $_tipo_de_veiculo_ = $context["tipo_de_veiculo"]; } else { $_tipo_de_veiculo_ = null; }
            echo twig_escape_filter($this->env, $this->getAttribute($_tipo_de_veiculo_, "id"), "html", null, true);
            echo "\">
\t\t\t\t\t";
            // line 81
            if (isset($context["tipo_de_veiculo"])) { $_tipo_de_veiculo_ = $context["tipo_de_veiculo"]; } else { $_tipo_de_veiculo_ = null; }
            $template = $this->env->resolveTemplate((("busca/" . $this->getAttribute($_tipo_de_veiculo_, "id")) . ".twig"));
            $template->display($context);
            // line 82
            echo "\t\t\t\t</div>
\t\t\t\t";
            ++$context['loop']['index0'];
            ++$context['loop']['index'];
            $context['loop']['first'] = false;
            if (isset($context['loop']['length'])) {
                --$context['loop']['revindex0'];
                --$context['loop']['revindex'];
                $context['loop']['last'] = 0 === $context['loop']['revindex0'];
            }
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['tipo_de_veiculo'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        // line 84
        echo "\t\t\t</div>
\t\t\t
\t\t\t<div class=\"row-fluid\">
\t\t\t\t<div class=\"span12\">
\t\t\t\t\t<a href=\"anuncie\" title=\"Anuncie\">
\t\t\t\t\t\t<img src=\"";
        // line 89
        echo twig_escape_filter($this->env, $this->env->getExtension('Rio\Twig\TwigExtension')->url("/img/banner.jpg"), "html", null, true);
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
\t\t\t                    \t<strong>Chevrolet - Vectra</strong><br>
\t\t\t                        Ano 2011/2012<br>
\t\t\t                        Gaudério Veículos<br>
\t\t\t                        <span class=\"ValorDestaque\">R\$ 22.000,00</span>
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t</div>
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
        return array (  228 => 89,  221 => 84,  206 => 82,  202 => 81,  191 => 80,  173 => 79,  168 => 76,  147 => 73,  139 => 72,  121 => 71,  114 => 66,  73 => 28,  70 => 27,  63 => 23,  59 => 22,  55 => 21,  41 => 12,  38 => 11,  33 => 8,  30 => 7,  25 => 3,);
    }
}

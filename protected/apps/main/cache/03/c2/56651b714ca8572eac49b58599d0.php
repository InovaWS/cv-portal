<?php

/* index.twig */
class __TwigTemplate_03c256651b714ca8572eac49b58599d0 extends Twig_Template
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
\t\t\t\t";
        // line 58
        if (isset($context["tipos_de_veiculos"])) { $_tipos_de_veiculos_ = $context["tipos_de_veiculos"]; } else { $_tipos_de_veiculos_ = null; }
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($_tipos_de_veiculos_);
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
            // line 59
            echo "\t\t\t\t<li";
            if (isset($context["loop"])) { $_loop_ = $context["loop"]; } else { $_loop_ = null; }
            if ($this->getAttribute($_loop_, "first")) {
                echo " class=\"active\"";
            }
            echo ">
\t\t\t\t\t<a href=\"#busca-";
            // line 60
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
        // line 63
        echo "\t\t\t</ul>
\t\t\t\t
\t\t\t<div class=\"tab-content\">
\t\t\t\t";
        // line 66
        if (isset($context["tipos_de_veiculos"])) { $_tipos_de_veiculos_ = $context["tipos_de_veiculos"]; } else { $_tipos_de_veiculos_ = null; }
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($_tipos_de_veiculos_);
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
            // line 67
            echo "\t\t\t\t<div class=\"tab-pane";
            if (isset($context["loop"])) { $_loop_ = $context["loop"]; } else { $_loop_ = null; }
            if ($this->getAttribute($_loop_, "first")) {
                echo " active";
            }
            echo "\" id=\"busca-carros\">
\t\t\t\t\t<form action=\"";
            // line 68
            echo twig_escape_filter($this->env, $this->env->getExtension('Rio\Slim\TwigExtension')->url("/busca"), "html", null, true);
            echo "\" method=\"get\">
\t\t\t\t\t\t<div class=\"row-fluid\">
\t\t\t\t\t\t\t<div class=\"span4\">
\t\t\t\t\t\t\t\t<div class=\"control-group\">
\t\t\t\t\t\t\t\t\t<label class=\"control-label\">Marca</label>
\t\t\t\t\t\t\t\t\t<div class=\"controls\">
\t\t\t\t\t\t\t\t\t\t<select class=\"span12 has-placeholder\" name=\"marca\">
\t\t\t\t\t\t\t\t\t\t\t<option value=\"\">Selecione</option>
\t\t\t\t\t\t\t\t\t\t</select>
\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t<div class=\"span4\">
\t\t\t\t\t\t\t\t<div class=\"control-group\">
\t\t\t\t\t\t\t\t\t<label class=\"control-label\">Veículo</label>
\t\t\t\t\t\t\t\t\t<div class=\"controls\">
\t\t\t\t\t\t\t\t\t\t<input type=\"text\" name=\"veiculo\" class=\"span12\" />
\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t<div class=\"span4\">
\t\t\t\t\t\t\t\t<div class=\"control-group\">
\t\t\t\t\t\t\t\t\t<label class=\"control-label\">Ano</label>
\t\t\t\t\t\t\t\t\t<div class=\"controls\">
\t\t\t\t\t\t\t\t\t\t<select class=\"span12 has-placeholder\" name=\"ano\">
\t\t\t\t\t\t\t\t\t\t\t<option value=\"\">Selecione</option>
\t\t\t\t\t\t\t\t\t\t\t";
            // line 94
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable(range(twig_date_format_filter($this->env, "now", "Y"), 1960));
            foreach ($context['_seq'] as $context["_key"] => $context["ano"]) {
                // line 95
                echo "\t\t\t\t\t\t\t\t\t\t\t<option value=\"";
                if (isset($context["ano"])) { $_ano_ = $context["ano"]; } else { $_ano_ = null; }
                echo twig_escape_filter($this->env, $_ano_, "html", null, true);
                echo "\">";
                if (isset($context["ano"])) { $_ano_ = $context["ano"]; } else { $_ano_ = null; }
                echo twig_escape_filter($this->env, $_ano_, "html", null, true);
                echo "</option>
\t\t\t\t\t\t\t\t\t\t\t";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['ano'], $context['_parent'], $context['loop']);
            $context = array_merge($_parent, array_intersect_key($context, $_parent));
            // line 97
            echo "\t\t\t\t\t\t\t\t\t\t</select>
\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t</div>

\t\t\t\t\t\t<div class=\"row-fluid\">
\t\t\t\t\t\t\t<div class=\"span4\">
\t\t\t\t\t\t\t\t<div class=\"control-group\">
\t\t\t\t\t\t\t\t\t<label class=\"control-label\">Estado</label>
\t\t\t\t\t\t\t\t\t<div class=\"controls\">
\t\t\t\t\t\t\t\t\t\t<select class=\"span12 has-placeholder\" name=\"ano\">
\t\t\t\t\t\t\t\t\t\t\t<option value=\"\">Selecione</option>
\t\t\t\t\t\t\t\t\t\t\t";
            // line 110
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable(range(twig_date_format_filter($this->env, "now", "Y"), 1960));
            foreach ($context['_seq'] as $context["_key"] => $context["ano"]) {
                // line 111
                echo "\t\t\t\t\t\t\t\t\t\t\t<option value=\"";
                if (isset($context["ano"])) { $_ano_ = $context["ano"]; } else { $_ano_ = null; }
                echo twig_escape_filter($this->env, $_ano_, "html", null, true);
                echo "\">";
                if (isset($context["ano"])) { $_ano_ = $context["ano"]; } else { $_ano_ = null; }
                echo twig_escape_filter($this->env, $_ano_, "html", null, true);
                echo "</option>
\t\t\t\t\t\t\t\t\t\t\t";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['ano'], $context['_parent'], $context['loop']);
            $context = array_merge($_parent, array_intersect_key($context, $_parent));
            // line 113
            echo "\t\t\t\t\t\t\t\t\t\t</select>
\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t<div class=\"span4\">
\t\t\t\t\t\t\t\t<div class=\"control-group\">
\t\t\t\t\t\t\t\t\t<label class=\"control-label\">Cidade</label>
\t\t\t\t\t\t\t\t\t<div class=\"controls\">
\t\t\t\t\t\t\t\t\t\t<select class=\"span12 has-placeholder\" name=\"ano\">
\t\t\t\t\t\t\t\t\t\t\t<option value=\"\">Selecione</option>
\t\t\t\t\t\t\t\t\t\t\t";
            // line 123
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable(range(twig_date_format_filter($this->env, "now", "Y"), 1960));
            foreach ($context['_seq'] as $context["_key"] => $context["ano"]) {
                // line 124
                echo "\t\t\t\t\t\t\t\t\t\t\t<option value=\"";
                if (isset($context["ano"])) { $_ano_ = $context["ano"]; } else { $_ano_ = null; }
                echo twig_escape_filter($this->env, $_ano_, "html", null, true);
                echo "\">";
                if (isset($context["ano"])) { $_ano_ = $context["ano"]; } else { $_ano_ = null; }
                echo twig_escape_filter($this->env, $_ano_, "html", null, true);
                echo "</option>
\t\t\t\t\t\t\t\t\t\t\t";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['ano'], $context['_parent'], $context['loop']);
            $context = array_merge($_parent, array_intersect_key($context, $_parent));
            // line 126
            echo "\t\t\t\t\t\t\t\t\t\t</select>
\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t<div class=\"span4\">
\t\t\t\t\t\t\t\t<button type=\"submit\" class=\"btn\">Buscar</button>
\t\t\t\t\t\t\t\t<input type=\"checkbox\"> Apenas lojas
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t</div>
\t\t\t\t\t</form>
\t\t\t\t</div>
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
        // line 138
        echo "\t\t\t</div>
\t\t\t
\t\t\t<div class=\"row-fluid\">
\t\t\t\t<div class=\"span12\">
\t\t\t\t\t<a href=\"anuncie\" title=\"Anuncie\">
\t\t\t\t\t\t<img src=\"";
        // line 143
        echo twig_escape_filter($this->env, $this->env->getExtension('Rio\Slim\TwigExtension')->url("/img/banner.jpg"), "html", null, true);
        echo "\" alt=\"banner\" style=\"width: 100%\" />
\t\t\t\t\t</a>
\t\t\t\t</div>
\t\t\t</div>
\t\t</div>
\t</div>
</div>
<div class=\"downside\">
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
        return array (  313 => 143,  306 => 138,  281 => 126,  268 => 124,  264 => 123,  252 => 113,  239 => 111,  235 => 110,  220 => 97,  207 => 95,  203 => 94,  174 => 68,  166 => 67,  148 => 66,  143 => 63,  122 => 60,  114 => 59,  96 => 58,  89 => 53,  48 => 15,  45 => 14,  42 => 13,  40 => 12,  38 => 11,  33 => 8,  30 => 7,  25 => 3,);
    }
}

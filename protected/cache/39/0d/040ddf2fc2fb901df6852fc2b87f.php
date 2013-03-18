<?php

/* index.twig */
class __TwigTemplate_390d040ddf2fc2fb901df6852fc2b87f extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("base.twig");

        $this->blocks = array(
            'conteudo' => array($this, 'block_conteudo'),
            'conteudos' => array($this, 'block_conteudos'),
            'scripts' => array($this, 'block_scripts'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "base.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_conteudo($context, array $blocks = array())
    {
        // line 4
        echo "<div class=\"row-fluid\">
\t<div class=\"span4\">
\t\t<div id=\"box-cadastro\">
\t\t\t<div class=\"mensagem\">Cadastre-se, é GRATUITO</div>

\t\t\t<div class=\"row-fluid\">
\t\t\t\t<div class=\"span12\">
\t\t\t\t\t<form action=\"";
        // line 11
        echo twig_escape_filter($this->env, $this->env->getExtension('Skull Twig')->url("/cadastro"), "html", null, true);
        echo "\" method=\"post\"\tclass=\"form-vertical\">
\t\t\t\t\t\t<div class=\"control-group\">
\t\t\t\t\t\t\t<label class=\"control-label\" for=\"box-cadastro-nome\">Nome</label>
\t\t\t\t\t\t\t<div class=\"controls\">
\t\t\t\t\t\t\t\t<input type=\"text\" id=\"box-cadastro-nome\" name=\"nome\" class=\"span12\" />
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t</div>

\t\t\t\t\t\t<div class=\"control-group\">
\t\t\t\t\t\t\t<label class=\"control-label\" for=\"box-cadastro-email\">E-mail</label>
\t\t\t\t\t\t\t<div class=\"controls\">
\t\t\t\t\t\t\t\t<input type=\"email\" id=\"box-cadastro-email\" name=\"email\" class=\"span12\" />
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t</div>

\t\t\t\t\t\t<div class=\"control-group\">
\t\t\t\t\t\t\t<label class=\"control-label\" for=\"box-cadastro-senha\">Senha</label>
\t\t\t\t\t\t\t<div class=\"controls\">
\t\t\t\t\t\t\t\t<input type=\"password\" id=\"box-cadastro-senha\" name=\"senha\"\tclass=\"span12\" />
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t</div>

\t\t\t\t\t\t<div class=\"control-group\">
\t\t\t\t\t\t\t<label class=\"control-label\" for=\"box-cadastro-confirmar-senha\">Confirmar senha</label>
\t\t\t\t\t\t\t<div class=\"controls\">
\t\t\t\t\t\t\t\t<input type=\"password\" id=\"box-cadastro-confirmar-senha\" name=\"confirmar-senha\" class=\"span12\" />
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t</div>

\t\t\t\t\t\t<div class=\"pull-right\">
\t\t\t\t\t\t\t<button type=\"submit\" class=\"btn\">Cadastrar</button>
\t\t\t\t\t\t</div>
\t\t\t\t\t</form>
\t\t\t\t</div>
\t\t\t</div>
\t\t</div>
\t</div>

\t<div class=\"span8\">

\t\t<div id=\"box-busca\">
\t\t\t<ul class=\"nav nav-tabs\">
\t\t\t\t";
        // line 53
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
        foreach ($context['_seq'] as $context["_key"] => $context["tipo"]) {
            // line 54
            echo "\t\t\t\t<li ";
            if (isset($context["loop"])) { $_loop_ = $context["loop"]; } else { $_loop_ = null; }
            if ($this->getAttribute($_loop_, "first")) {
                echo " class=\"active\"";
            }
            echo "><a href=\"#";
            if (isset($context["tipo"])) { $_tipo_ = $context["tipo"]; } else { $_tipo_ = null; }
            echo twig_escape_filter($this->env, $this->getAttribute($_tipo_, "codigo"), "html", null, true);
            echo "\" data-toggle=\"tab\">";
            if (isset($context["tipo"])) { $_tipo_ = $context["tipo"]; } else { $_tipo_ = null; }
            echo twig_escape_filter($this->env, $this->getAttribute($_tipo_, "descricao_plural"), "html", null, true);
            echo "</a>
\t\t\t\t</li> ";
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
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['tipo'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        // line 56
        echo "\t\t\t</ul>
\t\t\t<div class=\"tab-content\">
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
        foreach ($context['_seq'] as $context["_key"] => $context["tipo"]) {
            // line 59
            echo "\t\t\t\t<div class=\"tab-pane ";
            if (isset($context["loop"])) { $_loop_ = $context["loop"]; } else { $_loop_ = null; }
            if ($this->getAttribute($_loop_, "first")) {
                echo "active";
            }
            echo "\"
\t\t\t\t\tid=\"";
            // line 60
            if (isset($context["tipo"])) { $_tipo_ = $context["tipo"]; } else { $_tipo_ = null; }
            echo twig_escape_filter($this->env, $this->getAttribute($_tipo_, "codigo"), "html", null, true);
            echo "\">
\t\t\t\t\t<form action=\"#\" method=\"post\">
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
            // line 87
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable(range(twig_date_format_filter($this->env, "now", "Y"), 1960));
            foreach ($context['_seq'] as $context["_key"] => $context["ano"]) {
                // line 88
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
            // line 90
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
            // line 103
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable(range(twig_date_format_filter($this->env, "now", "Y"), 1960));
            foreach ($context['_seq'] as $context["_key"] => $context["ano"]) {
                // line 104
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
            // line 106
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
            // line 116
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable(range(twig_date_format_filter($this->env, "now", "Y"), 1960));
            foreach ($context['_seq'] as $context["_key"] => $context["ano"]) {
                // line 117
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
            // line 119
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
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['tipo'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        // line 131
        echo "\t\t\t</div>
\t\t</div>

\t\t<div id=\"banner\">
\t\t\t<a href=\"anuncie\" title=\"Anuncie\"> <!-- <img src=\"//placehold.it/643x90\" alt=\"banner\" /> -->
\t\t\t\t<img src=\"";
        // line 136
        echo twig_escape_filter($this->env, $this->env->getExtension('Skull Twig')->url("/img/banner.jpg"), "html", null, true);
        echo "\" alt=\"banner\" />
\t\t\t</a>
\t\t</div>
\t</div>
</div>
";
    }

    // line 141
    public function block_conteudos($context, array $blocks = array())
    {
        // line 142
        echo "<div id=\"box-busca\">
\t<ul class=\"nav nav-tabs\">
\t\t";
        // line 144
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
        foreach ($context['_seq'] as $context["_key"] => $context["tipo"]) {
            // line 145
            echo "\t\t<li  ";
            if (isset($context["loop"])) { $_loop_ = $context["loop"]; } else { $_loop_ = null; }
            if ($this->getAttribute($_loop_, "first")) {
                echo " class=\"active\"  ";
            }
            echo "><a
\t\t\thref=\"#
\t\t\t";
            // line 147
            if (isset($context["tipo"])) { $_tipo_ = $context["tipo"]; } else { $_tipo_ = null; }
            echo twig_escape_filter($this->env, $this->getAttribute($_tipo_, "codigo"), "html", null, true);
            echo "\" data-toggle=\"tab\">";
            if (isset($context["tipo"])) { $_tipo_ = $context["tipo"]; } else { $_tipo_ = null; }
            echo twig_escape_filter($this->env, $this->getAttribute($_tipo_, "descricao_plural"), "html", null, true);
            echo "</a>
\t\t</li> ";
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
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['tipo'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        // line 149
        echo "\t</ul>
\t<div class=\"tab-content\">
\t\t";
        // line 151
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
        foreach ($context['_seq'] as $context["_key"] => $context["tipo"]) {
            // line 152
            echo "\t\t<div class=\"tab-pane ";
            if (isset($context["loop"])) { $_loop_ = $context["loop"]; } else { $_loop_ = null; }
            if ($this->getAttribute($_loop_, "first")) {
                echo "active";
            }
            echo "\"
\t\t\tid=\"";
            // line 153
            if (isset($context["tipo"])) { $_tipo_ = $context["tipo"]; } else { $_tipo_ = null; }
            echo twig_escape_filter($this->env, $this->getAttribute($_tipo_, "codigo"), "html", null, true);
            echo "\">
\t\t\t<form action=\"#\" method=\"post\">


\t\t\t\t<div class=\"row-fluid\">
\t\t\t\t\t<div class=\"span12\">
\t\t\t\t\t\t<div style=\"height: 12px; background: yellow\">
\t\t\t\t\t\t\t<div
\t\t\t\t\t\t\t\tstyle=\"width: 50%; border: none; padding: 0; margin: 0; display: block; float: left; height: 12px; background: red; outline: none;\"></div>
\t\t\t\t\t\t\t<div
\t\t\t\t\t\t\t\tstyle=\"width: 50%; border: none; padding: 0; margin: 0; display: block; float: left; height: 12px; background: blue; outline: none;\"></div>
\t\t\t\t\t\t</div>

\t\t\t\t\t\t<div class=\"control-group\">
\t\t\t\t\t\t\t<label class=\"control-label\">Veículo</label>
\t\t\t\t\t\t\t<div class=\"controls controls-row\">
\t\t\t\t\t\t\t\t<input type=\"text\" name=\"veiculo\" class=\"span4\" /><input
\t\t\t\t\t\t\t\t\ttype=\"text\" name=\"veiculo\" class=\"span4\" /><input type=\"text\"
\t\t\t\t\t\t\t\t\tname=\"veiculo\" class=\"span4\" />
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t</div>

\t\t\t\t<div class=\"row-fluid\">
\t\t\t\t\t<div class=\"span4\">
\t\t\t\t\t\t<div class=\"control-group\">
\t\t\t\t\t\t\t<label class=\"control-label\">Marca</label>
\t\t\t\t\t\t\t<div class=\"controls\">
\t\t\t\t\t\t\t\t<select class=\"span12 has-placeholder\" name=\"marca\">
\t\t\t\t\t\t\t\t\t<option value=\"\">Selecione</option>
\t\t\t\t\t\t\t\t</select>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t\t<div class=\"span4\">
\t\t\t\t\t\t<div class=\"control-group\">
\t\t\t\t\t\t\t<label class=\"control-label\">Veículo</label>
\t\t\t\t\t\t\t<div class=\"controls\">
\t\t\t\t\t\t\t\t<input type=\"text\" name=\"veiculo\" class=\"span12\" />
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t\t<div class=\"span4\">
\t\t\t\t\t\t<div class=\"control-group\">
\t\t\t\t\t\t\t<label class=\"control-label\">Ano</label>
\t\t\t\t\t\t\t<div class=\"controls\">
\t\t\t\t\t\t\t\t<select class=\"span12 has-placeholder\" name=\"ano\">
\t\t\t\t\t\t\t\t\t<option value=\"\">Selecione</option> ";
            // line 201
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable(range(twig_date_format_filter($this->env, "now", "Y"), 1960));
            foreach ($context['_seq'] as $context["_key"] => $context["ano"]) {
                // line 203
                echo "\t\t\t\t\t\t\t\t\t<option value=\"";
                if (isset($context["ano"])) { $_ano_ = $context["ano"]; } else { $_ano_ = null; }
                echo twig_escape_filter($this->env, $_ano_, "html", null, true);
                echo "\">";
                if (isset($context["ano"])) { $_ano_ = $context["ano"]; } else { $_ano_ = null; }
                echo twig_escape_filter($this->env, $_ano_, "html", null, true);
                echo "</option> ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['ano'], $context['_parent'], $context['loop']);
            $context = array_merge($_parent, array_intersect_key($context, $_parent));
            // line 204
            echo "\t\t\t\t\t\t\t\t</select>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t</div>

\t\t\t\t<div class=\"row-fluid\">
\t\t\t\t\t<div class=\"span4\">
\t\t\t\t\t\t<div class=\"control-group\">
\t\t\t\t\t\t\t<label class=\"control-label\">Estado</label>
\t\t\t\t\t\t\t<div class=\"controls\">
\t\t\t\t\t\t\t\t<select class=\"span12 has-placeholder\" name=\"ano\">
\t\t\t\t\t\t\t\t\t<option value=\"\">Selecione</option> ";
            // line 216
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable(range(twig_date_format_filter($this->env, "now", "Y"), 1960));
            foreach ($context['_seq'] as $context["_key"] => $context["ano"]) {
                // line 218
                echo "\t\t\t\t\t\t\t\t\t<option value=\"";
                if (isset($context["ano"])) { $_ano_ = $context["ano"]; } else { $_ano_ = null; }
                echo twig_escape_filter($this->env, $_ano_, "html", null, true);
                echo "\">";
                if (isset($context["ano"])) { $_ano_ = $context["ano"]; } else { $_ano_ = null; }
                echo twig_escape_filter($this->env, $_ano_, "html", null, true);
                echo "</option> ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['ano'], $context['_parent'], $context['loop']);
            $context = array_merge($_parent, array_intersect_key($context, $_parent));
            // line 219
            echo "\t\t\t\t\t\t\t\t</select>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t\t<div class=\"span4\">
\t\t\t\t\t\t<div class=\"control-group\">
\t\t\t\t\t\t\t<label class=\"control-label\">Cidade</label>
\t\t\t\t\t\t\t<div class=\"controls\">
\t\t\t\t\t\t\t\t<select class=\"span12 has-placeholder\" name=\"ano\">
\t\t\t\t\t\t\t\t\t<option value=\"\">Selecione</option> ";
            // line 228
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable(range(twig_date_format_filter($this->env, "now", "Y"), 1960));
            foreach ($context['_seq'] as $context["_key"] => $context["ano"]) {
                // line 230
                echo "\t\t\t\t\t\t\t\t\t<option value=\"";
                if (isset($context["ano"])) { $_ano_ = $context["ano"]; } else { $_ano_ = null; }
                echo twig_escape_filter($this->env, $_ano_, "html", null, true);
                echo "\">";
                if (isset($context["ano"])) { $_ano_ = $context["ano"]; } else { $_ano_ = null; }
                echo twig_escape_filter($this->env, $_ano_, "html", null, true);
                echo "</option> ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['ano'], $context['_parent'], $context['loop']);
            $context = array_merge($_parent, array_intersect_key($context, $_parent));
            // line 231
            echo "\t\t\t\t\t\t\t\t</select>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t\t<div class=\"span4\">
\t\t\t\t\t\t<div class=\"control-group\">
\t\t\t\t\t\t\t<label class=\"control-label\">s</label>
\t\t\t\t\t\t\t<div class=\"controls\">
\t\t\t\t\t\t\t\t<button type=\"submit\" class=\"btn\">Buscar</button>
\t\t\t\t\t\t\t\t<input type=\"checkbox\"> Apenas lojas
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t</div>
\t\t\t</form>
\t\t</div>
\t\t";
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
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['tipo'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        // line 248
        echo "\t</div>
</div>

<div style=\"float: left; margin-left: 20px; width: 643px;\">
\t<div id=\"tabs\" class=\"Buscador\">
\t\t<ul>
\t\t\t<li><a href=\"#tabs-1\">carros</a></li>
\t\t\t<li><a href=\"#tabs-2\">motos</a></li>
\t\t\t<li><a href=\"#tabs-3\">caminhões</a></li>
\t\t\t<li><a href=\"#tabs-4\">ônibus</a></li>
\t\t\t<li><a href=\"#tabs-5\">naútica</a></li>
\t\t\t<li><a href=\"#tabs-6\">outros</a></li>
\t\t</ul>
\t\t<div id=\"tabs-1\">

\t\t\t<div class=\"Campos\">
\t\t\t\tMarca<br> <select class=\"select\"><option>Selecione</option>
\t\t\t\t</select>
\t\t\t</div>
\t\t\t<div class=\"Campos\">
\t\t\t\tVeículo<br> <input type=\"text\" class=\"input\">
\t\t\t</div>
\t\t\t<div class=\"Campos\">
\t\t\t\tAno<br> <select class=\"select\"><option>Selecione</option>
\t\t\t\t</select>
\t\t\t</div>

\t\t\t<div style=\"clear: both\"></div>

\t\t\t<div class=\"Campos\">
\t\t\t\tEstado<br> <select class=\"select\"><option>Selecione</option>
\t\t\t\t</select>
\t\t\t</div>
\t\t\t<div class=\"Campos\">
\t\t\t\tCidade<br> <select class=\"select\"><option>Selecione</option>
\t\t\t\t</select>
\t\t\t</div>
\t\t\t<div class=\"Campos\" id=\"Botao\">
\t\t\t\t<input type=\"submit\" value=\"Buscar\" class=\"BtBusca\"> <input
\t\t\t\t\ttype=\"checkbox\"> Apenas lojas
\t\t\t</div>

\t\t\t<div style=\"clear: both\"></div>

\t\t</div>
\t\t<div id=\"tabs-2\">

\t\t\t<div class=\"Campos\">
\t\t\t\tMarca<br> <select class=\"select\"><option>Selecione</option>
\t\t\t\t</select>
\t\t\t</div>
\t\t\t<div class=\"Campos\">
\t\t\t\tVeículo<br> <input type=\"text\" class=\"input\">
\t\t\t</div>
\t\t\t<div class=\"Campos\">
\t\t\t\tAno<br> <select class=\"select\"><option>Selecione</option>
\t\t\t\t</select>
\t\t\t</div>

\t\t\t<div style=\"clear: both\"></div>

\t\t\t<div class=\"Campos\">
\t\t\t\tEstado<br> <select class=\"select\"><option>Selecione</option>
\t\t\t\t</select>
\t\t\t</div>
\t\t\t<div class=\"Campos\">
\t\t\t\tCidade<br> <select class=\"select\"><option>Selecione</option>
\t\t\t\t</select>
\t\t\t</div>
\t\t\t<div class=\"Campos\" id=\"Botao\">
\t\t\t\t<input type=\"submit\" value=\"Buscar\" class=\"BtBusca\"> <input
\t\t\t\t\ttype=\"checkbox\"> Apenas lojas
\t\t\t</div>

\t\t\t<div style=\"clear: both\"></div>

\t\t</div>
\t\t<div id=\"tabs-3\">

\t\t\t<div class=\"Campos\">
\t\t\t\tMarca<br> <select class=\"select\"><option>Selecione</option>
\t\t\t\t</select>
\t\t\t</div>
\t\t\t<div class=\"Campos\">
\t\t\t\tVeículo<br> <input type=\"text\" class=\"input\">
\t\t\t</div>
\t\t\t<div class=\"Campos\">
\t\t\t\tAno<br> <select class=\"select\"><option>Selecione</option>
\t\t\t\t</select>
\t\t\t</div>

\t\t\t<div style=\"clear: both\"></div>

\t\t\t<div class=\"Campos\">
\t\t\t\tEstado<br> <select class=\"select\"><option>Selecione</option>
\t\t\t\t</select>
\t\t\t</div>
\t\t\t<div class=\"Campos\">
\t\t\t\tCidade<br> <select class=\"select\"><option>Selecione</option>
\t\t\t\t</select>
\t\t\t</div>
\t\t\t<div class=\"Campos\" id=\"Botao\">
\t\t\t\t<input type=\"submit\" value=\"Buscar\" class=\"BtBusca\"> <input
\t\t\t\t\ttype=\"checkbox\"> Apenas lojas
\t\t\t</div>

\t\t\t<div style=\"clear: both\"></div>

\t\t</div>
\t\t<div id=\"tabs-4\">

\t\t\t<div class=\"Campos\">
\t\t\t\tMarca<br> <select class=\"select\"><option>Selecione</option>
\t\t\t\t</select>
\t\t\t</div>
\t\t\t<div class=\"Campos\">
\t\t\t\tVeículo<br> <input type=\"text\" class=\"input\">
\t\t\t</div>
\t\t\t<div class=\"Campos\">
\t\t\t\tAno<br> <select class=\"select\"><option>Selecione</option>
\t\t\t\t</select>
\t\t\t</div>

\t\t\t<div style=\"clear: both\"></div>

\t\t\t<div class=\"Campos\">
\t\t\t\tEstado<br> <select class=\"select\"><option>Selecione</option>
\t\t\t\t</select>
\t\t\t</div>
\t\t\t<div class=\"Campos\">
\t\t\t\tCidade<br> <select class=\"select\"><option>Selecione</option>
\t\t\t\t</select>
\t\t\t</div>
\t\t\t<div class=\"Campos\" id=\"Botao\">
\t\t\t\t<input type=\"submit\" value=\"Buscar\" class=\"BtBusca\"> <input
\t\t\t\t\ttype=\"checkbox\"> Apenas lojas
\t\t\t</div>

\t\t\t<div style=\"clear: both\"></div>

\t\t</div>
\t\t<div id=\"tabs-5\">

\t\t\t<div class=\"Campos\">
\t\t\t\tMarca<br> <select class=\"select\"><option>Selecione</option>
\t\t\t\t</select>
\t\t\t</div>
\t\t\t<div class=\"Campos\">
\t\t\t\tVeículo<br> <input type=\"text\" class=\"input\">
\t\t\t</div>
\t\t\t<div class=\"Campos\">
\t\t\t\tAno<br> <select class=\"select\"><option>Selecione</option>
\t\t\t\t</select>
\t\t\t</div>

\t\t\t<div style=\"clear: both\"></div>

\t\t\t<div class=\"Campos\">
\t\t\t\tEstado<br> <select class=\"select\"><option>Selecione</option>
\t\t\t\t</select>
\t\t\t</div>
\t\t\t<div class=\"Campos\">
\t\t\t\tCidade<br> <select class=\"select\"><option>Selecione</option>
\t\t\t\t</select>
\t\t\t</div>
\t\t\t<div class=\"Campos\" id=\"Botao\">
\t\t\t\t<input type=\"submit\" value=\"Buscar\" class=\"BtBusca\"> <input
\t\t\t\t\ttype=\"checkbox\"> Apenas lojas
\t\t\t</div>

\t\t\t<div style=\"clear: both\"></div>

\t\t</div>
\t\t<div id=\"tabs-6\">

\t\t\t<div class=\"Campos\">
\t\t\t\tMarca<br> <select class=\"select\"><option>Selecione</option>
\t\t\t\t</select>
\t\t\t</div>
\t\t\t<div class=\"Campos\">
\t\t\t\tVeículo<br> <input type=\"text\" class=\"input\">
\t\t\t</div>
\t\t\t<div class=\"Campos\">
\t\t\t\tAno<br> <select class=\"select\"><option>Selecione</option>
\t\t\t\t</select>
\t\t\t</div>

\t\t\t<div style=\"clear: both\"></div>

\t\t\t<div class=\"Campos\">
\t\t\t\tEstado<br> <select class=\"select\"><option>Selecione</option>
\t\t\t\t</select>
\t\t\t</div>
\t\t\t<div class=\"Campos\">
\t\t\t\tCidade<br> <select class=\"select\"><option>Selecione</option>
\t\t\t\t</select>
\t\t\t</div>
\t\t\t<div class=\"Campos\" id=\"Botao\">
\t\t\t\t<input type=\"submit\" value=\"Buscar\" class=\"BtBusca\"> <input
\t\t\t\t\ttype=\"checkbox\"> Apenas lojas
\t\t\t</div>

\t\t\t<div style=\"clear: both\"></div>

\t\t</div>
\t</div>
</div>

<div class=\"BannerHome\"></div>

<div style=\"clear: both\"></div>

<div id=\"tabsHome\" class=\"DestaquesHome\">
\t<ul>
\t\t<li><a href=\"#tabs-1_home\">carros</a></li>
\t\t<li><a href=\"#tabs-2_home\">motos</a></li>
\t\t<li><a href=\"#tabs-3_home\">caminhões</a></li>
\t\t<li><a href=\"#tabs-4_home\">ônibus</a></li>
\t\t<li><a href=\"#tabs-5_home\">naútica</a></li>
\t\t<li><a href=\"#tabs-6_home\">outros</a></li>
\t</ul>
\t<div id=\"tabs-1_home\">

\t\t<ul class=\"prettyGallery\">
\t\t\t";
        // line 472
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable(range(1, 20));
        foreach ($context['_seq'] as $context["_key"] => $context["i"]) {
            // line 473
            echo "\t\t\t<li>

\t\t\t\t<div class=\"DestaqueHomeItem\">

\t\t\t\t\t<div class=\"imagem\">
\t\t\t\t\t\t<a href=\"index.php\" class=\"LinkFotoDestaque\"></a>
\t\t\t\t\t</div>
\t\t\t\t\t<div class=\"DadosDestaque\">
\t\t\t\t\t\t<strong>Chevrolet - Vectra</strong><br> Ano 2011/2012<br> Gaudério
\t\t\t\t\t\tVeículos<br> <span class=\"ValorDestaque\">R\$ 22.000,00</span>
\t\t\t\t\t</div>

\t\t\t\t</div>

\t\t\t</li> ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['i'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        // line 488
        echo "\t\t</ul>

\t\t<div style=\"clear: both\"></div>

\t</div>
\t<div id=\"tabs-2_home\">

\t\t<ul class=\"prettyGallery\">
\t\t\t";
        // line 496
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable(range(1, 20));
        foreach ($context['_seq'] as $context["_key"] => $context["i"]) {
            // line 497
            echo "\t\t\t<li>

\t\t\t\t<div class=\"DestaqueHomeItem\">

\t\t\t\t\t<div class=\"imagem\">
\t\t\t\t\t\t<a href=\"index.php\" class=\"LinkFotoDestaque\"></a>
\t\t\t\t\t</div>
\t\t\t\t\t<div class=\"DadosDestaque\">
\t\t\t\t\t\t<strong>Chevrolet - Vectra</strong><br> Ano 2011/2012<br> Gaudério
\t\t\t\t\t\tVeículos<br> <span class=\"ValorDestaque\">R\$ 22.000,00</span>
\t\t\t\t\t</div>

\t\t\t\t</div>

\t\t\t</li> ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['i'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        // line 512
        echo "\t\t</ul>

\t\t<div style=\"clear: both\"></div>

\t</div>
\t<div id=\"tabs-3_home\"></div>
\t<div id=\"tabs-4_home\"></div>
\t<div id=\"tabs-5_home\"></div>
\t<div id=\"tabs-6_home\"></div>
</div>

";
    }

    // line 523
    public function block_scripts($context, array $blocks = array())
    {
        // line 524
        echo "<script>
\$(function() {
\t/*
\tvar \$form = \$('#box-cadastro form');
\tvar \$nome = \$form.find('input[name=\"nome\"]');
\tvar \$email = \$form.find('input[name=\"email\"]');
\tvar \$senha = \$form.find('input[name=\"senha\"]');
\tvar \$confirmarSenha = \$form.find('input[name=\"confirmar-senha\"]');

\tvar onChange = function() {
\t\t\$(this).closest('.control-group').removeClass('error');
\t};
\t
\t\$nome.on('keydown paste input change', onChange);
\t\$email.on('keydown paste input change', onChange);
\t\$senha.on('keydown paste input change', onChange);
\t\$confirmarSenha.on('keydown paste input change', onChange);

\t\$form.on('submit', function(event) {
\t\tvar form_valido = true;

\t\tif (!(\$nome.val().length > 0)) {
\t\t\tform_valido = false;
\t\t\t\$nome.closest('.control-group').addClass('error');
\t\t}
\t\tif (!(\$email.val().length > 0) || /^[a-zA-Z0-9\\._-]+@[a-zA-Z0-9\\._-]+\$/.test(\$email.val())) {
\t\t\tform_valido = false;
\t\t\t\$email.closest('.control-group').addClass('error');
\t\t}
\t\tif (!(\$senha.val().length > 0 || \$confirmarSenha.val().length > 0 && \$senha.val() == \$confirmarSenha.val())) {
\t\t\tform_valido = false;
\t\t\t\$senha.closest('.control-group').addClass('error');
\t\t\t\$confirmarSenha.closest('.control-group').addClass('error');
\t\t}

\t\tif (!form_valido)
\t\t\treturn event.preventDefault();
\t});*/

\t\$('.has-placeholder').on('keyup change', function() {
\t\t \$(this)[(\$(this).val() == '') ? 'addClass' : 'removeClass']('empty');
\t});
\t\$('.has-placeholder').trigger('change');
});
</script>
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
        return array (  853 => 524,  850 => 523,  835 => 512,  815 => 497,  811 => 496,  801 => 488,  781 => 473,  777 => 472,  551 => 248,  521 => 231,  509 => 230,  505 => 228,  494 => 219,  482 => 218,  478 => 216,  464 => 204,  452 => 203,  448 => 201,  396 => 153,  388 => 152,  370 => 151,  366 => 149,  346 => 147,  337 => 145,  319 => 144,  315 => 142,  312 => 141,  302 => 136,  295 => 131,  270 => 119,  257 => 117,  253 => 116,  241 => 106,  228 => 104,  224 => 103,  209 => 90,  196 => 88,  192 => 87,  161 => 60,  153 => 59,  135 => 58,  131 => 56,  105 => 54,  87 => 53,  42 => 11,  33 => 4,  30 => 3,);
    }
}

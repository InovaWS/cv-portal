<?php

/* busca/3.twig */
class __TwigTemplate_0f216769108e40186050fbc361b016d3 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<form action=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('Rio\Slim\TwigExtension')->url("/busca"), "html", null, true);
        echo "\" method=\"get\" class=\"form-vertical clearfix\">
\t<h4>Busca por caminhões</h4>
\t
\t<div class=\"row-fluid\">
\t\t<div class=\"span4\">
\t\t\t<div class=\"control-group\">
\t\t\t\t<label class=\"control-label\" for=\"busca-";
        // line 7
        if (isset($context["tipo_de_veiculo"])) { $_tipo_de_veiculo_ = $context["tipo_de_veiculo"]; } else { $_tipo_de_veiculo_ = null; }
        echo twig_escape_filter($this->env, $this->getAttribute($_tipo_de_veiculo_, "id"), "html", null, true);
        echo "-descricao\">Descrição</label>
\t\t\t\t<div class=\"controls\">
\t\t\t\t\t<input type=\"text\" id=\"busca-";
        // line 9
        if (isset($context["tipo_de_veiculo"])) { $_tipo_de_veiculo_ = $context["tipo_de_veiculo"]; } else { $_tipo_de_veiculo_ = null; }
        echo twig_escape_filter($this->env, $this->getAttribute($_tipo_de_veiculo_, "id"), "html", null, true);
        echo "-descricao\" name=\"descricao\" placeholder=\"Qualquer descrição\" class=\"span12\">
\t\t\t\t</div>
\t\t\t</div>
\t\t</div>
\t\t
\t\t<div class=\"span4\">
\t\t\t<div class=\"control-group\">
\t\t\t\t<label class=\"control-label\" for=\"busca-";
        // line 16
        if (isset($context["tipo_de_veiculo"])) { $_tipo_de_veiculo_ = $context["tipo_de_veiculo"]; } else { $_tipo_de_veiculo_ = null; }
        echo twig_escape_filter($this->env, $this->getAttribute($_tipo_de_veiculo_, "id"), "html", null, true);
        echo "-marca\">Marca</label>
\t\t\t\t<div class=\"controls\">
\t\t\t\t\t<select id=\"busca-";
        // line 18
        if (isset($context["tipo_de_veiculo"])) { $_tipo_de_veiculo_ = $context["tipo_de_veiculo"]; } else { $_tipo_de_veiculo_ = null; }
        echo twig_escape_filter($this->env, $this->getAttribute($_tipo_de_veiculo_, "id"), "html", null, true);
        echo "-marca\" name=\"marca\" class=\"span12\">
\t\t\t\t\t\t<option value=\"\">Todas</option>
\t\t\t\t\t\t";
        // line 20
        if (isset($context["tipo_de_veiculo"])) { $_tipo_de_veiculo_ = $context["tipo_de_veiculo"]; } else { $_tipo_de_veiculo_ = null; }
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute($_tipo_de_veiculo_, "marcas"));
        foreach ($context['_seq'] as $context["_key"] => $context["marca"]) {
            // line 21
            echo "\t\t\t\t\t\t<option value=\"";
            if (isset($context["marca"])) { $_marca_ = $context["marca"]; } else { $_marca_ = null; }
            echo twig_escape_filter($this->env, $this->getAttribute($_marca_, "id"), "html", null, true);
            echo "\">";
            if (isset($context["marca"])) { $_marca_ = $context["marca"]; } else { $_marca_ = null; }
            echo twig_escape_filter($this->env, $this->getAttribute($_marca_, "descricao"), "html", null, true);
            echo "</option>
\t\t\t\t\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['marca'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        // line 23
        echo "\t\t\t\t\t</select>
\t\t\t\t</div>
\t\t\t</div>
\t\t</div>
\t\t
\t\t<div class=\"span4\">
\t\t\t<div class=\"control-group\">
\t\t\t\t<label class=\"control-label\" for=\"busca-";
        // line 30
        if (isset($context["tipo_de_veiculo"])) { $_tipo_de_veiculo_ = $context["tipo_de_veiculo"]; } else { $_tipo_de_veiculo_ = null; }
        echo twig_escape_filter($this->env, $this->getAttribute($_tipo_de_veiculo_, "id"), "html", null, true);
        echo "-ano\">Ano</label>
\t\t\t\t<div class=\"controls\">
\t\t\t\t\t<select id=\"busca-";
        // line 32
        if (isset($context["tipo_de_veiculo"])) { $_tipo_de_veiculo_ = $context["tipo_de_veiculo"]; } else { $_tipo_de_veiculo_ = null; }
        echo twig_escape_filter($this->env, $this->getAttribute($_tipo_de_veiculo_, "id"), "html", null, true);
        echo "-ano\" name=\"ano\" class=\"span12\">
\t\t\t\t\t\t<option value=\"\">Todos</option>
\t\t\t\t\t\t";
        // line 34
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable(range(twig_date_format_filter($this->env, "now", "Y"), 1960));
        foreach ($context['_seq'] as $context["_key"] => $context["ano"]) {
            // line 35
            echo "\t\t\t\t\t\t<option value=\"";
            if (isset($context["ano"])) { $_ano_ = $context["ano"]; } else { $_ano_ = null; }
            echo twig_escape_filter($this->env, $_ano_, "html", null, true);
            echo "\">";
            if (isset($context["ano"])) { $_ano_ = $context["ano"]; } else { $_ano_ = null; }
            echo twig_escape_filter($this->env, $_ano_, "html", null, true);
            echo "</option>
\t\t\t\t\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['ano'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        // line 37
        echo "\t\t\t\t\t</select>
\t\t\t\t</div>
\t\t\t</div>
\t\t</div>
\t</div>
\t
\t<h4>Localizados em</h4>
\t
\t<div class=\"row-fluid\">
\t\t<div class=\"span4\">
\t\t\t<div class=\"control-group\">
\t\t\t\t<label class=\"control-label\" for=\"busca-";
        // line 48
        if (isset($context["tipo_de_veiculo"])) { $_tipo_de_veiculo_ = $context["tipo_de_veiculo"]; } else { $_tipo_de_veiculo_ = null; }
        echo twig_escape_filter($this->env, $this->getAttribute($_tipo_de_veiculo_, "id"), "html", null, true);
        echo "-estado\">Estado</label>
\t\t\t\t<div class=\"controls\">
\t\t\t\t\t<select id=\"busca-";
        // line 50
        if (isset($context["tipo_de_veiculo"])) { $_tipo_de_veiculo_ = $context["tipo_de_veiculo"]; } else { $_tipo_de_veiculo_ = null; }
        echo twig_escape_filter($this->env, $this->getAttribute($_tipo_de_veiculo_, "id"), "html", null, true);
        echo "-estado\" name=\"estado\" data-select-cidades=\"#busca-";
        if (isset($context["tipo_de_veiculo"])) { $_tipo_de_veiculo_ = $context["tipo_de_veiculo"]; } else { $_tipo_de_veiculo_ = null; }
        echo twig_escape_filter($this->env, $this->getAttribute($_tipo_de_veiculo_, "id"), "html", null, true);
        echo "-cidade\" class=\"span12\">
\t\t\t\t\t\t<option value=\"\">Todos</option>
\t\t\t\t\t\t";
        // line 52
        if (isset($context["estados"])) { $_estados_ = $context["estados"]; } else { $_estados_ = null; }
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($_estados_);
        foreach ($context['_seq'] as $context["_key"] => $context["estado"]) {
            // line 53
            echo "\t\t\t\t\t\t<option value=\"";
            if (isset($context["estado"])) { $_estado_ = $context["estado"]; } else { $_estado_ = null; }
            echo twig_escape_filter($this->env, $this->getAttribute($_estado_, "id"), "html", null, true);
            echo "\">";
            if (isset($context["estado"])) { $_estado_ = $context["estado"]; } else { $_estado_ = null; }
            echo twig_escape_filter($this->env, $this->getAttribute($_estado_, "nome"), "html", null, true);
            echo "</option>
\t\t\t\t\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['estado'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        // line 55
        echo "\t\t\t\t\t</select>
\t\t\t\t</div>
\t\t\t</div>
\t\t</div>
\t\t\t\t
\t\t<div class=\"span4\">
\t\t\t<div class=\"control-group\">
\t\t\t\t<label class=\"control-label\" for=\"busca-";
        // line 62
        if (isset($context["tipo_de_veiculo"])) { $_tipo_de_veiculo_ = $context["tipo_de_veiculo"]; } else { $_tipo_de_veiculo_ = null; }
        echo twig_escape_filter($this->env, $this->getAttribute($_tipo_de_veiculo_, "id"), "html", null, true);
        echo "-cidade\">Cidade</label>
\t\t\t\t<div class=\"controls\">
\t\t\t\t\t<select id=\"busca-";
        // line 64
        if (isset($context["tipo_de_veiculo"])) { $_tipo_de_veiculo_ = $context["tipo_de_veiculo"]; } else { $_tipo_de_veiculo_ = null; }
        echo twig_escape_filter($this->env, $this->getAttribute($_tipo_de_veiculo_, "id"), "html", null, true);
        echo "-cidade\" name=\"cidade\" class=\"span12\">
\t\t\t\t\t\t<option value=\"\">Todas</option>
\t\t\t\t\t\t";
        // line 66
        if (isset($context["cidades"])) { $_cidades_ = $context["cidades"]; } else { $_cidades_ = null; }
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($_cidades_);
        foreach ($context['_seq'] as $context["_key"] => $context["cidade"]) {
            // line 67
            echo "\t\t\t\t\t\t<option value=\"";
            if (isset($context["cidade"])) { $_cidade_ = $context["cidade"]; } else { $_cidade_ = null; }
            echo twig_escape_filter($this->env, $this->getAttribute($_cidade_, "id"), "html", null, true);
            echo "\">";
            if (isset($context["cidade"])) { $_cidade_ = $context["cidade"]; } else { $_cidade_ = null; }
            echo twig_escape_filter($this->env, $this->getAttribute($_cidade_, "descricao"), "html", null, true);
            echo "</option>
\t\t\t\t\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['cidade'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        // line 69
        echo "\t\t\t\t\t</select>
\t\t\t\t</div>
\t\t\t</div>
\t\t</div>
\t\t
\t\t<div class=\"span4\">
\t\t\t<div class=\"control-group\">
\t\t\t\t<label class=\"control-label\">&nbsp;</label>
\t\t\t\t<div class=\"controls\">
\t\t\t\t\t<label class=\"checkbox\"><input type=\"checkbox\" name=\"apenas-lojas\" value=\"1\"> Apenas lojas</label>
\t\t\t\t</div>
\t\t\t</div>
\t\t</div>
\t</div>
\t
\t<div class=\"clearfix\">
\t\t<div class=\"pull-left\">
\t\t\t<button type=\"submit\" class=\"btn btn-primary\">Buscar</button>
\t\t</div>
\t</div>
</form>";
    }

    public function getTemplateName()
    {
        return "busca/3.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  199 => 69,  186 => 67,  175 => 64,  160 => 55,  142 => 52,  133 => 50,  127 => 48,  101 => 35,  97 => 34,  91 => 32,  63 => 21,  46 => 16,  35 => 9,  29 => 7,  19 => 1,  269 => 137,  264 => 68,  259 => 139,  257 => 138,  255 => 137,  251 => 136,  226 => 113,  216 => 108,  212 => 107,  193 => 95,  189 => 94,  169 => 62,  159 => 69,  157 => 68,  147 => 53,  132 => 55,  128 => 54,  121 => 49,  115 => 47,  109 => 45,  106 => 44,  102 => 43,  98 => 42,  94 => 41,  85 => 30,  76 => 23,  68 => 26,  65 => 24,  58 => 20,  55 => 21,  52 => 18,  41 => 16,  34 => 13,  21 => 1,  203 => 100,  196 => 71,  181 => 66,  177 => 68,  166 => 67,  148 => 66,  143 => 63,  122 => 60,  114 => 37,  96 => 58,  89 => 53,  48 => 18,  45 => 14,  42 => 13,  40 => 12,  38 => 15,  33 => 8,  30 => 7,  25 => 3,);
    }
}

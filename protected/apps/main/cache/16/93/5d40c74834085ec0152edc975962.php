<?php

/* busca/motos.twig */
class __TwigTemplate_16935d40c74834085ec0152edc975962 extends Twig_Template
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
        echo "\" method=\"get\">
\t<div class=\"row-fluid\">
\t\t<div class=\"span4\">
\t\t\t<div class=\"control-group\">
\t\t\t\t<label class=\"control-label\">Marca</label>
\t\t\t\t<div class=\"controls\">
\t\t\t\t\t<select class=\"span12 has-placeholder\" name=\"marca\">
\t\t\t\t\t\t<option value=\"\">Selecione</option>
\t\t\t\t\t</select>
\t\t\t\t</div>
\t\t\t</div>
\t\t</div>
\t\t<div class=\"span4\">
\t\t\t<div class=\"control-group\">
\t\t\t\t<label class=\"control-label\">Veículo</label>
\t\t\t\t<div class=\"controls\">
\t\t\t\t\t<input type=\"text\" name=\"veiculo\" class=\"span12\" />
\t\t\t\t</div>
\t\t\t</div>
\t\t</div>
\t\t<div class=\"span4\">
\t\t\t<div class=\"control-group\">
\t\t\t\t<label class=\"control-label\">Ano</label>
\t\t\t\t<div class=\"controls\">
\t\t\t\t\t<select class=\"span12 has-placeholder\" name=\"ano\">
\t\t\t\t\t\t<option value=\"\">Selecione</option>
\t\t\t\t\t\t";
        // line 27
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable(range(twig_date_format_filter($this->env, "now", "Y"), 1960));
        foreach ($context['_seq'] as $context["_key"] => $context["ano"]) {
            // line 28
            echo "\t\t\t\t\t\t<option value=\"";
            echo twig_escape_filter($this->env, (isset($context["ano"]) ? $context["ano"] : null), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, (isset($context["ano"]) ? $context["ano"] : null), "html", null, true);
            echo "</option>
\t\t\t\t\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['ano'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        // line 30
        echo "\t\t\t\t\t</select>
\t\t\t\t</div>
\t\t\t</div>
\t\t</div>
\t</div>

\t<div class=\"row-fluid\">
\t\t<div class=\"span4\">
\t\t\t<div class=\"control-group\">
\t\t\t\t<label class=\"control-label\">Estado</label>
\t\t\t\t<div class=\"controls\">
\t\t\t\t\t<select class=\"span12 has-placeholder\" name=\"ano\">
\t\t\t\t\t\t<option value=\"\">Selecione</option>
\t\t\t\t\t\t";
        // line 43
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable(range(twig_date_format_filter($this->env, "now", "Y"), 1960));
        foreach ($context['_seq'] as $context["_key"] => $context["ano"]) {
            // line 44
            echo "\t\t\t\t\t\t<option value=\"";
            echo twig_escape_filter($this->env, (isset($context["ano"]) ? $context["ano"] : null), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, (isset($context["ano"]) ? $context["ano"] : null), "html", null, true);
            echo "</option>
\t\t\t\t\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['ano'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        // line 46
        echo "\t\t\t\t\t</select>
\t\t\t\t</div>
\t\t\t</div>
\t\t</div>
\t\t<div class=\"span4\">
\t\t\t<div class=\"control-group\">
\t\t\t\t<label class=\"control-label\">Cidade</label>
\t\t\t\t<div class=\"controls\">
\t\t\t\t\t<select class=\"span12 has-placeholder\" name=\"ano\">
\t\t\t\t\t\t<option value=\"\">Selecione</option>
\t\t\t\t\t\t";
        // line 56
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable(range(twig_date_format_filter($this->env, "now", "Y"), 1960));
        foreach ($context['_seq'] as $context["_key"] => $context["ano"]) {
            // line 57
            echo "\t\t\t\t\t\t<option value=\"";
            echo twig_escape_filter($this->env, (isset($context["ano"]) ? $context["ano"] : null), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, (isset($context["ano"]) ? $context["ano"] : null), "html", null, true);
            echo "</option>
\t\t\t\t\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['ano'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        // line 59
        echo "\t\t\t\t\t</select>
\t\t\t\t</div>
\t\t\t</div>
\t\t</div>
\t\t<div class=\"span4\">
\t\t\t<button type=\"submit\" class=\"btn\">Buscar</button>
\t\t\t<input type=\"checkbox\"> Apenas lojas
\t\t</div>
\t</div>
</form>";
    }

    public function getTemplateName()
    {
        return "busca/motos.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  121 => 59,  110 => 57,  106 => 56,  94 => 46,  83 => 44,  79 => 43,  64 => 30,  53 => 28,  49 => 27,  19 => 1,);
    }
}

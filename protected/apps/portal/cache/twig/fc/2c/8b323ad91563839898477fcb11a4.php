<?php

/* dados/visualizar.twig */
class __TwigTemplate_fc2c8b323ad91563839898477fcb11a4 extends Twig_Template
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
        $context["pagina"] = array("titulo" => "Meus dados", "css_route" => "page");
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 8
    public function block_conteudo($context, array $blocks = array())
    {
        // line 9
        echo "<div class=\"page-header\">
\t<h2>Meus dados</h1>
\t<p class=\"muted\">Abaixo estão todos os seus dados cadastrais. Caso necessite alterar algum dado, basta clicar em
\t<strong>modificar informações</strong> para obter a tela de edição de seus dados.</p>
</div>

<h3>Dados de usuário</h3>
<dl class=\"dl-horizontal well\">
\t<dt>Login / e-mail</dt>
\t<dd>";
        // line 18
        if (isset($context["usuario_logado"])) { $_usuario_logado_ = $context["usuario_logado"]; } else { $_usuario_logado_ = null; }
        echo twig_escape_filter($this->env, $this->getAttribute($_usuario_logado_, "usuario"), "html", null, true);
        echo "</dd>
\t
\t<dt>Senha</dt>
\t<dd>";
        // line 21
        if (isset($context["usuario_logado"])) { $_usuario_logado_ = $context["usuario_logado"]; } else { $_usuario_logado_ = null; }
        echo $this->env->getExtension('Rio\Twig\TwigExtension')->repeat("&#8226;", twig_length_filter($this->env, $this->getAttribute($_usuario_logado_, "senha")));
        echo "</dd>
\t
\t<dt>Nome</dt>
\t<dd>";
        // line 24
        if (isset($context["usuario_logado"])) { $_usuario_logado_ = $context["usuario_logado"]; } else { $_usuario_logado_ = null; }
        echo twig_escape_filter($this->env, $this->getAttribute($_usuario_logado_, "nome"), "html", null, true);
        echo "</dd>
</dl>

<p><a href=\"";
        // line 27
        echo twig_escape_filter($this->env, $this->env->getExtension('Rio\Twig\TwigExtension')->url("/meus-dados/modificar-usuario"), "html", null, true);
        echo "\">Modificar estes dados</a></p>

<h3>Dados de vendedor</h3>
";
        // line 30
        if (isset($context["usuario_logado"])) { $_usuario_logado_ = $context["usuario_logado"]; } else { $_usuario_logado_ = null; }
        $context["vendedor"] = $this->getAttribute($_usuario_logado_, "vendedor");
        // line 31
        if (isset($context["vendedor"])) { $_vendedor_ = $context["vendedor"]; } else { $_vendedor_ = null; }
        $context["tipo_vendedor"] = $this->getAttribute($_vendedor_, "tipo");
        // line 32
        echo "<dl class=\"dl-horizontal well\">
\t<dt>Tipo</dt>
\t<dd>";
        // line 34
        if (isset($context["tipo_vendedor"])) { $_tipo_vendedor_ = $context["tipo_vendedor"]; } else { $_tipo_vendedor_ = null; }
        echo twig_escape_filter($this->env, $this->getAttribute($_tipo_vendedor_, "descricao"), "html", null, true);
        echo "</dd>
\t
\t";
        // line 36
        if (isset($context["vendedor"])) { $_vendedor_ = $context["vendedor"]; } else { $_vendedor_ = null; }
        if (($this->getAttribute($_vendedor_, "id_tipo") == 1)) {
            // line 37
            echo "\t<dt>Nome</dt>
\t<dd>";
            // line 38
            if (isset($context["vendedor"])) { $_vendedor_ = $context["vendedor"]; } else { $_vendedor_ = null; }
            echo twig_escape_filter($this->env, $this->getAttribute($_vendedor_, "nome"), "html", null, true);
            echo "</dd>
\t
\t<dt>CPF</dt>
\t<dd>";
            // line 41
            if (isset($context["vendedor"])) { $_vendedor_ = $context["vendedor"]; } else { $_vendedor_ = null; }
            echo twig_escape_filter($this->env, $this->env->getExtension('Rio\Twig\TwigExtension')->coalesce($this->getAttribute($_vendedor_, "cpf"), "-"), "html", null, true);
            echo "</dd>
\t";
        } else {
            // line 43
            echo "\t<dt>Nome fantasia</dt>
\t<dd>";
            // line 44
            if (isset($context["vendedor"])) { $_vendedor_ = $context["vendedor"]; } else { $_vendedor_ = null; }
            echo twig_escape_filter($this->env, $this->env->getExtension('Rio\Twig\TwigExtension')->coalesce($this->getAttribute($_vendedor_, "nome_fantasia"), "-"), "html", null, true);
            echo "</dd>
\t
\t<dt>Razão social</dt>
\t<dd>";
            // line 47
            if (isset($context["vendedor"])) { $_vendedor_ = $context["vendedor"]; } else { $_vendedor_ = null; }
            echo twig_escape_filter($this->env, $this->env->getExtension('Rio\Twig\TwigExtension')->coalesce($this->getAttribute($_vendedor_, "razao_social"), "-"), "html", null, true);
            echo "</dd>
\t
\t<dt>CNPJ</dt>
\t<dd>";
            // line 50
            if (isset($context["vendedor"])) { $_vendedor_ = $context["vendedor"]; } else { $_vendedor_ = null; }
            echo twig_escape_filter($this->env, $this->env->getExtension('Rio\Twig\TwigExtension')->coalesce($this->getAttribute($_vendedor_, "cnpj"), "-"), "html", null, true);
            echo "</dd>
\t";
        }
        // line 52
        echo "\t
\t<dt>Telefone fixo</dt>
\t<dd>";
        // line 54
        if (isset($context["vendedor"])) { $_vendedor_ = $context["vendedor"]; } else { $_vendedor_ = null; }
        echo twig_escape_filter($this->env, $this->env->getExtension('Rio\Twig\TwigExtension')->coalesce($this->getAttribute($_vendedor_, "telefone"), "-"), "html", null, true);
        echo "</dd>
\t
\t<dt>Telefone celular</dt>
\t<dd>";
        // line 57
        if (isset($context["vendedor"])) { $_vendedor_ = $context["vendedor"]; } else { $_vendedor_ = null; }
        echo twig_escape_filter($this->env, $this->env->getExtension('Rio\Twig\TwigExtension')->coalesce($this->getAttribute($_vendedor_, "celular"), "-"), "html", null, true);
        echo "</dd>
\t
\t<dt>E-mail</dt>
\t<dd>";
        // line 60
        if (isset($context["vendedor"])) { $_vendedor_ = $context["vendedor"]; } else { $_vendedor_ = null; }
        echo twig_escape_filter($this->env, $this->env->getExtension('Rio\Twig\TwigExtension')->coalesce($this->getAttribute($_vendedor_, "email"), "-"), "html", null, true);
        echo "</dd>
</dl>

<p><a href=\"";
        // line 63
        echo twig_escape_filter($this->env, $this->env->getExtension('Rio\Twig\TwigExtension')->url("/meus-dados/modificar-vendedor"), "html", null, true);
        echo "\">Modificar estes dados</a></p>

<h3>Endereços</h3>
";
        // line 66
        if (isset($context["vendedor"])) { $_vendedor_ = $context["vendedor"]; } else { $_vendedor_ = null; }
        $context["enderecos"] = $this->getAttribute($this->getAttribute($_vendedor_, "enderecos"), "findMany");
        // line 67
        if (isset($context["enderecos"])) { $_enderecos_ = $context["enderecos"]; } else { $_enderecos_ = null; }
        if (twig_test_empty($_enderecos_)) {
            // line 68
            echo "<p>Não há endereços registrados. <a href=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('Rio\Twig\TwigExtension')->url("/meus-dados/adicionar-endereco"), "html", null, true);
            echo "\">Adicionar um endereço</a></p>
";
        } else {
            // line 70
            echo "<a href=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('Rio\Twig\TwigExtension')->url("/meus-dados/adicionar-endereco"), "html", null, true);
            echo "\">Adicionar um novo endereço</a>
<ul>
\t";
            // line 72
            if (isset($context["enderecos"])) { $_enderecos_ = $context["enderecos"]; } else { $_enderecos_ = null; }
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($_enderecos_);
            foreach ($context['_seq'] as $context["_key"] => $context["endereco"]) {
                // line 73
                echo "\t<li>
\t\t";
                // line 74
                if (isset($context["endereco"])) { $_endereco_ = $context["endereco"]; } else { $_endereco_ = null; }
                echo twig_escape_filter($this->env, $_endereco_, "html", null, true);
                echo "
\t</li>
\t";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['endereco'], $context['_parent'], $context['loop']);
            $context = array_merge($_parent, array_intersect_key($context, $_parent));
            // line 77
            echo "</ul>
";
        }
        // line 79
        echo "
";
    }

    public function getTemplateName()
    {
        return "dados/visualizar.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  200 => 79,  196 => 77,  186 => 74,  183 => 73,  178 => 72,  172 => 70,  166 => 68,  163 => 67,  160 => 66,  154 => 63,  147 => 60,  140 => 57,  133 => 54,  129 => 52,  123 => 50,  116 => 47,  109 => 44,  106 => 43,  100 => 41,  93 => 38,  90 => 37,  87 => 36,  81 => 34,  77 => 32,  74 => 31,  71 => 30,  65 => 27,  58 => 24,  51 => 21,  44 => 18,  33 => 9,  30 => 8,  25 => 3,);
    }
}

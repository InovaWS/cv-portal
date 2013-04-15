<?php

/* login.twig */
class __TwigTemplate_2218a34fcce5ee7a548d8b9eb73c3d8f extends Twig_Template
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
        $context["pagina"] = array("titulo" => "Login", "css_route" => "page");
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 8
    public function block_conteudo($context, array $blocks = array())
    {
        // line 9
        echo "<div class=\"page-header\">
\t<h2>Login</h2>
</div>

<div class=\"row\">
\t<div class=\"span4\">
\t\t
\t</div>
\t<div class=\"span4\">
\t\t";
        // line 18
        if (isset($context["mensagens"])) { $_mensagens_ = $context["mensagens"]; } else { $_mensagens_ = null; }
        if ((!twig_test_empty($_mensagens_))) {
            // line 19
            echo "\t\t";
            if (isset($context["mensagens"])) { $_mensagens_ = $context["mensagens"]; } else { $_mensagens_ = null; }
            if ((!twig_test_empty($this->getAttribute($_mensagens_, "errors")))) {
                // line 20
                echo "\t\t<div class=\"alert alert-error\">
\t\t\t<ul class=\"unstyled\">
\t\t\t";
                // line 22
                if (isset($context["mensagens"])) { $_mensagens_ = $context["mensagens"]; } else { $_mensagens_ = null; }
                $context['_parent'] = (array) $context;
                $context['_seq'] = twig_ensure_traversable($this->getAttribute($_mensagens_, "errors"));
                foreach ($context['_seq'] as $context["_key"] => $context["error"]) {
                    // line 23
                    echo "\t\t\t\t<li>";
                    if (isset($context["error"])) { $_error_ = $context["error"]; } else { $_error_ = null; }
                    echo twig_escape_filter($this->env, twig_capitalize_string_filter($this->env, $_error_), "html", null, true);
                    echo "</li>
\t\t\t";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['error'], $context['_parent'], $context['loop']);
                $context = array_merge($_parent, array_intersect_key($context, $_parent));
                // line 25
                echo "\t\t\t</ul>
\t\t</div>
\t\t";
            }
            // line 28
            echo "\t\t\t
\t\t";
            // line 29
            if (isset($context["mensagens"])) { $_mensagens_ = $context["mensagens"]; } else { $_mensagens_ = null; }
            if ((!twig_test_empty($this->getAttribute($_mensagens_, "warnings")))) {
                // line 30
                echo "\t\t<div class=\"alert alert-warning\">
\t\t\t<ul class=\"unstyled\">
\t\t\t\t";
                // line 32
                if (isset($context["mensagens"])) { $_mensagens_ = $context["mensagens"]; } else { $_mensagens_ = null; }
                $context['_parent'] = (array) $context;
                $context['_seq'] = twig_ensure_traversable($this->getAttribute($_mensagens_, "warnings"));
                foreach ($context['_seq'] as $context["_key"] => $context["warning"]) {
                    // line 33
                    echo "\t\t\t\t<li>";
                    if (isset($context["warning"])) { $_warning_ = $context["warning"]; } else { $_warning_ = null; }
                    echo twig_escape_filter($this->env, twig_capitalize_string_filter($this->env, $_warning_), "html", null, true);
                    echo "</li>
\t\t\t\t";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['warning'], $context['_parent'], $context['loop']);
                $context = array_merge($_parent, array_intersect_key($context, $_parent));
                // line 35
                echo "\t\t\t</ul>
\t\t</div>
\t\t";
            }
            // line 38
            echo "\t\t";
        }
        // line 39
        echo "\t\t
\t\t<form action=\"";
        // line 40
        echo twig_escape_filter($this->env, $this->env->getExtension('Rio\Twig\TwigExtension')->url("/login"), "html", null, true);
        echo "\" method=\"post\" name=\"login\" class=\"form-vertical well\">
\t\t\t<div class=\"control-group\">
\t\t\t\t<label class=\"control-label\" for=\"login-login\">Login</label>
\t\t\t\t<div class=\"controls\">
\t\t\t\t\t<div class=\"row-fluid\">
\t\t\t\t\t\t<input type=\"text\" id=\"login-login\" name=\"login\"";
        // line 45
        if (isset($context["form"])) { $_form_ = $context["form"]; } else { $_form_ = null; }
        if ($_form_) {
            echo " value=\"";
            if (isset($context["form"])) { $_form_ = $context["form"]; } else { $_form_ = null; }
            echo twig_escape_filter($this->env, $this->getAttribute($_form_, "login"), "html", null, true);
            echo "\"";
        }
        echo " class=\"span12\">
\t\t\t\t\t</div>
\t\t\t\t</div>
\t\t\t</div>
\t\t\t
\t\t\t<div class=\"control-group\">
\t\t\t\t<label class=\"control-label\" for=\"login-senha\">Senha</label>
\t\t\t\t<div class=\"controls\">
\t\t\t\t\t<div class=\"row-fluid\">
\t\t\t\t\t\t<input type=\"password\" id=\"login-senha\" name=\"senha\" class=\"span12\">
\t\t\t\t\t</div>
\t\t\t\t</div>
\t\t\t</div>
\t\t\t
\t\t\t<div class=\"control-group\">
\t\t\t\t<div class=\"controls\">
\t\t\t\t\t<div class=\"row-fluid\">
\t\t\t\t\t\t<button type=\"submit\" class=\"btn btn-primary offset4 span4\">Entrar</button>
\t\t\t\t\t</div>
\t\t\t\t</div>
\t\t\t</div>
\t\t</form>
\t</div>
\t
\t<div class=\"span4\">
\t\t<p>Entre com seus dados de usuário para acessar seu painel e cadastrar seus veículos.</p>
\t\t<ul class=\"unstyled\">
\t\t\t<li><a href=\"";
        // line 72
        echo twig_escape_filter($this->env, $this->env->getExtension('Rio\Twig\TwigExtension')->url("/esqueci-minha-senha"), "html", null, true);
        echo "\" data-scrollto=\"true\">Esqueceu sua senha?</a></li>
\t\t\t<li><a href=\"";
        // line 73
        echo twig_escape_filter($this->env, $this->env->getExtension('Rio\Twig\TwigExtension')->url("/cadastro"), "html", null, true);
        echo "\" data-scrollto=\"true\">Não é cadastrado?</a></li>
\t\t</ul>
\t</div>
</div>
";
    }

    public function getTemplateName()
    {
        return "login.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  159 => 73,  155 => 72,  119 => 45,  111 => 40,  108 => 39,  105 => 38,  100 => 35,  90 => 33,  85 => 32,  81 => 30,  78 => 29,  75 => 28,  70 => 25,  60 => 23,  55 => 22,  51 => 20,  47 => 19,  44 => 18,  33 => 9,  30 => 8,  25 => 3,);
    }
}

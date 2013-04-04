<?php

/* login.twig */
class __TwigTemplate_1f3d55b7d4fbba21eb43b056bac92db4 extends Twig_Template
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
        $context["pagina"] = array("titulo" => "Cadastro e Login", "css_route" => "cadastro-e-login");
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 8
    public function block_conteudo($context, array $blocks = array())
    {
        // line 9
        echo "<div class=\"row\">
\t<div class=\"span6\">
\t\t<div class=\"content-block\">
\t\t\t<div class=\"cadastro\">
\t\t\t\t<h1>Cadastre-se</h1>
\t\t\t\t<p>Se você ainda não é nosso cliente, não perca tempo, cadastre-se é GRATUITO e comece a utilizar nossos serviços.</p>
\t\t\t\t
\t\t\t\t<form action=\"";
        // line 16
        echo twig_escape_filter($this->env, $this->env->getExtension('Rio\Slim\TwigExtension')->url("/cadastro"), "html", null, true);
        echo "\" method=\"post\" name=\"cadastro\" class=\"form-horizontal\">
\t\t\t\t\t";
        // line 17
        if (isset($context["flash"])) { $_flash_ = $context["flash"]; } else { $_flash_ = null; }
        if ($this->getAttribute($_flash_, "erros_cadastro")) {
            // line 18
            echo "\t\t\t\t\t<div class=\"alert alert-warning\">
\t\t\t\t\t\t<p><strong>Erro ao cadastrar-se!</strong></p>
\t\t\t\t\t\t<ul>
\t\t\t\t\t\t";
            // line 21
            if (isset($context["flash"])) { $_flash_ = $context["flash"]; } else { $_flash_ = null; }
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute($_flash_, "erros_cadastro"));
            foreach ($context['_seq'] as $context["_key"] => $context["erro"]) {
                // line 22
                echo "\t\t\t\t\t\t\t<li>";
                if (isset($context["erro"])) { $_erro_ = $context["erro"]; } else { $_erro_ = null; }
                echo twig_escape_filter($this->env, $_erro_, "html", null, true);
                echo "</li>
\t\t\t\t\t\t";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['erro'], $context['_parent'], $context['loop']);
            $context = array_merge($_parent, array_intersect_key($context, $_parent));
            // line 24
            echo "\t\t\t\t\t\t</ul>
\t\t\t\t\t</div>
\t\t\t\t\t";
        }
        // line 27
        echo "\t\t\t\t
\t\t\t\t\t<div class=\"control-group\">
\t\t\t\t\t\t<label class=\"control-label\" for=\"cadastro-nome\">Nome completo</label>
\t\t\t\t\t\t<div class=\"controls\">
\t\t\t\t\t\t\t<input type=\"text\" id=\"cadastro-nome\" name=\"nome\"";
        // line 31
        if (isset($context["cadastro"])) { $_cadastro_ = $context["cadastro"]; } else { $_cadastro_ = null; }
        if ($_cadastro_) {
            echo " value=\"";
            if (isset($context["cadastro"])) { $_cadastro_ = $context["cadastro"]; } else { $_cadastro_ = null; }
            echo twig_escape_filter($this->env, $this->getAttribute($_cadastro_, "nome"), "html", null, true);
            echo "\"";
        }
        echo " />
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t\t
\t\t\t\t\t<div class=\"control-group\">
\t\t\t\t\t\t<label class=\"control-label\" for=\"cadastro-email\">E-mail</label>
\t\t\t\t\t\t<div class=\"controls\">
\t\t\t\t\t\t\t<input type=\"text\" id=\"cadastro-email\" name=\"email\"";
        // line 38
        if (isset($context["cadastro"])) { $_cadastro_ = $context["cadastro"]; } else { $_cadastro_ = null; }
        if ($_cadastro_) {
            echo " value=\"";
            if (isset($context["cadastro"])) { $_cadastro_ = $context["cadastro"]; } else { $_cadastro_ = null; }
            echo twig_escape_filter($this->env, $this->getAttribute($_cadastro_, "email"), "html", null, true);
            echo "\"";
        }
        echo " />
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t\t
\t\t\t\t\t<div class=\"control-group\">
\t\t\t\t\t\t<label class=\"control-label\" for=\"cadastro-senha\">Senha</label>
\t\t\t\t\t\t<div class=\"controls\">
\t\t\t\t\t\t\t<input type=\"password\" id=\"cadastro-senha\" name=\"senha\" />
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t\t
\t\t\t\t\t<div class=\"control-group\">
\t\t\t\t\t\t<label class=\"control-label\" for=\"cadastro-confirmar-senha\">Confirmar senha</label>
\t\t\t\t\t\t<div class=\"controls\">
\t\t\t\t\t\t\t<input type=\"password\" id=\"cadastro-confirmar-senha\" name=\"confirmar-senha\" />
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t\t
\t\t\t\t\t<div class=\"control-group\">
\t\t\t\t\t\t<div class=\"controls\">
\t\t\t\t\t\t\t<button type=\"submit\" class=\"btn btn-primary\">Cadastrar</button>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t</form>
\t\t\t</div>
\t\t</div>
\t</div>
\t
\t<div class=\"span6\">
\t\t<div class=\"content-block\">
\t\t\t<div class=\"login\">
\t\t\t\t<h1>Login</h1>
\t\t\t\t<p>Entre com seus dados de usuário para acessar seu painel e cadastrar seus veículos.</p>
\t\t\t\t
\t\t\t\t<form action=\"";
        // line 72
        echo twig_escape_filter($this->env, $this->env->getExtension('Rio\Slim\TwigExtension')->url("/login"), "html", null, true);
        echo "\" method=\"post\" name=\"login\" class=\"form-horizontal\">
\t\t\t\t\t";
        // line 73
        if (isset($context["flash"])) { $_flash_ = $context["flash"]; } else { $_flash_ = null; }
        if ($this->getAttribute($_flash_, "erros_login")) {
            // line 74
            echo "\t\t\t\t\t<div class=\"alert alert-warning\">
\t\t\t\t\t\t<p><strong>Erro ao fazer login!</strong></p>
\t\t\t\t\t\t<ul>
\t\t\t\t\t\t";
            // line 77
            if (isset($context["flash"])) { $_flash_ = $context["flash"]; } else { $_flash_ = null; }
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute($_flash_, "erros_login"));
            foreach ($context['_seq'] as $context["_key"] => $context["erro"]) {
                // line 78
                echo "\t\t\t\t\t\t\t<li>";
                if (isset($context["erro"])) { $_erro_ = $context["erro"]; } else { $_erro_ = null; }
                echo twig_escape_filter($this->env, $_erro_, "html", null, true);
                echo "</li>
\t\t\t\t\t\t";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['erro'], $context['_parent'], $context['loop']);
            $context = array_merge($_parent, array_intersect_key($context, $_parent));
            // line 80
            echo "\t\t\t\t\t\t</ul>
\t\t\t\t\t</div>
\t\t\t\t\t";
        }
        // line 83
        echo "\t\t\t\t\t
\t\t\t\t\t<div class=\"control-group\">
\t\t\t\t\t\t<label class=\"control-label\" for=\"login-login\">Login</label>
\t\t\t\t\t\t<div class=\"controls\">
\t\t\t\t\t\t\t<input type=\"text\" id=\"login-login\" name=\"login\"";
        // line 87
        if (isset($context["login"])) { $_login_ = $context["login"]; } else { $_login_ = null; }
        if ($_login_) {
            echo " value=\"";
            if (isset($context["login"])) { $_login_ = $context["login"]; } else { $_login_ = null; }
            echo twig_escape_filter($this->env, $this->getAttribute($_login_, "login"), "html", null, true);
            echo "\"";
        }
        echo " />
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t\t
\t\t\t\t\t<div class=\"control-group\">
\t\t\t\t\t\t<label class=\"control-label\" for=\"login-senha\">Senha</label>
\t\t\t\t\t\t<div class=\"controls\">
\t\t\t\t\t\t\t<input type=\"password\" id=\"login-senha\" name=\"senha\" />
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t\t
\t\t\t\t\t<div class=\"control-group\">
\t\t\t\t\t\t<div class=\"controls\">
\t\t\t\t\t\t\t<button type=\"submit\" class=\"btn btn-primary\">Entrar</button>
\t\t\t\t\t\t\t<a href=\"";
        // line 101
        echo twig_escape_filter($this->env, $this->env->getExtension('Rio\Slim\TwigExtension')->url("/esqueci-minha-senha"), "html", null, true);
        echo "\">Esqueceu sua senha?</a>\t
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t</form>
\t\t\t</div>
\t\t</div>
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
        return array (  200 => 101,  177 => 87,  171 => 83,  166 => 80,  156 => 78,  151 => 77,  146 => 74,  143 => 73,  139 => 72,  96 => 38,  80 => 31,  74 => 27,  69 => 24,  59 => 22,  54 => 21,  49 => 18,  46 => 17,  42 => 16,  33 => 9,  30 => 8,  25 => 3,);
    }
}

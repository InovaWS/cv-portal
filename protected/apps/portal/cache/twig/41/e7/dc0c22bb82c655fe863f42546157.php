<?php

/* anuncie.twig */
class __TwigTemplate_41e7dc0c22bb82c655fe863f42546157 extends Twig_Template
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
        $context["pagina"] = array("titulo" => "Anuncie", "css_route" => "page");
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 8
    public function block_conteudo($context, array $blocks = array())
    {
        // line 9
        echo "<div class=\"page-header\">
\t<h2>Anuncie</h2>
</div>

<p>
O portal Central do Veículo tem como compromisso, levar aos seus usuários e cliente qualidade
em anúncios veiculares e navegabilidade, através de cadastro fácil, rápido e seguro onde, com
poucos cliques, você terá seu veículo anunciado.
</p>

<p>
Sem surpresas desagradáveis, o portal Central do Veículo tem uma tabela de preços única para
todos os anunciantes, ou seja, todos pagaram de forma igual pelos seus anúncios. A cobrança
é feita por anúncio, logo só existem duas formas de anúncios: o anúncio simples e anúncio
com destaque para pessoas físicas.
</p>

<p>
Para revendedores de veículos (pessoa jurídica) temos planos especiais onde os anúncios no
portal Central do Veículo são gratuitos.
<a href=\"";
        // line 29
        echo twig_escape_filter($this->env, $this->env->getExtension('Rio\Twig\TwigExtension')->url("/anuncie/juridico"), "html", null, true);
        echo "\">Saiba mais</a>.
</p>

<p>
Mais do que apenas anunciar seu veículo, temos a preocupação em levar até nossos usuários e
clientes outras formas de divulgar seu anúncio, como por exemplo, redes sociais, oferecendo
formas de qualquer um compartilhar e divulgar seu anúncio.
</p>

<p>
Não vendemos quaisquer tipos de veículos ou produtos, apenas divulgamos seu veículo como uma
forma de aproximar mais quem procura um veículo, assim aumentando suas chances de sucesso no
seu negócio.
</p>

<p>
<a href=\"";
        // line 45
        echo twig_escape_filter($this->env, $this->env->getExtension('Rio\Twig\TwigExtension')->url("/cadastro"), "html", null, true);
        echo "\">Cadastre-se</a> já gratuitamente e anuncie seu veículo em
nosso portal Central do Veículo, onde você encontra o veículo que procura.
</p>
";
    }

    public function getTemplateName()
    {
        return "anuncie.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  74 => 45,  55 => 29,  33 => 9,  30 => 8,  25 => 3,);
    }
}

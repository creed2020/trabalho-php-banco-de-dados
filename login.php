<?php

// Configuração inicial da página
require ('_config.php');

// Define o título "desta" página
$titulo = "Faça seu login";

// Opção ativa no menu principal
$menu = "login";

// Aponta para o CSS "desta" página. Ex.: /css/contatos.css
// Deixe vazio para não usar CSS adicional nesta página
$css = "/css/login.css";

// Aponta para o JavaScript "desta" página. Ex.: /js/contatos.js
// Deixe vazio para não usar JavaScript adicional nesta página
$js = "";

/*********************************************/
/*  SEUS CÓDIGOS PHP DESTA PÁGINA FICAM AQUI */
/*********************************************/

// "Declarando" variáveis
$nome = $email = $cpf = $endereco = $assunto = $mensagem = $erro = $msgErro = $msgOk = $msgMail = '';

// Se o formulário foi enviado
if ( isset($_POST['enviado']) ) :

    // Obtém o nome do form
    $nome = sanitiza( filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING) );

    // Obtém o e-mail do form
    $email = sanitiza( filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL) );

    //Obtém o CPF do form
    $cpf = sanitiza( filter_input(INPUT_POST, 'cpf', FILTER_SANITIZE_STRING) );

    //Obtém o endereço form
    $endereco = sanitiza( filter_input(INPUT_POST, 'endereço', FILTER_SANITIZE_STRING) );

    // Obtém o nome do form
    $assunto = sanitiza( filter_input(INPUT_POST, 'assunto', FILTER_SANITIZE_STRING) );

    // Obtém o nome do form
    $mensagem = filter_input(INPUT_POST, 'mensagem', FILTER_SANITIZE_STRING);
    
    // Verificar o preenchimento do nome
    if (strlen($nome) < 2) {
        $erro .= "<li>Seu nome está muito curto.</li>";
    }

    // Verificar o preenchimento do e-mail
    // O sinal "!" inverte TRUE com FALSE
    if ( !filter_var($email, FILTER_VALIDATE_EMAIL) ) {
        $erro .= "<li>Seu e-mail parece inválido.</li>";
    }

    //Verificar o preenchimento do CPF
    if (strlen($cpf) < 4) {
        $erro .= "<li>O CPF está incorreto.</li>";
    }

    //Verificar o preenchimento do endereço
    if (strlen($endereco) < 4) {
        $erro .= "<li>O endereço está incorreto.</li>";
    }

    // Verificar o preenchimento do assunto
    if (strlen($assunto) < 4) {
        $erro .= "<li>O assunto está muito curto.</li>";
    }
    
    // Verificar o preenchimento da mensagem
    if (strlen($mensagem) < 4) {
        $erro .= "<li>A mensagem está muito curta.</li>";
    }

    // Validando erros
    if ($erro != '') :

        // Cria mensagem de erros. Usamos HEREDOC.
        $msgErro .= <<<TEXTO

<div class="msgErro">
    <h3>Ooooops!</h3>
    <p>Ocorreram erros que impedem o envio do seu contato:</p>
    <ul>{$erro}</ul>
    <p>Por favor corrija os erros e tente novamente.</p>
</div>
        
TEXTO;

    else :
        
        // Preparando para salvar os dados
        $sql = <<<SQL

INSERT INTO login
    (nome, email, cpf, endereço, assunto, mensagem)
VALUES
    ('{$nome}', '{$email}','{$cpf}', '{$endereco}', '{$assunto}', '{$mensagem}')
;

SQL;

        // Executa a query gerada em $sql
        $conn->query($sql);

        // Prepara dados para envio por e-mail
        $msgMail .= <<<TEXTO

Um novo contato foi enviado para o site "SemNome":

    Nome: {$nome}
    E-mail: {$email}
    Login: {$cpf}
    Endereço: {$endereco}
    Assunto: {$assunto}
    Mensagem: {$mensagem}

TEXTO;

        // Enviando e-mail --> Não funciona no XAMPP
        // O "@" oculta mensagens de erro --> CUIDADO!
        // Dê preferência a bibliotecas de e-mail à função "mail()" do PHP
        // Por exemplo, pesquise por "PHPMailer" e outras similares
        @mail('admin@semnome.com', 'Novo login com Creed News', $msgMail);

        // Obtendo partes do nome
        // O primeiro nome estará em $partes[0]
        $partes = explode(' ', $nome);

        // Gerando mensagem de agradecimento
        $msgOk .= <<<TEXTO

<div class="msgOk">
    <h3>Olá {$partes[0]}!</h3>
    <p>Seu login foi enviado para a equipe do site.</p>
    <p>Se necessário, em breve responderemos.</p>
    <p><em>Obrigado...</em></p>
</div>

TEXTO;
     
    endif;

endif;

/************************************************/
/*  SEUS CÓDIGOS PHP DESTA PÁGINA TERMINAM AQUI */
/************************************************/

// Inclui o cabeçalho do template
require ('_header.php');

?>

<div class="row">
    <div class="col1">

        <h2>Faça seu login</h2>

        <?php
        if ($msgOk == ''):
        ?>

        <p>Preencha o formulário abaixo para entrar em login com a equipe do site.</p>

        <?php echo $msgErro ?>

        <form name="login" id="login" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" accept-charset="utf-8">
            <input type="hidden" name="enviado" value="ok">
            <p>
                <label for="nome">Nome:</label>
                <input type="text" name="nome" id="nome" placeholder="Seu nome completo" value="<?php echo $nome ?>">
            </p>
            <p>
                <label for="email">E-mail:</label>
                <input type="text" name="email" id="email" placeholder="nome@provedor.com" value="<?php echo $email ?>">
            </p>
            <p>
                <label for="cpf">CPF:</label>
                <input type="text" name="cpf" id="cpf" placeholder="CPF completo" value="<?php echo $cpf ?>">
            </p>
            <p>
                <label for="endereço">endereço:</label>
                <input type="text" name="endereço" id="endereço" placeholder="Endereço completo" value="<?php echo $endereco ?>">
            </p>
            <p>
                <label></label>
                <button type="submit">Enviar</button>
            </p>
        </form>

        <?php
        else:
            echo $msgOk;
        endif;
        ?>

    </div>
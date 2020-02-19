<?php

// Configuração inicial da página
require ('_config.php');

// Define o título "desta" página
$titulo = "";

// Opção ativa no menu principal
// Valores possíveis: "", "artigos", "noticias", "contatos", "sobre", "procurar"
// Valores diferentes destes = ""
$menu = "";

// Aponta para o CSS "desta" página. Ex.: /css/contatos.css
// Deixe vazio para não usar CSS adicional nesta página
$css = "";

// Aponta para o JavaScript "desta" página. Ex.: /js/contatos.js
// Deixe vazio para não usar JavaScript adicional nesta página
$js = "";

/*********************************************/
/*  SEUS CÓDIGOS PHP DESTA PÁGINA FICAM AQUI */
/*********************************************/



/************************************************/
/*  SEUS CÓDIGOS PHP DESTA PÁGINA TERMINAM AQUI */
/************************************************/

// Inclui o cabeçalho do template
require ('_header.php');

?>

<h2>Supernatural</h2>
<p>Sobrenatural no Brasil e em Portugal) é uma série de televisão da CW, rede de televisão dos Estados Unidos. É exibida no Brasil pelos canais a cabo e aberto, respectivamente Warner Channel e SBT. Em Portugal a série é exibida pelos canais pago e aberto, AXN e RTP2, respectivamente.
criada por Eric Kripke, Supernatural conta a história dos irmãos Sam (Jared Padalecki) e Dean Winchester (Jensen Ackles), que viajam pelos Estados Unidos num Chevy Impala preto de 1967 investigando eventos sobrenaturais e caçando criaturas como fantasmas, demônios e vampiros. A série conta com diversos elementos obtidos em lendas urbanas, em crenças comuns e em mitologia antiga.</p>
<img class="responsiva" src="img/img01.jpg">
<h2>Vykings</h2>
<p>A série se inicia com as aventuras do guerreiro nórdico Ragnar Lothbrok, uma figura histórica que viveu no período Medieval. Considerando-se descendente de Odin, Ragnar busca dominar vários territórios da Europa. Com isso, ele enfrenta a oposição do Earl Haraldson, um ex-guerreiro e agora líder de seu povo, casado com Siggy, uma jovem que tem sua lealdade dividida.</p>
<img class="responsiva" src="img/img02.jpg">

<?php

// Inclui o rodapé do template
require ('_footer.php');

?>

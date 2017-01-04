<?php 
$pageTitle = "RBC Global Business | Carrinho";
$pageDescription = "";
session_start(); 
require('header.php');?>
</head>	

<?php 
require 'controller/connect.php';
require 'controller/item.php';

if(isset($_GET['form-qtde'])) {
	$qtde = $_GET['form-qtde'];
};
if(isset($_GET['form-nome'])) {
	$form_nome = $_GET['form-nome'];
};
if(isset($_GET['form-email'])) {
	$form_email = $_GET['form-email'];
};
if(isset($_GET['form-tel'])) {
	$form_tel = $_GET['form-tel'];
};

if(isset($_GET['id'])) {
	$result = mysqli_query($con, 'SELECT * FROM produtos WHERE id='.$_GET['id']);
	$produtos = mysqli_fetch_object($result);
	$item = new Item();

	$item->imagem  		= $produtos->produto_img;
	$item->id  			= $produtos->id;
	$item->codigo  		= $produtos->produto_cod;
	$item->nome  		= $produtos->produto_nome;
	$item->tamanho  	= $produtos->produto_tam;
	$item->categoria  	= $produtos->produto_cat;
	$item->quantidade  	= $qtde;
	$item->estoque  	= $produtos->produto_qtde;
	$item->preco  		= $produtos->produto_preco;
	$item->num_item = 1;

	// Checa se o produto existe no carrinho
	$index = -1;
	$cart = unserialize(serialize($_SESSION['cart']));
	for ($i=0; $i < count($cart); $i++) 
		if ($cart[$i]->id==$_GET['id']) 
		{
			$index = $i;
			break;
		}
		if($index==-1){
			$_SESSION['cart'][] = $item;
		}
		else{
			$cart[$index]->num_item++;
			$_SESSION['cart'] = $cart;
		}
	
}
	// Apaga o Produto no carrinho
	if(isset($_GET['index'])){
		$cart = unserialize (serialize($_SESSION['cart']));
		unset($cart[$_GET['index']]);
		$cart = array_values($cart);
		$_SESSION['cart'] = $cart;
	}
?>

<?php $cart = unserialize(serialize($_SESSION['cart']));
	$s = 0; 
	$index = 0;
	$vazio = count($cart); ?>
<?php 
$mailbody = null;
$mailbody = "
	<h2><strong>Dados do Cliente</strong></h2>
	<table cellpadding=\"1\" cellspacing=\"1\" border=\"1\" style=\"text-align: center;\">
		<tr>
			<td>Nome</td>
			<td>" . $form_nome . "</td>
		</tr>
		<tr>
			<td>E-mail</td>
			<td>" . $form_email . "</td>
		</tr>
		<tr>
			<td>Telefone</td>
			<td>" . $form_telefone . "</td>
		</tr>
	</table>
	<br><br>
	<table cellpadding=\"1\" cellspacing=\"1\" border=\"1\" style=\"text-align: center;\">
		<tr>
			<th>Imagem</th>
			<th>Titulo</th>
			<th>Tamanho</th>
			<th>Categoria</th>
			<th>Estoque</th>
			<th>Preço</th>
			<th>Quantidade Desejada</th>
		</tr>
"?>	

		<?php for ($i=0; $i < count($cart); $i++) {  
			$s += $cart[$i]->preco * $cart[$i]->num_item;
			$mailbody.='
			<tr>
				<td>
					<img style="width: 25%" src="http://chiapadesign.com.br/beta/ses/'. $cart[$i]->imagem . '" alt="' . $cart[$i]->nome . '">
				</td>
				<td>'. $cart[$i]->imagem . '</td>
				<td>'. $cart[$i]->nome . '</td>
				<td>'. $cart[$i]->tamanho . '</td>
				<td>'. $cart[$i]->categoria . '</td>
				<td>'. $cart[$i]->estoque . '</td>
				<td>'. $cart[$i]->preco . '</td>
				<td>'. $item->quantidade = $qtde; . '</td>
		 	</tr>'?>
		 <?php 
		 	$index++;
		 } ?>
	</table>


<?php 
// ENVIO DE E-MAIL
require 'phpmailer/PHPMailerAutoload.php';

$mail = new PHPMailer;

//$mail->SMTPDebug = 3;                               // Enable verbose debug output

$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'smtp.chiapadesign.com.br';  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'cristiano@chiapadesign.com.br';                 // SMTP username
$mail->Password = '5sydkzavg2ckcg99';                           // SMTP password
$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 587;                                    // TCP port to connect to

$mail->setFrom('cristiano@chiapadesign.com.br', 'Chiapa User');
$mail->addAddress('criskile@gmail.com', 'Cristiano');     // Add a recipient
$mail->addReplyTo('criskile@hotmail.com', 'Cristiano Hotmail');
// $mail->addCC('cc@example.com');
// $mail->addBCC('bcc@example.com');

$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
$mail->isHTML(true);                                  // Set email format to HTML

$mail->Subject = 'TESTE DE ENVIO DE EMAIL';
$mail->Body    = $mailbody;

if(!$mail->send()) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    echo 'Message has been sent';
} ?>



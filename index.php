<?php

//TAREFA 1:

//Conexão e teste com o Database

$servidor = "localhost";
$usuario = "root";
$senha = "";
$banco = "desafio_fiotech";

$conexao = new mysqli("$servidor","$usuario","$senha","$banco");

if($conexao ->connect_error){

	die("Falha na conexao: ".$conexao->connect_error);
}
echo "Conexão bem sucedida.";

// Leitura e processamento dos Arquivos para o Database

$arquivos = fopen("./.txt","r");

while (!feof($arquivos)) {
	
	$email = fgets($arquivos);

	$sql = mysql_query("INSERT INTO base_de_dados (corpo_mail) value ('$email')")

    if($conexao->query($sql)===true){
        echo "Email registrado com sucesso <br>";
    } else {
        echo "<br>Falha ao realizar o registro de email";
    }
}

/* 
OBS:

Apenas consegui criar um script que lê os arquivos ".txt" e armazena o conteudo completo na coluna "corpo_mail" do banco de dados. Para que funcione,
este arquivo ".php" precisa estar no mesmo local que os arquivos alvo. 

Ao analisar o arquivo com o script sql, irá notar as seguintes colunas: "Nome do arquivo, remetente, destinatário, data/hora do e-mail".
A ideia era adaptar o código para que ao ler as primeiras linhas de cada arquivo referente a essas colunas, adiciona-las, porém não consegui 
estudar o suficiente a documentação da linguagem para realizar a pendencia.

Não consegui realizar também a tarefa de número 2.

O script não foi testado pois apenas tenho em mãos a maquina da empresa em que trabalho atualmente, onde não consigo instalar nenhum tipo de 
programa pois não tenho acesso ADM.

*/



?>
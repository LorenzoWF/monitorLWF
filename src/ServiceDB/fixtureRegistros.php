<?php

require_once 'ConnectDB.php';

$conexao = new src\ServiceDB\ConnectDB();
$conn = $conexao->getConn();


$conn->query("INSERT INTO usuarios (login, email, senha) VALUES ('admin', 'YWRtaW5AbG9jYWxob3N0LmNvbQ==', '21232f297a57a5a743894a0e4a801fc3');");
$conn->query("INSERT INTO clientes (nome) VALUES ('Empresa Teste 1');");
$conn->query("INSERT INTO clientes (nome) VALUES ('Empresa Teste 2');");
$conn->query("INSERT INTO logDiscos (id_cliente, local, particao, total, usado, disponivel, porcentagem, data, horario) VALUES (1, 'local novo', 'particao', 900, 50, 850, 7, '2016-04-16', '08:45:00');");
$conn->query("INSERT INTO logDiscos (id_cliente, local, particao, total, usado, disponivel, porcentagem, data, horario) VALUES (2, 'local novo', 'particao', 900, 50, 850, 7, '2016-04-16', '08:45:00');");

?>

<?php

require_once 'ConnectDB.php';

$conexao = new src\ServiceDB\ConnectDB();
$conn = $conexao->getConn();


$conn->query("INSERT INTO usuarios (login, email, senha) VALUES ('admin', 'YWRtaW5AbG9jYWxob3N0LmNvbQ==', '21232f297a57a5a743894a0e4a801fc3');");

$conn->query("INSERT INTO clientes (nome) VALUES ('Casa');");
$conn->query("INSERT INTO clientes (nome) VALUES ('Solution');");

$conn->query("INSERT INTO servidores (id_cliente, so, descricao_so) VALUES (1, 1, 'Notebook Ubuntu');");
$conn->query("INSERT INTO servidores (id_cliente, so, descricao_so) VALUES (2, 0, 'Desktop');");

$conn->query("INSERT INTO logDiscos (id_servidor, local, particao, total, usado, disponivel, porcentagem, data, horario) VALUES (1, '/', '/dev/sda6', 900, 50, 850, 7, '2016-04-16', '08:45:00');");
$conn->query("INSERT INTO logDiscos (id_servidor, local, particao, total, usado, disponivel, porcentagem, data, horario) VALUES (2, 'c:/', 'c:/', 900, 50, 850, 7, '2016-04-16', '08:45:00');");

?>

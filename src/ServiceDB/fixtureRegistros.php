<?php

require_once 'ConnectDB.php';

$conexao = new src\ServiceDB\ConnectDB();
$conn = $conexao->getConn();


$conn->query("INSERT INTO usuarios (login, email, senha) VALUES ('admin', 'YWRtaW5AbG9jYWxob3N0LmNvbQ==', '21232f297a57a5a743894a0e4a801fc3');");

$conn->query("INSERT INTO clientes (nome) VALUES ('Lorenzo');");

$conn->query("INSERT INTO servidores (id_cliente, descricao, arq_so) VALUES (1, 'PC Solution', 0);");
$conn->query("INSERT INTO servidores (id_cliente, descricao, arq_so) VALUES (1, 'PC Casa', 0);");
$conn->query("INSERT INTO servidores (id_cliente, descricao, arq_so) VALUES (1, 'Notebook Ubuntu', 1);");

$conn->query("INSERT INTO logDiscos (id_servidor, id_local, local, particao, total, usado, disponivel, porcentagem, data, horario) VALUES (1, 0, 'c:\', 'c:\', 900, 50, 850, 7, '2016-04-16', '08:45:00');");
$conn->query("INSERT INTO logDiscos (id_servidor, id_local, local, particao, total, usado, disponivel, porcentagem, data, horario) VALUES (1, 0, 'c:\', 'c:\', 900, 51, 849, 8, '2016-04-16', '08:45:00');");
$conn->query("INSERT INTO logDiscos (id_servidor, id_local, local, particao, total, usado, disponivel, porcentagem, data, horario) VALUES (1, 1, 'd:\', 'd:\', 300, 100, 200, 20, '2016-04-16', '08:45:00');");
$conn->query("INSERT INTO logDiscos (id_servidor, id_local, local, particao, total, usado, disponivel, porcentagem, data, horario) VALUES (2, 0, 'c:\', 'c:\', 900, 50, 850, 7, '2016-04-16', '08:45:00');");
$conn->query("INSERT INTO logDiscos (id_servidor, id_local, local, particao, total, usado, disponivel, porcentagem, data, horario) VALUES (2, 1, 'e:\', 'e:\', 300, 100, 200, 20, '2016-04-16', '08:45:00');");
$conn->query("INSERT INTO logDiscos (id_servidor, id_local, local, particao, total, usado, disponivel, porcentagem, data, horario) VALUES (3, 0, '/dev/sda6', '/', 900, 50, 850, 7, '2016-04-16', '08:45:00');");

?>

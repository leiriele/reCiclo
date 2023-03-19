CREATE DATABASE `reciclo`;
USE `reciclo`;

CREATE TABLE `administrador` (
  `id_Administrador` int(11) NOT NULL,
  `fk_usuario` varchar(45) NOT NULL,
  PRIMARY KEY (`id_Administrador`,`fk_usuario`),
  KEY `fk_Administrador_Usuario1_idx` (`fk_usuario`)
); 

CREATE TABLE `calculadora` (
  `idCalculadora` int(11) NOT NULL,
  `total` int(11) DEFAULT NULL,
  `fk_pedido` int(11) NOT NULL,
  PRIMARY KEY (`idCalculadora`,`fk_pedido`),
  KEY `fk_Calculadora_PedidoColeta1_idx` (`fk_pedido`)
);

CREATE TABLE `cliente` (
  `id_Cliente` int(11) NOT NULL,
  `Pontos` int(11) DEFAULT NULL,
  `fk_usuario` varchar(45) NOT NULL,
  PRIMARY KEY (`id_Cliente`,`fk_usuario`),
  KEY `fk_Cliente_Usuario_idx` (`fk_usuario`)
);

CREATE TABLE `coletor` (
  `id_Coletor` int(11) NOT NULL,
  `Descricao` varchar(500) DEFAULT NULL,
  `fk_usuario` varchar(45) NOT NULL,
  PRIMARY KEY (`id_Coletor`,`fk_usuario`),
  KEY `fk_Coletor_Usuario1_idx` (`fk_usuario`)
);

CREATE TABLE `coletor_pedido` (
  `id_Coletor_Pedido` int(11) NOT NULL,
  `fk_Coletor` int(11) NOT NULL,
  `fk_PedidoColeta` int(11) NOT NULL,
  PRIMARY KEY (`id_Coletor_Pedido`),
  KEY `fk_Coletor_has_PedidoColeta_PedidoColeta1_idx` (`fk_PedidoColeta`),
  KEY `fk_Coletor_has_PedidoColeta_Coletor1_idx` (`fk_Coletor`)
);

CREATE TABLE `endereco` (
  `idEndereco` int(50) NOT NULL,
  `CEP` varchar(45) DEFAULT NULL,
  `Cidade` varchar(45) DEFAULT NULL,
  `Estado` varchar(45) DEFAULT NULL,
  `Bairro` varchar(45) DEFAULT NULL,
  `Logradouro` varchar(45) DEFAULT NULL,
  `Numero` varchar(45) DEFAULT NULL,
  `Complemento` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idEndereco`)
);

CREATE TABLE `pedidocoleta` (
  `id_PedidoColeta` int(11) NOT NULL,
  `midia` varchar(45) DEFAULT NULL,
  `qnt_plastico` varchar(10) DEFAULT NULL,
  `qnt_vidro` varchar(10) DEFAULT NULL,
  `qnt_aluminio` varchar(10) DEFAULT NULL,
  `qnt_papel` varchar(10) DEFAULT NULL,
  `fk_cliente` varchar(50) NOT NULL,
  `fk_pontocoleta` int(11) NOT NULL,
  `whatsapp` varchar(45) DEFAULT '(00)90000-0000',
  PRIMARY KEY (`id_PedidoColeta`,`fk_cliente`,`fk_pontocoleta`),
  KEY `fk_PedidoColeta_Cliente1_idx` (`fk_cliente`),
  KEY `fk_PedidoColeta_PontoColeta` (`fk_pontocoleta`)
);

CREATE TABLE `pontocoleta` (
  `idPontoColeta` int(11) NOT NULL,
  `nome` varchar(45) DEFAULT NULL,
  `tipo` varchar(45) DEFAULT NULL,
  `horario_funcionamento` varchar(100) DEFAULT NULL,
  `info_contato` varchar(45) DEFAULT NULL,
  `Endereco_idEndereco` int(11) NOT NULL,
  `fk_PontoUsuario` varchar(45) NOT NULL,
  PRIMARY KEY (`idPontoColeta`,`Endereco_idEndereco`,`fk_PontoUsuario`),
  KEY `fk_PontoColeta_Endereco1_idx` (`Endereco_idEndereco`),
  KEY `fk_PontoColeta_Usuario` (`fk_PontoUsuario`)
);

CREATE TABLE `usuario` (
  `id_usuario` varchar(45) NOT NULL,
  `nome` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `CPF` varchar(50) DEFAULT NULL,
  `CNPJ` varchar(50) DEFAULT NULL,
  `data_nascimento` date DEFAULT NULL,
  `senha` varchar(45) DEFAULT NULL,
  `tipo_usuario` int(11) DEFAULT NULL,
  `Endereco_idEndereco` int(11) NOT NULL,
  PRIMARY KEY (`id_usuario`,`Endereco_idEndereco`),
  KEY `fk_Usuario_Endereco1_idx` (`Endereco_idEndereco`)
);

CREATE TABLE `usuarios` (
  `idusuarios` int(11) NOT NULL,
  `name` varchar(45) NOT NULL,
  `cpf` varchar(45) NOT NULL,
  `cnpj` varchar(45) DEFAULT NULL,
  `dataNasc` date NOT NULL,
  `email` varchar(45) NOT NULL,
  `senha` varchar(45) NOT NULL,
  `cidade` varchar(45) NOT NULL,
  `estado` varchar(45) NOT NULL,
  `logradouro` varchar(45) NOT NULL,
  `numeroN` int(11) NOT NULL,
  `bairro` varchar(45) NOT NULL,
  `cep` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`idusuarios`, `name`, `cpf`, `cnpj`, `dataNasc`, `email`, `senha`, `cidade`, `estado`, `logradouro`, `numeroN`, `bairro`, `cep`) VALUES
(1, 'leiriele', '123456789', '1', '0000-00-00', 'leiriele@teste.com', '123', 'Monte Carmelo', 'MG', 'Rua A', 123, 'A', '3850000');


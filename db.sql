CREATE TABLE `clube_do_livro`.`t_usuarios` ( 
	`cod` SERIAL NOT NULL , 
	`nome` VARCHAR(30) NOT NULL , 
	`sobrenome` VARCHAR(30) NOT NULL , 
	`sexo` CHARACTER NOT NULL , 
	`email` VARCHAR(50) NOT NULL , 
	`senha` VARCHAR(32) NOT NULL , 
	`nivel_de_acesso` TINYINT NOT NULL , 
	`data_de_cadastro` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP ) ENGINE = InnoDB;

CREATE TABLE `clube_do_livro`.`t_livros` ( 
	`cod` SERIAL NOT NULL , 
	`nome` VARCHAR(50) NOT NULL , 
	`autor` VARCHAR(50) NOT NULL , 
	`descricao` VARCHAR(255) NOT NULL , 
	`data_de_lancamento` DATE NOT NULL , 
	`url_img` VARCHAR(100) NOT NULL , 
	PRIMARY KEY (`cod`)) ENGINE = InnoDB;
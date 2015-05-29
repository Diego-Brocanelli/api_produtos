API PRODUTOS
===========================

Utilizado o [Silex-Skeleton](https://github.com/silexphp/Silex-Skeleton)

## Instalação

Para criar as estruturas do projeto, você deve utilizar o [Composer](http://getcomposer.org/).

Na raiz do projeto realize o comando.

```sh
composer install
```

Configuração do DB
===========================
Estou utilizando o ORM [Doctrine DBAL](http://www.doctrine-project.org/)
devemos configurar o ORM, abra o arquivo /src/app.php. Em seguida insira a seguinte configuração:

```sh
$app->register(new Silex\Provider\DoctrineServiceProvider(), array(
    'db.options' => array(
	    'dbname'   => 'db_name',
	    'user'     => 'user_name',
	    'password' => 'password',
	    'host'     => 'localhost',
	    'driver'   => 'pdo_mysql',
	    'charset'  => 'utf8',
	),
));
```
Obs: Lembre-se de alterar as credenciais de acesso ao DB. Caso tenha alguma dúvida [Silex-Doctrine](http://silex.sensiolabs.org/doc/providers/doctrine.html)

Estrutura da tabela produtos
===========================

```sh
DROP TABLE IF EXISTS `produtos`;

CREATE TABLE `produtos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `produto` varchar(100) CHARACTER SET latin1 NOT NULL,
  `descricao` varchar(300) CHARACTER SET latin1 NOT NULL,
  `categoria` varchar(100) CHARACTER SET latin1 NOT NULL,
  `quantidade` int(11) NOT NULL,
  `data_Cadastro` date NOT NULL,
  `hora_cadastro` time NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

INSERT INTO `produtos` VALUES (1,'Colorado Ithaca','A Ithaca é feita com malte, lúpulo e rapadura queimada e, por isso, combina com carnes de caça, queijos duros maturados, presunto cru e doces caramelizados, como crème brûlée e pudim de leite.','cervejas',25,'2015-05-28','20:36:00');
```

Desenvolvimento
===========================

No desenvolvimento utilizo a extenção do Google Chrome [POSTMAN - REST Client](https://chrome.google.com/webstore/detail/postman-rest-client/fdmmgilgnpjigdojojpjoooidkmcomcm) uma ferramenta muito legal para ir testando as funcionalidades, podendo simular todas as requisições necessárias.

Rotas
===========================
#### GET
Direcionamento para a documentação da API
```sh
/
```
#### GET
Listar todos os produtos contidos no banco de dados
```sh
/api/v1/produtos
```
#### GET
Documentação para uso da API
```sh
/api/v1/docs
```

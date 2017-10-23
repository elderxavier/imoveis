Requisitos:
	PHP 7.x.x;
	composer  1.5.2
	Laravel 5.4


Iniciar:

	Altere as credenciais do banco de dados e email no  arquivo .env localizado na pasta rais;

	Na raiz da pasta imoveis, execute os comando via terminal:

		php artisan migrate

		php artisan db:seed

		php artisan serve

	Por padrão, o sistema será executado em http://127.0.0.1:8000.

	Para acesso a api, acesse  http://127.0.0.1:8000/api/oauth e envie via post o email e senha já cadastrados e grave o remember_token de resposta.

	para acessar os demais end-point's da api é necessário pasar o remember_token como paramentro "token";


	Api end-points:

	http://127.0.0.1:8000/insert : Cria um novo imovel;

	http://127.0.0.1:8000/update: Atualiza um imovel;

	http://127.0.0.1:8000/delete : Remove um imovel;

	http://127.0.0.1:8000//search/{q?}/{v?}: Procura por imoveis: os parametros q e v são utilizados como q=coluna v=valor da coluna

	





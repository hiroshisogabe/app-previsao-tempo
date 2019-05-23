# App Previsão do Tempo

### Objetivo
Cadastrar e listar cidades permitindo a visualização da previsão do tempo dos próximos 5 dias.


### O que foi utilizado

A linguagem escolhida foi o PHP por ser a linguagem que mais trabalhei profissionalmente e para o projeto proposto será utilizado o framework Laravel.

Para o frontend, foi utilizado o framework Bootstrap pois facilita a implementação de telas compatíveis com vários dispositivos através dos seus layouts e componentes, além de ter sua utilização encorajada pelo próprio Laravel.

Os frameworks citados foram escolhidos por serem bastante difundidos no mercado e possuírem uma excelente documentação; com isso há uma grande comunidade para tratamento de dúvidas, problemas e aperfeiçoamento.

### De onde vem a informação

A API utilizada para buscar as informações é a OpenWeatherMap (https://openweathermap.org/api).

Somente serão buscadas cidades listadas por ela (http://bulk.openweathermap.org/sample/city.list.json.gz).

### Configurando o projeto

O projeto foi criado utilizando a versão 5.7.13 do Laravel e para o perfeito funcionamento, é necessário que seu ambiente tenha: PHP a partir da versão 7.1.3; o gerenciador de dependências composer (https://laravel.com/docs/5.7/installation); e um banco de dados compatível com o Laravel (https://laravel.com/docs/5.7/database#introduction).

Após clonar o projeto, é necessário executar o comando na pasta raiz: 

`composer install`

É preciso criar o arquivo .env que faremos executando o comando abaixo; a API tem o uso gratuito, portanto além de configurar valores comuns em seu arquivo .env, por exemplo, o banco de dados, não se esqueça de verificar os valores para acessar a API, que possuem o prefixo “API_”.

`cp .env.example .env`

O Laravel precisa que uma chave única seja gerada para o app, é possível gerá-la executando o comando:

`php artisan key:generate`

Para criar a tabela utilizada no nosso projeto, é preciso executar o comando: 

`php artisan migrate`

### Executando o projeto

Para testar o projeto o framework Lavarel já possui um server local, execute o comando a seguir para subi-lo: 

`php artisan serve`

Agora basta acessar a url!

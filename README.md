# sistema-de-Delivary-Online

Esse sistema é sobre uma criação de delivery online.Usarei **PHP** como BackEnd do projeto, **Jquery,HTML e CSS** no desenvolvimento FrontEnd, para o banco de dados usarei **MySQL**.
___

## Passo a Passo

### 1-Crianção do banco de dados
#### Banco de dados MySQL
No banco de dados teremos:
##### Tabela de Cadastro
|  BDCliente | implementado |
| ----- | ------------ |
| nomeCliente  |  ❌ |
| SenhaCliente |  ❌ |
| EmpresaSON |  ❌ |
| DataHora |  ❌ |
| idCliente  |  ❌ | 

##### Tabela Enderesso

|  BDendcliente | implementado |
| ----- | ------------ |
| EndeCliente  |  ❌ |
| CEPCliente |  ❌ |
| OBSCliente |  ❌ |
| DataHora |  ❌ |
| idCliente  |  ❌ | 

**Essas tabelas serão interligadas**
### 2-Criação de estilos e arquivos javaScript padrões

Criaremos em uma pasta chamada __Default__, que terá os arquivos __JsDefault__ e __StyleDefault__.No JsDefault terá tudo da parte javaScript do header, no StyleDefault terá: a cor do fundo, o tamanho das letras, a fonte e etc.

### 3-Criação da pagina de login e de cadastro

Criaremos uma pagina de cadastro e login, com a extensão **.php**.
### 4-Criação da Pagina do perfil
Nessa pagina terá as informções do enderesso,cep e obs, se você for uma empresa você terá lá escrito do lado do nome.

### 5-Pagina de configurações
Na pagina do perfil terá o botão configurações, que você poderá editar as informações colocadas, também poderá mudar de cliente para empresa.

### 6-Criação do banco de dados e da pagina se você for uma empresa
Se você for cadastrado como uma empresa, poderá colocar pedidos em uma pagina que só você terá acesso, colocando ou excluindo pedidos.
#### Banco de dados

|  BDCardapio | implementado |
| ----- | ------------ |
| ComidaNome  |  ❌ |
| DescriComi  |  ❌ |
| FotoComida |  ❌ |
| QuantidadeDePedidos |  ❌ |
| Avaliação |  ❌ |
| DataHora |  ❌ |
| idCliente  |  ❌ | 
### 7-Criação da pagina do menu
Terá a implementação de todas as empresas colocando-a no menu em retangulos, com:
|  Menu | implementado |
| ----- | ------------ |
| Nome da comida  |  ❌ |
| Descrição  |  ❌ |
| Nome da empres |  ❌ |
| Quantos já foram pedidos |  ❌ |
| Avaliação |  ❌ |
| Foto |  ❌ |

**Essa documentação poderá mudar de acordo com as necessidades do projeto**.
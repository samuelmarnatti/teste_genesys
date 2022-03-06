   
# API Teste Genesys

API REST criada para teste da empresa genesys. Essa API permite visualizar informações de produtos, alterar e deletar. Também é possível tomar as mesas ações com cada loja cadastrada.

Recursos disponíveis para acesso via API:

### Produtos
| Método | EX Comando | Descrição|
|---|---|---|
| `GET`    | http://localhost:8000/api/produto/     |Retorna informações de todos os produtos registrados. |
| `GET`    | http://localhost:8000/api/produto/{id} |Retorna informações de um produto utilizando o ID.|
| `POST`   | http://localhost:8000/api/produto?nome=Tablet&valor=1100&ativo=0&loja_id=1 |Cadastra um novo produto. |
| `PATCH`  | http://localhost:8000/api/produto/{id}?nome=cadeira&valor=150&ativo=1&loja_id=2  |Atualiza dados de um produto. |
| `DELETE` | http://localhost:8000/api/produto/{id}  |Remove um produto do sistema. |

### Loja
| Método | EX Comando | Descrição|
|---|---|---|
| `GET`    | http://localhost:8000/api/loja/     |Retorna informações de todas as lojas registradas. |
| `GET`    | http://localhost:8000/api/loja/{id} |Retorna informações da loja selecionada pelo id e todos os produtos da loja|
| `POST`   | http://localhost:8000/api/loja?nome=havan&email=financeiro@havan.com.br |Cadastra uma nova loja |
| `PATCH`  | http://localhost:8000/api/loja/{id}?email=financeiro@havan.com.br  |Atualiza dados de uma loja. |
| `DELETE` | http://localhost:8000/api/loja/{id}  |Remove uma loja do sistema. |


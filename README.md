# Ambiente para Magento 2.4.x
Este projeto foi desenvolvido a pensar numa estrutura voltada para o Magento 2.4 (on-premises). 

## Requisitos Mínimos.
* Docker:19.03
* Docker-compose:1.17.1

## Passo-a-passo de como subir o ambiente.
Segue abaixo as instruções necessárias para subir o ambiente local e a instalação do Magento 2.4.

### Adicionando os arquivos de configuração.
Após clonar o repositório, já é possível escolher a versão. O versionamento é realizado através de branches, basta selecionar a sua versão do Adobe Commerce e já é possível trabalhar com ele.

```bash
$ git checkout [escolha_sua_versão]
```

Após escolhida a versão já é possível configurar o projeto. Para isso, nós criamos um script responsável por automatizar o processo de configuração do ambiente, basta que execute o shell-script, responda todas as perguntas do terminal e o mesmo já vai estar configurado.
```bash
$ ./configure.sh
```

### Configuração de Multi Websites/Stores
O nginx.conf já vem pré-configurado para funcionar com mais de um website/store — tudo que precisa ser feito é configura-lo conforme necessidade do projeto e seguindo a documentação do Magento:
* [Configurando Multi websites/stores no Nginx](https://devdocs.magento.com/guides/v2.4/config-guide/multi-site/ms_nginx.html)
* [Configurando Multi websites/stores no Admin do Magento](https://devdocs.magento.com/cloud/project/project-multi-sites.html)

Caso queira utilizar o exemplo nativo, apenas configure (tanto no arquivo de Hosts quanto no admin do Magento) o seguinte mapeamento:

* **Url:** magento-website02.local.com
* **Website Code:** website_02
* **Url:** magento-website03.local.com
* **Website Code:** website_03

O resultado deve ser algo parecido com isso
![Exemplo-Website-02](imagens/exemplo-website-02.png)
![Exemplo-Website-03](imagens/exemplo-website-03.png)

# Como instalar o Magento.
Para instalar o Magento primeiramente é preciso que os módulos controlados pelo composer sejam carregados, para rodar o composer é preciso acessar o container responsável pelo PHP (onde se encontra o composer) e rodar o comando de instalação, por exemplo:

Acesse o container pelo seguinte comando:
```bash
$ docker exec -it --user www-data:www-data <container_prefix>_php_magento2.4 bash
```
Dentro do container execute o comando:
```bash
$ composer install
```
Após a instalação do composer agora é preciso rodar o comando para instalação do Magento, ou seja, ativação dos módulos, as estruturas das entidades do banco de dados, etc.

Lembrando que alguns dos valores abaixo podem mudar caso se tenha alterado o docker-compose e/ou modificado algum dos arquivos de configuração:
```bash
$ bin/magento setup:install --no-interaction \
    --admin-firstname=Webjump \
    --admin-lastname=Admin \
    --admin-email=admin@webjump.com.br \
    --admin-user=admin \
    --admin-password=admin123 \
    --use-secure=1 \
    --base-url-secure=https://magento.local \
    --use-secure-admin=1 \
    --backend-frontname=backoffice \
    --db-host=mysql \
    --db-name=magento2 \
    --db-user=magento2 \
    --db-password=magento2 \
    --language=pt_BR \
    --page-cache=redis \
    --page-cache-redis-server=redis \
    --page-cache-redis-db=0 \
    --cache-backend=redis \
    --cache-backend-redis-server=redis \
    --cache-backend-redis-db=1 \
    --session-save=redis \
    --session-save-redis-host=redis \
    --session-save-redis-db=2 \
    --elasticsearch-host=elasticsearch \
    --amqp-host=rabbitmq \
    --amqp-port=5672 \
    --amqp-user=guest \
    --amqp-password=guest \
    --cleanup-database
```

## Problemas conhecidos
Em alguns casos excepcionais, ao executar o comando de re indexação da pesquisa de catalogo, pode ser que se depare com o seguinte erro:

```bash
{"error":{"root_cause":[{"type":"cluster_block_exception","reason":"index [magento2_product_1_v2] blocked by: [FORBIDDEN/12/index read-only / allow delete (api)];"}],"type":"cluster_block_exception","reason":"index [magento2_product_1_v2] blocked by: [FORBIDDEN/12/index read-only / allow delete (api)];"},"status":403}
```

Isso acontece devido a uma configuração nativa do elasticsearch, onde, devido à percentagem baixa de espaço disponível na memória faz com que o elastic mude automaticamente para readonly.
Para mudar isso basta enviar uma requisição para o endpoint mudando a opção de "readonly_allow_delete"

```bash
$ curl -XPUT -H "Content-Type: application/json" http://127.0.0.1:9200/_all/_settings -d '{"index.blocks.read_only_allow_delete": null}'
```

## Primeiro acesso
É importante lembrar que o primeiro acesso ao painel administrativo do Magento 2.4 pode ser um pouco frustrante devido às novas políticas de segurança.

Para ter acesso ao painel de administrador é recomendável que o campo de email esteja preenchido com o seu email corporativo da webjump: `--admin-email=<SEU_EMAIL>@webjump.com.br`, e, que se tenha um SMTP configurado para o envio de emails.

Essa obrigatoriedade se faz pelo fato da autenticação de dois fatores ser OBRIGATÓRIA tanto para ambiente de desenvolvimento quanto para produção, ou seja, o primeiro acesso ao painel administrativo deve ser comum se deparar com essa tela ao efetuar login:

![Login 2fa](imagens/exemplo-login-2fa.png)

### Envio de email
Para que não seja preciso configurar um servidor SMP (que costuma ser trabalhoso) este docker é configurado com o [Mailhog](https://github.com/mailhog/MailHog) para captura do envio de emails. Dessa forma é possível testar e validar o envio de emails customizados, e, para configurar o 2fa.

O Mailhog NÃO irá disparar um email para a sua caixa de mensagem, ele possui um painel próprio onde TODOS os emails disparados vão parar.

Para acessar o painel cole o seguinte Ip e porta no seu navegador:
```text
http://127.0.0.1:<mail-port>
```
![Exemplo Mailhog](imagens/exemplo-mailhog.png)# magento-checkout-mercadolivre
# magento-checkout-mercadolivre

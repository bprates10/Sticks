# Sticks
Sticks é uma ferramenta para gerenciamento de chamados de equipes de suporte.
Surgiu da necessidade de gerenciar chamados de suporte, uma vez que as ferramentas existentes no mercado não se mostraram completas.
As ferramentas testadas tem como base a utilização (cliente x suporte), entretanto esta visão é mais abrangente no mercado de trabalho.

A ferramenta permite a utilização em diversas regras de negócio:
- Ideal para empresas que oferecem suporte aos seus produtos diretamente para seus clientes (cliente x empresa).
- Ótima usabilidade para empresas que oferecem o serviço de terceirização do suporte (cliente x suporte terceirizado x empresa)
- Possibilita o uso por empresas de VAN's (value agreggate network) que agregam serviços a diversas empresas de diversos segmentos (empresa x suporte van x empresa)

Sobre a ferramenta (funcionalidades desenvolvidas):
- Possibilita o cadastro manual de usuários;
- Possibilita a abertura manual de chamados;
- Efetua a leitura de uma caixa de e-mails, importando seu conteúdo (chamado);
- Verifica se o remetente e o destinatário estão cadastrados na aplicação, procedendo com o cadastro se necessário;
- Permite a abertura manual de chamados;
- Permite a manipulação do chamado (alteração de status, alteração de prioridade).

Sobre a ferramenta (funcionalidades em desenvolvimento):
- Possibilita o cadastro manual de empresas;
- Envia respostas ao cliente por endereço de e-mail;
- Permite a postagem de notas internas, disponíveis no atendimento e não enviadas ao cliente.

Sobre a ferramenta (funcionalidades a serem desenvolvidas):
- Manipulação da interface pelo usuário da aplicação;
- Merge automatizado de chamados e atendimentos.

Sobre a codificação:
- Utiliza pattern DAO, mantendo bem definido a divisão entre regra de negócio e regra de acesso ao banco, permitindo reutilização classes;
- Utiliza pattern MVC, mantendo bem definido as responsabilidades de cada camada sobre a aplicação;
- Utiliza pattern Singleton, permitindo apenas uma instância de classe para otimizar as requisições da aplicação no banco de dados;
- Utiliza requisições assíncronas em Ajax para impedir que o conteúdo da página seja recarregado a cada nova solicitação.

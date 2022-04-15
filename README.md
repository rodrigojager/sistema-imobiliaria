# sistema-imobiliaria
Sistema provisório para cadastro de anúncio de imóveis feito com PHP, HTML, CSS, Javascript, Jquery e Bootstrap.

Inclui páginas para exibir os imóveis já cadastrados no sistema, para entrar em contato, para efetuar o login (o que permite gerenciar o sistema), incluindo:

- Cadastrar novos anúncios de imóveis;
- Remover anúncios de imóveis ou editar e atualizar informações de anúncios;
- Inserir ou remover fotos de algum anúncio.

Caso queira testar o login, use as seguintes credenciais:

- Usuário: teste
- Senha: teste

A senha está criptografada no banco de dados e a hash contem salt

No servidor local (APACHE), o controle de login de usuário era mantido pela sessão (PHP session), mas no servidor remoto (hospedagem paga), o controle de sessão não estava funcionando por algum motivo desconhecido. Sendo assim, o controle de login foi feito com o uso de cookies. A solução não é a ideal, porque permite que alguém mal intencionado efetue um ataque no qual os cookies de um usuário que esteja logado no sistema seja roubado e o atacate consiga se passar pelo usuário legítimo, uma vez que o cookie é a própria credencial autenticada. Como o sistema a princípio só seria logado através do computador pessoal da corretora, que apenas ela teria acesso, esse tipo de ataque é muito improvável (exceto se o equipamento estiver comprometido com alguma praga virtual).

É necessário importar o banco de dados do arquivo "imobiliaria.sql", ou executar os comandos presentes nele para conseguir visualizar os imóveis de teste e puramente ilustrativos e para fazer o login e acessar a página de gerenciamento.

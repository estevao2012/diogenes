<?php
/** 
 * As configurações básicas do WordPress.
 *
 * Esse arquivo contém as seguintes configurações: configurações de MySQL, Prefixo de Tabelas,
 * Chaves secretas, Idioma do WordPress, e ABSPATH. Você pode encontrar mais informações
 * visitando {@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} Codex page. Você pode obter as configurações de MySQL de seu servidor de hospedagem.
 *
 * Esse arquivo é usado pelo script ed criação wp-config.php durante a
 * instalação. Você não precisa usar o site, você pode apenas salvar esse arquivo
 * como "wp-config.php" e preencher os valores.
 *
 * @package WordPress
 */

// ** Configurações do MySQL - Você pode pegar essas informações com o serviço de hospedagem ** //
/** O nome do banco de dados do WordPress */
define('DB_NAME', 'diogenes');

/** Usuário do banco de dados MySQL */
define('DB_USER', 'root');

/** Senha do banco de dados MySQL */
define('DB_PASSWORD', 'root');

/** nome do host do MySQL */
define('DB_HOST', 'localhost');

/** Conjunto de caracteres do banco de dados a ser usado na criação das tabelas. */
define('DB_CHARSET', 'utf8');

/** O tipo de collate do banco de dados. Não altere isso se tiver dúvidas. */
define('DB_COLLATE', '');

/**#@+
 * Chaves únicas de autenticação e salts.
 *
 * Altere cada chave para um frase única!
 * Você pode gerá-las usando o {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * Você pode alterá-las a qualquer momento para desvalidar quaisquer cookies existentes. Isto irá forçar todos os usuários a fazerem login novamente.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '0>y;-t?4GLa]ZEK~vi }QR7/&NU+|dvTTR1EZG(]~.?YM|[-v}mSX/q[k%|S nm.');
define('SECURE_AUTH_KEY',  '=$F ^q.|L0*T`.4EU8p1Z6R6}a-) i &MIef#>F`{D?3PH/ Y_.E)6bEcuN2~~_L');
define('LOGGED_IN_KEY',    'djcI)bPce_uCR[>mVzY+[a&otq;Bb:++N|fp`Ab%ARMej@eVhP:|T<UUr#Oz((+%');
define('NONCE_KEY',        '7}f%%kj!~<S,SvKW-ygLi{mQORG%8ne)sKERzJrU:k^xBor!+91qq4|q0GYct*j3');
define('AUTH_SALT',        'LwM-kLZm~.ra16IvZb>Wqh)<@;t1$Vx>ISfzY%c71OW;*4r-4J$A/z-C{W]>,0xv');
define('SECURE_AUTH_SALT', 'W}S&fsGs@]#0B./_S$I%fZ_M]bxqF l_|OJ45|E>J(h]W+u$6=y:X0sXhN%Rg65|');
define('LOGGED_IN_SALT',   '7!_=o^:(H )l&:X;`Ej<:|W8X;6+s$j<4nD&ncgO:[`S F,urySoIr=S|[_SWmTL');
define('NONCE_SALT',       'T#)zq;zT_if/UE@C?44~PZKrZ)VIo15`Z# sz*}?=7{|/?.n}frs._Gzj!TlrW2P');

/**#@-*/

/**
 * Prefixo da tabela do banco de dados do WordPress.
 *
 * Você pode ter várias instalações em um único banco de dados se você der para cada um um único
 * prefixo. Somente números, letras e sublinhados!
 */
$table_prefix  = 'wp_';


/**
 * Para desenvolvedores: Modo debugging WordPress.
 *
 * altere isto para true para ativar a exibição de avisos durante o desenvolvimento.
 * é altamente recomendável que os desenvolvedores de plugins e temas usem o WP_DEBUG
 * em seus ambientes de desenvolvimento.
 */
define('WP_DEBUG', false);

/* Isto é tudo, pode parar de editar! :) */

/** Caminho absoluto para o diretório WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');
	
/** Configura as variáveis do WordPress e arquivos inclusos. */
require_once(ABSPATH . 'wp-settings.php');

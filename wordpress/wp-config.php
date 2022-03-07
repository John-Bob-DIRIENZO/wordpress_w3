<?php
/**
 * La configuration de base de votre installation WordPress.
 *
 * Ce fichier est utilisé par le script de création de wp-config.php pendant
 * le processus d’installation. Vous n’avez pas à utiliser le site web, vous
 * pouvez simplement renommer ce fichier en « wp-config.php » et remplir les
 * valeurs.
 *
 * Ce fichier contient les réglages de configuration suivants :
 *
 * Réglages MySQL
 * Préfixe de table
 * Clés secrètes
 * Langue utilisée
 * ABSPATH
 *
 * @link https://fr.wordpress.org/support/article/editing-wp-config-php/.
 *
 * @package WordPress
 */

// ** Réglages MySQL - Votre hébergeur doit vous fournir ces informations. ** //
/** Nom de la base de données de WordPress. */
define( 'DB_NAME', 'data' );

/** Utilisateur de la base de données MySQL. */
define( 'DB_USER', 'root' );

/** Mot de passe de la base de données MySQL. */
define( 'DB_PASSWORD', 'password' );

/** Adresse de l’hébergement MySQL. */
define( 'DB_HOST', 'db' );

/** Jeu de caractères à utiliser par la base de données lors de la création des tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/**
 * Type de collation de la base de données.
 * N’y touchez que si vous savez ce que vous faites.
 */
define( 'DB_COLLATE', '' );

/**#@+
 * Clés uniques d’authentification et salage.
 *
 * Remplacez les valeurs par défaut par des phrases uniques !
 * Vous pouvez générer des phrases aléatoires en utilisant
 * {@link https://api.wordpress.org/secret-key/1.1/salt/ le service de clés secrètes de WordPress.org}.
 * Vous pouvez modifier ces phrases à n’importe quel moment, afin d’invalider tous les cookies existants.
 * Cela forcera également tous les utilisateurs à se reconnecter.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'cyZ1lsp_^#c9HH5g[bpbiFzdS;a}56flM~gN;0|^f4pDsIn`N,KxWQt8A1wB*DJE' );
define( 'SECURE_AUTH_KEY',  ':>>%,Aq4h3hEGMAaO}cxfl=c_UJ=R)*8k2jVi_<ROLXile39Y{l.f%fdd47M SmH' );
define( 'LOGGED_IN_KEY',    'XCS[XNc|2}ewH5-mx$x#KtF|}<P{F`Brw$gq{FF^M9vXtBCuDyF.S1;zkYo~5GQy' );
define( 'NONCE_KEY',        '<L#2=NNtDv#0>!K$;0C6R I|=~RITc%X.}T;hL:BMqb]:tcui_/ojdl7(LKu/`s/' );
define( 'AUTH_SALT',        '/}qLsI.8>-1v+zc9Pvs(g^jz`FFDkxgk+8/pc&HNd>fNM/ZNM  #Jp5kTk(pV[E7' );
define( 'SECURE_AUTH_SALT', 's,00FF)IV_s[/cF0L7q>u2IaUS}7 3CM E%8V~<aW2d#.#A+=N`GxY)JL,_}R8!1' );
define( 'LOGGED_IN_SALT',   '[[p6gVGTQW:rVDWZo=T?VJ0+PmIEaS=lU=7i=A^AO!qH(9A;!(*G>Lua||q1-R&#' );
define( 'NONCE_SALT',       'biBD2K(O5qsF^ =AS:o/oH)qilx/wV8sl@}ms?@?^jh2+]e[gCM&e7N]I1i5jcWo' );
/**#@-*/

/**
 * Préfixe de base de données pour les tables de WordPress.
 *
 * Vous pouvez installer plusieurs WordPress sur une seule base de données
 * si vous leur donnez chacune un préfixe unique.
 * N’utilisez que des chiffres, des lettres non-accentuées, et des caractères soulignés !
 */
$table_prefix = 'wp_';

/**
 * Pour les développeurs : le mode déboguage de WordPress.
 *
 * En passant la valeur suivante à "true", vous activez l’affichage des
 * notifications d’erreurs pendant vos essais.
 * Il est fortement recommandé que les développeurs d’extensions et
 * de thèmes se servent de WP_DEBUG dans leur environnement de
 * développement.
 *
 * Pour plus d’information sur les autres constantes qui peuvent être utilisées
 * pour le déboguage, rendez-vous sur le Codex.
 *
 * @link https://fr.wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* C’est tout, ne touchez pas à ce qui suit ! Bonne publication. */

/** Chemin absolu vers le dossier de WordPress. */
if ( ! defined( 'ABSPATH' ) )
  define( 'ABSPATH', dirname( __FILE__ ) . '/' );

/** Réglage des variables de WordPress et de ses fichiers inclus. */
require_once( ABSPATH . 'wp-settings.php' );

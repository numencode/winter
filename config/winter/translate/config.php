<?php

/*
 * Overrides of Winter.Translate's plugin config (merged over plugins/winter/translate/config/config.php).
 *
 * URL-based languages: the default language (en) has no URL prefix, other languages do (e.g. /sl/opeke).
 * The demo layouts' localePicker uses forceUrl = 1, so it switches to these URLs.
 */
return [
    'prefixDefaultLocale' => false,
];

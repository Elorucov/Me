<?php

const SUPPORTED_LANGS = ['en', 'ru', 'az'];
const LANG_COOKIE = "homepagelang";

function e(string $s): string
{
    return htmlspecialchars($s, ENT_QUOTES, "UTF-8");
}

/** Set language by "?lang=" parameter. */
function updateLang($url) {
    header('Vary: Accept-Language, Cookie');
    if (isset($_GET['lang']) && in_array($_GET['lang'], SUPPORTED_LANGS, true)) {
        setcookie(LANG_COOKIE, $_GET['lang'], [
            'expires'  => time() + 365 * 24 * 3600,
            'path'     => $url
        ]);
        $_COOKIE[LANG_COOKIE] = $_GET['lang'];
    }
}

/** Update language cookie if request header contains necessary header */
function detectLang(array $supported = SUPPORTED_LANGS, string $default = 'en'): string
{
    // 1. Cookie
    $cookie = strtolower($_COOKIE[LANG_COOKIE] ?? '');
    if (in_array($cookie, $supported, true)) {
        return $cookie;
    }

    // 2. Accept-Language: "ru-RU,ru;q=0.9,en-US;q=0.8,en;q=0.7"
    $header = $_SERVER['HTTP_ACCEPT_LANGUAGE'] ?? '';
    $candidates = [];

    foreach (explode(',', $header) as $i => $part) {
        $bits = explode(';', trim($part));
        $tag  = strtolower(trim($bits[0]));
        $q    = 1.0;

        if (isset($bits[1]) && preg_match('/^\s*q\s*=\s*([\d.]+)/i', $bits[1], $m)) {
            $q = (float)$m[1];
        }
        if ($tag === '' || $tag === '*' || $q <= 0) {
            continue;
        }

        $candidates[] = [explode('-', $tag)[0], $q, $i]; // "ru-RU" → "ru"
    }

    // sort by descending
    usort($candidates, fn($a, $b) => $b[1] <=> $a[1] ?: $a[2] <=> $b[2]);

    foreach ($candidates as [$code]) {
        if (in_array($code, $supported, true)) {
            return $code;
        }
    }

    // 3. Default
    return $default;
}

/** Load php file with locale */
function loadLangFile(string $lang, string $file): mixed
{
    // lang folder stores alongside with inc folder,
    // so we need to go to parent folder
    $upOne = dirname(__DIR__, 1);
    $path = $upOne . "/lang/$lang/$file";
    return is_file($path) ? require $path : null;
}

function localizeList(array $base, string $lang, string $file): array
{
    $en = loadLangFile('en', $file) ?? [];
    $tr = $lang === 'en' ? [] : (loadLangFile($lang, $file) ?? []);

    foreach ($base as $id => &$item) {
        $item = array_replace($item, $en[$id] ?? [], $tr[$id] ?? []);
        $item["linkLoc"] = array_replace($en[$id]["linkLoc"] ?? [], $tr[$id]["linkLoc"] ?? []);
    }
    return $base;
}

// Russian-specific thing.
/**
 * Склонение существительных после числительных.
 *
 * @param int|float $number Число
 * @param array $titles Массив из 3-х вариантов склонения: ['год', 'года', 'лет']
 * @return string
 */
function pluralForm($number, array $titles): string
{
    $cases = [2, 0, 1, 1, 1, 2];
    $absNumber = abs((int) $number);

    $index = ($absNumber % 100 > 4 && $absNumber % 100 < 20)
        ? 2
        : $cases[min($absNumber % 10, 5)];

    $word = $titles[$index];

    return $word;
}

?>
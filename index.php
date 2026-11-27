<!-- Created by Elchin Orujov on 2026. No artifical cringelligence are used. -->

<?php

require_once 'elorexpressive/inc/i18n.php';

/** .png and .jpg fallbacks for a .webp images */
function pngFallback(string $url): string
{
    return preg_replace('/\.webp$/', ".png", $url);
}

function jpgFallback(string $url): string
{
    return preg_replace('/\.webp$/', ".jpg", $url);
}

/** Parse template. Example: t("Hello, {text}!", ["text" => "world"]); */
function t(string $text, array $vars = []): string
{
    $repl = [];
    foreach ($vars as $k => $v) $repl['{' . $k . '}'] = $v;
    return strtr($text, $repl);
}

/** Remove multiple spaces from the buffer. */
function removeWhitespace($buffer)
{
    return preg_replace('/\s+/', ' ', $buffer);
}

const BLOG_URL = "https://elor.top/blog/";
$currentUrl = 'https://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
$currentDay = date("z");

$bodyClasses = [];
if (isset($_GET["ny"]) || ($currentDay <= 31 || $currentDay >= 334)) {
    $bodyClasses[] = "ny";
}


updateLang($currentUrl);

$lang = detectLang();
$l = array_replace(loadLangFile('en', 'locale.php'), loadLangFile($lang, 'locale.php') ?? []);

// Age
$birthDate = explode("/", "02/05/1998");
$age =
    date(
        "md",
        date("U", mktime(0, 0, 0, $birthDate[0], $birthDate[1], $birthDate[2])),
    ) > date("md")
        ? date("Y") - $birthDate[2] - 1
        : date("Y") - $birthDate[2];

$logoBase = "elorexpressive/res/logos/";
$shotBase = "elorexpressive/res/screenshots/";

$projects = localizeList(require 'elorexpressive/data/projects.php', $lang, 'projects.php');
$projectsFeatured = array_filter($projects, fn ($val, $key) => $val["featured"] === true, ARRAY_FILTER_USE_BOTH);
$projectsOther = array_filter($projects, fn ($val, $key) => $val["featured"] === false, ARRAY_FILTER_USE_BOTH);
$projectsMetaLoc = [
    "app" => $l["app"],
    "desktop" => $l["desktop"],
    "tool" => $l["tool"],
    "site" => $l["site"],
    "lib" => $l["lib"]
];

$contacts = localizeList(require 'elorexpressive/data/contacts.php', $lang, 'contacts.php');

// ---------------------------------------------------------------------------
// Blog posts
// ---------------------------------------------------------------------------

$postsContent = file_get_contents("blog/posts.json");
$posts = json_decode($postsContent, true);
$posts = array_reverse($posts);

ob_start('removeWhitespace');
?>


<!DOCTYPE html>
<html lang="<?= $lang ?>">
    <head>
        <meta charset="utf-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=2.0"/>
        <meta name="color-scheme" content="light dark" />
        <title>ELOR | <?= $l["name"] ?></title>
        <meta name="description" content="<?= $l["page_desc"] ?>"/>

        <!-- og meta -->
        <meta property="og:type" value="website" />
        <meta property="og:description" value="<?= $l["page_desc"] ?>" />
        <meta property="og:url" value="<?= $currentUrl; ?>" />
        <meta property="og:title" value="ELOR | <?= $l["name"] ?>" />
        <meta property="og:image" value="<?= $currentUrl; ?>elorexpressive/res/elor_232_2x.jpg" />
        <meta property="og:image:alt" value="Elchin itself" />
        <meta property="og:image:width" value="464" />
        <meta property="og:image:height" value="464" />

        <!-- resources -->
        <link rel="stylesheet" type="text/css" href="elorexpressive/res/style.css"/>
    </head>
    <body<?= count($bodyClasses) > 0 ? " class='".implode(" ", $bodyClasses)."'" : ""; ?>>
        <main>
            <nav id="mainMenu">
                <!--<decor></decor>-->
                <input type="radio" name="tabs" id="about" checked/>
                <label for="about"><span><?= mb_strtolower($l["about"]) ?></span></label>
                <input type="radio" name="tabs" id="projects"/>
                <label for="projects"><span><?= mb_strtolower($l["portfolio"]) ?></span></label>
                <input type="radio" name="tabs" id="contacts"/>
                <label for="contacts"><span><?= mb_strtolower($l["contacts"]) ?></span></label>
                <input type="radio" name="tabs" id="moret"/>
                <label for="moret"><span><?= mb_strtolower($l["more"]) ?></span></label>
                <decor></decor>
            </nav>
            <content id="aboutTab">
                <div id="personPictureFrame">
                    <picture>
                        <source srcset="elorexpressive/res/elor_232.webp, elorexpressive/res/elor_232_2x.webp 2x" type="image/webp">
                        <source srcset="elorexpressive/res/elor_232.jpg, elorexpressive/res/elor_232_2x.jpg 2x" type="image/jpeg">
                        <img fetchpriority="high" alt="Elchin itself" src="elorexpressive/res/elor_232_2x.jpg">
                    </picture>
                    <left-handler></left-handler>
                </div>
                <h1><?= $l["name"] ?></h1>
                <p class="asParagraph">ELOR / Elorucov</p>
                <p><?= t($l["about_start_1"], ["age" => $age, "p_age" => pluralForm($age, $l["p_age"])]) ?></p>
                <p><?= $l["about_start_2"] ?></p>
                <p><?= $l["personal_languages"] ?></p>

                <h2>👨🏻‍💻 <?= $l["knowledge_title"] ?></h2>

                <div id="knowledge" class="adaptiveGrid">
                    <div class="card knowledgeCard" style="--accent:#0078d7">
                        <aside>
                            <svg>
                                <use href="elorexpressive/res/icons.svg#mswindows36"></use>
                            </svg>
                        </aside>
                        <section class="cardContent">
                            <header><?= $l["knowledge_windows_dev"] ?></header>
                            <content>
                                <chips>
                                    <a class="chip" href="https://dot.net">.NET</a>
                                    <a class="chip" href="https://learn.microsoft.com/en-us/windows/uwp/get-started/">UWP</a>
                                    <a class="chip" href="https://learn.microsoft.com/en-us/windows/apps/windows-app-sdk/">WinUI 3</a>
                                    <a class="chip" href="https://learn.microsoft.com/en-us/dotnet/desktop/wpf/overview/">WPF</a>
                                    <a class="chip less" href="https://learn.microsoft.com/en-us/dotnet/desktop/winforms/overview/">WinForms</a>
                                </chips>
                            </content>
                        </section>
                    </div>

                    <div class="card knowledgeCard" style="--accent:#00aa66">
                        <aside>
                            <svg>
                                <use href="elorexpressive/res/icons.svg#window36"></use>
                            </svg>
                        </aside>
                        <section class="cardContent">
                            <header><?= $l["knowledge_crossplatform_ui"] ?><span title="<?= $l["knowledge_crossplatform_ui_notice"] ?>">*</span></header>
                            <content>
                                <chips>
                                    <a class="chip" href="https://dot.net">.NET</a>
                                    <a class="chip" href="https://avaloniaui.net">Avalonia</a>
                                </chips>
                            </content>
                        </section>
                    </div>

                    <div class="card knowledgeCard" style="--accent:#7e7e7e">
                        <aside>
                            <svg>
                                <use href="elorexpressive/res/icons.svg#console36"></use>
                            </svg>
                        </aside>
                        <section class="cardContent">
                            <header><?= $l["knowledge_tools"] ?></header>
                            <content>
                                <chips>
                                    <a class="chip" href="https://dot.net">.NET</a>
                                    <a class="chip" href="https://learn.microsoft.com/en-us/powershell/">PowerShell</a>
                                </chips>
                            </content>
                        </section>
                    </div>

                    <div class="card knowledgeCard" style="--accent:var(--color1);">
                        <aside>
                            <svg>
                                <use href="elorexpressive/res/icons.svg#globe36"></use>
                            </svg>
                        </aside>
                        <section class="cardContent">
                            <header><?= $l["knowledge_web"] ?></header>
                            <content>
                                <chips>
                                    <a class="chip" href="https://dotnet.microsoft.com/en-us/apps/aspnet">ASP.NET Core</a>
                                    <a class="chip" href="https://php.net">PHP</a>
                                    <span class="chip">JavaScript</span>
                                    <span class="chip less">React</span>
                                </chips>
                            </content>
                        </section>
                    </div>
                </div>


                <h2 class="noBorder">🛠️ <?= $l["skills"] ?></h2>

                <div class="masonryGrid">
                    <div class="infoblock">
                        <header>.NET</header>
                        <ul>
                            <li><?= $l["skills_primary_language"] ?>: <b>C#</b></li>
                            <li>GUI: <b>MVVM pattern</b></li>
                            <li>ORM: <b>ADO.NET, Entity Framework Core, LINQ</b></li>
                        </ul>
                    </div>
                    <div class="infoblock">
                        <header>Web</header>
                        <ul>
                            <li><?= $l["skills_base"] ?>: <b>HTML5, CSS3, JS</b></li>
                            <li><?= $l["skills_experience"] ?> <b>React</b></li>
                            <li><?= $l["skills_server"] ?>: <b><a href="https://nginx.org">nginx</a>, <a href="https://caddyserver.com">Caddy</a></b></li>
                            <li><?= $l["skills_web_light"] ?>: <b>PHP</b></li>
                            <li><?= $l["skills_on_else"] ?>: <b>ASP.NET 8+ (API, MVC, Razor)</b></li>
                        </ul>
                    </div>
                    <div class="infoblock">
                        <header><?= $l["skills_db"] ?></header>
                        <ul>
                            <li><?= $l["skills_primary"] ?>: <b>MySQL</b></li>
                            <li><?= $l["skills_experience"] ?> <b>PostgreSQL &amp; SQL Server</b></li>
                            <li><?= $l["skills_small_projects"] ?>: <b>SQLite</b></li>
                        </ul>
                    </div>
                    <div class="infoblock">
                        <header><?= $l["skills_it"] ?></header>
                        <ul>
                            <li><b>Git &amp; CI/CD</b> <span title="<?= $l["skills_ci"] ?>">ℹ️</span></li>
                            <li><?= $l["skills_scripts"] ?> <b>PowerShell, VBA, Bash</b></li>
                            <li><b>IT helpdesk</b> <span title="<?= $l["skills_helpdesk"] ?>">ℹ️</span></li>
                            <li><?= $l["skills_1c"] ?></li>
                            <li><?= $l["skills_icons"] ?></li>
                        </ul>
                    </div>
                </div>

                <h2>👨🏻 <?= $l["about_extra"] ?></h2>
                <p><?= $l["personal_p1"] ?></p>
                <p><?= $l["personal_p2"] ?></p>
                <p><?= $l["personal_p3"] ?></p>
            </content>

            <content id="projectsTab">
                <h2 class="noBorder"><?= $l["featured"] ?></h2>
                <div class="showcaseContainer">
                    <style>
                        <?php
                            $selectors = [];
                            foreach ($projectsFeatured as $i => $p) {
                                $selectors[] = "#si{$i}:checked ~ #p{$i}";
                            }
                            echo implode(",", $selectors);
                        ?>{display:block;}

                        <?php foreach ($projectsFeatured as $i => $p): ?>
                        <?php if (!empty($p["color"])): ?>
                            #si<?= $i ?>:checked + label, #si<?= $i ?>:checked ~ #p<?= $i ?>{--accent:<?= $p["color"] ?>}
                        <?php endif; ?>
                        <?php endforeach; ?>
                    </style>

                    <?php $n = 0; foreach ($projectsFeatured as $i => $p): ?>
                        <input id="si<?= $i ?>" type="radio" name="fp" <?= $n++ === 0 ? "checked" : ""; ?>>
                        <label for="si<?= $i ?>"><?= $p["name"] ?></label>
                    <?php endforeach; ?>

                    <?php foreach ($projectsFeatured as $i => $p): $techId = "tech_" . $i; ?>
                        <div id="p<?= $i ?>" class="showcaseItem">
                            <content class="projectShowcase">
                                <div class="screenshot" id="ss<?= $i ?>">
                                    <picture>
                                        <source media="(prefers-color-scheme: dark)" srcset="<?= e($p["screenshot"]["dark"]); ?>">
                                        <source media="(prefers-color-scheme: light)" srcset="<?= e($p["screenshot"]["light"]); ?>">
                                        <img loading="lazy" src="<?= e(jpgFallback($p["screenshot"]["light"])); ?>">
                                    </picture>
                                </div>
                                <summary>
                                    <h2><?= $p["name"] ?></h2>
                                    <div class="meta"><?= t(e(implode(" · ", $p["meta"])), $projectsMetaLoc) ?></div>
                                    <p><?= $p["description"] ?></p>
                                    <div class="verticalLinks">
                                        <?php foreach ($p["links"] as $key => $url): ?><a href="<?= e($url) ?>"><?= e($p["linkLoc"][$key] ?? $key) ?></a><?php endforeach; ?>
                                        <?php if (!empty($p["techStack"])): ?>
                                        <input type="checkbox" class="dlg" id="<?= $techId ?>">
                                        <label for="<?= $techId ?>"><?= $l["tech_stack"] ?></label>
                                            <div class="dlg_wrap">
                                                <label class="dlg_closer" for="<?= $techId ?>"></label>
                                                <div class="dlg_content">
                                                    <ul>
                                                        <?php foreach ($p["techStack"] as $tech): ?>
                                                            <li><?= $tech ?></li>
                                                        <?php endforeach; ?>
                                                    </ul>
                                                </div>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                </summary>
                            </content>
                        </div>
                    <?php endforeach; ?>
                </div>

                <h2 class="noBorder"><?= $l["other_projects"] ?></h2>

                <div class="adaptiveGrid">
                    <?php foreach ($projectsOther as $i => $p): $logo = $p["logo"]; $techId = "tech_" . $i; ?>
                        <div class="card" style="--accent:<?= e($p["color"]) ?>">
                            <?php if (isset($logo["icon"])): ?>
                                <aside>
                                    <svg>
                                        <use href="elorexpressive/res/icons.svg#<?= e($logo["icon"]) ?>"></use>
                                    </svg>
                                </aside>
                            <?php elseif (isset($logo["light"], $logo["dark"])): ?>
                                <!-- TODO: Fix wrong picture loading for different prefers-color-scheme and body theme class! -->
                                <picture>
                                    <source media="(prefers-color-scheme: dark)" height="48" srcset="<?= e($logo["dark"]) ?>">
                                    <source media="(prefers-color-scheme: light)" height="48" srcset="<?= e($logo["light"]) ?>">
                                    <img loading="lazy" src="<?= e(pngFallback($logo["light"])) ?>">
                                </picture>
                            <?php else: ?>
                                <picture>
                                    <source width="48px" srcset="<?= e($logo["src"]) ?>">
                                    <img loading="lazy" src="<?= e(pngFallback($logo["src"])) ?>">
                                </picture>
                            <?php endif; ?>
                            <section class="cardContent">
                                <header><?= e($p["name"]) ?></header>
                                <content>
                                    <aside class="meta"><?= t(e(implode(" · ", $p["meta"])), $projectsMetaLoc) ?></aside>
                                    <?= e($p["description"]) ?><br>
                                    <?php $n = 0; foreach ($p["links"] as $key => $url): ?><?= $n++ ? " · " : "" ?><a href="<?= e($url) ?>"><?= e($p["linkLoc"][$key] ?? $key) ?></a><?php endforeach; ?>
                                    <?php if (!empty($p["techStack"])): ?><?= $n ? " · " : "" ?>
                                    <input type="checkbox" class="dlg" id="<?= $techId ?>">
                                    <label for="<?= $techId ?>"><?= $l["tech_stack"] ?></label>
                                        <div class="dlg_wrap">
                                            <label class="dlg_closer" for="<?= $techId ?>"></label>
                                            <div class="dlg_content">
                                                <ul>
                                                    <?php foreach ($p["techStack"] as $tech): ?>
                                                        <li><?= $tech ?></li>
                                                    <?php endforeach; ?>
                                                </ul>
                                            </div>
                                        </div>
                                    <?php endif; ?>
                                </content>
                            </section>
                        </div>
                    <?php endforeach; ?>
                </div>
            </content>

            <content id="contactsTab">
                <h1><?= $l["contacts"] ?></h1>
                <p><?= $l["contacts_desc"] ?></p>
                <div class="adaptiveGrid">
                    <?php foreach ($contacts as $c): ?>
                        <a href="<?= e($c["link"]) ?>" class="card"<?= !empty($c["color"]) ? ' style="--accent:' . e($c["color"]) . '"' : "" ?>>
                            <aside>
                                <svg>
                                    <use href="elorexpressive/res/icons.svg#<?= e($c["logo"]) ?>"></use>
                                </svg>
                            </aside>
                            <section class="cardContent">
                                <header><?= e($c["name"]) ?></header>
                                <content>
                                    <?= $c["description"] ?>
                                </content>
                            </section>
                        </a>
                    <?php endforeach; ?>
                </div>
            </content>

            <content id="moreTab">
                <div class="adaptiveGrid">
                    <div class="infoblock">
                        <header>
                            <?= $l["blog"] ?>
                        </header>
                        <ul>
                            <?php foreach ($posts as $post): $pubDate = strtotime($post["PublishDate"]); ?>
                                <li>
                                    <a href="<?= BLOG_URL . $post["RelativeUrl"] ?>">
                                        <?= $post["Title"] ?>
                                    </a>
                                    <content><?= $post["Summary"] ?></content>
                                </li>
                            <?php endforeach; ?>
                            <li><a href="<?= BLOG_URL; ?>"><?= $l["more_items"] ?> →</a></li>
                        </ul>
                    </div>

                    <div class="infoblock">
                        <header>
                            <?= $l["links"] ?>
                        </header>
                        <ul>
                            <li>
                                <a href="https://elor.top/res/docs/cv_en.pdf"><?= $l["my_cv"] ?></a>
                            </li>
                            <li>
                                <a href="https://github.com/Elorucov/Me"><?= $l["site_source"] ?></a>
                            </li>
                            <li>
                                <a href="https://elor.top/mustread"><?= $l["must_read_articles"] ?></a>
                                <content><?= $l["must_read_articles_desc"] ?></content>
                            </li>
                            <li>
                                <a href="https://github.com/nnttttyyppee/NT-Somic">NT Somic</a>
                                <content><?= $l["nt_somic_desc"] ?>: <a href="https://nnttttyyppee.cc/">NT Type</a>.</content>
                            </li>
                        </ul>
                    </div>

                    <div class="infoblock">
                        <header>
                            <?= $l["people_sites"] ?>
                        </header>
                        <ul>
                            <li>
                                <a href="https://sominemo.com">sominemo.com</a>
                                <content><i>Sergey Dilong (sominemo)</i> —  web and Flutter apps developer &amp; artist. Author of logos for Laney and WidgetShot.</content>
                            </li>
                            <li>
                                <a href="https://tonsky.me">tonsky.me</a>
                                <content><i>Nikita Prokopov (nikitonsky)</i> — software engineer. I'm taking notes on his posts about how <i>not</i> to develop software and make UI.</content>
                            </li>
                        </ul>
                    </div>
                </div>
                <branding>
                    <svg>
                        <use href="elorexpressive/res/icons.svg#brand"></use>
                    </svg>
                </branding>
            </content>
        </main>
        <form method="post" id="langSwitcher">
            <?php foreach (SUPPORTED_LANGS as $elang): ?>
                <input type="submit" name="lang" value="<?= $elang ?>" <?= $lang === $elang ? " class='current'" : "" ?>/>
            <?php endforeach; ?>
        </div>
    </body>
</html>

<?php ob_get_flush(); ?>
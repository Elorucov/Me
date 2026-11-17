<!-- Created by Elchin Orujov on 2026. No artifical cringelligence are used. -->

<?php

require_once 'elorexpressive/inc/i18n.php';

/** .png fallback for a .webp logo images */
function pngFallback(string $url): string
{
    return preg_replace('/\.webp$/', ".png", $url);
}

/** Parse template. Example: t("Hello, {text}!", ["text" => "world"]); */
function t(string $text, array $vars = []): string
{
    $repl = [];
    foreach ($vars as $k => $v) $repl['{' . $k . '}'] = $v;
    return strtr($text, $repl);
}

const BLOG_URL = "https://elor.top/blog/";
$currentUrl = 'https://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];

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

// ---------------------------------------------------------------------------
// Projects
//
// logo is one of:
//   ["light" => url, "dark" => url]  - two logos for light/dark themes
//   ["src" => url]                   - a single logo
//   ["icon" => "name"]               - icon from icons.svg
//
// links: "url" => "link text"
// techStack: list of HTML strings, optional
// ---------------------------------------------------------------------------

$logoBase = "elorexpressive/res/logos/";

$projects = [
    [
        "name" => "Laney",
        "color" => "#0070C0",
        "meta" => ["UWP", ".NET", "App", "2018-2025"],
        "logo" => [
            "light" => $logoBase . "laney1_light.webp",
            "dark" => $logoBase . "laney1_dark.webp",
        ],
        "description" => "A messenger for VK social network for Windows. Reached 10 000 users.",
        "links" => [
            "https://elor.top/laney" => "Download",
            "https://github.com/Elorucov/Laney-Legacy" => "Source code",
        ],
        "techStack" => [
            "<b>MVVM</b> pattern (partially);",
            '<a href="https://learn.microsoft.com/en-us/windows/apps/develop/win2d/" target="_blank">Win2D</a> and Windows Composition API for rendering chat background and some animations;',
            '<a href="https://learn.microsoft.com/en-us/windows/apps/develop/notifications/push-notifications/wns-overview" target="_blank">WNS</a> push notifications;',
            '<a href="https://www.newtonsoft.com/json" target="_blank">Newtonsoft.Json</a> for working with JSON (VK API, themes and emoji list);',
            '<a href="https://github.com/Shane32/QRCoder" target="_blank">QRCoder</a> for generating QR-code for auth.',
        ],
    ],
    [
        "name" => "Laney 2",
        "color" => "#BE75E0",
        "meta" => ["Desktop", ".NET", "App", "2022"],
        "logo" => ["src" => $logoBase . "laney2.webp"],
        "description" => "A cross-platform version of Laney for Windows, macOS and Linux.",
        "links" => [
            "https://github.com/Elorucov/Laney-Avalonia" => "Source code",
        ],
        "techStack" => [
            "<b>MVVM</b> pattern;",
            '<a href="https://avaloniaui.net" target="_blank">Avalonia</a> — a cross-platform UI framework;',
            '<a href="https://code.videolan.org/videolan/LibVLCSharp" target="_blank">LibVLCSharp</a> for audio;',
            '<a href="https://serilog.net/" target="_blank">Serilog</a> for logging;',
            '<a href="https://www.newtonsoft.com/json" target="_blank">System.Text.Json</a> — a build-in .NET API for working with JSON (VK API);',
            '<a href="https://github.com/oleg-st/ZstdSharp" target="_blank">ZstdSharp</a> for receiving response from API more efficient;',
            '<a href="https://github.com/Elorucov/VKUI.Avalonia" target="_blank">VKUI.Avalonia</a> — a self-written library of UI components to make the app UI similar to the official app.',
        ],
    ],
    [
        "name" => "WidgetShot",
        "color" => "#34E45F",
        "meta" => ["UWP", ".NET", "App", "2025"],
        "logo" => ["src" => $logoBase . "widgetshot.webp"],
        "description" => "A tool for checking Windows 11 widgets and taking screenshots of them.",
        "links" => [
            "https://apps.microsoft.com/detail/9nr39qhpqr8w" => "Download from Store",
            "https://github.com/Elorucov/WidgetShot" => "Source code",
        ],
    ],
    [
        "name" => "PurpleBlog",
        "color" => "#800080",
        "meta" => ["Desktop", ".NET", "Tool", "2026"],
        "logo" => ["src" => $logoBase . "purpleblog.webp"],
        "description" => "A CLI tool for converting Markdown files to HTML pages with template.",
        "links" => [
            "https://github.com/Elorucov/PurpleBlog" => "Source code",
        ],
    ],
    [
        "name" => "PasteViaKeySimulation",
        "color" => "#4C939E",
        "meta" => ["Windows", ".NET", "Tool", "2026"],
        "logo" => ["icon" => "console48"],
        "description" => "A utility for pasting text from the clipboard by simulating physical key presses.",
        "links" => [
            "https://github.com/Elorucov/PasteViaKeySimulation/releases" => "Download from GitHub",
            "https://github.com/Elorucov/PasteViaKeySimulation" => "Source code",
        ],
    ],
    [
        "name" => "VKUI Tokens to Avalonia XAML",
        "color" => "#0077ff",
        "meta" => ["Desktop", ".NET", "Tool", "2026"],
        "logo" => ["icon" => "console48"],
        "description" => "A CLI tool that converts colors, sizes and font metrics from vkui-tokens into Avalonia's XAML resource.",
        "links" => [
            "https://github.com/Elorucov/VKUI-Tokens-To-Avalonia-XAML" => "Source code",
        ],
    ],
    [
        "name" => "Emoji list creator",
        "color" => "#00cc55",
        "meta" => ["Desktop", ".NET", "Tool", "2022"],
        "logo" => ["icon" => "console48"],
        "description" => "A CLI tool for generating emoji list.",
        "links" => [
            "https://github.com/Elorucov/EmojiListCreatorTool" => "Source code",
        ],
    ],
    [
        "name" => "MatrixBugtracker",
        "color" => "#049735",
        "meta" => ["Web", ".NET", "API", "2025"],
        "logo" => ["icon" => "globe48"],
        "description" => "An API service created for demonstration and educational purposes.",
        "links" => [
            "https://github.com/Elorucov/MatrixBugtracker" => "Source code",
        ],
        "techStack" => [
            "<b>N-Layer</b> architecture &amp; <b>S.O.L.I.D.</b> principles;",
            "<b>Repository &amp; Unit-of-Work</b> pattern;",
            '<a href="https://automapper.io/" target="_blank">Automapper</a>;',
            '<a href="https://fluentvalidation.net/" target="_blank">FluentValidation</a>;',
            '<a href="https://serilog.net/" target="_blank">Serilog</a> for logging;',
        ],
    ],
    [
        "name" => "“LWUI”",
        "color" => "#447BBA",
        "meta" => ["Web", ".NET", "Site", "2025"],
        "logo" => ["icon" => "globe48"],
        "description" => "A web project that demonstrates useful features for SSR-based web sites.",
        "links" => [
            "https://elor.top/demos/lwui" => "Demo",
            "https://github.com/Elorucov/ASPNET-LightweightWebUIBoilerplate" => "Source code",
        ],
    ],
    [
        "name" => "PrefsLite",
        "color" => "#7f7f7f",
        "meta" => ["Library", ".NET", "2023"],
        "logo" => ["icon" => "library48"],
        "description" => "Yet another lightweight library for saving preferences and settings into a file.",
        "links" => [
            "https://www.nuget.org/packages/ELOR.PrefsLite/" => "Nuget",
            "https://github.com/Elorucov/PrefsLite" => "Source code",
        ],
    ],
    [
        "name" => "VKUI.Avalonia",
        "color" => "#0077ff",
        "meta" => ["Library", ".NET", "Avalonia", "2022"],
        "logo" => ["icon" => "library48"],
        "description" => "VKUI design implementation for Avalonia.",
        "links" => [
            "https://github.com/Elorucov/VKUI.Avalonia" => "Source code",
        ],
    ],
];

// ---------------------------------------------------------------------------
// Contacts
// ---------------------------------------------------------------------------
$contacts = [
    [
        "name" => "Telegram",
        "link" => "https://telegram.me/elorucov",
        "color" => "#179CDE",
        "logo" => "telegram",
        "description" => "The main way to contact me",
    ],
    [
        "name" => "Github",
        "link" => "https://github.com/Elorucov",
        "logo" => "github",
        "description" => "Explore source code of my projects",
    ],
    [
        "name" => "LinkedIn",
        "link" => "https://linkedin.com/in/Elorucov",
        "color" => "#0A66C2",
        "logo" => "linkedin",
        "description" => "For employers and HR",
    ],
    [
        "name" => "VKontakte",
        "link" => "https://vk.com/elorucov",
        "color" => "#0077FF",
        "logo" => "vk",
        "description" => "For Russian speakers",
    ],
    [
        "name" => "Instagram",
        "link" => "https://instagram.com/elorucov",
        "color" => "#ff5c00",
        "logo" => "instagram",
        "description" => "<i>Nothing interesting there. Yet.</i>",
    ],
    [
        "name" => "E-mail",
        "link" => "mailto:elorucov@live.ru",
        "logo" => "mail",
        "description" => "<code>elorucov@live.ru</code>",
    ],
];

$contactsMore = [
    [
        "name" => "Discord",
        "link" => "https://discordapp.com/users/565614369334099976",
        "color" => "#5865F2",
        "logo" => "discord",
        "description" => "",
    ],
    [
        "name" => "Twitter",
        "link" => "https://twitter.com/elorucov_az",
        "color" => "#1d9bf0",
        "logo" => "twitter",
        "description" => "Yes, Twitter, not 𝕏",
    ],
    [
        "name" => "Mastodon",
        "link" => "https://dotnet.social/@elor",
        "color" => "#5B49DE",
        "logo" => "mastodon",
        "description" => "International: elor@dotnet.social",
    ],
    [
        "name" => "Smithereen",
        "link" => "https://friends.grishka.me/oru",
        "color" => "#4C6E00",
        "logo" => "smithereen",
        "description" => "Russian: oru@friends.grishka.me",
    ],
];

/** Renders a list of contact cards */
function renderContacts(array $list): void
{
    foreach ($list as $c): ?>
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
    <?php endforeach;
}

// ---------------------------------------------------------------------------
// Blog posts
// ---------------------------------------------------------------------------

$postsContent = file_get_contents("blog/posts.json");
$posts = json_decode($postsContent, true);
$posts = array_reverse($posts);

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
    <body>
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
                <p><?= t($l["about_start"], ["age" => $age, "p_age" => pluralForm($age, $l["p_age"])]) ?><br><?= $l["personal_languages"] ?></p>

                <h2>👨🏻‍💻 <?= $l["knowledge_title"] ?></h2>

                <div class="adaptiveGrid">
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
                                    <a class="chip" target="_blank" href="https://dot.net">.NET</a>
                                    <a class="chip" target="_blank" href="https://learn.microsoft.com/en-us/windows/uwp/get-started/">UWP</a>
                                    <a class="chip" target="_blank" href="https://learn.microsoft.com/en-us/windows/apps/windows-app-sdk/">WinUI 3</a>
                                    <a class="chip" target="_blank" href="https://learn.microsoft.com/en-us/dotnet/desktop/wpf/overview/">WPF</a>
                                    <a class="chip less" target="_blank" href="https://learn.microsoft.com/en-us/dotnet/desktop/winforms/overview/">WinForms</a>
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
                                    <a class="chip" target="_blank" href="https://dot.net">.NET</a>
                                    <a class="chip" target="_blank" href="https://avaloniaui.net">Avalonia</a>
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
                                    <a class="chip" target="_blank" href="https://dot.net">.NET</a>
                                    <a class="chip" target="_blank" href="https://learn.microsoft.com/en-us/powershell/">PowerShell</a>
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
                                    <a class="chip" target="_blank" href="https://dotnet.microsoft.com/en-us/apps/aspnet">ASP.NET Core</a>
                                    <a class="chip" target="_blank" href="https://php.net">PHP</a>
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
                            <li><?= $l["skills_server"] ?>: <b><a href="https://nginx.org" target="_blank">nginx</a>, <a href="https://caddyserver.com" target="_blank">Caddy</a></b></li>
                            <li><?= $l["skills_web_light"] ?>: <b>PHP</b></li>
                            <li><?= $l["skills_on_else"] ?>: <b>ASP.NET 8+ (API, MVC, Razor pages)</b></li>
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
                <h1>💼 <?= $l["portfolio"] ?></h1>
                <p><?= $l["portfolio_desc_1"] ?><a href="https://github.com/Elorucov" target="_blank"><?= $l["portfolio_desc_2"] ?></a><?= $l["portfolio_desc_3"] ?></p>
                <div class="adaptiveGrid">
                    <?php foreach ($projects as $i => $p): $logo = $p["logo"]; $techId = "tech_" . $i; ?>
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
                                    <aside class="meta"><?= e(implode(" · ", $p["meta"])) ?></aside>
                                    <?= e($p["description"]) ?><br>
                                    <?php $n = 0; foreach ($p["links"] as $url => $text): ?><?= $n++ ? " · " : "" ?><a target="_blank" href="<?= e($url) ?>"><?= e($text) ?></a><?php endforeach; ?>
                                    <?php if (!empty($p["techStack"])): ?><?= $n ? " · " : "" ?>
                                    <input type="checkbox" class="dlg" id="<?= $techId ?>">
                                    <label for="<?= $techId ?>">Tech stack</label>
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
                <h1>🖊️ <?= $l["contacts"] ?></h1>
                <p>Here's where you can find me:</p>
                <div class="adaptiveGrid">
                    <?php renderContacts($contacts); ?>
                </div>

                <h2>📝 Also...</h2>
                <div class="adaptiveGrid">
                    <?php renderContacts($contactsMore); ?>
                </div>
            </content>

            <content id="moreTab">
                <div class="adaptiveGrid">
                    <section>
                        <header>
                            <h2>📝 Blog</h2>
                        </header>
                        <content>
                            <ul>
                                <?php foreach ($posts as $post): $pubDate = strtotime($post["PublishDate"]); ?>
                                    <li>
                                        <a target="_blank" href="<?= BLOG_URL . $post["RelativeUrl"] ?>">
                                            <?= $post["Title"] ?>
                                        </a>
                                        <pubdate><?= date("F j Y", $pubDate) ?></pubdate>
                                        <summary><?= $post["Summary"] ?></summary>
                                    </li>
                                <?php endforeach; ?>
                                <li><a target="_blank" href="<?= BLOG_URL; ?>">More →</a></li>
                            </ul>
                        </content>
                    </section>

                    <section>
                        <header>
                            <h2>🔗 Links</h2>
                        </header>
                        <content>
                            <ul>
                                <li>
                                    <a href="https://elor.top/res/docs/cv_en.pdf">My CV.</a>
                                </li>
                                <li>
                                    <a target="_blank" href="https://elor.top/mustread">Must read articles</a>
                                    <summary>Links to articles that I consider essential reading for software engineers, UI/UX designers, and other IT professionals</summary>
                                </li>
                                <li>
                                    <a target="_blank" href="https://github.com/nnttttyyppee/NT-Somic">NT Somic font</a>
                                    <summary>A font that used in this page and in logos in some my projects. Author: <a target="_blank" href="https://nnttttyyppee.cc/">NT Type</a>.</summary>
                                </li>
                            </ul>
                        </content>
                    </section>

                    <section>
                        <header>
                            <h2>🤝 People</h2>
                        </header>
                        <content>
                            <ul>
                                <li>
                                    <a target="_blank" href="https://sominemo.com">sominemo.com</a>
                                    <summary>Sergey Dilong (sominemo) — web and Flutter apps developer &amp; artist. Author of logos for Laney and WidgetShot.</summary>
                                </li>
                                <li>
                                    <a target="_blank" href="https://tonsky.me">tonsky.me</a>
                                    <summary>Nikita Prokopov (nikitonsky) — software engineer. I'm taking notes on his posts about how <i>not</i> to develop software and make UI.</summary>
                                </li>
                            </ul>
                        </content>
                    </section>
                </div>
                <branding>
                    <svg>
                        <use href="elorexpressive/res/icons.svg#brand"></use>
                    </svg>
                </branding>
            </content>
        </main>
    </body>
</html>

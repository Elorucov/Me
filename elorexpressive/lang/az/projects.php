<?php

// Специально не перевёл techStack и описания некоторых проектов на азерб., иначе можно задолбаться.

return [
    "laney" => [
        "description" => "Windows 10 və 11 (XBOX daxili) üçün VK sosial şəbəkəsinin messenceri. 10000+ dəfə yüklənilib.",
        "linkLoc" => [
            "download" => "Yüklə",
            "source" => "Mənbə kodu"
        ],
        "techStack" => [
            "<b>MVVM</b> pattern (partially);",
            '<a href="https://learn.microsoft.com/en-us/windows/apps/develop/win2d/" target="_blank">Win2D</a> and Windows Composition API for rendering chat background and some animations;',
            '<a href="https://learn.microsoft.com/en-us/windows/apps/develop/notifications/push-notifications/wns-overview" target="_blank">WNS</a> push notifications;',
            '<a href="https://www.newtonsoft.com/json" target="_blank">Newtonsoft.Json</a> for working with JSON (VK API, themes and emoji list);',
            '<a href="https://github.com/Shane32/QRCoder" target="_blank">QRCoder</a> for generating QR-code for auth.'
        ],
    ],
    "laney2" => [
        "description" => "Laney-nin Windows, macOS və Linux üçün kross-platforma versiyası.",
        "linkLoc" => [
            "source" => "Mənbə kodu"
        ],
        "techStack" => [
            "<b>MVVM</b> pattern;",
            '<a href="https://avaloniaui.net" target="_blank">Avalonia</a> — a cross-platform UI framework;',
            '<a href="https://code.videolan.org/videolan/LibVLCSharp" target="_blank">LibVLCSharp</a> for audio;',
            '<a href="https://serilog.net/" target="_blank">Serilog</a> for logging;',
            '<a href="https://www.newtonsoft.com/json" target="_blank">System.Text.Json</a> — a build-in .NET API for working with JSON (VK API);',
            '<a href="https://github.com/oleg-st/ZstdSharp" target="_blank">ZstdSharp</a> for receiving response from API more efficient;',
            '<a href="https://github.com/Elorucov/VKUI.Avalonia" target="_blank">VKUI.Avalonia</a> — a self-written library of UI components to make the app UI similar to the official app.'
        ]
    ],
    "widgetshot" => [
        "description" => "Windows 11 vidcetlərini yoxlamaq və onların skrinşotlarını çəkmək üçün alət.",
        "linkLoc" => [
            "download" => "MS Store-dən yüklə",
            "source" => "Mənbə kodu"
        ]
    ],
    "purpleblog" => [
        "description" => "Markdown fayllarını şablonlu HTML səhifələrinə çevirmək üçün CLI aləti.",
        "linkLoc" => [
            "source" => "Mənbə kodu"
        ]
    ],
    "pvks" => [
        "description" => "Fiziki düymə basmasını simulyasiya etməklə mübadilə buferindən mətn yapışdırmağa imkan verən vasitə.",
        "linkLoc" => [
            "download" => "GitHub-dan yüklə",
            "source" => "Mənbə kodu"
        ]
    ],
    "vkui_tokens_gen" => [
        "description" => "A CLI tool that converts colors, sizes and font metrics from vkui-tokens into Avalonia's XAML resource.",
        "linkLoc" => [
            "source" => "Mənbə kodu"
        ]
    ],
    "emoji_list_gen" => [
        "description" => "Emoji siyahısı yaratmaq üçün CLI aləti.",
        "linkLoc" => [
            "source" => "Mənbə kodu"
        ]
    ],
    "mrbt" => [
        "description" => "Nümayiş və təhsil məqsədləri üçün yaradılmış API xidməti.",
        "linkLoc" => [
            "source" => "Mənbə kodu"
        ],
        "techStack" => [
            "<b>N-Layer</b> architecture &amp; <b>S.O.L.I.D.</b> principles;",
            "<b>Repository &amp; Unit-of-Work</b> pattern;",
            '<a href="https://automapper.io/" target="_blank">Automapper</a>;',
            '<a href="https://fluentvalidation.net/" target="_blank">FluentValidation</a>;',
            '<a href="https://serilog.net/" target="_blank">Serilog</a> for logging;'
        ]
    ],
    "lwui" => [
        "description" => "SSR əsaslı veb-saytlar üçün faydalı xüsusiyyətləri nümayiş etdirən layihə.",
        "linkLoc" => [
            "download" => "Demo",
            "source" => "Mənbə kodu"
        ]
    ],
    "pl" => [
        "description" => "Yet another lightweight library for saving preferences and settings into a file.",
        "linkLoc" => [
            "download" => "Nuget",
            "source" => "Mənbə kodu"
        ]
    ],
    "vkui_avalonia" => [
        "description" => "VKUI design implementation for Avalonia.",
        "linkLoc" => [
            "source" => "Mənbə kodu"
        ]
    ]
];

?>
<?php

// ---------------------------------------------------------------------------
// logo is one of:
//   ["light" => url, "dark" => url]  - two logos for light/dark themes
//   ["src" => url]                   - a single logo
//   ["icon" => "name"]               - icon from icons.svg
//
// screenshot (used only if "featured" === true):
// ["light" => url, "dark" => url]  - two images for light/dark themes.
// ---------------------------------------------------------------------------

return [
    "laney" => [
        "featured" => true,
        "name" => "Laney",
        "color" => "#0070C0",
        "meta" => ["UWP", ".NET", "{app}", "2018-2026"],
        "logo" => [
            "light" => $logoBase . "laney1_light.webp",
            "dark" => $logoBase . "laney1_dark.webp",
        ],
        "screenshot" => [
            "light" => $shotBase . "l1_l.webp",
            "dark" => $shotBase . "l1_d.webp",
        ],
        "links" => [
            "download" => "https://elor.top/laney",
            "source" => "https://github.com/Elorucov/Laney-Legacy",
        ]
    ],
    "laney2" => [
        "featured" => true,
        "name" => "Laney 2",
        "color" => "#BE75E0",
        "meta" => ["{desktop}", ".NET", "{app}", "2022"],
        "logo" => ["src" => $logoBase . "laney2.webp"],
        "screenshot" => [
            "light" => $shotBase . "l2_l.webp",
            "dark" => $shotBase . "l2_d.webp",
        ],
        "links" => [
            "source" => "https://github.com/Elorucov/Laney-Avalonia",
        ]
    ],
    "widgetshot" => [
        "featured" => true,
        "name" => "Widget Shot",
        "color" => "#34E45F",
        "meta" => ["UWP", ".NET", "{app}", "2025"],
        "logo" => ["src" => $logoBase . "widgetshot.webp"],
        "screenshot" => [
            "light" => $shotBase . "ws_l.webp",
            "dark" => $shotBase . "ws_d.webp",
        ],
        "links" => [
            "download" => "https://apps.microsoft.com/detail/9nr39qhpqr8w",
            "source" => "https://github.com/Elorucov/WidgetShot",
        ]
    ],
    "purpleblog" => [
        "featured" => false,
        "name" => "PurpleBlog",
        "color" => "#800080",
        "meta" => ["{desktop}", ".NET", "{tool}", "2026"],
        "logo" => ["src" => $logoBase . "purpleblog.webp"],
        "links" => [
            "source" => "https://github.com/Elorucov/PurpleBlog",
        ],
    ],
    "pvks" => [
        "featured" => false,
        "name" => "PasteViaKeySimulation",
        "color" => "#4C939E",
        "meta" => ["Windows", ".NET", "{tool}", "2026"],
        "logo" => ["icon" => "console48"],
        "links" => [
            "download" => "https://github.com/Elorucov/PasteViaKeySimulation/releases",
            "source" => "https://github.com/Elorucov/PasteViaKeySimulation",
        ]
    ],
    "vkui_tokens_gen" => [
        "featured" => false,
        "name" => "VKUI Tokens to Avalonia XAML",
        "color" => "#0077ff",
        "meta" => ["{desktop}", ".NET", "{tool}", "2026"],
        "logo" => ["icon" => "console48"],
        "links" => [
            "source" => "https://github.com/Elorucov/VKUI-Tokens-To-Avalonia-XAML",
        ]
    ],
    "emoji_list_gen" => [
        "featured" => false,
        "name" => "Emoji list creator",
        "color" => "#00cc55",
        "meta" => ["{desktop}", ".NET", "{tool}", "2022"],
        "logo" => ["icon" => "console48"],
        "links" => [
            "source" => "https://github.com/Elorucov/EmojiListCreatorTool",
        ]
    ],
    "mrbt" => [
        "featured" => false,
        "name" => "MatrixBugtracker",
        "color" => "#049735",
        "meta" => ["Web", ".NET", "API", "2025"],
        "logo" => ["icon" => "globe48"],
        "links" => [
            "source" => "https://github.com/Elorucov/MatrixBugtracker",
        ]
    ],
    "lwui" => [
        "featured" => false,
        "name" => "“LWUI”",
        "color" => "#447BBA",
        "meta" => ["Web", ".NET", "{site}", "2025"],
        "logo" => ["icon" => "globe48"],
        "links" => [
            "download" => "https://elor.top/demos/lwui",
            "source" => "https://github.com/Elorucov/ASPNET-LightweightWebUIBoilerplate",
        ]
    ],
    "pl" => [
        "featured" => false,
        "name" => "PrefsLite",
        "color" => "#7f7f7f",
        "meta" => ["{lib}", ".NET", "2023"],
        "logo" => ["icon" => "library48"],
        "links" => [
            "download" => "https://www.nuget.org/packages/ELOR.PrefsLite/",
            "source" => "https://github.com/Elorucov/PrefsLite",
        ]
    ],
    "vkui_avalonia" => [
        "featured" => false,
        "name" => "VKUI.Avalonia",
        "color" => "#0077ff",
        "meta" => ["{lib}", ".NET", "Avalonia", "2022"],
        "logo" => ["icon" => "library48"],
        "links" => [
            "source" => "https://github.com/Elorucov/VKUI.Avalonia",
        ]
    ]
];

?>
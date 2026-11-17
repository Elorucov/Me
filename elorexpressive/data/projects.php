<?php

// ---------------------------------------------------------------------------
// logo is one of:
//   ["light" => url, "dark" => url]  - two logos for light/dark themes
//   ["src" => url]                   - a single logo
//   ["icon" => "name"]               - icon from icons.svg
// ---------------------------------------------------------------------------

return [
    "laney" => [
        "name" => "Laney",
        "color" => "#0070C0",
        "meta" => ["UWP", ".NET", "App", "2018-2025"],
        "logo" => [
            "light" => $logoBase . "laney1_light.webp",
            "dark" => $logoBase . "laney1_dark.webp",
        ],
        "links" => [
            "download" => "https://elor.top/laney",
            "source" => "https://github.com/Elorucov/Laney-Legacy",
        ]
    ],
    "laney2" => [
        "name" => "Laney 2",
        "color" => "#BE75E0",
        "meta" => ["Desktop", ".NET", "App", "2022"],
        "logo" => ["src" => $logoBase . "laney2.webp"],
        "links" => [
            "source" => "https://github.com/Elorucov/Laney-Avalonia",
        ]
    ],
    "widgetshot" => [
        "name" => "WidgetShot",
        "color" => "#34E45F",
        "meta" => ["UWP", ".NET", "App", "2025"],
        "logo" => ["src" => $logoBase . "widgetshot.webp"],
        "links" => [
            "download" => "https://apps.microsoft.com/detail/9nr39qhpqr8w",
            "source" => "https://github.com/Elorucov/WidgetShot",
        ]
    ],
    "purpleblog" => [
        "name" => "PurpleBlog",
        "color" => "#800080",
        "meta" => ["Desktop", ".NET", "Tool", "2026"],
        "logo" => ["src" => $logoBase . "purpleblog.webp"],
        "links" => [
            "source" => "https://github.com/Elorucov/PurpleBlog",
        ],
    ],
    "pvks" => [
        "name" => "PasteViaKeySimulation",
        "color" => "#4C939E",
        "meta" => ["Windows", ".NET", "Tool", "2026"],
        "logo" => ["icon" => "console48"],
        "links" => [
            "download" => "https://github.com/Elorucov/PasteViaKeySimulation/releases",
            "source" => "https://github.com/Elorucov/PasteViaKeySimulation",
        ]
    ],
    "vkui_tokens_gen" => [
        "name" => "VKUI Tokens to Avalonia XAML",
        "color" => "#0077ff",
        "meta" => ["Desktop", ".NET", "Tool", "2026"],
        "logo" => ["icon" => "console48"],
        "links" => [
            "source" => "https://github.com/Elorucov/VKUI-Tokens-To-Avalonia-XAML",
        ]
    ],
    "emoji_list_gen" => [
        "name" => "Emoji list creator",
        "color" => "#00cc55",
        "meta" => ["Desktop", ".NET", "Tool", "2022"],
        "logo" => ["icon" => "console48"],
        "links" => [
            "source" => "https://github.com/Elorucov/EmojiListCreatorTool",
        ]
    ],
    "mrbt" => [
        "name" => "MatrixBugtracker",
        "color" => "#049735",
        "meta" => ["Web", ".NET", "API", "2025"],
        "logo" => ["icon" => "globe48"],
        "links" => [
            "source" => "https://github.com/Elorucov/MatrixBugtracker",
        ]
    ],
    "lwui" => [
        "name" => "“LWUI”",
        "color" => "#447BBA",
        "meta" => ["Web", ".NET", "Site", "2025"],
        "logo" => ["icon" => "globe48"],
        "links" => [
            "download" => "https://elor.top/demos/lwui",
            "source" => "https://github.com/Elorucov/ASPNET-LightweightWebUIBoilerplate",
        ]
    ],
    "pl" => [
        "name" => "PrefsLite",
        "color" => "#7f7f7f",
        "meta" => ["Library", ".NET", "2023"],
        "logo" => ["icon" => "library48"],
        "links" => [
            "download" => "https://www.nuget.org/packages/ELOR.PrefsLite/",
            "source" => "https://github.com/Elorucov/PrefsLite",
        ]
    ],
    "vkui_avalonia" => [
        "name" => "VKUI.Avalonia",
        "color" => "#0077ff",
        "meta" => ["Library", ".NET", "Avalonia", "2022"],
        "logo" => ["icon" => "library48"],
        "links" => [
            "source" => "https://github.com/Elorucov/VKUI.Avalonia",
        ]
    ]
];

?>
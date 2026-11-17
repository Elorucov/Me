<?php

return [
    "laney" => [
        "description" => "A messenger for VK social network for Windows. Reached 10 000 users.",
        "linkLoc" => [
            "download" => "Download",
            "source" => "Source code"
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
        "description" => "A cross-platform version of Laney for Windows, macOS and Linux.",
        "linkLoc" => [
            "source" => "Source code"
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
        "description" => "A tool for developing and checking Windows 11 widgets and taking screenshots of them.",
        "linkLoc" => [
            "download" => "Download from Store",
            "source" => "Source code"
        ]
    ],
    "purpleblog" => [
        "description" => "A CLI tool for converting Markdown files to HTML pages with template.",
        "linkLoc" => [
            "source" => "Source code"
        ]
    ],
    "pvks" => [
        "description" => "A utility for pasting text from the clipboard by simulating physical key presses.",
        "linkLoc" => [
            "download" => "Download from GitHub",
            "source" => "Source code"
        ]
    ],
    "vkui_tokens_gen" => [
        "description" => "A CLI tool that converts colors, sizes and font metrics from vkui-tokens into Avalonia's XAML resource.",
        "linkLoc" => [
            "source" => "Source code"
        ]
    ],
    "emoji_list_gen" => [
        "description" => "A CLI tool for generating emoji list.",
        "linkLoc" => [
            "source" => "Source code"
        ]
    ],
    "mrbt" => [
        "description" => "An API service created for demonstration and educational purposes.",
        "linkLoc" => [
            "source" => "Source code"
        ],
        "techStack" => [
            "<b>N-Layer</b> architecture &amp; <b>S.O.L.I.D.</b> principles;",
            "<b>Repository &amp; Unit-of-Work</b> pattern;",
            '<a href="https://automapper.io/" target="_blank">Automapper</a>;',
            '<a href="https://fluentvalidation.net/" target="_blank">FluentValidation</a>;',
            '<a href="https://serilog.net/" target="_blank">Serilog</a> for logging.'
        ]
    ],
    "lwui" => [
        "description" => "A web project that demonstrates useful features for SSR-based web sites.",
        "linkLoc" => [
            "download" => "Demo",
            "source" => "Source code"
        ]
    ],
    "pl" => [
        "description" => "Yet another lightweight library for saving preferences and settings into a file.",
        "linkLoc" => [
            "download" => "Nuget",
            "source" => "Source code"
        ]
    ],
    "vkui_avalonia" => [
        "description" => "VKUI design implementation for Avalonia.",
        "linkLoc" => [
            "source" => "Source code"
        ]
    ]
];

?>
<?php

return [
    "laney" => [
        "description" => "Мессенджер социальной сети ВКонтакте для Windows 10 и 11 (XBOX и моб. устройства).<br>Более 10000 скачиваний.",
        "linkLoc" => [
            "download" => "Скачать",
            "source" => "Исходники"
        ],
        "techStack" => [
            "Паттерн <b>MVVM</b> (частично);",
            '<a href="https://learn.microsoft.com/en-us/windows/apps/develop/win2d/" target="_blank">Win2D</a> и Windows Composition API для рендеринга фона в чате и некоторых анимаций;',
            'Пуш-уведомления <a href="https://learn.microsoft.com/en-us/windows/apps/develop/notifications/push-notifications/wns-overview" target="_blank">WNS</a>;',
            '<a href="https://www.newtonsoft.com/json" target="_blank">Newtonsoft.Json</a> для работы с JSON (VK API, список тем и эмодзи);',
            '<a href="https://github.com/Shane32/QRCoder" target="_blank">QRCoder</a> для генерации QR-кодов авторизации.'
        ],
    ],
    "laney2" => [
        "description" => "Кросс-платформенная версия Laney для ПК.<br>Windows, macOS и Linux.",
        "linkLoc" => [
            "source" => "Исходники"
        ],
        "techStack" => [
            "Паттерн <b>MVVM</b>;",
            '<a href="https://avaloniaui.net" target="_blank">Avalonia</a> — кросс-платформенный UI-фреймворк;',
            '<a href="https://code.videolan.org/videolan/LibVLCSharp" target="_blank">LibVLCSharp</a> для аудио;',
            '<a href="https://serilog.net/" target="_blank">Serilog</a> для логирования;',
            '<a href="https://www.newtonsoft.com/json" target="_blank">System.Text.Json</a> — встроенный в .NET API для работы с JSON (VK API);',
            '<a href="https://github.com/oleg-st/ZstdSharp" target="_blank">ZstdSharp</a> для более эффективного получения ответов из API;',
            '<a href="https://github.com/Elorucov/VKUI.Avalonia" target="_blank">VKUI.Avalonia</a> — самописная библиотека UI-компонентов, позволяющая сделать интерфейс приложения похожим на официальное приложение.'
        ]
    ],
    "widgetshot" => [
        "description" => "Инструмент для разработки и проверки виджетов Windows 11 и создания их скриншотов.",
        "linkLoc" => [
            "download" => "Скачать из MS Store",
            "source" => "Исходники"
        ]
    ],
    "purpleblog" => [
        "description" => "Инструмент командной строки для преобразования Markdown-файлов в HTML-страницы с шаблоном.",
        "linkLoc" => [
            "source" => "Исходники"
        ]
    ],
    "pvks" => [
        "description" => "Утилита для вставки текста из буфера обмена путём имитации физических нажатий клавиш.",
        "linkLoc" => [
            "download" => "Скачать из GitHub",
            "source" => "Исходники"
        ]
    ],
    "vkui_tokens_gen" => [
        "description" => "Инструмент, который преобразует цвета, размеры и метрики шрифтов из vkui-tokens в XAML-ресурсы Avalonia.",
        "linkLoc" => [
            "source" => "Исходники"
        ]
    ],
    "emoji_list_gen" => [
        "description" => "Инструмент командной строки для генерации списка эмодзи.",
        "linkLoc" => [
            "source" => "Исходники"
        ]
    ],
    "mrbt" => [
        "description" => "API-сервис, созданный в демонстрационных и образовательных целях.",
        "linkLoc" => [
            "source" => "Исходники"
        ],
        "techStack" => [
            "Архитектура <b>N-Layer</b> &amp; принципы <b>S.O.L.I.D.</b>;",
            "Паттерны <b>Repository &amp; Unit-of-Work</b>;",
            '<a href="https://automapper.io/" target="_blank">Automapper</a>;',
            '<a href="https://fluentvalidation.net/" target="_blank">FluentValidation</a>;',
            '<a href="https://serilog.net/" target="_blank">Serilog</a> для логирования.'
        ]
    ],
    "lwui" => [
        "description" => "Проект, демонстрирующий полезные фичи для веб-сайтов с серверным рендерингом (SSR).",
        "linkLoc" => [
            "download" => "Демо",
            "source" => "Исходники"
        ]
    ],
    "pl" => [
        "description" => "Очередная легковесная библиотека для сохранения настроек в файл.",
        "linkLoc" => [
            "download" => "Nuget",
            "source" => "Исходники"
        ]
    ],
    "vkui_avalonia" => [
        "description" => "Реализация дизайн-системы VKUI для Avalonia.",
        "linkLoc" => [
            "source" => "Исходники"
        ]
    ]
];

?>
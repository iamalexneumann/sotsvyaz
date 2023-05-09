<?php

$settings = [
    'title' => 'Основной макет',
    'layout_enabled' => [
        'layout_none',
    ],
    'wide_mode' => true,
    'block_settings' => [
        'htag' => [
            'taglist' => [
                'type' => 'hidden',
                'value' => [
                    'h1' => 'h1',
                    'h2' => 'h2',
                    'h3' => 'h3',
                    'h4' => 'h4',
                    'h5' => 'h5',
                    'h6' => 'h6',
                ],
            ],

        ],
        'image' => array(
            'align' => array(
                'type' => 'select',
                'value' => array(
                    'left' => 'Картинка слева',
                    'center' => 'Картинка по центру',
                    'right' => 'Картинка справа',
                    'wide' => 'Картинка на всю ширину',
                )
            ),
            'fancybox' => array(
                'type' => 'select',
                'value' => array(
                    'N' => 'Не увеличивать при клике',
                    'Y' => 'Увеличивать при клике',
                )
            ),
        ),
        'complex_image_text' => array(
            'align' => array(
                'type' => 'select',
                'value' => array(
                    'left' => 'Картинка слева',
                    'center' => 'Картинка по центру',
                    'right' => 'Картинка справа',
                    'wide' => 'Картинка на всю ширину',
                )
            ),
            'fancybox' => array(
                'type' => 'select',
                'value' => array(
                    'N' => 'Не увеличивать при клике',
                    'Y' => 'Увеличивать при клике',
                )
            ),
        ),
    ],
    'snippets' => [
        [
            'file' => 'privacy_policy.php',
            'title' => 'Политика конфиденциальности',
            'description' => 'Текст с переменными политики конфиденциальности. Исправлять ничего не нужно.',
        ],
    ],
];
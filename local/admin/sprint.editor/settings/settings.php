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
                    'h2' => 'h2',
                    'h3' => 'h3',
                    'h4' => 'h4',
                    'h5' => 'h5',
                    'h6' => 'h6',
                ],
            ],
        ],
        'iblock_elements' => array(
            'template' => array(
                'type' => 'select',
                'value' => array(
                    'default' => 'По умолчанию',
                    'product' => 'Товар',
                )
            ),
            'enabled_iblocks' => [
                'type'  => 'hidden',
                'value' => [4, 5],
            ],
        ),
        'text' => [
            'view' => [
                'type'  => 'select',
                'value' => [
                    'default' => 'Обычный',
                    'alert-secondary' => 'Алерт серый',
                    'alert-primary' => 'Алерт синий',
                    'alert-success' => 'Алерт зеленый',
                    'alert-danger' => 'Алерт красный',
                    'alert-warning' => 'Алерт желтый',
                ],
            ],
        ],
        'gallery' => array(
            'type' => array(
                'type' => 'select',
                'value' => array(
                    'tiles' => 'Плитка',
                    'carousel' => 'Слайдер',
                )
            ),
            'carousel' => array(
                'type' => 'select',
                'value' => array(
                    'default' => 'Слайдер на всю ширину',
                    'center' => 'Слайдер 800px по центру'
                )
            ),
            'tiles_row' => array(
                'type' => 'select',
                'value' => array(
                    'two' => '2 плитки в ряд',
                    'three' => '3 плитки в ряд',
                    'four' => '4 плитки в ряд',
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
        'image' => array(
            'align' => array(
                'type' => 'select',
                'value' => array(
                    'default' => 'Картинка слева (без обтекания)',
                    'left' => 'Картинка слева',
                    'center' => 'Картинка 800px по центру',
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
                    'default' => 'Картинка слева (без обтекания)',
                    'left' => 'Картинка слева',
                    'center' => 'Картинка 800px по центру',
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
        [
            'file' => 'inner_form.php',
            'title' => 'Внутренняя форма',
            'description' => 'Форма обратной связи на детальных страницах.',
        ],
    ],
];
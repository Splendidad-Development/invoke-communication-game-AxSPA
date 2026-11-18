<?php

/*
|--------------------------------------------------------------------------
| Communication Game – Symphony Board
|--------------------------------------------------------------------------
|
| Content for the axSpA communication game. Each section is a labelled area
| on the board with a number of boxes ("slots") and the image numbers that
| are correct for it. Images live in public/images/game/{number}.jpg.
|
| The board's slot order (columns → rows → sections → slots) is also the
| order in which the symphony is played back, one note per slot.
|
*/

$diseaseControlImages = [7, 8, 9, 10, 11, 12];

return [

    'image_count' => 25,

    'images_path' => '/images/game',

    /*
    | persona: shown on the question card and the board.
    | caption: shown under the group's card on the group picker; bold parts are highlighted.
    */
    'groups' => [
        1 => [
            'persona' => 'Traditionalist: cycles TNFis, hesitant to use JAKis due to safety concerns (1st call)',
            'caption' => [
                ['text' => 'Traditionalist: '],
                ['text' => 'Cycles TNFis', 'bold' => true],
                ['text' => ', hesitant to use JAKis due to '],
                ['text' => 'safety concerns', 'bold' => true],
                ['text' => ' (1st call)'],
            ],
            'question' => 'How would you address this HCP’s challenge in your call? Describe your approach.',
        ],
        2 => [
            'persona' => 'Customizer: switch from 1L TNFis to IL-17is in 2L, reserves JAKis for 3L+ (2nd+ call)',
            'caption' => [
                ['text' => 'Customizer: '],
                ['text' => 'Switch from 1L TNFis to IL-17is in 2L', 'bold' => true],
                ['text' => ', reserves JAKis for 3L+ (2nd+ call)'],
            ],
            'question' => 'Which evidence would you lead with for this HCP, and why?',
        ],
        3 => [
            'persona' => 'Pioneer: prefers IL-17i over JAKis as 1L due to long-term safety (1st call)',
            'caption' => [
                ['text' => 'Pioneer: '],
                ['text' => 'Prefers IL-17i over JAKis', 'bold' => true],
                ['text' => ' as 1L due to long-term safety (1st call)'],
            ],
            'question' => 'How would you open a short call with this HCP? Write your key message.',
        ],
    ],

    'sections' => [
        'unmet' => ['title' => 'Unmet need', 'tone' => 'unmet', 'slots' => 1, 'answers' => [1]],
        'emms' => ['title' => 'EMMs in axSpA', 'tone' => 'add', 'slots' => 1, 'answers' => [4]],
        'ibd' => ['title' => 'Screening for IBD in axSpA', 'tone' => 'add', 'slots' => 1, 'answers' => [3]],
        'rtb' => ['title' => 'Reason to Believe', 'tone' => 'rtb', 'slots' => 1, 'answers' => [2]],
        'ctrl' => ['title' => 'Control that’s fast and shown to last', 'tone' => 'ctrl', 'slots' => 2, 'answers' => [5, 6]],
        'dc1' => ['title' => 'Disease control (RCT)', 'tone' => 'rct', 'slots' => 3, 'answers' => $diseaseControlImages],
        'dc2' => ['title' => 'Disease control (RCT)', 'tone' => 'rct', 'slots' => 3, 'answers' => $diseaseControlImages],
        'crohn' => ['title' => 'Crohn’s disease', 'tone' => 'rct', 'slots' => 1, 'answers' => [13]],
        'uc' => ['title' => 'Ulcerative colitis', 'tone' => 'rct', 'slots' => 1, 'answers' => [14]],
        'nma' => ['title' => 'NMA', 'tone' => 'add', 'slots' => 1, 'answers' => [15]],
        'pain' => ['title' => 'Improvement in pain (RCT)', 'tone' => 'rct', 'slots' => 1, 'answers' => [16]],
        'adelphi' => ['title' => 'RWE – Adelphi Switch', 'tone' => 'rwe', 'slots' => 1, 'answers' => [17]],
        'upstand' => ['title' => 'RWE – UPSTAND', 'tone' => 'rwe', 'slots' => 1, 'answers' => [18]],
        'inflam' => ['title' => 'Improvement in inflammation (RCT)', 'tone' => 'rct', 'slots' => 2, 'answers' => [19, 20]],
        'func' => ['title' => 'Improvement in function (RCT)', 'tone' => 'rct', 'slots' => 2, 'answers' => [21, 22]],
        'safety' => ['title' => 'Consistent safety profile', 'tone' => 'rct', 'slots' => 1, 'answers' => [23]],
        'multi' => ['title' => 'Multiple indications', 'tone' => 'rct', 'slots' => 1, 'answers' => [24]],
        'teae' => ['title' => 'TEAEs of EMMs', 'tone' => 'add', 'slots' => 1, 'answers' => [25]],
    ],

    'columns' => [
        [
            'key' => 'c1',
            'tone' => 'unmet',
            'title' => 'Unmet need',
            'description' => 'axSpA is a multifaceted disease primarily characterised by chronic, inflammatory back pain, which may be accompanied by EMMs',
            'rows' => [['unmet'], ['emms'], ['ibd']],
        ],
        [
            'key' => 'c2',
            'tone' => 'how',
            'title' => 'How RINVOQ works',
            'description' => null,
            'rows' => [['rtb']],
        ],
        [
            'key' => 'c3',
            'tone' => 'simpl',
            'title' => 'SIMPL3',
            'description' => '1. Rapid and durable disease control across the axSpA spectrum',
            'rows' => [['ctrl'], ['dc1', 'dc2'], ['crohn', 'uc'], ['nma']],
        ],
        [
            'key' => 'c4',
            'tone' => 'simpl',
            'title' => 'SIMPL3',
            'description' => '2. Durable improvement in pain, inflammation, and function',
            'rows' => [['pain'], ['adelphi', 'upstand'], ['inflam', 'func']],
        ],
        [
            'key' => 'c5',
            'tone' => 'simpl',
            'title' => 'SIMPL3',
            'description' => '3. Proven efficacy across multiple indications with a consistent and long-term safety profile',
            'rows' => [['safety'], ['multi'], ['teae']],
        ],
    ],

];

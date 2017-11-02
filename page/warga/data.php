<?php
return [
    'kondisi_rumah' => [
        ['id' => 1, 'name' => 'bambu'],
        ['id' => 2, 'name' => 'Triplek'],
        ['id' => 3, 'name' => 'Papan'],
        ['id' => 4, 'name' => 'Beton']
    ],
    'penghasilan'   => [
        ['id' => 1, 'name' => 'penghasilan < 500.000'],
        ['id' => 2, 'name' => '500.000 =< penghasilan =< 1.000.000'],
        ['id' => 3, 'name' => '1.000.000 < penghasilan =< 3.000.000'],
        ['id' => 4, 'name' => '3.000.000 < penghasilan =< 5.000.000'],
        ['id' => 5, 'name' => ' penghasilan > 5.000.000']
    ],
    'pekerjaan'     => [
        ['id' => 1, 'name' => 'Buruh'],
        ['id' => 2, 'name' => 'Petani'],
        ['id' => 3, 'name' => 'Pns'],
        ['id' => 4, 'name' => 'Wira Usaha'],
        ['id' => 5, 'name' => 'Pengusaha']
    ],
    'tanggungan'    => [
        ['id' => 1, 'name' => '> 8 orang'],
        ['id' => 2, 'name' => '6-8 orang'],
        ['id' => 3, 'name' => '3-5 orang'],
        ['id' => 4, 'name' => '1-2 orang']
    ],
    'aset'          => [
        ['id' => 1, 'name' => 'Aset =< 1.000.000'],
        ['id' => 2, 'name' => '1.000.000 < Aset < 4.000.000'],
        ['id' => 3, 'name' => '4.000.000 =< Aset =< 8.000.000'],
        ['id' => 5, 'name' => 'Aset > 8.000.000']
    ]
];
?>
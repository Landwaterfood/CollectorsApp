<?php

use PHPUnit\Framework\TestCase;

require_once 'php.php';

class createpigmaDIVS extends TestCase
{
    public function testcreatepigmaDIVSexactdata(): void
    {
        $mockData = [
            [
            'id' => 1,
            'name' => 'Fremington Quay Yellow Ochre',
            'color' => 'Yellow',
            'HEX' => '#C5A601',
            'Mineral' => 'Limonite',
            'chemical' => '(FeO(OH) nH20)',
            'description' => 'Quaternary, possible glacial deposits, 400,000 years old Manganese oxide.',
            'image_closeup' => 'yellow.jpeg'
            ]

        ];

        $expectedOutput = '<div>' .
            '<div>1</div>' .
            '<div>Fremington Quay Yellow Ochre</div>' .
            '<div>Red</div>' .
            '<div>#C5A601</div>' .
            '<div>Limonite</div>' .
            '<div>(FeO(OH) nH20)</div>' .
            '<div>Quaternary, possible glacial deposits, 400,000 years old Manganese oxide.</div>' .
            '<td><img src="yellow.jpeg" alt="Closeup view"></td>'.
            '</div>';


        $actualOutput = createpigmaDIVS($mockData);
        $this->assertEquals($expectedOutput, $actualOutput);
    }

    public function testcreatepigmaDIVSWrongdata(): void
    {
        $mockData = [
            'arse'
        ];

        $expectedOutput = '<div>' .
            '<div>1</div>' .
            '<div>Fremington Quay Yellow Ochre</div>' .
            '<div>Red</div>' .
            '<div>#C5A601</div>' .
            '<div>Limonite</div>' .
            '<div>(FeO(OH) nH20)</div>' .
            '<div>Quaternary, possible glacial deposits, 400,000 years old Manganese oxide.</div>' .
            '<td><img src="yellow.jpeg" alt="Closeup view"></td>'.
            '</div>';

        $actualOutput = createpigmaDIVS($mockData);
        $this->assertEquals($expectedOutput, $actualOutput);
    }

    public function testcreatepigmaDIVSrightData(): void
    {
        $mockData = [
            [
                'id' => 1,
                'name' => 'Red Ochre',
                'color' => 'Red',
                'HEX' => '#FF0000',
                'Mineral' => 'Iron Oxide',
                'chemical' => 'FE02',
                'description' => 'pigment from the ground',
                'image_closeup' => 'closeup.jpg'
            ]
        ];

        $expectedOutput =  '<div>' .
                           '<div>1</div>' .
                           '<div>Red Ochre</div>' .
                           '<div>Red</div>' .
                           '<div>#FF0000</div>' .
                            '<div>Iron Oxide</div>' .
                            '<div>FE02</div>' .
                            '<div>Pigment from the ground</div>' .
                            '<td><img src="closeup.jpg" alt="Closeup view"></td>'.
                            '</div>';


        $actualOutput = createpigmaDIVS($mockData);
        $this->assertEquals($expectedOutput, $actualOutput);
    }

    public function testcreatepigmaDIVSWithNullValues(): void
    {
        // Mocked pigment data with some null values
        $mockData = [
            [
                'id' => null,
                'name' => null,
                'color' => null,
                'HEX' => null,
                'mineral' => null,
                'chemical' => null,
                'description' => null,
                'image_closeup' => null,

            ]
        ];

        // Expected HTML output with 'NULL' for all null values
        $expectedOutput ='<div>'.
                            '<div>NULL</div>'.
                            '<div>NULL</div>'.
                            '<div>NULL</div>'.
                            '<div>NULL</div>';
                            '<div>NULL</div>';
                            '<div>NULL</div>';
                            '<div>NULL</div>';
                            '<div>NULL</div>';
                        '</div>';

        $actualOutput = createpigmaDIVS($mockData);
        $this->assertEquals($expectedOutput, $actualOutput);
    }

    // Test with malformed data
    public function testcreatepigmaDIVSWithMalformedData(): void
    {
        // Malformed data
        $mockData = [
            [
                'id' => 'NotANumber',    // Wrong type
                'name' => 'Red Ochre',   // Valid
                'color' => 'missing',      // Missing color
                'HEX' => 12345,          // Wrong type
                'mineral' => 20,          //wrong type
                'chemical' => 'Iron Oxide', //invalid string, should be a chemical name
                'description' => "34343",          //int, wrong type
                 'image_closeup' => 'phpunit tests'
            ]
        ];

        // Expected output should handle missing or malformed fields, for example, output 'NULL' or ignore invalid fields.
        $expectedOutput =   '<div>'.
            '<div>NULL</div>'.               // Invalid id, should show 'NULL'
            '<div>Red Ochre</div>'.           // Valid name
            '<div>NULL</div>'.                // Missing color should result in 'NULL'
            '<div>NULL</div>'.                // Invalid HEX, should show 'NULL'
            '<div>NULL</div>'.                //Invalid mineral, should show 'NULL'
            '<div>Iron Oxide</div>'.          // inValid chemical
            '<div>NULL</div>'.                // Missing image should show 'NULL'
            '</div>';


        $actualOutput = createpigmaDIVS($mockData);
        $this->assertEquals($expectedOutput, $actualOutput);
    }
}


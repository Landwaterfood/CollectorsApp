<?php

use PHPUnit\Framework\TestCase;

require_once 'src/php.php';

class createpigmaDIVStest extends TestCase
{
    public function testcreatepigmaDIVSWrongdata(): void
    {
        $mockData =
            [
                ['id' => null]
            ];


        $expectedOutput = '';

        $actualOutput = createpigmaDIVS($mockData);
        $this->assertEquals($expectedOutput, $actualOutput);
    }

    public function testcreatepigmaDIVSrightData(): void
    {
        $mockData = [
            [
                'id' => 1,
                'name' => 'Red Ochre',
                'color_name' => 'Red',
                'HEX' => '#FF0000',
                'Mineral' => 'Iron Oxide',
                'chemical' => 'FE02',
                'description' => 'pigment from the ground',
                'image_closeup' => 'closeup.jpg'
            ]
        ];

        $expectedOutput ='<div class = "pigment_item"><div class = "pigments pigment_id"><div class = "stattitle">ID: #</div>1</div><div class = "pigments pigment_name"><div class = "stattitle">name:</div>Red Ochre</div><div class = "pigments pigment_color_name"><div class = "stattitle">color: </div>Red</div><div class = "pigments pigment_HEX"><div class = "stattitle">HEX: </div>#FF0000</div><div class = "pigments pigment_mineral"><div class = "stattitle">mineral: </div>NULL</div><div class = "pigments pigment_chemical"><div class = "stattitle">chemical: </div>FE02</div><div class = "pigment_description"><div class = "stattitle">description: </div>pigment from the ground</div><div class = "pigment_image_closeup"><img src="closeup.jpg" alt="image" style="width:100%;height:80%;"></div></div>';

        $actual = createpigmaDIVS($mockData);
        $this->assertEquals($expectedOutput, $actual);
    }

    public function testcreatepigmaDIVSWithNullValues(): void
    {
        // Mocked pigment data with some null values
        $mockData = [
            [
                'id' => null,
                'name' => null,
                'color_name' => null,
                'HEX' => null,
                'mineral' => null,
                'chemical' => null,
                'description' => null,
                'image_closeup' => null,

            ]
        ];

        // Expected HTML output with 'NULL' for all null values
                $expectedOutput=
                    '';

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
                'color_name' => 'missing',      // Missing color
                'HEX' => 12345,          // Wrong type
                'mineral' => 20,          //wrong type
                'chemical' => 'Iron Oxide', //invalid string, should be a chemical name
                'description' => "34343",          //int, wrong type
                 'image_closeup' => 'phpunit tests'
            ]
        ];

        // Expected output should handle missing or malformed fields, for example, output 'NULL' or ignore invalid fields.
        $this->expectException(UnexpectedValueException::class);
        createpigmaDIVS($mockData);

    }
}




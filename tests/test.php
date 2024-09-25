<?php

use PHPUnit\Framework\TestCase;

require_once 'php.php';

class CreateTableTest extends TestCase
{
    public function testCreateTableData(): void
    {
        $mockData = [
            [
                'id' => 1,
                'name' => 'Red Ochre',
                'color' => 'Red',
                'HEX' => '#FF0000',
                'Geology' => 'Iron Oxide',
                'image_closeup' => 'closeup.jpg'
            ]
        ];

        $expectedOutput =  '<tr>' .
                           '<td>1</td>' .
                           '<td>Red Ochre</td>' .
                           '<td>Red</td>' .
                           '<td>#FF0000</td>' .
                            '<td>Iron Oxide</td>' .
                            '<td><img src="closeup.jpg" alt="Closeup view"></td>'.
                            '</tr>';

        // Call the function with mock data
        $actualOutput = createTable($mockData);

        // Assert the result matches the expected output
        $this->assertEquals($expectedOutput, $actualOutput);
    }

    public function testCreateTableWithNullValues(): void
    {
        // Mocked pigment data with some null values
        $mockData = [
            [
                'id' => null,
                'name' => null,
                'color' => null,
                'HEX' => null,
                'mineral' => null,
                'image_closeup' => null,

            ]
        ];

        // Expected HTML output with 'NULL' for all null values
        $expectedOutput =   '<tr>'.
                            '<td>NULL</td>'.
                            '<td>NULL</td>'.
                            '<td>NULL</td>'.
                            '<td>NULL</td>';
                            '<td>NULL</td>';
                            '<td>NULL</td>';
                            '</tr>';

        // Call the function with mock data
        $actualOutput = createTable($mockData);

        // Assert the result matches the expected output
        $this->assertEquals($expectedOutput, $actualOutput);
    }

    // Test with malformed data
    public function testCreateTableWithMalformedData(): void
    {
        // Malformed data: Missing some keys and incorrect types
        $mockData = [
            [
                'id' => 'NotANumber',    // Wrong type
                'name' => 'Red Ochre',   // Valid
                // 'color' => missing      // Missing color key
                'HEX' => 12345,          // Wrong type (should be a string, like #FF0000)
                'Geology' => 'Iron Oxide',
                // 'image_closeup' => missing // Missing image
            ]
        ];

        // Expected output should handle missing or malformed fields, for example, output 'NULL' or ignore invalid fields.
        $expectedOutput =   '<tr>'.
            '<td>NULL</td>'.               // Invalid id, should show 'NULL'
            '<td>Red Ochre</td>'.           // Valid name
            '<td>NULL</td>'.                // Missing color should result in 'NULL'
            '<td>NULL</td>'.                // Invalid HEX, should show 'NULL'
            '<td>Iron Oxide</td>'.          // Valid geology
            '<td>NULL</td>'.                // Missing image should show 'NULL'
            '</tr>';

        // Call the function with malformed data
        $actualOutput = createTable($mockData);

        // Assert the result matches the expected output
        $this->assertEquals($expectedOutput, $actualOutput);
    }
}

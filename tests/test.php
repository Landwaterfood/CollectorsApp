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
                'image_closeup' => 'closeup.jpg',
                'image_site' => 'site.jpg',
                'country' => 'USA',
                'town' => 'Sedona',
                'coordinateslat' => '34.8697',
                'coordinateslong' => '-111.7608'
            ]
        ];

        $expectedOutput = '<tr>';
        $expectedOutput .= '<td>1</td>';
        $expectedOutput .= '<td>Red Ochre</td>';
        $expectedOutput .= '<td>Red</td>';
        $expectedOutput .= '<td>#FF0000</td>';
        $expectedOutput .= '<td>Iron Oxide</td>';
        $expectedOutput .= '<td><img src="closeup.jpg" alt="Closeup view"></td>';
        $expectedOutput .= '<td><img src="site.jpg" alt="Site view"></td>';
        $expectedOutput .= '<td>USA</td>';
        $expectedOutput .= '<td>Sedona</td>';
        $expectedOutput .= '<td>34.8697</td>';
        $expectedOutput .= '<td>-111.7608</td>';
        $expectedOutput .= '</tr>';

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
                'Geology' => null,
                'image_closeup' => null,
                'image_site' => null,
                'country' => null,
                'town' => null,
                'coordinateslat' => null,
                'coordinateslong' => null
            ]
        ];

        // Expected HTML output with 'NULL' for all null values
        $expectedOutput = '<tr>';
        $expectedOutput .= '<td>NULL</td>';
        $expectedOutput .= '<td>NULL</td>';
        $expectedOutput .= '<td>NULL</td>';
        $expectedOutput .= '<td>NULL</td>';
        $expectedOutput .= '<td>NULL</td>';
        $expectedOutput .= '<td>NULL</td>';
        $expectedOutput .= '<td>NULL</td>';
        $expectedOutput .= '<td>NULL</td>';
        $expectedOutput .= '<td>NULL</td>';
        $expectedOutput .= '<td>NULL</td>';
        $expectedOutput .= '<td>NULL</td>';
        $expectedOutput .= '</tr>';

        // Call the function with mock data
        $actualOutput = createTable($mockData);

        // Assert the result matches the expected output
        $this->assertEquals($expectedOutput, $actualOutput);
    }
}

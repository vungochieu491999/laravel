<?php
namespace App\Helpers;


use PhpOffice\PhpSpreadsheet\Cell\Coordinate;
use PhpOffice\PhpSpreadsheet\Reader\Csv;

class LanguageResourceHelper
{

    public function __construct()
    {

    }

    public function generateFromExcel(string $path, bool $replaceView = null, bool $reverse = null)
    {
        $file = basename($path);
        $filename = substr($file, 0, strpos($file, '.'));
        $resourcePath = resource_path('lang');

        if ($filename) {
            $tab = '    ';
            $startStr = '<?php ' . PHP_EOL . $tab . 'return [ ' . PHP_EOL;
            $endStr = $tab . '];';
            $rowStr = $tab . $tab . '\'%s\' => \'%s\',' . PHP_EOL;

            $reader = new Csv();
            $reader->setLoadSheetsOnly(0);
            $spreadsheet = $reader->load($path);
            $worksheet = $spreadsheet->getActiveSheet();
            $highestRow = $worksheet->getHighestRow();
            $highestColumn = $worksheet->getHighestColumn();
            $maxCol = Coordinate::columnIndexFromString($highestColumn);
            $rows = [];
            $languages = [];


            // Get languages list
            $row = 2; // Start from row index = 2
            $col = 4; // Start from column D
            $cell = $worksheet->getCellByColumnAndRow($col, 2);
            while (!empty($cell->getValue())) {
                $languages[$col] = $cell->getValue();
                $col++;
                $cell = $worksheet->getCellByColumnAndRow($col, 2);
            }

            // Start generate
            extract(array_values($languages));
            foreach ($languages as $langCol => $language) {
                $col = 3; // Start from column C
                $content = '';
                for ($row = 3; $row <= $highestRow; $row++) {
                    if ($label = $worksheet->getCellByColumnAndRow($col, $row)->getValue()) {
                        if ($replaceView) {
                            $bladePath = $worksheet->getCellByColumnAndRow($maxCol, $row)->getValue();
                            if (!empty($bladePath)) {
                                $bladeFilePath = resource_path('/') . DIRECTORY_SEPARATOR . $bladePath;
                                try {
                                    $bladeContent = file_get_contents($bladeFilePath);
                                    file_put_contents($bladeFilePath, str_replace(
                                        '>' . $worksheet->getCellByColumnAndRow($langCol, $row) . '<'
                                        , '>{{__(\'' . $filename . '.' . $label . '\')}}<'
                                        , $bladeContent));
                                } catch (\Exception $e) {

                                }
                            }
                        }
                        $content .= sprintf($rowStr, $label, htmlspecialchars($worksheet->getCellByColumnAndRow($langCol, $row)->getValue(), ENT_QUOTES));
                    }
                }
                $content = $startStr . $content . $endStr;
                try {
                    $dir = $resourcePath . DIRECTORY_SEPARATOR . $language . '/';
                    if (is_dir($dir) === false) {
                        mkdir($dir);
                    }
                    file_put_contents($dir . $filename . '.php', $content);
                    echo 'File ' . $dir . $filename . '.php' . ' created' . PHP_EOL;
                } catch (\Exception $e) {
                    dd($e->getMessage());
                }

            }
        }

    }
}

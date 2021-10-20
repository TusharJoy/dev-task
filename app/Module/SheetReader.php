<?php

namespace App\Module;

class SheetReader
{
    private $filePath;
    private $readerType;

    public function __construct(string $filePath, $readerType = null)
    {
        $this->filePath = $filePath;
        $this->readerType = $readerType;

        if (is_null($readerType)) {
            $this->readerType = \strtolower(\pathinfo($filePath, PATHINFO_EXTENSION));
        }
    }


    /**
     * @param $filePath
     * @return static
     */
    public static function openFileAsXLSX($filePath): SheetReader
    {
        return new static($filePath, ReaderType::XLSX);
    }

    /**
     * @param $filePath
     * @return static
     */
    public static function openFileAsCSV($filePath): SheetReader
    {
        return new static($filePath, ReaderType::CSV);
    }


}
<?php

class FileWriter
{
    private string $filePath;

    public function __construct(string $filePath)
    {
        $this->setFilePath($filePath);
    }

    /**
     *
     * @return string
     */
    public function getFilePath(): string
    {
        return $this->filePath;
    }

    /**
     *
     * @param string $filePath
     */
    public function setFilePath(string $filePath): void
    {
        $this->filePath = $filePath;
    }

    /**
     *
     * @param string $content
     * @throws Exception
     */
    public function writeToFileWith(string $content): void
    {
        $timestamp = date('Y-m-d H:i:s');
        $contentWithTimestamp = "[$timestamp] $content" . PHP_EOL;

        $result = file_put_contents($this->filePath, $contentWithTimestamp, FILE_APPEND | LOCK_EX);

        if ($result === false) {
            throw new Exception('Failed to write to the file');
        }
    }
}

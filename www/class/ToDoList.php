<?php
class ToDoList
{
    private string $filePath;

    public function __construct(string $filePath)
    {
        $this->setFilePath($filePath);
    }

    /**
     * @throws Exception
     */
    public function setFilePath(string $filePath): void
    {
        if(!file_exists($filePath)) {
            throw new Exception('File not found');
        }
        $this->filePath = $filePath;
    }

    /**
     * @return string
     */
    public function getFilePath(): string
    {
        return $this->filePath;
    }

    //Приобразовываю фаил из ссылки в массив
    private function convertFileToArr(string $filePath): array
    {
        $file_content = file_get_contents($filePath);
        $data_array = json_decode($file_content, true);
        if ($data_array === null && json_last_error() !== JSON_ERROR_NONE) {
            die('Error decoding JSON: ' . json_last_error_msg());
        }

        return $data_array;
    }

    private function saveToFile(array $array, string $filePath): void
    {
        $jsonString = json_encode($array);

        if ($jsonString === false) {
            throw new Exception('Failed to encode array to JSON');
        }

        $result = file_put_contents($filePath, $jsonString);

        if ($result === false) {
            throw new Exception('Failed to write to the file');
        }
    }

    public function addTask($taskName, $priority)
    {
        $dataArray = $this->convertFileToArr($this->filePath);
        $newTask = ['id' => random_int(0, 999), 'name' => $taskName, 'priority' => $priority, 'status' => 'не виконано'];
        array_push($dataArray, $newTask);
        $this->saveToFile($dataArray, $this->filePath);
    }
}
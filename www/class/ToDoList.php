<?php
enum TaskStatus: string
{
    case COMPLETED = 'виконано';
    case NOT_COMPLETED = 'не виконано';

}

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
        if (!file_exists($filePath)) {
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

    /**
     * @throws Exception
     */
    private function convertFileToArr(string $filePath): array
    {
        $file_content = file_get_contents($filePath);
        $data_array = json_decode($file_content, true);
        if ($data_array === null && json_last_error() !== JSON_ERROR_NONE) {
            throw new Exception('Error decoding JSON: ' . json_last_error_msg());
        }

        return $data_array;
    }

    /**
     * @throws Exception
     */
    private function saveToFile(array $array): void
    {
        $jsonString = json_encode($array, JSON_PRETTY_PRINT);

        if ($jsonString === false) {
            throw new Exception('Failed to encode array to JSON');
        }

        $result = file_put_contents($this->filePath, $jsonString);

        if ($result === false) {
            throw new Exception('Failed to write to the file');
        }
    }

    /**
     * @throws Exception
     */
    public function addTask(string $taskName, string $priority): void
    {
        $dataArray = $this->convertFileToArr($this->filePath);
        $newTask = ['id' => uniqid(), 'name' => $taskName, 'priority' => $priority, 'status' => TaskStatus::NOT_COMPLETED];
        array_push($dataArray, $newTask);
        $this->saveToFile($dataArray);
    }

    /**
     * @throws Exception
     */
    public function deleteTask(string $taskId): void
    {
        $dataArray = $this->convertFileToArr($this->filePath);
        $taskFound = false;

        foreach ($dataArray as $key => $value) {
            if ($value['id'] === $taskId) {
                unset($dataArray[$key]);
                $taskFound = true;
                break;
            }
        }

        if (!$taskFound) {
            throw new Exception('Task not found');
        }

        $this->saveToFile($dataArray);
    }

    //вместо метода completeTask создал метод statusChange который меняет статус, мне так на странице показалось логичным, что пользователь может отметить задачу как выполненна, так и нет.
    public function statusChange(string $taskId, string $status): void
    {
        //не уверен но может стоило эту переменую вынести в отдельный метод?
        $dataArray = $this->convertFileToArr($this->filePath);

        foreach($dataArray as &$value) {
            if($value['id'] === $taskId) {
                match($status) {
                    TaskStatus::COMPLETED => $value['status'] = TaskStatus::NOT_COMPLETED,
                    TaskStatus::NOT_COMPLETED => $value['status'] = TaskStatus::COMPLETED,
                    default => throw new Exception("Необработанный статус: $status"),
                };
                // if($status === TaskStatus::COMPLETED) {
                //     $value['status'] = 'fgbftgb';
                // } else {
                //     $value['status'] = TaskStatus::COMPLETED;
                // }

            }
        }
        $this->saveToFile($dataArray);
    }
}

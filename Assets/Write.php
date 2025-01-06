<?php

require_once 'Run-db.php';

class Write
{
    public function write() 
    {
        $db = new Database();
        $conn = $db->setScript();
        $conn = $db->getConnection();

        // verifica o método http
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $content = $_POST['form-placeholder'];
            if (empty($content)) {
                http_response_code(400); // Bad Request
                echo json_encode(['status' => 'error', 'message' => 'O campo de mensagens não pode estar vazio.']);
                exit();
            }

            try {
                $stmt = $conn->prepare('INSERT INTO message (content) VALUES (:content)');
                $stmt->bindParam(':content', $content);
                $stmt->execute();

                // retorna mensagem de sucesso
                header('Content-Type: application/json');
                echo json_encode(['status' => 'success', 'message' => 'Mensagem registrada.']);
            } catch (PDOException $e) {
                // retorna erro em caso de exceção
                http_response_code(500); // Internal Server Error
                header('Content-Type: application/json');
                echo json_encode(['status' => 'error', 'message' => $e->getMessage()]);
            }
        } else {
            // retorna erro para métodos que não sejam POST
            http_response_code(405); // Method not allowed
            header('Content-Type: application/json');
            echo json_encode(['status' => 'error', 'message' => 'Método não permitido.']);
        }
    }
}

$write = new Write();
$write->write();

?>
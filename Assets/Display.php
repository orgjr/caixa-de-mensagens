<?php
Require_once 'Run-db.php';

class Display 
{
    private $savedMessage;
    public function __construct()
    {
        // Inicializa a propriedade
        $this->savedMessage = "Nenhuma mensagem encontrada.";
    }
    public function display()
    {
        $db = new Database();
        $conn = $db->getConnection();
        $displayContent = $conn->query('SELECT content FROM message ORDER BY id DESC');
        $message = $displayContent->fetchALL(PDO::FETCH_ASSOC);

        foreach ($message as $displayMessage) {
            echo '<div class="show-the-messages">';
            echo '<div class="content">';
            echo '<p>' . nl2br(htmlspecialchars($displayMessage['content'])) . '</p>';
            echo '</div>';
            echo '</div>';
        }
    }
}

$content = new Display();
$content->display();

?>
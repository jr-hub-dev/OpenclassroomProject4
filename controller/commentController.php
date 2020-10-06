<?php

namespace App\Controller;

use App\Model\CommentManager;

class CommentController
{
    private $commentClean = array();

    public function alert($commentId)
    {
        $commentManager = new CommentManager();
        $commentManager->alert($commentId);
        $template = 'signal';
        include '../view/layout.php';
    }

    //Supprimer un comment
    public function delete($commentId)
    {
        $commentManager = new CommentManager();
        $comment = $commentManager->getcomment($commentId);

        if (!empty($_comment)) {
            if ($commentManager->delete($commentId)) {
                header('Location: index.php');
                exit;
            }
            header('Location: index.php?objet=comment&action=delete&id=' . $commentId);
        }

        $template = 'commentDelete';
        include '../view/layout.php';
    }

    //Affiche la list des comments
    public function displayAll()
    {
        $commentManager = new CommentManager();
        $comments = $commentManager->getComments();
    }
}

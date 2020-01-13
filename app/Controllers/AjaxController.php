<?php


namespace App\Controllers;


use App\Models\Advertisement;
use App\Models\Comment;
use App\Models\User;

class AjaxController
{
    public function addComment($data)
    {
        $loggedUser = $data['loggedUser'];
        $advertisementId = $data['advertisementId'];
        $commentText = $data['comment'];

        $advertisement = Advertisement::getAdvertisementById($advertisementId);
        $user = User::getOneByLogin($loggedUser);

        if ($advertisement != null && $user != null)
        {
            $comment = new Comment([
                'adverId' => intval($advertisementId),
                'userId' => $user->getId(),
                'comment' => $commentText,
                'time' => date("Y-m-d H:i:s")
            ]);
            $comment->add();

            echo json_encode([
                'username' => $user->getUsername(),
                'comment' => $comment->getComment(),
                'time' => $comment->getTime()
            ]);
        }
    }
}
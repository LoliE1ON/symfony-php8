<?php


namespace App\Controller\File;


use App\Controller\AbstractRestController;
use App\Entity\File;
use App\Exception\File\FileNotFoundException;

abstract class AbstractFileController extends AbstractRestController
{
    protected function findFile(string $id): File
    {
        $file = $this->getDoctrine()->getRepository(File::class)->find($id);

        if (!$file instanceof File) {
            throw FileNotFoundException::for($id);
        }

        return $file;
    }
}
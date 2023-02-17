<?php

namespace App\Controller;

use App\Entity\Image;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;
use Symfony\Component\Routing\Annotation\Route;

class ImageController extends AbstractController
{
    /**
     * Сообщения
     *  - просмотреть
     *  - прикреплять файлы
     * 
     * Пользователи
     *  - регистрация
     *  - аутентификация
     *  - редактирование профиля
     *  - просмотреть профиля
     * 
     * Чат
     *  - создавать/удалять Сообщения
     *  - добавлять/удалять участников
     *  - редактировать чат
     */
    // Сообщения



    #[Route('/image/upload', name: 'app_upload_image')]
    public function imageUpload(Request $request, EntityManagerInterface $em)
    {
        $uploadedImage = current($request->files->all());
        if (!$uploadedImage) {
            throw new BadRequestHttpException();
        }
        $filename = time() . '.' . $uploadedImage->getClientOriginalExtension();
        $uploadedImage->move('static', $filename);
        $image = new Image("static/$filename", $uploadedImage->getClientOriginalName());
        $em->persist($image);
        $em->flush();
        
        return $this->json($image);
    }

}


<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use App\Repository\BookRepository;
use Symfony\Component\Serializer\SerializerInterface;


class BookController extends AbstractController
{



    #[Route('/api/books', name: 'book_list', methods: ['GET'])]
    public function getBookList(
        BookRepository $bookRepository,
        SerializerInterface $serializer
    ): JsonResponse {
        $bookList = $bookRepository->findAll();
        $jsonBookList = $serializer->serialize($bookList, 'json');
        
        return new JsonResponse($jsonBookList, Response::HTTP_OK, [], true);
    }

   #[Route('/api/books/{id}', name: 'detailBook', methods: ['GET'])] public function getDetailBook(Book $book, SerializerInterface
$serializer): JsonResponse
{
$jsonBook = $serializer->serialize($book, 'json'); return new JsonResponse($jsonBook, Response::HTTP_OK,
['accept' => 'json'], true);
}
        
        
}
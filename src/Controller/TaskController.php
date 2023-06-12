<?php

namespace App\Controller;

use App\Entity\Task;
use App\Form\TaskType;
use App\Repository\TaskRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
//use Symfony\UX\Turbo\TurboBundle;

#[Route('/task', name: 'app_task_')]
class TaskController extends AbstractController
{
    #[Route('', name: 'index', methods: ['GET', 'POST'])]
    public function index(TaskRepository $taskRepository): Response
    {
        $tasks = $taskRepository->findAll();
        return $this->render('task/index.html.twig', [
            'tasks' => $tasks,
        ]);
    }

    #[Route('/new', name: 'new', methods: ['GET', 'POST'])]
    public function new(Request $request, TaskRepository $taskRepository): Response
    {
        $task = new Task();
        $form = $this->createForm(TaskType::class, $task);
        $emptyForm = clone $form;
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid())
        {
            $taskRepository->save($task, true);
            $this->addFlash('success', 'Task created successfully !');
//            if(TurboBundle::STREAM_FORMAT === $request->getPreferredFormat())
//            {
//                $request->setRequestFormat(TurboBundle::STREAM_FORMAT);
//                return $this->render('task/success.stream.html.twig', [
//                    'task' => $task,
//                    'form' => $emptyForm
//                ]);
//            }

            return $this->redirectToRoute('app_task_index', [], Response::HTTP_SEE_OTHER);
        }
        return $this->render('task/new.html.twig', [
            'form' => $form
        ]);
    }

    #[Route('/{id}/edit', name: 'edit', methods: ['GET', 'POST'])]
    public function edit(Task $task, Request $request, TaskRepository $taskRepository): Response
    {
        $form = $this->createForm(TaskType::class, $task);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid())
        {
            $taskRepository->save($task, true);
            $this->addFlash('success', 'Task updated successfully !');
            return $this->redirectToRoute('app_task_index');
        }

        return $this->render('task/edit.html.twig', [
            'form' => $form
        ]);
    }
}
